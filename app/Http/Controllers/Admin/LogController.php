<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

class LogController extends Controller
{
    public function system()
    {
        try {
            $logPath = storage_path('logs/laravel.log');
            $logs = new LengthAwarePaginator([], 0, 15);
            
            if (File::exists($logPath)) {
                $parsed = $this->parseLogFile($logPath);
                $perPage = 15;
                $page = (int) request()->get('page', 1);
                $collection = new Collection($parsed);
                $currentPageItems = $collection->forPage($page, $perPage)->values();
                $logs = new LengthAwarePaginator($currentPageItems, $collection->count(), $perPage, $page, [
                    'path' => request()->url(),
                    'query' => request()->query(),
                ]);
            }
            
            return view('admin.log.system', compact('logs'));
        } catch (\Exception $e) {
            Log::error('Error reading system logs: ' . $e->getMessage());
            return view('admin.log.system', ['logs' => new LengthAwarePaginator([], 0, 15), 'error' => 'Tidak dapat membaca log sistem']);
        }
    }

    public function database()
    {
        try {
            // Get database connection info
            $connection = config('database.default');
            $database = config("database.connections.{$connection}.database");
            $host = config("database.connections.{$connection}.host");
            $port = config("database.connections.{$connection}.port");
            
            $dbInfo = [
                'connection' => $connection,
                'database' => $database,
                'host' => $host,
                'port' => $port,
                'status' => 'Connected'
            ];
            
            // Test database connection
            try {
                \DB::connection()->getPdo();
            } catch (\Exception $e) {
                $dbInfo['status'] = 'Connection Failed: ' . $e->getMessage();
            }
            // Try to read a dedicated database log if exists
            $dbLogPath = storage_path('logs/database.log');
            $logs = new LengthAwarePaginator([], 0, 15);
            if (File::exists($dbLogPath)) {
                $parsed = $this->parseLogFile($dbLogPath);
                $perPage = 15;
                $page = (int) request()->get('page', 1);
                $collection = new Collection($parsed);
                $currentPageItems = $collection->forPage($page, $perPage)->values();
                $logs = new LengthAwarePaginator($currentPageItems, $collection->count(), $perPage, $page, [
                    'path' => request()->url(),
                    'query' => request()->query(),
                ]);
            } else {
                // If no database.log, provide empty paginator
                $logs = new LengthAwarePaginator([], 0, 15, request()->get('page', 1), [
                    'path' => request()->url(),
                    'query' => request()->query(),
                ]);
            }
            
            return view('admin.log.database', compact('dbInfo', 'logs'));
        } catch (\Exception $e) {
            Log::error('Error getting database info: ' . $e->getMessage());
            return view('admin.log.database', ['dbInfo' => null, 'logs' => new LengthAwarePaginator([], 0, 15), 'error' => 'Tidak dapat mengambil informasi database']);
        }
    }

    /**
     * Parse a Laravel log file into structured multi-line entries.
     * Each entry keys: timestamp, channel, level, message, context, raw
     */
    private function parseLogFile(string $path): array
    {
        try {
            $content = File::get($path);
            $lines = preg_split("/\r?\n/", $content);
            $entries = [];
            $current = null;
            // Matches: [2025-08-11 15:20:30] local.ERROR: Message ...
            $startPattern = '/^\[(.*?)\]\s+([\w\.-]+)\.(\w+):\s(.*)$/';

            foreach ($lines as $ln) {
                if ($ln === null) continue;
                $line = rtrim($ln, "\r\n");
                if ($line === '') { // keep blank lines inside context if we already started an entry
                    if ($current) {
                        $current['raw'] .= "\n";
                        $current['context'] .= "\n";
                    }
                    continue;
                }

                if (preg_match($startPattern, $line, $m)) {
                    // push previous
                    if ($current) {
                        $entries[] = $current;
                    }
                    $timestamp = $m[1] ?? null;
                    $channel = $m[2] ?? null;
                    $level = strtoupper($m[3] ?? '');
                    $rest = $m[4] ?? '';

                    // Try to split message and context if JSON exists at the end
                    $message = $rest;
                    $context = '';
                    if (preg_match('/^(.*?)(\s\{.*)$/', $rest, $mm)) {
                        $message = trim($mm[1]);
                        $context = $mm[2];
                    }

                    $current = [
                        'timestamp' => $timestamp,
                        'channel' => $channel,
                        'level' => $level,
                        'message' => $message,
                        'context' => $context,
                        'raw' => $line,
                    ];
                } else {
                    // Continuation of previous entry (stack trace, context, etc.)
                    if ($current) {
                        $current['raw'] .= "\n" . $line;
                        // Always append continuation lines to context, keeping the first line as concise message
                        $current['context'] = rtrim(($current['context'] ?? ''), "\n");
                        $current['context'] .= ($current['context'] === '' ? '' : "\n") . $line;
                    } else {
                        // Orphan line, start a minimal entry
                        $current = [
                            'timestamp' => null,
                            'channel' => null,
                            'level' => '',
                            'message' => $line,
                            'context' => '',
                            'raw' => $line,
                        ];
                    }
                }
            }
            if ($current) {
                $entries[] = $current;
            }

            // Most recent first
            $entries = array_reverse($entries);
            return $entries;
        } catch (\Throwable $e) {
            Log::warning('Failed to parse log file: ' . $e->getMessage());
            return [];
        }
    }
}
 
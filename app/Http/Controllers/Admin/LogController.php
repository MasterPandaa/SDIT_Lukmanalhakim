<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Log;

class LogController extends Controller
{
    public function system()
    {
        try {
            $logPath = storage_path('logs/laravel.log');
            $logs = [];
            
            if (File::exists($logPath)) {
                $logContent = File::get($logPath);
                $logLines = array_reverse(explode("\n", $logContent));
                
                // Get last 100 lines
                $logs = array_slice(array_filter($logLines), 0, 100);
            }
            
            return view('admin.log.system', compact('logs'));
        } catch (\Exception $e) {
            Log::error('Error reading system logs: ' . $e->getMessage());
            return view('admin.log.system', ['logs' => [], 'error' => 'Tidak dapat membaca log sistem']);
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
            
            return view('admin.log.database', compact('dbInfo'));
        } catch (\Exception $e) {
            Log::error('Error getting database info: ' . $e->getMessage());
            return view('admin.log.database', ['dbInfo' => null, 'error' => 'Tidak dapat mengambil informasi database']);
        }
    }
} 
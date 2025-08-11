@extends('layouts.admin')

@section('title', 'Log - System')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 fw-bold text-success">System Log</h6>
                </div>
                <div class="card-body">
                    @if (!empty($error))
                        <div class="alert alert-danger">
                            <i class="fas fa-exclamation-triangle me-2"></i>
                            {{ $error }}
                        </div>
                    @else
                        <div class="alert alert-info small mb-3">
                            Menampilkan 15 log per halaman. Klik "Detail" untuk melihat pesan lengkap dan stacktrace.
                        </div>
                    @endif
                    
                    <div class="table-responsive">
                        <table class="table table-hover table-sm align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th>Timestamp</th>
                                    <th>Channel</th>
                                    <th>Level</th>
                                    <th style="min-width: 40%">Message</th>
                                    <th class="text-end">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($logs as $log)
                                    @php
                                        $idx = $loop->index + 1 + ($logs->currentPage() - 1) * $logs->perPage();
                                        $lvl = strtoupper($log['level'] ?? '');
                                        $badge = match($lvl) {
                                            'ERROR' => 'bg-danger',
                                            'WARNING', 'WARN' => 'bg-warning text-dark',
                                            'INFO' => 'bg-info',
                                            'DEBUG' => 'bg-secondary',
                                            default => 'bg-light text-dark'
                                        };
                                        $short = \Illuminate\Support\Str::of($log['message'] ?? ($log['raw'] ?? ''))
                                            ->replace(["\r"], '')
                                            ->replace("\n", ' ')
                                            ->limit(160);
                                        $detailId = 'logDetailSystem_'.$idx;
                                    @endphp
                                    <tr>
                                        <td class="text-nowrap"><code class="small">{{ $log['timestamp'] ?? '-' }}</code></td>
                                        <td class="text-nowrap"><span class="badge {{ $badge }}">{{ $log['channel'] ?? '-' }}</span></td>
                                        <td><span class="badge {{ $badge }}">{{ $lvl ?: 'LOG' }}</span></td>
                                        <td class="text-break small">{{ $short }}</td>
                                        <td class="text-end">
                                            <button class="btn btn-link btn-sm" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $detailId }}" aria-expanded="false" aria-controls="{{ $detailId }}">Detail</button>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td colspan="5">
                                            <div id="{{ $detailId }}" class="collapse p-2 border rounded bg-light-subtle">
                                                <div class="mb-2">
                                                    <div class="text-muted small">Pesan Lengkap</div>
                                                    <pre class="mb-0 small" style="white-space: pre-wrap; word-break: break-word;">{{ $log['message'] ?? ($log['raw'] ?? '') }}</pre>
                                                </div>
                                                @if (!empty($log['context']))
                                                    <div>
                                                        <div class="text-muted small">Context / Stacktrace</div>
                                                        <pre class="mb-0 small" style="white-space: pre-wrap; word-break: break-word;">{{ $log['context'] }}</pre>
                                                    </div>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" class="text-center text-muted">Belum ada data log untuk ditampilkan.</td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-end">
                            @if ($logs instanceof \Illuminate\Contracts\Pagination\Paginator || $logs instanceof \Illuminate\Contracts\Pagination\LengthAwarePaginator)
                                {{ $logs->withQueryString()->links() }}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 

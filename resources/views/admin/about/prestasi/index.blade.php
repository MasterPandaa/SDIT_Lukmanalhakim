@extends('layouts.admin')

@section('title', 'About - Prestasi')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 fw-bold text-success">Kelola Prestasi</h6>
                    <a href="{{ route('admin.prestasi.create') }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-plus me-1"></i> Tambah Prestasi
                    </a>
                </div>
                <div class="card-body">
                    @if (session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if (session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Judul</th>
                                    <th>Tingkat</th>
                                    <th>Tanggal</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($items as $i => $item)
                                <tr>
                                    <td>{{ $items->firstItem() + $i }}</td>
                                    <td>{{ $item->judul }}</td>
                                    <td>{{ $item->tingkat ?? '-' }}</td>
                                    <td>{{ optional($item->tanggal)->format('d M Y') ?? '-' }}</td>
                                    <td>
                                        <span class="badge {{ $item->is_active ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                                        </span>
                                    </td>
                                    <td class="d-flex gap-1">
                                        <a href="{{ route('admin.prestasi.edit', $item) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.prestasi.toggle', $item) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-sm btn-warning" type="submit">
                                                <i class="fas fa-toggle-on"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.prestasi.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus data ini?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger" type="submit">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center">Belum ada data</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div>
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 

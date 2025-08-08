@extends('layouts.admin')

@section('title', 'About - Ekstrakurikuler')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 fw-bold text-success">Kelola Ekstrakurikuler</h6>
                    <a href="{{ route('admin.ekstrakurikuler.create') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-plus me-1"></i> Tambah Ekstrakurikuler
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif
                    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama Ekstrakurikuler</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($items as $i => $item)
                                <tr>
                                    <td>{{ $items->firstItem() + $i }}</td>
                                    <td>{{ $item->nama }}</td>
                                    <td>
                                        <span class="badge {{ $item->is_active ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                                        </span>
                                    </td>
                                    <td class="d-flex gap-1">
                                        <a href="{{ route('admin.ekstrakurikuler.edit', $item) }}" class="btn btn-sm btn-success"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.ekstrakurikuler.toggle', $item) }}" method="POST" onsubmit="return confirm('Ubah status item ini?')">
                                            @csrf
                                            <button type="submit" class="btn btn-sm btn-warning"><i class="fas fa-toggle-on"></i></button>
                                        </form>
                                        <form action="{{ route('admin.ekstrakurikuler.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus item ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-danger"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="4" class="text-center text-muted">Belum ada data.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">
                        {{ $items->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 

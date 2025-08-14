@extends('layouts.admin')

@section('title', 'About - Fasilitas')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 fw-bold text-success">Kelola Fasilitas</h6>
                    <a href="{{ route('admin.fasilitas.create') }}" class="btn btn-sm btn-light">
                        <i class="fas fa-plus me-1"></i> Tambah Fasilitas
                    </a>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Halaman pengelolaan data fasilitas sekolah.
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Kategori</th>
                                    <th>Status</th>
                                    <th>Urutan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($items as $idx => $row)
                                <tr>
                                    <td>{{ $items->firstItem() + $idx }}</td>
                                    <td>{{ $row->nama }}</td>
                                    <td>{{ $row->kategori ?? '-' }}</td>
                                    <td>
                                        <span class="badge {{ $row->is_active ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $row->is_active ? 'Aktif' : 'Nonaktif' }}
                                        </span>
                                    </td>
                                    <td>{{ $row->urutan }}</td>
                                    <td class="d-flex gap-1">
                                        <a href="{{ route('admin.fasilitas.edit', $row) }}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form action="{{ route('admin.fasilitas.destroy', $row) }}" method="POST" onsubmit="return confirm('Hapus fasilitas ini?')">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                        <form action="{{ route('admin.fasilitas.toggle', $row) }}" method="POST">
                                            @csrf
                                            <button class="btn btn-sm btn-warning">
                                                <i class="fas fa-toggle-on"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Belum ada data.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div class="d-flex justify-content-end">{{ $items->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 

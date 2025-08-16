@extends('layouts.admin')

@section('title', 'About - Artikel')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 fw-bold text-success">Kelola Artikel</h6>
                    <a href="{{ route('admin.artikel.create') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-plus me-1"></i> Tambah Artikel
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
                        <table class="table table-hover align-middle">
                            <thead class="table-dark">
                                <tr>
                                    <th style="width:60px">No</th>
                                    <th>Judul</th>
                                    <th style="width:140px">Kategori</th>
                                    <th style="width:170px">Dipublikasikan</th>
                                    <th style="width:100px">Status</th>
                                    <th style="width:180px">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($artikels as $i => $item)
                                <tr>
                                    <td>{{ $artikels->firstItem() + $i }}</td>
                                    <td class="fw-semibold">{{ $item->judul }}</td>
                                    <td>{{ $item->kategori ?? '-' }}</td>
                                    <td>{{ $item->formatted_published_at ?? '-' }}</td>
                                    <td>
                                        <span class="badge {{ $item->is_active ? 'bg-success' : 'bg-secondary' }}">
                                            {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                                        </span>
                                    </td>
                                    <td>
                                        <div class="d-flex gap-2">
                                            <a href="{{ route('admin.artikel.edit', $item->id) }}" class="btn btn-sm btn-primary">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <form action="{{ route('admin.artikel.destroy', $item->id) }}" method="POST" onsubmit="return confirm('Hapus artikel ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-sm btn-danger">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                            <form action="{{ route('admin.artikel.toggle', $item->id) }}" method="GET">
                                                <button class="btn btn-sm btn-warning">
                                                    <i class="fas fa-power-off"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="6" class="text-center text-muted">Belum ada artikel.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div>
                        {{ $artikels->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

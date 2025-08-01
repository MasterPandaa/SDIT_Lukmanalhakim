@extends('layouts.admin')

@section('title', 'Manajemen Artikel')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Manajemen Artikel</h4>
                        <a href="{{ route('admin.artikel.create') }}" class="btn btn-primary">
                            <i class="fas fa-plus"></i> Tambah Artikel
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Gambar</th>
                                    <th>Judul</th>
                                    <th>Kategori</th>
                                    <th>Penulis</th>
                                    <th>Status</th>
                                    <th>Tanggal Publikasi</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($artikels as $index => $artikel)
                                <tr>
                                    <td>{{ $index + 1 + ($artikels->currentPage() - 1) * $artikels->perPage() }}</td>
                                    <td>
                                        @if($artikel->gambar)
                                            <img src="{{ $artikel->gambar_url }}" 
                                                 alt="{{ $artikel->judul }}" 
                                                 class="img-thumbnail" 
                                                 style="width: 60px; height: 60px; object-fit: cover;">
                                        @else
                                            <div class="bg-secondary text-white d-flex align-items-center justify-content-center" 
                                                 style="width: 60px; height: 60px;">
                                                <i class="fas fa-image"></i>
                                            </div>
                                        @endif
                                    </td>
                                    <td>
                                        <strong>{{ $artikel->judul }}</strong>
                                        @if($artikel->ringkasan)
                                            <br><small class="text-muted">{{ Str::limit($artikel->ringkasan, 50) }}</small>
                                        @endif
                                    </td>
                                    <td>{{ $artikel->kategori ?? '-' }}</td>
                                    <td>{{ $artikel->penulis ?? 'Admin' }}</td>
                                    <td>
                                        @if($artikel->is_active)
                                            <span class="badge bg-success">Aktif</span>
                                        @else
                                            <span class="badge bg-secondary">Nonaktif</span>
                                        @endif
                                    </td>
                                    <td>
                                        @if($artikel->published_at)
                                            {{ $artikel->formatted_published_at }}
                                        @else
                                            <span class="text-muted">Belum dipublikasi</span>
                                        @endif
                                    </td>
                                    <td>
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('blog-single', $artikel->slug) }}" 
                                               target="_blank" 
                                               class="btn btn-sm btn-info" 
                                               title="Lihat">
                                                <i class="fas fa-eye"></i>
                                            </a>
                                            <a href="{{ route('admin.artikel.edit', $artikel->id) }}" 
                                               class="btn btn-sm btn-warning" 
                                               title="Edit">
                                                <i class="fas fa-edit"></i>
                                            </a>
                                            <a href="{{ route('admin.artikel.toggle', $artikel->id) }}" 
                                               class="btn btn-sm {{ $artikel->is_active ? 'btn-secondary' : 'btn-success' }}" 
                                               title="{{ $artikel->is_active ? 'Nonaktifkan' : 'Aktifkan' }}"
                                               onclick="return confirm('Apakah Anda yakin ingin {{ $artikel->is_active ? 'menonaktifkan' : 'mengaktifkan' }} artikel ini?')">
                                                <i class="fas {{ $artikel->is_active ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                                            </a>
                                            <form action="{{ route('admin.artikel.destroy', $artikel->id) }}" 
                                                  method="POST" 
                                                  style="display: inline;"
                                                  onsubmit="return confirm('Apakah Anda yakin ingin menghapus artikel ini?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-danger" title="Hapus">
                                                    <i class="fas fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                <tr>
                                    <td colspan="8" class="text-center">Tidak ada artikel yang ditemukan.</td>
                                </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <div class="d-flex justify-content-center">
                        {{ $artikels->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
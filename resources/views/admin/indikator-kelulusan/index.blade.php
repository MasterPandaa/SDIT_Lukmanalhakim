@extends('layouts.admin')

@section('title', 'Kelola Indikator Kelulusan')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <!-- Header -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-graduation-cap fa-2x text-primary mr-2"></i>
                    Kelola Indikator Kelulusan
                </h1>
                <a href="{{ route('indikator-kelulusan') }}" target="_blank" class="btn btn-primary shadow-sm">
                    <i class="fas fa-eye mr-2"></i>
                    Lihat Halaman Publik
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle fa-2x mr-3"></i>
                        <div>
                            <strong>Berhasil!</strong> {{ session('success') }}
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-circle fa-2x mr-3"></i>
                        <div>
                            <strong>Error!</strong> {{ session('error') }}
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            <!-- Pengaturan Halaman -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-cog mr-2"></i>
                        Pengaturan Halaman
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.indikator-kelulusan.update-settings') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="judul_utama">Judul Utama</label>
                                    <input type="text" class="form-control @error('judul_utama') is-invalid @enderror" 
                                           id="judul_utama" name="judul_utama" 
                                           value="{{ old('judul_utama', $setting->judul_utama) }}" required>
                                    @error('judul_utama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="judul_header">Judul Header</label>
                                    <input type="text" class="form-control @error('judul_header') is-invalid @enderror" 
                                           id="judul_header" name="judul_header" 
                                           value="{{ old('judul_header', $setting->judul_header) }}" required>
                                    @error('judul_header')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama_pembicara">Nama Pembicara</label>
                                    <input type="text" class="form-control @error('nama_pembicara') is-invalid @enderror" 
                                           id="nama_pembicara" name="nama_pembicara" 
                                           value="{{ old('nama_pembicara', $setting->nama_pembicara) }}">
                                    @error('nama_pembicara')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="video_url">URL Video</label>
                                    <input type="url" class="form-control @error('video_url') is-invalid @enderror" 
                                           id="video_url" name="video_url" 
                                           value="{{ old('video_url', $setting->video_url) }}">
                                    @error('video_url')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <label for="kategori_tags">Kategori Tags (pisahkan dengan koma)</label>
                            <input type="text" class="form-control @error('kategori_tags') is-invalid @enderror" 
                                   id="kategori_tags" name="kategori_tags" 
                                   value="{{ old('kategori_tags', is_array($setting->kategori_tags) ? implode(', ', $setting->kategori_tags) : '') }}"
                                   placeholder="Unggul, Islami, Berprestasi">
                            @error('kategori_tags')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="deskripsi_header">Deskripsi Header</label>
                            <textarea class="form-control @error('deskripsi_header') is-invalid @enderror" 
                                      id="deskripsi_header" name="deskripsi_header" rows="3">{{ old('deskripsi_header', $setting->deskripsi_header) }}</textarea>
                            @error('deskripsi_header')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="gambar_header">Gambar Header</label>
                                    <input type="file" class="form-control-file @error('gambar_header') is-invalid @enderror" 
                                           id="gambar_header" name="gambar_header" accept="image/*">
                                    @error('gambar_header')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @if($setting->gambar_header)
                                        <small class="form-text text-muted">
                                            <img src="{{ $setting->gambar_header_url }}" alt="Header" class="img-thumbnail mt-2" style="max-width: 200px;">
                                        </small>
                                    @endif
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="foto_pembicara">Foto Pembicara</label>
                                    <input type="file" class="form-control-file @error('foto_pembicara') is-invalid @enderror" 
                                           id="foto_pembicara" name="foto_pembicara" accept="image/*">
                                    @error('foto_pembicara')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    @if($setting->foto_pembicara)
                                        <small class="form-text text-muted">
                                            <img src="{{ $setting->foto_pembicara_url }}" alt="Pembicara" class="img-thumbnail mt-2" style="max-width: 200px;">
                                        </small>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" 
                                       {{ old('is_active', $setting->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    Aktifkan Halaman
                                </label>
                            </div>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            <i class="fas fa-save mr-2"></i>
                            Simpan Pengaturan
                        </button>
                    </form>
                </div>
            </div>

            <!-- Daftar Kategori dan Indikator -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-list mr-2"></i>
                        Daftar Kategori & Indikator
                    </h6>
                    <div>
                        <a href="{{ route('admin.indikator-kelulusan.create-kategori') }}" class="btn btn-success btn-sm">
                            <i class="fas fa-plus mr-1"></i>
                            Tambah Kategori
                        </a>
                        <a href="{{ route('admin.indikator-kelulusan.create-indikator') }}" class="btn btn-info btn-sm">
                            <i class="fas fa-plus mr-1"></i>
                            Tambah Indikator
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    @if(count($kategoris) > 0)
                        <div class="accordion" id="kategoriAccordion">
                            @foreach($kategoris as $kategori)
                                <div class="card mb-3">
                                    <div class="card-header" id="heading{{ $kategori->id }}">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <h2 class="mb-0">
                                                <button class="btn btn-link" type="button" data-toggle="collapse" 
                                                        data-target="#collapse{{ $kategori->id }}" aria-expanded="true" 
                                                        aria-controls="collapse{{ $kategori->id }}">
                                                    <i class="fas fa-folder mr-2"></i>
                                                    {{ $kategori->nama }}
                                                    <span class="badge badge-{{ $kategori->is_active ? 'success' : 'secondary' }} ml-2">
                                                        {{ $kategori->is_active ? 'Aktif' : 'Nonaktif' }}
                                                    </span>
                                                    <span class="badge badge-info ml-1">
                                                        {{ $kategori->allIndikators->count() }} item
                                                    </span>
                                                </button>
                                            </h2>
                                            <div class="btn-group">
                                                <a href="{{ route('admin.indikator-kelulusan.edit-kategori', $kategori->id) }}" 
                                                   class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('admin.indikator-kelulusan.toggle-kategori-status', $kategori->id) }}" 
                                                   class="btn btn-{{ $kategori->is_active ? 'secondary' : 'success' }} btn-sm">
                                                    <i class="fas fa-{{ $kategori->is_active ? 'eye-slash' : 'eye' }}"></i>
                                                </a>
                                                <form action="{{ route('admin.indikator-kelulusan.destroy-kategori', $kategori->id) }}" 
                                                      method="POST" class="d-inline" 
                                                      onsubmit="return confirm('Yakin ingin menghapus kategori ini? Semua indikator di dalamnya akan ikut terhapus!')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                    
                                    <div id="collapse{{ $kategori->id }}" class="collapse" 
                                         aria-labelledby="heading{{ $kategori->id }}" data-parent="#kategoriAccordion">
                                        <div class="card-body">
                                            @if($kategori->deskripsi)
                                                <p class="text-muted mb-3">{{ $kategori->deskripsi }}</p>
                                            @endif
                                            
                                            @if(count($kategori->allIndikators) > 0)
                                                <div class="table-responsive">
                                                    <table class="table table-striped">
                                                        <thead>
                                                            <tr>
                                                                <th>Urutan</th>
                                                                <th>Judul</th>
                                                                <th>Durasi</th>
                                                                <th>Status</th>
                                                                <th>Aksi</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @foreach($kategori->allIndikators as $indikator)
                                                                <tr>
                                                                    <td>{{ $indikator->urutan }}</td>
                                                                    <td>{{ $indikator->judul }}</td>
                                                                    <td>{{ $indikator->durasi }}</td>
                                                                    <td>
                                                                        <span class="badge badge-{{ $indikator->is_active ? 'success' : 'secondary' }}">
                                                                            {{ $indikator->is_active ? 'Aktif' : 'Nonaktif' }}
                                                                        </span>
                                                                    </td>
                                                                    <td>
                                                                        <div class="btn-group">
                                                                            <a href="{{ route('admin.indikator-kelulusan.edit-indikator', $indikator->id) }}" 
                                                                               class="btn btn-warning btn-sm">
                                                                                <i class="fas fa-edit"></i>
                                                                            </a>
                                                                            <a href="{{ route('admin.indikator-kelulusan.toggle-indikator-status', $indikator->id) }}" 
                                                                               class="btn btn-{{ $indikator->is_active ? 'secondary' : 'success' }} btn-sm">
                                                                                <i class="fas fa-{{ $indikator->is_active ? 'eye-slash' : 'eye' }}"></i>
                                                                            </a>
                                                                            <form action="{{ route('admin.indikator-kelulusan.destroy-indikator', $indikator->id) }}" 
                                                                                  method="POST" class="d-inline" 
                                                                                  onsubmit="return confirm('Yakin ingin menghapus indikator ini?')">
                                                                                @csrf
                                                                                @method('DELETE')
                                                                                <button type="submit" class="btn btn-danger btn-sm">
                                                                                    <i class="fas fa-trash"></i>
                                                                                </button>
                                                                            </form>
                                                                        </div>
                                                                    </td>
                                                                </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            @else
                                                <div class="text-center py-4">
                                                    <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                                    <p class="text-muted">Belum ada indikator dalam kategori ini.</p>
                                                    <a href="{{ route('admin.indikator-kelulusan.create-indikator') }}" class="btn btn-info">
                                                        <i class="fas fa-plus mr-2"></i>
                                                        Tambah Indikator
                                                    </a>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-folder-open fa-4x text-muted mb-4"></i>
                            <h5 class="text-muted">Belum ada kategori indikator kelulusan</h5>
                            <p class="text-muted">Mulai dengan menambahkan kategori terlebih dahulu.</p>
                            <a href="{{ route('admin.indikator-kelulusan.create-kategori') }}" class="btn btn-success">
                                <i class="fas fa-plus mr-2"></i>
                                Tambah Kategori Pertama
                            </a>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
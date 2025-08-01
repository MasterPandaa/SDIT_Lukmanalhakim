@extends('layouts.admin')

@section('title', 'Edit Indikator Kelulusan')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Header -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-edit fa-2x text-warning mr-2"></i>
                    Edit Indikator: {{ $indikator->judul }}
                </h1>
                <a href="{{ route('admin.indikator-kelulusan.index') }}" class="btn btn-secondary shadow-sm">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>

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

            <!-- Form -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-file-edit mr-2"></i>
                        Form Edit Indikator
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.indikator-kelulusan.update-indikator', $indikator->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="kategori_id">Kategori <span class="text-danger">*</span></label>
                            <select class="form-control @error('kategori_id') is-invalid @enderror" 
                                    id="kategori_id" name="kategori_id" required>
                                <option value="">Pilih Kategori</option>
                                @foreach($kategoris as $kategori)
                                    <option value="{{ $kategori->id }}" 
                                            {{ old('kategori_id', $indikator->kategori_id) == $kategori->id ? 'selected' : '' }}>
                                        {{ $kategori->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kategori_id')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="judul">Judul Indikator <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                                   id="judul" name="judul" value="{{ old('judul', $indikator->judul) }}" required>
                            @error('judul')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Contoh: 1.1 Welcome to the course, 1.2 How to set up your workspace, dll.</small>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                      id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $indikator->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Deskripsi detail tentang indikator ini (opsional).</small>
                        </div>

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="durasi">Durasi</label>
                                    <input type="text" class="form-control @error('durasi') is-invalid @enderror" 
                                           id="durasi" name="durasi" value="{{ old('durasi', $indikator->durasi) }}"
                                           placeholder="02:30 minutes">
                                    @error('durasi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Contoh: 02:30 minutes, 5 menit, dll.</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="urutan">Urutan dalam Kategori <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control @error('urutan') is-invalid @enderror" 
                                           id="urutan" name="urutan" value="{{ old('urutan', $indikator->urutan) }}" min="0" required>
                                    @error('urutan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Nomor urutan dalam kategori (0 = paling atas).</small>
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" 
                                       {{ old('is_active', $indikator->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    Aktifkan indikator
                                </label>
                            </div>
                            <small class="form-text text-muted">Indikator yang tidak aktif tidak akan ditampilkan di halaman publik.</small>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-save mr-2"></i>
                                Update Indikator
                            </button>
                            <a href="{{ route('admin.indikator-kelulusan.index') }}" class="btn btn-secondary ml-2">
                                <i class="fas fa-times mr-2"></i>
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Info Kategori -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-info">
                        <i class="fas fa-info-circle mr-2"></i>
                        Informasi Kategori
                    </h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <strong>Kategori:</strong> {{ $indikator->kategori->nama }}<br>
                            <strong>Status Kategori:</strong> 
                            <span class="badge badge-{{ $indikator->kategori->is_active ? 'success' : 'secondary' }}">
                                {{ $indikator->kategori->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </div>
                        <div class="col-md-6">
                            <strong>Urutan Kategori:</strong> {{ $indikator->kategori->urutan }}<br>
                            <strong>Total Indikator dalam Kategori:</strong> {{ $indikator->kategori->allIndikators->count() }} item
                        </div>
                    </div>
                    @if($indikator->kategori->deskripsi)
                        <hr>
                        <strong>Deskripsi Kategori:</strong><br>
                        <p class="text-muted mb-0">{{ $indikator->kategori->deskripsi }}</p>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
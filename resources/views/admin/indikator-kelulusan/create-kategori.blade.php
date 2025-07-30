@extends('layouts.admin')

@section('title', 'Tambah Kategori Indikator Kelulusan')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <!-- Header -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-plus fa-2x text-success mr-2"></i>
                    Tambah Kategori Indikator Kelulusan
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
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-folder-plus mr-2"></i>
                        Form Tambah Kategori
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.indikator-kelulusan.store-kategori') }}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label for="nama">Nama Kategori <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                                   id="nama" name="nama" value="{{ old('nama') }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Contoh: AKIDAH LURUS, IBADAH YANG BENAR, dll.</small>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                      id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Deskripsi singkat tentang kategori ini (opsional).</small>
                        </div>

                        <div class="form-group">
                            <label for="urutan">Urutan Tampil <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('urutan') is-invalid @enderror" 
                                   id="urutan" name="urutan" value="{{ old('urutan', 0) }}" min="0" required>
                            @error('urutan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Nomor urutan untuk mengurutkan kategori (0 = paling atas).</small>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" 
                                       {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    Aktifkan kategori
                                </label>
                            </div>
                            <small class="form-text text-muted">Kategori yang tidak aktif tidak akan ditampilkan di halaman publik.</small>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save mr-2"></i>
                                Simpan Kategori
                            </button>
                            <a href="{{ route('admin.indikator-kelulusan.index') }}" class="btn btn-secondary ml-2">
                                <i class="fas fa-times mr-2"></i>
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
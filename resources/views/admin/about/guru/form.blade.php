@extends('layouts.admin')

@section('title', $title ?? 'Form Guru')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Header -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-chalkboard-teacher fa-lg text-success me-2"></i>
                    {{ $title ?? 'Form Guru' }}
                </h1>
                <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary shadow-sm">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
            </div>

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mb-4" role="alert">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-circle fa-lg me-3"></i>
                        <div>
                            <strong>Error!</strong> Terdapat kesalahan pada form.
                            <ul class="mb-0 mt-1">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif

            <!-- Form Guru -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 fw-bold text-success">
                        <i class="fas fa-edit me-2"></i>
                        {{ isset($guru) ? 'Edit Data Guru' : 'Tambah Guru Baru' }}
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($method == 'PUT')
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="nama" class="fw-bold">Nama Guru <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $guru->nama ?? '') }}" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="jabatan" class="fw-bold">Jabatan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="jabatan" name="jabatan" value="{{ old('jabatan', $guru->jabatan ?? '') }}" required>
                                    <small class="form-text text-muted">Contoh: Kepala Sekolah, Guru Kelas 1, Guru Tahfidz</small>
                                </div>
                                
                                <div class="form-group">
                                    <label for="pengalaman_mengajar" class="fw-bold">Pengalaman Mengajar (Tahun) <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="pengalaman_mengajar" name="pengalaman_mengajar" value="{{ old('pengalaman_mengajar', $guru->pengalaman_mengajar ?? 0) }}" min="0" required>
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="foto" class="fw-bold">Foto Guru</label>
                                    <input type="file" class="form-control" id="foto" name="foto" accept="image/*">
                                    <small class="form-text text-muted">Format: JPG, JPEG, PNG. Maks: 2MB</small>
                                </div>
                                
                                @if(isset($guru) && $guru->foto)
                                    <div class="form-group">
                                        <label class="fw-bold">Foto Saat Ini</label>
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $guru->foto) }}" alt="{{ $guru->nama }}" class="img-thumbnail" style="max-height: 150px;">
                                        </div>
                                    </div>
                                @endif
                                
                                <div class="form-group">
                                    <label for="email" class="fw-bold">Email</label>
                                    <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $guru->email ?? '') }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="telepon" class="fw-bold">Telepon</label>
                                    <input type="text" class="form-control" id="telepon" name="telepon" value="{{ old('telepon', $guru->telepon ?? '') }}">
                                </div>
                                
                                <div class="form-group">
                                    <label for="website" class="fw-bold">Website</label>
                                    <input type="url" class="form-control" id="website" name="website" value="{{ old('website', $guru->website ?? '') }}">
                                </div>
                                
                                <!-- Aktif secara default, tanpa checkbox UI -->
                                <input type="hidden" name="is_active" value="1">
                            </div>
                        </div>
                        
                        <!-- Social Media Section -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <h5 class="fw-bold text-success mb-3">
                                    <i class="fas fa-share-alt me-2"></i>
                                    Social Media
                                </h5>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="whatsapp" class="fw-bold">WhatsApp</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-success text-white"><i class="fab fa-whatsapp"></i></span>
                                        <input type="text" class="form-control" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $guru->whatsapp ?? '') }}" placeholder="6281234567890">
                                    </div>
                                    <small class="form-text text-muted">Masukkan nomor tanpa tanda + atau 0 di depan</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="instagram" class="fw-bold">Instagram</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-danger text-white"><i class="fab fa-instagram"></i></span>
                                        <input type="text" class="form-control" id="instagram" name="instagram" value="{{ old('instagram', $guru->instagram ?? '') }}" placeholder="username">
                                    </div>
                                    <small class="form-text text-muted">Masukkan username Instagram tanpa @</small>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="facebook" class="fw-bold">Facebook</label>
                                    <div class="input-group">
                                        <span class="input-group-text bg-primary text-white"><i class="fab fa-facebook"></i></span>
                                        <input type="text" class="form-control" id="facebook" name="facebook" value="{{ old('facebook', $guru->facebook ?? '') }}" placeholder="username">
                                    </div>
                                    <small class="form-text text-muted">Masukkan username Facebook</small>
                                </div>
                            </div>
                        </div>
                        
                        <!-- Additional Information -->
                        <div class="row mt-4">
                            <div class="col-12">
                                <h5 class="fw-bold text-success mb-3">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Informasi Tambahan
                                </h5>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="alamat" class="fw-bold">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3">{{ old('alamat', $guru->alamat ?? '') }}</textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="deskripsi" class="fw-bold">Deskripsi</label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $guru->deskripsi ?? '') }}</textarea>
                                    <small class="form-text text-muted">Deskripsi singkat tentang guru</small>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="pernyataan_pribadi" class="fw-bold">Pernyataan Pribadi</label>
                                    <textarea class="form-control" id="pernyataan_pribadi" name="pernyataan_pribadi" rows="4">{{ old('pernyataan_pribadi', $guru->pernyataan_pribadi ?? '') }}</textarea>
                                    <small class="form-text text-muted">Pernyataan atau moto pribadi guru</small>
                                </div>
                            </div>
                        </div>
                        
                        <div class="border-top pt-3 mt-3">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.guru.index') }}" class="btn btn-secondary me-2">
                                    <i class="fas fa-times me-1"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-1"></i> Simpan
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
/* Extra small adjustments for better responsiveness */
.input-group .input-group-text { min-width: 42px; justify-content: center; }
</style>
@endpush

@push('scripts')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
// Initialize CKEditor for text areas
CKEDITOR.replace('deskripsi', {
    height: 150,
    toolbar: [
        ['Bold', 'Italic', 'Underline'],
        ['NumberedList', 'BulletedList'],
        ['Link', 'Unlink'],
        ['Maximize']
    ]
});

CKEDITOR.replace('pernyataan_pribadi', {
    height: 150,
    toolbar: [
        ['Bold', 'Italic', 'Underline'],
        ['NumberedList', 'BulletedList'],
        ['Link', 'Unlink'],
        ['Maximize']
    ]
});

// No jQuery custom-file needed on Bootstrap 5
</script>
@endpush 

@extends('layouts.admin')

@section('title', 'Kelola Sambutan Kepala Sekolah')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <!-- Header Card -->
            <div class="card border-0 shadow-lg rounded-lg mb-4">
                <div class="card-header bg-gradient-primary text-white py-3 d-flex align-items-center">
                    <i class="fas fa-user-tie fa-2x mr-3"></i>
                    <h5 class="card-title m-0 font-weight-bold">Kelola Sambutan Kepala Sekolah</h5>
                </div>
                
                <div class="card-body p-4">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show mb-4 border-left-success shadow-sm">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-check-circle fa-2x mr-3"></i>
                                <div>
                                    <strong>Berhasil!</strong> {{ session('success') }}
                                </div>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <form action="{{ route('admin.sambutan-kepsek.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <!-- Informasi Utama -->
                        <div class="card shadow-sm mb-4 border-left-primary">
                            <div class="card-header bg-light py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    <i class="fas fa-info-circle mr-2"></i> Informasi Utama
                                </h6>
                            </div>
                            <div class="card-body p-4">
                                <div class="form-group mb-4">
                                    <label for="judul" class="font-weight-bold text-dark">
                                        <i class="fas fa-heading mr-1"></i> Judul
                                    </label>
                                    <input type="text" class="form-control form-control-lg @error('judul') is-invalid @enderror" 
                                        id="judul" name="judul" value="{{ old('judul', $sambutan->judul ?? '') }}"
                                        placeholder="Masukkan judul sambutan">
                                    @error('judul')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="subtitle" class="font-weight-bold text-dark">
                                        <i class="fas fa-font mr-1"></i> Subtitle
                                    </label>
                                    <input type="text" class="form-control @error('subtitle') is-invalid @enderror" 
                                        id="subtitle" name="subtitle" value="{{ old('subtitle', $sambutan->subtitle ?? '') }}"
                                        placeholder="Masukkan subtitle sambutan">
                                    @error('subtitle')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="sambutan" class="font-weight-bold text-dark">
                                        <i class="fas fa-quote-left mr-1"></i> Sambutan
                                    </label>
                                    <textarea class="form-control @error('sambutan') is-invalid @enderror" 
                                        id="sambutan" name="sambutan" rows="6">{{ old('sambutan', $sambutan->sambutan ?? '') }}</textarea>
                                    @error('sambutan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">
                                        <i class="fas fa-info-circle mr-1"></i> Gunakan editor untuk memformat teks sambutan
                                    </small>
                                </div>

                                <div class="form-group mb-4">
                                    <label for="video_url" class="font-weight-bold text-dark">
                                        <i class="fas fa-video mr-1"></i> URL Video
                                    </label>
                                    <div class="input-group">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary text-white">
                                                <i class="fab fa-youtube"></i>
                                            </span>
                                        </div>
                                        <input type="url" class="form-control @error('video_url') is-invalid @enderror" 
                                            id="video_url" name="video_url" value="{{ old('video_url', $sambutan->video_url ?? '') }}"
                                            placeholder="Masukkan URL video YouTube">
                                    </div>
                                    @error('video_url')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">
                                        <i class="fas fa-info-circle mr-1"></i> Contoh: https://www.youtube-nocookie.com/embed/jP649ZHA8Tg
                                    </small>
                                </div>

                                <div class="form-group">
                                    <label for="tahun_berdiri" class="font-weight-bold text-dark">
                                        <i class="fas fa-calendar-alt mr-1"></i> Tahun Berdiri
                                    </label>
                                    <div class="input-group" style="max-width: 200px;">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text bg-primary text-white">
                                                <i class="fas fa-calendar"></i>
                                            </span>
                                        </div>
                                        <input type="number" class="form-control @error('tahun_berdiri') is-invalid @enderror" 
                                            id="tahun_berdiri" name="tahun_berdiri" value="{{ old('tahun_berdiri', $sambutan->tahun_berdiri ?? '') }}"
                                            placeholder="Tahun">
                                    </div>
                                    @error('tahun_berdiri')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                        </div>

                        <!-- Foto Kepala Sekolah -->
                        <div class="card shadow-sm mb-4 border-left-info">
                            <div class="card-header bg-light py-3">
                                <h6 class="m-0 font-weight-bold text-info">
                                    <i class="fas fa-image mr-2"></i> Foto Kepala Sekolah
                                </h6>
                            </div>
                            <div class="card-body p-4">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="foto_kepsek" class="font-weight-bold text-dark">
                                                <i class="fas fa-user-tie mr-1"></i> Foto Kepala Sekolah 1
                                            </label>
                                            
                                            <div class="custom-file mb-2">
                                                <input type="file" class="custom-file-input @error('foto_kepsek') is-invalid @enderror" 
                                                    id="foto_kepsek" name="foto_kepsek">
                                                <label class="custom-file-label" for="foto_kepsek">Pilih file...</label>
                                            </div>
                                            
                                            @error('foto_kepsek')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                            
                                            <small class="text-muted d-block mb-3">
                                                <i class="fas fa-info-circle mr-1"></i> Format: JPG, JPEG, PNG. Maksimal 2MB
                                            </small>
                                            
                                            @if($sambutan && $sambutan->foto_kepsek)
                                                <div class="card shadow-sm">
                                                    <div class="card-body p-2 text-center bg-light">
                                                        <img src="{{ $sambutan->foto_kepsek_url }}" 
                                                            alt="Foto Kepala Sekolah" 
                                                            class="img-fluid rounded" 
                                                            style="max-height: 200px">
                                                    </div>
                                                    <div class="card-footer p-2 text-center bg-light">
                                                        <small class="text-muted">Foto saat ini</small>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                    
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="foto_kepsek2" class="font-weight-bold text-dark">
                                                <i class="fas fa-user-tie mr-1"></i> Foto Kepala Sekolah 2
                                            </label>
                                            
                                            <div class="custom-file mb-2">
                                                <input type="file" class="custom-file-input @error('foto_kepsek2') is-invalid @enderror" 
                                                    id="foto_kepsek2" name="foto_kepsek2">
                                                <label class="custom-file-label" for="foto_kepsek2">Pilih file...</label>
                                            </div>
                                            
                                            @error('foto_kepsek2')
                                                <div class="invalid-feedback d-block">{{ $message }}</div>
                                            @enderror
                                            
                                            <small class="text-muted d-block mb-3">
                                                <i class="fas fa-info-circle mr-1"></i> Format: JPG, JPEG, PNG. Maksimal 2MB
                                            </small>
                                            
                                            @if($sambutan && $sambutan->foto_kepsek2)
                                                <div class="card shadow-sm">
                                                    <div class="card-body p-2 text-center bg-light">
                                                        <img src="{{ $sambutan->foto_kepsek2_url }}" 
                                                            alt="Foto Kepala Sekolah 2" 
                                                            class="img-fluid rounded" 
                                                            style="max-height: 200px">
                                                    </div>
                                                    <div class="card-footer p-2 text-center bg-light">
                                                        <small class="text-muted">Foto saat ini</small>
                                                    </div>
                                                </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tombol Aksi -->
                        <div class="card shadow-sm border-left-success">
                            <div class="card-body p-4">
                                <div class="d-flex justify-content-between">
                                    <button type="submit" class="btn btn-primary btn-lg px-5 shadow-sm">
                                        <i class="fas fa-save mr-2"></i> Simpan Perubahan
                                    </button>
                                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-lg px-5 shadow-sm">
                                        <i class="fas fa-arrow-left mr-2"></i> Kembali
                                    </a>
                                </div>
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
    .border-left-primary {
        border-left: 4px solid #4e73df !important;
    }
    
    .border-left-success {
        border-left: 4px solid #1cc88a !important;
    }
    
    .border-left-info {
        border-left: 4px solid #36b9cc !important;
    }
    
    .bg-gradient-primary {
        background-color: #4e73df;
        background-image: linear-gradient(180deg, #4e73df 10%, #224abe 100%);
        background-size: cover;
    }
    
    .form-control {
        border-radius: 0.35rem;
        padding: 0.75rem 1rem;
        font-size: 0.9rem;
        border: 1px solid #d1d3e2;
        transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
    }
    
    .form-control:focus {
        border-color: #bac8f3;
        box-shadow: 0 0 0 0.2rem rgba(78, 115, 223, 0.25);
    }
    
    .btn {
        border-radius: 0.35rem;
        padding: 0.75rem 1rem;
        font-weight: bold;
        transition: all 0.2s;
    }
    
    .btn-primary {
        background-color: #4e73df;
        border-color: #4e73df;
    }
    
    .btn-primary:hover {
        background-color: #2e59d9;
        border-color: #2653d4;
        transform: translateY(-2px);
    }
    
    .btn-secondary:hover {
        transform: translateY(-2px);
    }
    
    .custom-file-label {
        padding: 0.75rem 1rem;
        height: calc(1.5em + 1.5rem + 2px);
        line-height: 1.5;
    }
    
    .custom-file-label::after {
        height: calc(1.5em + 1.5rem);
        padding: 0.75rem 1rem;
        line-height: 1.5;
    }
    
    .card {
        transition: all 0.3s ease;
    }
    
    .card:hover {
        transform: translateY(-5px);
    }
</style>
@endpush

@push('scripts')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    CKEDITOR.replace('sambutan', {
        height: 300,
        toolbar: [
            { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat' ] },
            { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight' ] },
            { name: 'links', items: [ 'Link', 'Unlink' ] },
            { name: 'insert', items: [ 'Image', 'Table' ] },
            { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
            { name: 'colors', items: [ 'TextColor' ] },
            { name: 'tools', items: [ 'Maximize' ] }
        ]
    });
    
    // Menampilkan nama file yang dipilih pada input file
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
</script>
@endpush
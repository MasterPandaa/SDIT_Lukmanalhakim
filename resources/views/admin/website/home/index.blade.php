@extends('layouts.admin')

@section('title', 'Pengaturan Halaman Utama')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <!-- Header -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-home fa-2x text-success mr-2"></i>
                    Pengaturan Halaman Utama
                </h1>
                <a href="{{ url('/') }}" target="_blank" class="btn btn-primary shadow-sm">
                    <i class="fas fa-eye mr-2"></i>
                    Lihat Website
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

            <!-- Form Pengaturan Halaman Utama -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Halaman Utama
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.website.home.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="judul_hero" class="font-weight-bold">Judul Hero <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('judul_hero') is-invalid @enderror" 
                                           id="judul_hero" name="judul_hero" value="{{ old('judul_hero', $home->judul_hero ?? '') }}" required>
                                    @error('judul_hero')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="subtitle_hero" class="font-weight-bold">Subtitle Hero</label>
                                    <input type="text" class="form-control @error('subtitle_hero') is-invalid @enderror" 
                                           id="subtitle_hero" name="subtitle_hero" value="{{ old('subtitle_hero', $home->subtitle_hero ?? '') }}">
                                    @error('subtitle_hero')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="deskripsi_hero" class="font-weight-bold">Deskripsi Hero</label>
                                    <textarea class="form-control @error('deskripsi_hero') is-invalid @enderror" 
                                              id="deskripsi_hero" name="deskripsi_hero" rows="3">{{ old('deskripsi_hero', $home->deskripsi_hero ?? '') }}</textarea>
                                    @error('deskripsi_hero')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="teks_tombol" class="font-weight-bold">Teks Tombol CTA</label>
                                    <input type="text" class="form-control @error('teks_tombol') is-invalid @enderror" 
                                           id="teks_tombol" name="teks_tombol" value="{{ old('teks_tombol', $home->teks_tombol ?? '') }}">
                                    @error('teks_tombol')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="link_tombol" class="font-weight-bold">Link Tombol CTA</label>
                                    <input type="url" class="form-control @error('link_tombol') is-invalid @enderror" 
                                           id="link_tombol" name="link_tombol" value="{{ old('link_tombol', $home->link_tombol ?? '') }}">
                                    @error('link_tombol')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="gambar_hero" class="font-weight-bold">Gambar Hero</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('gambar_hero') is-invalid @enderror" 
                                               id="gambar_hero" name="gambar_hero" accept="image/*">
                                        <label class="custom-file-label" for="gambar_hero">Pilih file gambar</label>
                                    </div>
                                    @error('gambar_hero')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Format: JPG, JPEG, PNG. Maks: 2MB</small>
                                </div>
                                
                                @if(isset($home) && $home->gambar_hero)
                                    <div class="form-group">
                                        <label class="font-weight-bold">Gambar Saat Ini</label>
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $home->gambar_hero) }}" alt="Gambar Hero" class="img-thumbnail" style="max-height: 200px;">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-success">
                                <i class="fas fa-save mr-2"></i>
                                Simpan Perubahan
                            </button>
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
.custom-file-label::after {
    content: "Browse";
}
</style>
@endpush

@push('scripts')
<script>
// Custom file input
$('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
});
</script>
@endpush 
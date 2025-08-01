@extends('layouts.admin')

@section('title', 'Kelola Sambutan Kepala Sekolah')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <!-- Header -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-user-tie fa-2x text-success mr-2"></i>
                    Kelola Sambutan Kepala Sekolah
                </h1>
                <a href="{{ route('sambutan-kepsek') }}" target="_blank" class="btn btn-primary shadow-sm">
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

            <!-- Form Sambutan Kepala Sekolah -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-edit mr-2"></i>
                        Edit Sambutan Kepala Sekolah
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.sambutan-kepsek.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="nama" class="font-weight-bold">Nama Kepala Sekolah <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                                           id="nama" name="nama" value="{{ old('nama', $sambutan->nama ?? '') }}" required>
                                    @error('nama')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="jabatan" class="font-weight-bold">Jabatan <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('jabatan') is-invalid @enderror" 
                                           id="jabatan" name="jabatan" value="{{ old('jabatan', $sambutan->jabatan ?? '') }}" required>
                                    @error('jabatan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="sambutan" class="font-weight-bold">Sambutan <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('sambutan') is-invalid @enderror" 
                                              id="sambutan" name="sambutan" rows="8" required>{{ old('sambutan', $sambutan->sambutan ?? '') }}</textarea>
                                    @error('sambutan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="foto" class="font-weight-bold">Foto Kepala Sekolah</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('foto') is-invalid @enderror" 
                                               id="foto" name="foto" accept="image/*">
                                        <label class="custom-file-label" for="foto">Pilih file foto</label>
                                    </div>
                                    @error('foto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Format: JPG, JPEG, PNG. Maks: 2MB</small>
                                </div>
                                
                                @if(isset($sambutan) && $sambutan->foto)
                                    <div class="form-group">
                                        <label class="font-weight-bold">Foto Saat Ini</label>
                                        <div class="mb-2">
                                            <img src="{{ asset('storage/' . $sambutan->foto) }}" alt="{{ $sambutan->nama }}" class="img-thumbnail" style="max-height: 200px;">
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
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
// Initialize CKEditor for sambutan
CKEDITOR.replace('sambutan', {
    height: 300,
    toolbar: [
        ['Bold', 'Italic', 'Underline'],
        ['NumberedList', 'BulletedList'],
        ['Link', 'Unlink'],
        ['Format'],
        ['Maximize']
    ]
});

// Custom file input
$('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
});
</script>
@endpush
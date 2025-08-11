@extends('layouts.admin')

@section('title', $title ?? 'Form Alumni')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-lg-10">
            <!-- Header -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-user-graduate fa-lg text-success mr-2"></i>
                    {{ $title ?? 'Form Alumni' }}
                </h1>
                <a href="{{ route('admin.alumni.index') }}" class="btn btn-secondary shadow-sm">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>

            {{-- Validation errors handled globally via SweetAlert2 --}}

            <!-- Form Alumni -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-edit mr-2"></i>
                        {{ isset($alumni) ? 'Edit Data Alumni' : 'Tambah Alumni Baru' }}
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
                                    <label for="nama" class="font-weight-bold">Nama Alumni <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="{{ old('nama', $alumni->nama ?? '') }}" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="tahun_lulus" class="font-weight-bold">Tahun Lulus <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="tahun_lulus" name="tahun_lulus" value="{{ old('tahun_lulus', $alumni->tahun_lulus ?? '') }}" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="pendidikan_lanjutan" class="font-weight-bold">Pendidikan Lanjutan</label>
                                    <input type="text" class="form-control" id="pendidikan_lanjutan" name="pendidikan_lanjutan" value="{{ old('pendidikan_lanjutan', $alumni->pendidikan_lanjutan ?? '') }}">
                                    <small class="form-text text-muted">Contoh: Universitas Indonesia, Jurusan Teknik Informatika</small>
                                </div>
                                
                                <div class="form-group">
                                    <label for="pekerjaan" class="font-weight-bold">Pekerjaan</label>
                                    <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="{{ old('pekerjaan', $alumni->pekerjaan ?? '') }}">
                                </div>
                            </div>
                            
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="foto" class="font-weight-bold">Foto Alumni</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="foto" name="foto" accept="image/*">
                                        <label class="custom-file-label" for="foto">Pilih file foto</label>
                                    </div>
                                    <small class="form-text text-muted">Format: JPG, JPEG, PNG. Maks: 2MB</small>
                                </div>
                                
                                @if(isset($alumni) && $alumni->foto)
                                    <div class="form-group">
                                        <label class="font-weight-bold">Foto Saat Ini</label>
                                        <div class="mb-2">
                                            <img src="{{ $alumni->foto_url }}" alt="{{ $alumni->nama }}" class="img-thumbnail" style="max-height: 150px;">
                                        </div>
                                    </div>
                                @endif
                                
                                <div class="form-group">
                                    <label for="prestasi" class="font-weight-bold">Prestasi</label>
                                    <textarea class="form-control" id="prestasi" name="prestasi" rows="3">{{ old('prestasi', $alumni->prestasi ?? '') }}</textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="testimoni" class="font-weight-bold">Testimoni</label>
                                    <textarea class="form-control" id="testimoni" name="testimoni" rows="4">{{ old('testimoni', $alumni->testimoni ?? '') }}</textarea>
                                </div>
                                
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" {{ (old('is_active', $alumni->is_active ?? true) ? 'checked' : '') }}>
                                        <label class="custom-control-label font-weight-bold" for="is_active">Aktif</label>
                                        <small class="form-text text-muted">Alumni yang aktif akan ditampilkan di halaman publik</small>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="border-top pt-3 mt-3">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.alumni.index') }}" class="btn btn-secondary mr-2">
                                    <i class="fas fa-times mr-1"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save mr-1"></i> Simpan
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
.custom-file-label::after {
    content: "Browse";
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
// Initialize CKEditor for testimoni
CKEDITOR.replace('testimoni', {
    height: 150,
    toolbar: [
        ['Bold', 'Italic', 'Underline'],
        ['NumberedList', 'BulletedList'],
        ['Link', 'Unlink'],
        ['Maximize']
    ]
});

// Initialize CKEditor for prestasi
CKEDITOR.replace('prestasi', {
    height: 150,
    toolbar: [
        ['Bold', 'Italic', 'Underline'],
        ['NumberedList', 'BulletedList'],
        ['Link', 'Unlink'],
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

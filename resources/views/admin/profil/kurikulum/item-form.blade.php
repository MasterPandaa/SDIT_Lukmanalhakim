@extends('layouts.admin')

@section('title', $title ?? 'Form Item Kurikulum')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12 col-lg-10">
            <!-- Header -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-book fa-lg text-success mr-2"></i>
                    {{ $title ?? 'Form Item Kurikulum' }}
                </h1>
                <a href="{{ route('admin.kurikulum.index') }}" class="btn btn-secondary shadow-sm">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>

            @if($errors->any())
                <div class="alert alert-danger alert-dismissible fade show mb-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-circle fa-lg mr-3"></i>
                        <div>
                            <strong>Error!</strong> Terdapat kesalahan pada form.
                            <ul class="mb-0 mt-1">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            <!-- Form Item Kurikulum -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-edit mr-2"></i>
                        {{ isset($item) ? 'Edit Item Kurikulum' : 'Tambah Item Kurikulum Baru' }}
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($method == 'PUT')
                            @method('PUT')
                        @endif

                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="judul" class="font-weight-bold">Judul Item <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control" id="judul" name="judul" value="{{ old('judul', $item->judul ?? '') }}" required>
                                </div>
                                
                                <div class="form-group">
                                    <label for="deskripsi" class="font-weight-bold">Deskripsi <span class="text-danger">*</span></label>
                                    <textarea class="form-control" id="deskripsi" name="deskripsi" rows="6" required>{{ old('deskripsi', $item->deskripsi ?? '') }}</textarea>
                                </div>
                                
                                <div class="form-group">
                                    <label for="urutan" class="font-weight-bold">Urutan <span class="text-danger">*</span></label>
                                    <input type="number" class="form-control" id="urutan" name="urutan" value="{{ old('urutan', $item->urutan ?? 0) }}" min="0" required>
                                    <small class="form-text text-muted">Nomor urutan untuk mengurutkan item (0 = paling atas)</small>
                                </div>
                                
                                <div class="form-group">
                                    <div class="custom-control custom-switch">
                                        <input type="checkbox" class="custom-control-input" id="is_active" name="is_active" {{ (old('is_active', $item->is_active ?? true) ? 'checked' : '') }}>
                                        <label class="custom-control-label font-weight-bold" for="is_active">Aktif</label>
                                        <small class="form-text text-muted">Item yang aktif akan ditampilkan di halaman publik</small>
                                    </div>
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="gambar" class="font-weight-bold">Gambar Item</label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input" id="gambar" name="gambar" accept="image/*">
                                        <label class="custom-file-label" for="gambar">Pilih file gambar</label>
                                    </div>
                                    <small class="form-text text-muted">Format: JPG, JPEG, PNG. Maks: 2MB</small>
                                </div>
                                
                                @if(isset($item) && $item->gambar)
                                    <div class="form-group">
                                        <label class="font-weight-bold">Gambar Saat Ini</label>
                                        <div class="mb-2">
                                            <img src="{{ $item->gambar_url }}" alt="{{ $item->judul }}" class="img-thumbnail" style="max-height: 150px;">
                                        </div>
                                    </div>
                                @endif
                            </div>
                        </div>
                        
                        <div class="border-top pt-3 mt-3">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.kurikulum.index') }}" class="btn btn-secondary mr-2">
                                    <i class="fas fa-times mr-1"></i> Batal
                                </a>
                                <button type="submit" class="btn btn-success">
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
// Initialize CKEditor for deskripsi
CKEDITOR.replace('deskripsi', {
    height: 200,
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

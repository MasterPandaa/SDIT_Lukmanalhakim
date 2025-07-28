@extends('layouts.admin')

@section('title', 'Kelola Kurikulum')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <!-- Header -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-graduation-cap fa-2x text-primary mr-2"></i>
                    Kelola Kurikulum
                </h1>
                <a href="{{ route('kurikulum') }}" target="_blank" class="btn btn-primary shadow-sm">
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

            <!-- Form Informasi Utama Kurikulum -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-info-circle mr-2"></i>
                        Informasi Utama Kurikulum
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.kurikulum.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group">
                                    <label for="judul" class="font-weight-bold">
                                        <i class="fas fa-heading mr-1"></i> Judul <span class="text-danger">*</span>
                                    </label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                                        id="judul" name="judul" value="{{ old('judul', $kurikulum->judul ?? 'Kurikulum') }}" required>
                                    @error('judul')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="subtitle" class="font-weight-bold">
                                        <i class="fas fa-font mr-1"></i> Subtitle
                                    </label>
                                    <input type="text" class="form-control @error('subtitle') is-invalid @enderror" 
                                        id="subtitle" name="subtitle" value="{{ old('subtitle', $kurikulum->subtitle ?? '') }}">
                                    @error('subtitle')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <label for="deskripsi" class="font-weight-bold">
                                        <i class="fas fa-align-left mr-1"></i> Deskripsi
                                    </label>
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                        id="deskripsi" name="deskripsi" rows="6">{{ old('deskripsi', $kurikulum->deskripsi ?? '') }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            
                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="gambar_header" class="font-weight-bold">
                                        <i class="fas fa-image mr-1"></i> Gambar Header
                                    </label>
                                    <div class="custom-file">
                                        <input type="file" class="custom-file-input @error('gambar_header') is-invalid @enderror" 
                                            id="gambar_header" name="gambar_header" accept="image/*">
                                        <label class="custom-file-label" for="gambar_header">Pilih gambar...</label>
                                    </div>
                                    @error('gambar_header')
                                        <div class="invalid-feedback d-block">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">Format: JPG, PNG, GIF. Max: 2MB</small>
                                </div>

                                @if(isset($kurikulum) && $kurikulum->gambar_header)
                                    <div class="mt-2">
                                        <label class="font-weight-bold">Gambar Saat Ini:</label>
                                        <div class="card">
                                            <img src="{{ $kurikulum->gambar_header_url }}" class="card-img-top" alt="Header" style="height: 150px; object-fit: cover;">
                                        </div>
                                    </div>
                                @endif

                                <div class="form-check mt-3">
                                    <input class="form-check-input" type="checkbox" name="is_active" id="is_active" 
                                        {{ old('is_active', $kurikulum->is_active ?? true) ? 'checked' : '' }}>
                                    <label class="form-check-label font-weight-bold" for="is_active">
                                        <i class="fas fa-toggle-on mr-1"></i> Aktif
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex justify-content-end">
                            <button type="submit" class="btn btn-primary">
                                <i class="fas fa-save mr-2"></i> Simpan Informasi Utama
                            </button>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Daftar Item Kurikulum -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-list mr-2"></i>
                        Daftar Item Kurikulum
                    </h6>
                    <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#addItemModal">
                        <i class="fas fa-plus mr-1"></i> Tambah Item Baru
                    </button>
                </div>
                <div class="card-body">
                    @if(isset($kurikulum) && $kurikulum->allItems->count() > 0)
                        <div class="row">
                            @foreach($kurikulum->allItems as $item)
                                <div class="col-lg-6 mb-3">
                                    <div class="card {{ $item->is_active ? 'border-left-primary' : 'border-left-secondary' }}">
                                        <div class="card-body">
                                            <div class="d-flex align-items-center justify-content-between mb-2">
                                                <div class="d-flex align-items-center">
                                                    @if($item->gambar)
                                                        <img src="{{ $item->gambar_url }}" class="rounded mr-3" style="width: 50px; height: 50px; object-fit: cover;">
                                                    @else
                                                        <div class="bg-primary rounded d-flex align-items-center justify-content-center mr-3" style="width: 50px; height: 50px; background-color: {{ $item->color }} !important;">
                                                            <i class="{{ $item->icon }} fa-lg text-white"></i>
                                                        </div>
                                                    @endif
                                                    <div>
                                                        <h6 class="m-0 font-weight-bold">{{ $item->judul }}</h6>
                                                        <small class="text-muted">Urutan: {{ $item->urutan }}</small>
                                                    </div>
                                                </div>
                                                <div class="dropdown no-arrow">
                                                    <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                                                        <i class="fas fa-ellipsis-v fa-sm fa-fw text-gray-400"></i>
                                                    </a>
                                                    <div class="dropdown-menu dropdown-menu-right shadow animated--fade-in">
                                                        <button class="dropdown-item edit-item-btn" 
                                                            data-toggle="modal" 
                                                            data-target="#editItemModal"
                                                            data-id="{{ $item->id }}"
                                                            data-judul="{{ $item->judul }}"
                                                            data-deskripsi="{{ $item->deskripsi }}"
                                                            data-urutan="{{ $item->urutan }}"
                                                            data-icon_class="{{ $item->icon_class }}"
                                                            data-color="{{ $item->color }}"
                                                            data-gambar="{{ $item->gambar }}"
                                                            data-is_active="{{ $item->is_active }}">
                                                            <i class="fas fa-edit fa-sm fa-fw mr-2 text-gray-400"></i>
                                                            Edit
                                                        </button>
                                                        <a class="dropdown-item" href="{{ route('admin.kurikulum.toggle-item', $item->id) }}">
                                                            <i class="fas fa-toggle-{{ $item->is_active ? 'off' : 'on' }} fa-sm fa-fw mr-2 text-gray-400"></i>
                                                            {{ $item->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                                        </a>
                                                        <div class="dropdown-divider"></div>
                                                        <button class="dropdown-item text-danger delete-item-btn"
                                                            data-toggle="modal"
                                                            data-target="#deleteItemModal"
                                                            data-action="{{ route('admin.kurikulum.destroy-item', $item->id) }}"
                                                            data-title="{{ $item->judul }}">
                                                            <i class="fas fa-trash fa-sm fa-fw mr-2 text-gray-400"></i>
                                                            Hapus
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                            <p class="mb-2 text-gray-700">{{ Str::limit(strip_tags($item->deskripsi), 100) }}</p>
                                            <div class="d-flex align-items-center justify-content-between">
                                                <span class="badge badge-{{ $item->is_active ? 'success' : 'secondary' }}">
                                                    {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                                                </span>
                                                <small class="text-muted">
                                                    <i class="fas fa-palette mr-1"></i>
                                                    <span class="badge" style="background-color: {{ $item->color }}; color: white;">{{ $item->color }}</span>
                                                </small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-inbox fa-3x text-gray-300 mb-3"></i>
                            <h5 class="text-gray-500">Belum ada item kurikulum</h5>
                            <p class="text-gray-400">Klik tombol "Tambah Item Baru" untuk menambahkan item pertama.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Item -->
<div class="modal fade" id="addItemModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">
                    <i class="fas fa-plus-circle mr-2"></i> Tambah Item Kurikulum Baru
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.kurikulum.store-item') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="add_judul" class="font-weight-bold">
                                    <i class="fas fa-heading mr-1"></i> Judul <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="add_judul" name="judul" required>
                            </div>

                            <div class="form-group">
                                <label for="add_deskripsi" class="font-weight-bold">
                                    <i class="fas fa-align-left mr-1"></i> Deskripsi <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control" id="add_deskripsi" name="deskripsi" rows="4" required></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="add_icon_class" class="font-weight-bold">
                                            <i class="fas fa-icons mr-1"></i> Icon Class
                                        </label>
                                        <input type="text" class="form-control" id="add_icon_class" name="icon_class" 
                                            placeholder="fas fa-graduation-cap">
                                        <small class="text-muted">Contoh: fas fa-book, fas fa-star</small>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="add_color" class="font-weight-bold">
                                            <i class="fas fa-palette mr-1"></i> Warna
                                        </label>
                                        <input type="color" class="form-control" id="add_color" name="color" value="#4e73df">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="add_gambar" class="font-weight-bold">
                                    <i class="fas fa-image mr-1"></i> Gambar/Icon
                                </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="add_gambar" name="gambar" accept="image/*">
                                    <label class="custom-file-label" for="add_gambar">Pilih gambar...</label>
                                </div>
                                <small class="text-muted">Format: JPG, PNG, GIF. Max: 2MB</small>
                            </div>

                            <div class="form-group">
                                <label for="add_urutan" class="font-weight-bold">
                                    <i class="fas fa-sort-numeric-down mr-1"></i> Urutan <span class="text-danger">*</span>
                                </label>
                                <input type="number" class="form-control" id="add_urutan" name="urutan" 
                                    value="{{ isset($kurikulum) ? $kurikulum->allItems->max('urutan') + 1 : 1 }}" min="1" required>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_active" id="add_is_active" checked>
                                <label class="form-check-label font-weight-bold" for="add_is_active">
                                    <i class="fas fa-toggle-on mr-1"></i> Aktif
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-save mr-1"></i> Simpan Item
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Item -->
<div class="modal fade" id="editItemModal" tabindex="-1" role="dialog">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title">
                    <i class="fas fa-edit mr-2"></i> Edit Item Kurikulum
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal">
                    <span>&times;</span>
                </button>
            </div>
            <form id="editItemForm" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <label for="edit_judul" class="font-weight-bold">
                                    <i class="fas fa-heading mr-1"></i> Judul <span class="text-danger">*</span>
                                </label>
                                <input type="text" class="form-control" id="edit_judul" name="judul" required>
                            </div>

                            <div class="form-group">
                                <label for="edit_deskripsi" class="font-weight-bold">
                                    <i class="fas fa-align-left mr-1"></i> Deskripsi <span class="text-danger">*</span>
                                </label>
                                <textarea class="form-control" id="edit_deskripsi" name="deskripsi" rows="4" required></textarea>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edit_icon_class" class="font-weight-bold">
                                            <i class="fas fa-icons mr-1"></i> Icon Class
                                        </label>
                                        <input type="text" class="form-control" id="edit_icon_class" name="icon_class">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="edit_color" class="font-weight-bold">
                                            <i class="fas fa-palette mr-1"></i> Warna
                                        </label>
                                        <input type="color" class="form-control" id="edit_color" name="color">
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="edit_gambar" class="font-weight-bold">
                                    <i class="fas fa-image mr-1"></i> Gambar/Icon
                                </label>
                                <div class="custom-file">
                                    <input type="file" class="custom-file-input" id="edit_gambar" name="gambar" accept="image/*">
                                    <label class="custom-file-label" for="edit_gambar">Pilih gambar baru...</label>
                                </div>
                                <small class="text-muted">Format: JPG, PNG, GIF. Max: 2MB</small>
                            </div>

                            <div id="current_image_container" class="form-group d-none">
                                <label class="font-weight-bold">Gambar Saat Ini:</label>
                                <div class="card">
                                    <img id="current_image" src="" class="card-img-top" style="height: 100px; object-fit: cover;">
                                </div>
                            </div>

                            <div class="form-group">
                                <label for="edit_urutan" class="font-weight-bold">
                                    <i class="fas fa-sort-numeric-down mr-1"></i> Urutan <span class="text-danger">*</span>
                                </label>
                                <input type="number" class="form-control" id="edit_urutan" name="urutan" min="1" required>
                            </div>

                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="is_active" id="edit_is_active">
                                <label class="form-check-label font-weight-bold" for="edit_is_active">
                                    <i class="fas fa-toggle-on mr-1"></i> Aktif
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-warning">
                        <i class="fas fa-save mr-1"></i> Perbarui Item
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Hapus Item -->
<div class="modal fade" id="deleteItemModal" tabindex="-1" role="dialog">
    <div class="modal-dialog" role="document">
        <form id="deleteItemForm" method="POST">
            @csrf
            @method('DELETE')
            <div class="modal-content">
                <div class="modal-header bg-danger text-white">
                    <h5 class="modal-title">
                        <i class="fas fa-trash mr-2"></i> Konfirmasi Hapus
                    </h5>
                    <button type="button" class="close text-white" data-dismiss="modal">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="text-center">
                        <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
                        <h5>Yakin ingin menghapus item ini?</h5>
                        <p class="mb-3">Item "<span id="delete_item_title"></span>" akan dihapus permanen.</p>
                        <p class="text-muted">Tindakan ini tidak dapat dibatalkan.</p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-danger">
                        <i class="fas fa-trash mr-1"></i> Ya, Hapus
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection

@push('styles')
<style>
.border-left-primary {
    border-left: 4px solid #4e73df !important;
}

.border-left-secondary {
    border-left: 4px solid #858796 !important;
}

.custom-file-label::after {
    content: "Browse";
}

.card:hover {
    transform: translateY(-2px);
    transition: all 0.2s ease-in-out;
}
</style>
@endpush

@push('scripts')
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
// Initialize CKEditor
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

CKEDITOR.replace('add_deskripsi', {
    height: 150,
    toolbar: [['Bold', 'Italic'], ['NumberedList', 'BulletedList'], ['Link']]
});

CKEDITOR.replace('edit_deskripsi', {
    height: 150,
    toolbar: [['Bold', 'Italic'], ['NumberedList', 'BulletedList'], ['Link']]
});

// Custom file input
$('.custom-file-input').on('change', function() {
    let fileName = $(this).val().split('\\').pop();
    $(this).next('.custom-file-label').addClass("selected").html(fileName);
});

// Edit item modal
$(document).on('click', '.edit-item-btn', function() {
    const id = $(this).data('id');
    const judul = $(this).data('judul');
    const deskripsi = $(this).data('deskripsi');
    const urutan = $(this).data('urutan');
    const iconClass = $(this).data('icon_class');
    const color = $(this).data('color');
    const gambar = $(this).data('gambar');
    const isActive = $(this).data('is_active');
    
    const actionUrl = "{{ route('admin.kurikulum.update-item', ['id' => 'ITEM_ID_PLACEHOLDER']) }}".replace('ITEM_ID_PLACEHOLDER', id);
    $('#editItemForm').attr('action', actionUrl);
    $('#edit_judul').val(judul);
    $('#edit_urutan').val(urutan);
    $('#edit_icon_class').val(iconClass);
    $('#edit_color').val(color);
    $('#edit_is_active').prop('checked', isActive);
    
    // Set CKEditor content
    if (CKEDITOR.instances.edit_deskripsi) {
        CKEDITOR.instances.edit_deskripsi.setData(deskripsi);
    }
    
    // Show current image if exists
    if (gambar) {
        $('#current_image_container').removeClass('d-none');
        $('#current_image').attr('src', '{{ asset("storage") }}/' + gambar);
    } else {
        $('#current_image_container').addClass('d-none');
    }
});

// Delete item modal
$(document).on('click', '.delete-item-btn', function() {
    const actionUrl = $(this).data('action');
    const title = $(this).data('title');
    $('#deleteItemForm').attr('action', actionUrl);
    $('#delete_item_title').text(title);
});
</script>
@endpush
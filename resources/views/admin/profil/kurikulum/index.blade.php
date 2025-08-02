@extends('layouts.admin')

@section('title', 'Kelola Kurikulum')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Header -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-graduation-cap fa-lg text-success mr-2"></i>
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
                        <i class="fas fa-check-circle fa-lg mr-3"></i>
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
                        <i class="fas fa-exclamation-circle fa-lg mr-3"></i>
                        <div>
                            <strong>Error!</strong> {{ session('error') }}
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            <!-- Daftar Item Kurikulum -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-list mr-2"></i>
                        Daftar Item Kurikulum
                    </h6>
                    <a href="{{ route('admin.kurikulum.create-item') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus mr-1"></i> Tambah Item Baru
                    </a>
                </div>
                <div class="card-body">
                    @if(isset($kurikulum) && $kurikulum->allItems->count() > 0)
                        <div class="row">
                            @foreach($kurikulum->allItems as $item)
                                <div class="col-lg-6 mb-3">
                                    <div class="card">
                                        <div class="card-body d-flex align-items-center">
                                            @if($item->gambar_url)
                                                <img src="{{ $item->gambar_url }}" alt="{{ $item->judul }}" class="rounded mr-3" style="width: 50px; height: 50px; object-fit: cover;">
                                                    @endif
                                                    <div>
                                                        <h6 class="m-0 font-weight-bold">{{ $item->judul }}</h6>
                                                <div class="text-muted small">{!! Str::limit(strip_tags($item->deskripsi), 100) !!}</div>
                                            </div>
                                            <div class="ml-auto">
                                                <a href="{{ route('admin.kurikulum.edit-item', $item->id) }}" class="btn btn-sm btn-warning">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <form action="{{ route('admin.kurikulum.destroy-item', $item->id) }}" method="POST" style="display:inline-block;">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus item ini?')">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
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
    const gambar = $(this).data('gambar');
    
    const actionUrl = "{{ route('admin.kurikulum.update-item', ['id' => 'ITEM_ID_PLACEHOLDER']) }}".replace('ITEM_ID_PLACEHOLDER', id);
    $('#editItemForm').attr('action', actionUrl);
    $('#edit_judul').val(judul);
    
    // Set CKEditor content
    if (CKEDITOR.instances.edit_deskripsi) {
        CKEDITOR.instances.edit_deskripsi.setData(deskripsi);
    }
    
    // Show current image if exists
    if (gambar) {
        $('#current_image_container').removeClass('d-none');
        $('#current_image').attr('src', gambar ? '{{ asset("assets/images/kurikulum/items") }}/' + gambar : '{{ asset("assets/images/default/kurikulum-item-default.jpg") }}');
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

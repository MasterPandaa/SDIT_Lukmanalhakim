@extends('layouts.admin')

@section('title', 'Kelola Kurikulum')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <!-- Header Card -->
            <div class="card border-0 shadow-lg rounded-lg mb-4">
                <div class="card-header bg-gradient-primary text-white py-3 d-flex align-items-center">
                    <i class="fas fa-book fa-2x mr-3"></i>
                    <h5 class="card-title m-0 font-weight-bold">Kelola Kurikulum</h5>
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

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show mb-4 border-left-danger shadow-sm">
                            <div class="d-flex align-items-center">
                                <i class="fas fa-exclamation-circle fa-2x mr-3"></i>
                                <div>
                                    <strong>Error!</strong> {{ session('error') }}
                                </div>
                            </div>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif

                    <!-- Form Informasi Utama Kurikulum -->
                    <form action="{{ route('admin.kurikulum.update') }}" method="POST" enctype="multipart/form-data" id="mainKurikulumForm">
                        @csrf
                        @method('PUT')
                        
                        <!-- Informasi Utama -->
                        <div class="card shadow-sm mb-4 border-left-primary">
                            <div class="card-header bg-light py-3">
                                <h6 class="m-0 font-weight-bold text-primary">
                                    <i class="fas fa-info-circle mr-2"></i> Informasi Utama Kurikulum
                                </h6>
                            </div>
                            <div class="card-body p-4">
                                <div class="form-group mb-4">
                                    <label for="judul" class="font-weight-bold text-dark">
                                        <i class="fas fa-heading mr-1"></i> Judul
                                    </label>
                                    <input type="text" class="form-control form-control-lg @error('judul') is-invalid @enderror" 
                                        id="judul" name="judul" value="{{ old('judul', $kurikulum->judul ?? '') }}"
                                        placeholder="Masukkan judul kurikulum">
                                    @error('judul')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="subtitle" class="font-weight-bold text-dark">
                                        <i class="fas fa-font mr-1"></i> Subtitle
                                    </label>
                                    <input type="text" class="form-control @error('subtitle') is-invalid @enderror" 
                                        id="subtitle" name="subtitle" value="{{ old('subtitle', $kurikulum->subtitle ?? '') }}"
                                        placeholder="Masukkan subtitle kurikulum">
                                    @error('subtitle')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="form-group mb-4">
                                    <label for="deskripsi" class="font-weight-bold text-dark">
                                        <i class="fas fa-align-left mr-1"></i> Deskripsi
                                    </label>
                                    <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                        id="deskripsi" name="deskripsi" rows="6">{{ old('deskripsi', $kurikulum->deskripsi ?? '') }}</textarea>
                                    @error('deskripsi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="text-muted">
                                        <i class="fas fa-info-circle mr-1"></i> Gunakan editor untuk memformat teks deskripsi
                                    </small>
                                </div>

                                <div class="d-flex justify-content-end">
                                    <button type="submit" class="btn btn-primary px-4 shadow-sm" id="mainFormSubmitBtn">
                                        <i class="fas fa-save mr-2"></i> Simpan Informasi Utama
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>

                    <!-- Daftar Item Kurikulum -->
                    <div class="card shadow-sm mb-4 border-left-info">
                        <div class="card-header bg-light py-3 d-flex justify-content-between align-items-center">
                            <h6 class="m-0 font-weight-bold text-info">
                                <i class="fas fa-list mr-2"></i> Daftar Item Kurikulum
                            </h6>
                            <button type="button" class="btn btn-sm btn-info shadow-sm" data-toggle="modal" data-target="#addItemModal">
                                <i class="fas fa-plus-circle mr-1"></i> Tambah Item Baru
                            </button>
                        </div>
                        <div class="card-body p-4">
                            @if(isset($kurikulum) && $kurikulum->items->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover">
                                        <thead class="thead-light">
                                            <tr>
                                                <th width="5%">No</th>
                                                <th width="10%">Urutan</th>
                                                <th width="15%">Gambar</th>
                                                <th width="20%">Judul</th>
                                                <th width="30%">Deskripsi</th>
                                                <th width="20%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($kurikulum->items as $index => $item)
                                                <tr>
                                                    <td class="text-center">{{ $index + 1 }}</td>
                                                    <td class="text-center">{{ $item->urutan }}</td>
                                                    <td class="text-center">
                                                        @if($item->gambar)
                                                            <img src="{{ asset($item->gambar) }}" alt="{{ $item->judul }}" class="img-thumbnail" style="max-height: 80px;">
                                                        @else
                                                            <span class="badge badge-secondary">Tidak ada gambar</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $item->judul }}</td>
                                                    <td>{{ Str::limit(strip_tags($item->deskripsi), 100) }}</td>
                                                    <td>
                                                        <div class="btn-group">
                                                            <button type="button" class="btn btn-sm btn-warning edit-item-btn" 
                                                                data-toggle="modal" 
                                                                data-target="#editItemModal" 
                                                                data-id="{{ $item->id }}"
                                                                data-judul="{{ $item->judul }}"
                                                                data-deskripsi="{{ $item->deskripsi }}"
                                                                data-urutan="{{ $item->urutan }}"
                                                                data-gambar="{{ $item->gambar }}">
                                                                <i class="fas fa-edit"></i> Edit
                                                            </button>
                                                            <button type="button" class="btn btn-sm btn-danger ml-1 delete-item-btn"
                                                                data-toggle="modal"
                                                                data-target="#deleteItemModal"
                                                                data-action="{{ route('admin.kurikulum.destroy-item', $item->id) }}">
                                                                <i class="fas fa-trash"></i> Hapus
                                                            </button>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle mr-1"></i> Belum ada item kurikulum. Silakan tambahkan item baru.
                                </div>
                            @endif
                        </div>
                    </div>

                    <!-- Tombol Kembali -->
                    <div class="card shadow-sm border-left-success">
                        <div class="card-body p-4">
                            <div class="d-flex justify-content-end">
                                <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary btn-lg px-5 shadow-sm">
                                    <i class="fas fa-arrow-left mr-2"></i> Kembali ke Dashboard
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal Tambah Item -->
<div class="modal fade" id="addItemModal" tabindex="-1" role="dialog" aria-labelledby="addItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-info text-white">
                <h5 class="modal-title" id="addItemModalLabel">
                    <i class="fas fa-plus-circle mr-2"></i> Tambah Item Kurikulum Baru
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="{{ route('admin.kurikulum.store-item') }}" method="POST" enctype="multipart/form-data" id="addItemForm">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="judul_item" class="font-weight-bold">
                            <i class="fas fa-heading mr-1"></i> Judul Item <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                            id="judul_item" name="judul" value="{{ old('judul') }}" required
                            placeholder="Masukkan judul item kurikulum">
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="deskripsi_item" class="font-weight-bold">
                            <i class="fas fa-align-left mr-1"></i> Deskripsi Item <span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control item-deskripsi @error('deskripsi') is-invalid @enderror" 
                            id="deskripsi_item" name="deskripsi" rows="4" required>{{ old('deskripsi') }}</textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="gambar" class="font-weight-bold">
                            <i class="fas fa-image mr-1"></i> Gambar/Icon
                        </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('gambar') is-invalid @enderror" 
                                id="gambar" name="gambar">
                            <label class="custom-file-label" for="gambar">Pilih file gambar...</label>
                        </div>
                        @error('gambar')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">
                            <i class="fas fa-info-circle mr-1"></i> Format: JPG, JPEG, PNG. Maksimal 2MB
                        </small>
                    </div>

                    <div class="form-group">
                        <label for="urutan" class="font-weight-bold">
                            <i class="fas fa-sort-numeric-down mr-1"></i> Urutan <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control @error('urutan') is-invalid @enderror" 
                            id="urutan" name="urutan" value="{{ old('urutan', 0) }}" min="0" required>
                        @error('urutan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">
                            <i class="fas fa-info-circle mr-1"></i> Urutan menentukan posisi item dalam daftar (0 = paling atas)
                        </small>
                    </div>
                </div>
                <div class="modal-footer bg-light">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">
                        <i class="fas fa-times mr-1"></i> Batal
                    </button>
                    <button type="submit" class="btn btn-info" id="addItemSubmitBtn">
                        <i class="fas fa-save mr-1"></i> Simpan Item
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit Item -->
<div class="modal fade" id="editItemModal" tabindex="-1" role="dialog" aria-labelledby="editItemModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-warning text-white">
                <h5 class="modal-title" id="editItemModalLabel">
                    <i class="fas fa-edit mr-2"></i> Edit Item Kurikulum
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form id="editItemForm" action="#" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="modal-body">
                    <div class="form-group">
                        <label for="edit_judul" class="font-weight-bold">
                            <i class="fas fa-heading mr-1"></i> Judul Item <span class="text-danger">*</span>
                        </label>
                        <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                            id="edit_judul" name="judul" required
                            placeholder="Masukkan judul item kurikulum">
                        @error('judul')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="edit_deskripsi" class="font-weight-bold">
                            <i class="fas fa-align-left mr-1"></i> Deskripsi Item <span class="text-danger">*</span>
                        </label>
                        <textarea class="form-control item-deskripsi @error('deskripsi') is-invalid @enderror" 
                            id="edit_deskripsi" name="deskripsi" rows="4" required></textarea>
                        @error('deskripsi')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="edit_gambar" class="font-weight-bold">
                            <i class="fas fa-image mr-1"></i> Gambar/Icon
                        </label>
                        <div class="custom-file">
                            <input type="file" class="custom-file-input @error('gambar') is-invalid @enderror" 
                                id="edit_gambar" name="gambar">
                            <label class="custom-file-label" for="edit_gambar">Pilih file gambar baru...</label>
                        </div>
                        @error('gambar')
                            <div class="invalid-feedback d-block">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">
                            <i class="fas fa-info-circle mr-1"></i> Format: JPG, JPEG, PNG. Maksimal 2MB
                        </small>
                        
                        <div id="current_image_container" class="mt-2 d-none">
                            <label class="font-weight-bold">Gambar Saat Ini:</label>
                            <div class="card shadow-sm">
                                <div class="card-body p-2 text-center bg-light">
                                    <img id="current_image" src="" alt="Gambar Item" class="img-thumbnail" style="max-height: 100px;">
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="edit_urutan" class="font-weight-bold">
                            <i class="fas fa-sort-numeric-down mr-1"></i> Urutan <span class="text-danger">*</span>
                        </label>
                        <input type="number" class="form-control @error('urutan') is-invalid @enderror" 
                            id="edit_urutan" name="urutan" min="0" required>
                        @error('urutan')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="text-muted">
                            <i class="fas fa-info-circle mr-1"></i> Urutan menentukan posisi item dalam daftar (0 = paling atas)
                        </small>
                    </div>
                </div>
                <div class="modal-footer bg-light">
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
<div class="modal fade" id="deleteItemModal" tabindex="-1" role="dialog" aria-labelledby="deleteItemModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="deleteItemForm" method="POST" action="">
      @csrf
      @method('DELETE')
      <div class="modal-content">
        <div class="modal-header bg-danger text-white">
          <h5 class="modal-title" id="deleteItemModalLabel">
            <i class="fas fa-trash"></i> Konfirmasi Hapus
          </h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <p>Apakah Anda yakin ingin menghapus item kurikulum ini?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
          <button type="submit" class="btn btn-danger">Hapus</button>
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
    
    .border-left-success {
        border-left: 4px solid #1cc88a !important;
    }
    
    .border-left-info {
        border-left: 4px solid #36b9cc !important;
    }
    
    .border-left-danger {
        border-left: 4px solid #e74a3b !important;
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
    
    .btn-secondary:hover, .btn-info:hover, .btn-warning:hover, .btn-danger:hover {
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
    
    .table th, .table td {
        vertical-align: middle;
    }
    
    .delete-form button {
        cursor: pointer;
    }
</style>
@endpush

@push('scripts')
<script>
    // Debug info
    console.log('Routes available:');
    console.log('- Main update route: {{ route("admin.kurikulum.update") }}');
    console.log('- Store item route: {{ route("admin.kurikulum.store-item") }}');
    console.log('- Update item route template: {{ route("admin.kurikulum.update-item", ["id" => "ITEM_ID"]) }}');
</script>
<script src="https://cdn.ckeditor.com/4.16.2/standard/ckeditor.js"></script>
<script>
    // CKEditor untuk deskripsi utama
    CKEDITOR.replace('deskripsi', {
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
    
    // CKEditor untuk deskripsi item
    document.querySelectorAll('.item-deskripsi').forEach(function(textarea) {
        CKEDITOR.replace(textarea, {
            height: 200,
            toolbar: [
                { name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'RemoveFormat' ] },
                { name: 'paragraph', items: [ 'NumberedList', 'BulletedList', '-', 'JustifyLeft', 'JustifyCenter', 'JustifyRight' ] },
                { name: 'links', items: [ 'Link', 'Unlink' ] },
                { name: 'styles', items: [ 'Format', 'Font', 'FontSize' ] },
                { name: 'colors', items: [ 'TextColor' ] }
            ]
        });
    });
    
    // Menampilkan nama file yang dipilih pada input file
    $('.custom-file-input').on('change', function() {
        let fileName = $(this).val().split('\\').pop();
        $(this).next('.custom-file-label').addClass("selected").html(fileName);
    });
    
    // Menangani klik tombol hapus untuk membuka modal
    $(document).on('click', '.delete-item-btn', function() {
        const actionUrl = $(this).data('action');
        console.log('Delete button clicked. Action URL:', actionUrl);
        $('#deleteItemForm').attr('action', actionUrl);
    });
    
    // Monitor form submissions
    $('#mainKurikulumForm').on('submit', function(e) {
        console.log('Main kurikulum form submitted');
        console.log('Action URL:', $(this).attr('action'));
        console.log('Method:', $(this).attr('method'));
        console.log('Form data:', $(this).serialize());
    });
    
    $('#addItemForm').on('submit', function(e) {
        console.log('Add item form submitted');
        console.log('Action URL:', $(this).attr('action'));
        console.log('Method:', $(this).attr('method'));
    });
    
    $('#editItemForm').on('submit', function(e) {
        console.log('Edit item form submitted');
        console.log('Action URL:', $(this).attr('action'));
        console.log('Method:', $(this).attr('method'));
    });
    
    // Edit item - menggunakan event delegation untuk menangani elemen yang ditambahkan secara dinamis
    $(document).on('click', '.edit-item-btn', function() {
        const id = $(this).data('id');
        const judul = $(this).data('judul');
        const deskripsi = $(this).data('deskripsi');
        const urutan = $(this).data('urutan');
        const gambar = $(this).data('gambar');
        
        console.log('Edit item clicked. ID:', id);
        const actionUrl = "{{ route('admin.kurikulum.update-item', ['id' => 'ITEM_ID_PLACEHOLDER']) }}".replace('ITEM_ID_PLACEHOLDER', id);
        console.log('Setting form action to:', actionUrl);
        $('#editItemForm').attr('action', actionUrl);
        $('#edit_judul').val(judul);
        console.log('Setting judul:', judul);
        console.log('Setting deskripsi:', deskripsi);
        try {
            CKEDITOR.instances.edit_deskripsi.setData(deskripsi);
        } catch (e) {
            console.error('Error setting CKEditor data:', e);
        }
        $('#edit_urutan').val(urutan);
        
        if (gambar) {
            $('#current_image_container').removeClass('d-none');
            $('#current_image').attr('src', `{{ asset('') }}${gambar}`);
        } else {
            $('#current_image_container').addClass('d-none');
        }
    });
</script>
@endpush
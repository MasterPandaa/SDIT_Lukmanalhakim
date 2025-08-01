@extends('layouts.admin')

@section('title', 'Manajemen Visi Misi')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Manajemen Konten Visi Misi</h4>
                        <div>
                            <a href="{{ route('visi-misi') }}" target="_blank" class="btn btn-info">
                                <i class="fas fa-eye"></i> Lihat Halaman
                            </a>
                            <a href="{{ route('admin.visi-misi.toggle') }}" 
                               class="btn {{ $visiMisi->is_active ? 'btn-secondary' : 'btn-success' }}"
                               onclick="return confirm('Apakah Anda yakin ingin {{ $visiMisi->is_active ? 'menonaktifkan' : 'mengaktifkan' }} konten ini?')">
                                <i class="fas {{ $visiMisi->is_active ? 'fa-eye-slash' : 'fa-eye' }}"></i>
                                {{ $visiMisi->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            {{ session('success') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    @if(session('error'))
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            {{ session('error') }}
                            <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                        </div>
                    @endif

                    <form action="{{ route('admin.visi-misi.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="judul_header" class="form-label">Judul Header <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('judul_header') is-invalid @enderror" 
                                           id="judul_header" name="judul_header" 
                                           value="{{ old('judul_header', $visiMisi->judul_header) }}" required>
                                    @error('judul_header')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="deskripsi_header" class="form-label">Deskripsi Header <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('deskripsi_header') is-invalid @enderror" 
                                              id="deskripsi_header" name="deskripsi_header" rows="3" required>{{ old('deskripsi_header', $visiMisi->deskripsi_header) }}</textarea>
                                    @error('deskripsi_header')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="visi" class="form-label">Visi Sekolah <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('visi') is-invalid @enderror" 
                                              id="visi" name="visi" rows="3" required>{{ old('visi', $visiMisi->visi) }}</textarea>
                                    @error('visi')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Misi Sekolah <span class="text-danger">*</span></label>
                                    <div id="misi-container">
                                        @foreach($visiMisi->misi_items ?? [] as $index => $item)
                                        <div class="misi-item border rounded p-3 mb-3">
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <label class="form-label">Judul Misi</label>
                                                    <input type="text" class="form-control" 
                                                           name="misi_items[{{ $index }}][judul]" 
                                                           value="{{ $item['judul'] }}" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Icon (CSS Class)</label>
                                                    <input type="text" class="form-control" 
                                                           name="misi_items[{{ $index }}][icon]" 
                                                           value="{{ $item['icon'] }}" 
                                                           placeholder="icofont-credit-card">
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Aksi</label>
                                                    <button type="button" class="btn btn-danger btn-sm d-block w-100 remove-misi" 
                                                            onclick="removeMisiItem(this)">
                                                        <i class="fas fa-trash"></i> Hapus
                                                    </button>
                                                </div>
                                            </div>
                                            <div class="row mt-2">
                                                <div class="col-12">
                                                    <label class="form-label">Deskripsi</label>
                                                    <textarea class="form-control" name="misi_items[{{ $index }}][deskripsi]" 
                                                              rows="3" required>{{ $item['deskripsi'] }}</textarea>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                    <button type="button" class="btn btn-success" onclick="addMisiItem()">
                                        <i class="fas fa-plus"></i> Tambah Misi
                                    </button>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="gambar_header" class="form-label">Gambar Header</label>
                                    <input type="file" class="form-control @error('gambar_header') is-invalid @enderror" 
                                           id="gambar_header" name="gambar_header" accept="image/*">
                                    @error('gambar_header')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        Format: JPG, PNG, GIF. Maksimal 2MB.
                                    </small>
                                    
                                    @if($visiMisi->gambar_header)
                                        <div class="mt-2">
                                            <label class="form-label">Gambar Saat Ini:</label>
                                            <img src="{{ $visiMisi->gambar_header_url }}" 
                                                 alt="Header Image" 
                                                 class="img-thumbnail d-block" 
                                                 style="max-width: 200px;">
                                        </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" 
                                               {{ old('is_active', $visiMisi->is_active) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            Aktifkan konten
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <h6 class="card-title">Informasi Konten</h6>
                                            <p class="card-text mb-1">
                                                <strong>Status:</strong> 
                                                @if($visiMisi->is_active)
                                                    <span class="badge bg-success">Aktif</span>
                                                @else
                                                    <span class="badge bg-secondary">Nonaktif</span>
                                                @endif
                                            </p>
                                            <p class="card-text mb-1">
                                                <strong>Dibuat:</strong> {{ $visiMisi->created_at->format('d F Y H:i') }}
                                            </p>
                                            <p class="card-text mb-0">
                                                <strong>Diperbarui:</strong> {{ $visiMisi->updated_at->format('d F Y H:i') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-end gap-2">
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Simpan Perubahan
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    let misiIndex = {{ count($visiMisi->misi_items ?? []) }};

    function addMisiItem() {
        const container = document.getElementById('misi-container');
        const newItem = document.createElement('div');
        newItem.className = 'misi-item border rounded p-3 mb-3';
        newItem.innerHTML = `
            <div class="row">
                <div class="col-md-4">
                    <label class="form-label">Judul Misi</label>
                    <input type="text" class="form-control" 
                           name="misi_items[${misiIndex}][judul]" required>
                </div>
                <div class="col-md-4">
                    <label class="form-label">Icon (CSS Class)</label>
                    <input type="text" class="form-control" 
                           name="misi_items[${misiIndex}][icon]" 
                           placeholder="icofont-credit-card">
                </div>
                <div class="col-md-4">
                    <label class="form-label">Aksi</label>
                    <button type="button" class="btn btn-danger btn-sm d-block w-100 remove-misi" 
                            onclick="removeMisiItem(this)">
                        <i class="fas fa-trash"></i> Hapus
                    </button>
                </div>
            </div>
            <div class="row mt-2">
                <div class="col-12">
                    <label class="form-label">Deskripsi</label>
                    <textarea class="form-control" name="misi_items[${misiIndex}][deskripsi]" 
                              rows="3" required></textarea>
                </div>
            </div>
        `;
        container.appendChild(newItem);
        misiIndex++;
    }

    function removeMisiItem(button) {
        if (confirm('Apakah Anda yakin ingin menghapus misi ini?')) {
            button.closest('.misi-item').remove();
        }
    }

    // Preview image before upload
    document.getElementById('gambar_header').addEventListener('change', function(e) {
        const file = e.target.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                // Create preview if it doesn't exist
                let preview = document.getElementById('image-preview');
                if (!preview) {
                    preview = document.createElement('img');
                    preview.id = 'image-preview';
                    preview.className = 'img-thumbnail mt-2';
                    preview.style.maxWidth = '200px';
                    document.getElementById('gambar_header').parentNode.appendChild(preview);
                }
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
@endsection 
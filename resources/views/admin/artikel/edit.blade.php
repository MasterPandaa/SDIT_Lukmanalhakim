@extends('layouts.admin')

@section('title', 'Edit Artikel')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex justify-content-between align-items-center">
                        <h4 class="card-title">Edit Artikel: {{ $artikel->judul }}</h4>
                        <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary">
                            <i class="fas fa-arrow-left"></i> Kembali
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-8">
                                <div class="mb-3">
                                    <label for="judul" class="form-label">Judul Artikel <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                                           id="judul" name="judul" value="{{ old('judul', $artikel->judul) }}" required>
                                    @error('judul')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="konten" class="form-label">Konten Artikel <span class="text-danger">*</span></label>
                                    <textarea class="form-control @error('konten') is-invalid @enderror" 
                                              id="konten" name="konten" rows="15" required>{{ old('konten', $artikel->konten) }}</textarea>
                                    @error('konten')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        Anda dapat menggunakan HTML tags untuk formatting. Contoh: &lt;strong&gt;teks tebal&lt;/strong&gt;, &lt;em&gt;teks miring&lt;/em&gt;, &lt;br&gt; untuk baris baru.
                                    </small>
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="mb-3">
                                    <label for="gambar" class="form-label">Gambar Artikel</label>
                                    <input type="file" class="form-control @error('gambar') is-invalid @enderror" 
                                           id="gambar" name="gambar" accept="image/*">
                                    @error('gambar')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        Format: JPG, PNG, GIF. Maksimal 2MB.
                                    </small>
                                    
                                    @if($artikel->gambar)
                                        <div class="mt-2">
                                            <label class="form-label">Gambar Saat Ini:</label>
                                            <img src="{{ $artikel->gambar_url }}" 
                                                 alt="{{ $artikel->judul }}" 
                                                 class="img-thumbnail d-block" 
                                                 style="max-width: 200px;">
                                        </div>
                                    @endif
                                </div>

                                <div class="mb-3">
                                    <label for="ringkasan" class="form-label">Ringkasan</label>
                                    <textarea class="form-control @error('ringkasan') is-invalid @enderror" 
                                              id="ringkasan" name="ringkasan" rows="3">{{ old('ringkasan', $artikel->ringkasan) }}</textarea>
                                    @error('ringkasan')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        Ringkasan singkat artikel (maksimal 500 karakter).
                                    </small>
                                </div>

                                <div class="mb-3">
                                    <label for="penulis" class="form-label">Penulis</label>
                                    <input type="text" class="form-control @error('penulis') is-invalid @enderror" 
                                           id="penulis" name="penulis" value="{{ old('penulis', $artikel->penulis) }}">
                                    @error('penulis')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>

                                <div class="mb-3">
                                    <label for="kategori" class="form-label">Kategori</label>
                                    <input type="text" class="form-control @error('kategori') is-invalid @enderror" 
                                           id="kategori" name="kategori" value="{{ old('kategori', $artikel->kategori) }}">
                                    @error('kategori')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        Contoh: Berita, Kegiatan, Prestasi, dll.
                                    </small>
                                </div>

                                <div class="mb-3">
                                    <label for="published_at" class="form-label">Tanggal Publikasi</label>
                                    <input type="datetime-local" class="form-control @error('published_at') is-invalid @enderror" 
                                           id="published_at" name="published_at" 
                                           value="{{ old('published_at', $artikel->published_at ? $artikel->published_at->format('Y-m-d\TH:i') : '') }}">
                                    @error('published_at')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">
                                        Kosongkan untuk publikasi sekarang.
                                    </small>
                                </div>

                                <div class="mb-3">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" 
                                               {{ old('is_active', $artikel->is_active) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">
                                            Aktifkan artikel
                                        </label>
                                    </div>
                                </div>

                                <div class="mb-3">
                                    <div class="card bg-light">
                                        <div class="card-body">
                                            <h6 class="card-title">Informasi Artikel</h6>
                                            <p class="card-text mb-1">
                                                <strong>Slug:</strong> {{ $artikel->slug }}
                                            </p>
                                            <p class="card-text mb-1">
                                                <strong>Dibuat:</strong> {{ $artikel->created_at->format('d F Y H:i') }}
                                            </p>
                                            <p class="card-text mb-0">
                                                <strong>Diperbarui:</strong> {{ $artikel->updated_at->format('d F Y H:i') }}
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-12">
                                <div class="d-flex justify-content-end gap-2">
                                    <a href="{{ route('admin.artikel.index') }}" class="btn btn-secondary">Batal</a>
                                    <button type="submit" class="btn btn-primary">
                                        <i class="fas fa-save"></i> Update Artikel
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
    // Preview image before upload
    document.getElementById('gambar').addEventListener('change', function(e) {
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
                    document.getElementById('gambar').parentNode.appendChild(preview);
                }
                preview.src = e.target.result;
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endpush
@endsection
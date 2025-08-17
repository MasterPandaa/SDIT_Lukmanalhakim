@extends('layouts.admin')

@section('title', 'Edit Artikel')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 fw-bold text-success">Edit Artikel</h6>
                    <a href="{{ route('admin.artikel.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.artikel.update', $artikel->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control" value="{{ old('judul', $artikel->judul) }}" required>
                            @error('judul')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Ringkasan</label>
                            <textarea name="ringkasan" class="form-control" rows="2">{{ old('ringkasan', $artikel->ringkasan) }}</textarea>
                            @error('ringkasan')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Penulis</label>
                                <input type="text" name="penulis" class="form-control" value="{{ old('penulis', $artikel->penulis) }}">
                                @error('penulis')<div class="text-danger small">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Kategori</label>
                                <input type="text" name="kategori" class="form-control" value="{{ old('kategori', $artikel->kategori) }}">
                                @error('kategori')<div class="text-danger small">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-md-4 mb-3">
                                <label class="form-label">Tanggal Publikasi</label>
                                <input type="datetime-local" name="published_at" class="form-control" value="{{ old('published_at', optional($artikel->published_at)->format('Y-m-d\TH:i')) }}">
                                @error('published_at')<div class="text-danger small">{{ $message }}</div>@enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Konten</label>
                            <textarea name="konten" class="form-control" rows="8" required>{{ old('konten', $artikel->konten) }}</textarea>
                            @error('konten')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label class="form-label">Gambar Sampul</label>
                                <input type="file" name="gambar" id="gambarInput" class="form-control" accept="image/*">
                                @error('gambar')<div class="text-danger small">{{ $message }}</div>@enderror
                                @if($artikel->gambar)
                                    <div class="mt-2">
                                        <img src="{{ $artikel->gambar_url }}" alt="Gambar" class="img-thumbnail" style="max-height: 160px;">
                                    </div>
                                @endif
                                <img id="previewImage" src="#" alt="Preview" class="img-thumbnail mt-2" style="max-height: 180px; display: none;">
                            </div>
                            <div class="col-md-6 mb-3 d-flex align-items-end">
                                <div>
                                    <input type="hidden" name="is_active" value="0">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', $artikel->is_active) ? 'checked' : '' }}>
                                        <label class="form-check-label" for="is_active">Aktif</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-success" type="submit"><i class="fas fa-save me-1"></i> Simpan</button>
                            <a href="{{ route('admin.artikel.index') }}" class="btn btn-light">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>
  (function() {
    const input = document.getElementById('gambarInput');
    const img = document.getElementById('previewImage');
    if (input && img) {
      input.addEventListener('change', function() {
        const file = this.files && this.files[0];
        if (!file) { img.style.display = 'none'; img.src = '#'; return; }
        const url = URL.createObjectURL(file);
        img.src = url;
        img.style.display = 'block';
      });
    }
  })();
  </script>
@endpush

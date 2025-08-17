@extends('layouts.admin')

@section('title', 'Tambah Foto Galeri')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 fw-bold text-success">Tambah Foto Galeri</h6>
                    <a href="{{ route('admin.galeri.index') }}" class="btn btn-sm btn-secondary">Kembali</a>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.galeri.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Judul</label>
                            <input type="text" name="judul" class="form-control" value="{{ old('judul') }}" required>
                            @error('judul')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" class="form-control" rows="3">{{ old('deskripsi') }}</textarea>
                            @error('deskripsi')<div class="text-danger small">{{ $message }}</div>@enderror
                        </div>
                        <div class="mb-3">
                            <div class="form-check">
                                <input type="hidden" name="is_active" value="0">
                                <input class="form-check-input" type="checkbox" name="is_active" id="is_active" value="1" {{ old('is_active', true) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">Aktif</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" name="foto" class="form-control" accept="image/*" required>
                            @error('foto')<div class="text-danger small">{{ $message }}</div>@enderror
                            <img id="fotoPreview" class="img-thumbnail mt-2 d-none" style="max-height: 140px;" alt="Preview">
                        </div>
                        <div class="d-flex gap-2">
                            <button class="btn btn-success" type="submit"><i class="fas fa-save me-1"></i> Simpan</button>
                            <a href="{{ route('admin.galeri.index') }}" class="btn btn-light">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script>
  document.addEventListener('DOMContentLoaded', function(){
    const input = document.querySelector('input[name="foto"]');
    const preview = document.getElementById('fotoPreview');
    if(input && preview){
      input.addEventListener('change', function(){
        const file = this.files && this.files[0];
        if(file){
          preview.src = URL.createObjectURL(file);
          preview.classList.remove('d-none');
        }
      });
    }
  });
 </script>
@endpush
@endsection

@extends('layouts.admin')

@section('title', 'Edit Ekstrakurikuler')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12 col-lg-10 col-xl-8">
      <div class="card border-0 shadow">
        <div class="card-header">
          <h6 class="m-0 fw-bold text-success">Edit Ekstrakurikuler</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.ekstrakurikuler.update', $ekstrakurikuler) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label class="form-label">Nama</label>
              <input type="text" name="nama" class="form-control" value="{{ old('nama', $ekstrakurikuler->nama) }}" required>
              @error('nama')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Deskripsi</label>
              <textarea name="deskripsi" class="form-control" rows="6">{{ old('deskripsi', $ekstrakurikuler->deskripsi) }}</textarea>
              @error('deskripsi')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Gambar/Ikon</label>
              <input type="file" name="gambar" class="form-control" accept="image/*">
              @if($ekstrakurikuler->gambar)
                <div class="mt-2">
                  <img src="{{ asset('storage/'.$ekstrakurikuler->gambar) }}" alt="Gambar" style="height:120px;object-fit:cover;">
                </div>
              @endif
              @error('gambar')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="row g-3">
              <div class="col-md-6">
                <label class="form-label">Urutan</label>
                <input type="number" name="urutan" class="form-control" value="{{ old('urutan', $ekstrakurikuler->urutan) }}">
                @error('urutan')<div class="text-danger small">{{ $message }}</div>@enderror
              </div>
            </div>
            <div class="form-check form-switch mt-3">
              <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{ old('is_active', $ekstrakurikuler->is_active) ? 'checked' : '' }}>
              <label class="form-check-label" for="is_active">Aktif</label>
            </div>
            <div class="mt-4 d-flex gap-2">
              <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-light">Batal</a>
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

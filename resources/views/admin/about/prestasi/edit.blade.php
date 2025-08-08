@extends('layouts.admin')

@section('title', 'Edit Prestasi')

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12 col-lg-10 col-xl-8">
      <div class="card border-0 shadow">
        <div class="card-header">
          <h6 class="m-0 fw-bold text-success">Edit Prestasi</h6>
        </div>
        <div class="card-body">
          <form action="{{ route('admin.prestasi.update', $prestasi) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="mb-3">
              <label class="form-label">Judul</label>
              <input type="text" name="judul" class="form-control" value="{{ old('judul', $prestasi->judul) }}" required>
              @error('judul')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Deskripsi</label>
              <textarea name="deskripsi" class="form-control" rows="6">{{ old('deskripsi', $prestasi->deskripsi) }}</textarea>
              @error('deskripsi')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="mb-3">
              <label class="form-label">Gambar</label>
              <input type="file" name="gambar" class="form-control" accept="image/*">
              @if($prestasi->gambar)
                <div class="mt-2">
                  <img src="{{ asset('storage/'.$prestasi->gambar) }}" alt="Gambar" style="height:120px;object-fit:cover;">
                </div>
              @endif
              @error('gambar')<div class="text-danger small">{{ $message }}</div>@enderror
            </div>
            <div class="row g-3">
              <div class="col-md-4">
                <label class="form-label">Tanggal</label>
                <input type="date" name="tanggal" class="form-control" value="{{ old('tanggal', optional($prestasi->tanggal)->format('Y-m-d')) }}">
                @error('tanggal')<div class="text-danger small">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-4">
                <label class="form-label">Tingkat</label>
                <input type="text" name="tingkat" class="form-control" value="{{ old('tingkat', $prestasi->tingkat) }}">
                @error('tingkat')<div class="text-danger small">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-4">
                <label class="form-label">Urutan</label>
                <input type="number" name="urutan" class="form-control" value="{{ old('urutan', $prestasi->urutan) }}">
                @error('urutan')<div class="text-danger small">{{ $message }}</div>@enderror
              </div>
            </div>
            <div class="row g-3 mt-1">
              <div class="col-md-6">
                <label class="form-label">Peraih</label>
                <input type="text" name="peraih" class="form-control" value="{{ old('peraih', $prestasi->peraih) }}">
                @error('peraih')<div class="text-danger small">{{ $message }}</div>@enderror
              </div>
              <div class="col-md-6">
                <label class="form-label">Penyelenggara</label>
                <input type="text" name="penyelenggara" class="form-control" value="{{ old('penyelenggara', $prestasi->penyelenggara) }}">
                @error('penyelenggara')<div class="text-danger small">{{ $message }}</div>@enderror
              </div>
            </div>
            <div class="form-check form-switch mt-3">
              <input class="form-check-input" type="checkbox" id="is_active" name="is_active" {{ old('is_active', $prestasi->is_active) ? 'checked' : '' }}>
              <label class="form-check-label" for="is_active">Aktif</label>
            </div>
            <div class="mt-4 d-flex gap-2">
              <a href="{{ route('admin.prestasi.index') }}" class="btn btn-light">Batal</a>
              <button type="submit" class="btn btn-success">Simpan</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>
@endsection

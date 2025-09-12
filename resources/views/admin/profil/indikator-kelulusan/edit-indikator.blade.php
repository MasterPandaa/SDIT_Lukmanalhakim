@extends('layouts.admin')

@section('title', 'Ubah Indikator Kelulusan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-9">
            <div class="card shadow-sm">
                <div class="card-header d-flex align-items-center justify-content-between">
                    <h5 class="mb-0"><i class="fas fa-edit me-2 text-success"></i>Ubah Indikator</h5>
                    <a href="{{ route('admin.indikator-kelulusan.index') }}" class="btn btn-light btn-sm"><i class="fas fa-arrow-left me-1"></i>Kembali</a>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('admin.indikator-kelulusan.update-indikator', $indikator->id) }}">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Kategori <span class="text-danger">*</span></label>
                            <select name="kategori_id" class="form-select @error('kategori_id') is-invalid @enderror" required>
                                @foreach($kategoris as $kat)
                                    <option value="{{ $kat->id }}" {{ old('kategori_id', $indikator->kategori_id) == $kat->id ? 'selected' : '' }}>
                                        {{ $kat->urutan }}. {{ $kat->nama }}
                                    </option>
                                @endforeach
                            </select>
                            @error('kategori_id')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Judul Indikator <span class="text-danger">*</span></label>
                            <input type="text" name="judul" class="form-control @error('judul') is-invalid @enderror" value="{{ old('judul', $indikator->judul) }}" required>
                            @error('judul')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea name="deskripsi" rows="4" class="form-control @error('deskripsi') is-invalid @enderror">{{ old('deskripsi', $indikator->deskripsi) }}</textarea>
                            @error('deskripsi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                        </div>

                        <div class="row g-3 mb-3">
                            <div class="col-sm-4">
                                <label class="form-label">Durasi (opsional)</label>
                                <input type="text" name="durasi" class="form-control @error('durasi') is-invalid @enderror" value="{{ old('durasi', $indikator->durasi) }}" placeholder="cth: 1 semester">
                                @error('durasi')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-sm-4">
                                <label class="form-label">Urutan <span class="text-danger">*</span></label>
                                <input type="number" name="urutan" min="0" class="form-control @error('urutan') is-invalid @enderror" value="{{ old('urutan', $indikator->urutan) }}" required>
                                @error('urutan')<div class="invalid-feedback">{{ $message }}</div>@enderror
                            </div>
                            <div class="col-sm-4 d-flex align-items-end">
                                <div class="form-check form-switch">
                                    <input type="hidden" name="is_active" value="0">
                                    <input class="form-check-input" type="checkbox" id="is_active" name="is_active" value="1" {{ old('is_active', $indikator->is_active) ? 'checked' : '' }}>
                                    <label class="form-check-label" for="is_active">Aktif</label>
                                </div>
                            </div>
                        </div>

                        <div class="d-flex gap-2">
                            <button type="submit" class="btn btn-success"><i class="fas fa-save me-1"></i>Simpan Perubahan</button>
                            <a href="{{ route('admin.indikator-kelulusan.index') }}" class="btn btn-secondary">Batal</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

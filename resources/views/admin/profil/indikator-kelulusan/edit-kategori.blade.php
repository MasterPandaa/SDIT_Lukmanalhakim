@extends('layouts.admin')

@section('title', 'Edit Kategori Indikator Kelulusan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <!-- Header -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-edit fa-lg text-warning mr-2"></i>
                    Edit Kategori: {{ $kategori->nama }}
                </h1>
                <a href="{{ route('admin.indikator-kelulusan.index') }}" class="btn btn-secondary shadow-sm">
                    <i class="fas fa-arrow-left mr-2"></i>
                    Kembali
                </a>
            </div>


            <!-- Form -->
            <div class="card shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-folder-open mr-2"></i>
                        Form Edit Kategori
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.indikator-kelulusan.update-kategori', $kategori->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        
                        <div class="form-group">
                            <label for="nama">Nama Kategori <span class="text-danger">*</span></label>
                            <input type="text" class="form-control @error('nama') is-invalid @enderror" 
                                   id="nama" name="nama" value="{{ old('nama', $kategori->nama) }}" required>
                            @error('nama')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Contoh: AKIDAH LURUS, IBADAH YANG BENAR, dll.</small>
                        </div>

                        <div class="form-group">
                            <label for="deskripsi">Deskripsi</label>
                            <textarea class="form-control @error('deskripsi') is-invalid @enderror" 
                                      id="deskripsi" name="deskripsi" rows="3">{{ old('deskripsi', $kategori->deskripsi) }}</textarea>
                            @error('deskripsi')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Deskripsi singkat tentang kategori ini (opsional).</small>
                        </div>

                        <div class="form-group">
                            <label for="urutan">Urutan Tampil <span class="text-danger">*</span></label>
                            <input type="number" class="form-control @error('urutan') is-invalid @enderror" 
                                   id="urutan" name="urutan" value="{{ old('urutan', $kategori->urutan) }}" min="0" required>
                            @error('urutan')
                                <div class="invalid-feedback">{{ $message }}</div>
                            @enderror
                            <small class="form-text text-muted">Nomor urutan untuk mengurutkan kategori (0 = paling atas).</small>
                        </div>

                        <div class="form-group">
                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="is_active" name="is_active" 
                                       {{ old('is_active', $kategori->is_active) ? 'checked' : '' }}>
                                <label class="form-check-label" for="is_active">
                                    Aktifkan kategori
                                </label>
                            </div>
                            <small class="form-text text-muted">Kategori yang tidak aktif tidak akan ditampilkan di halaman publik.</small>
                        </div>

                        <div class="form-group mb-0">
                            <button type="submit" class="btn btn-warning">
                                <i class="fas fa-save mr-2"></i>
                                Update Kategori
                            </button>
                            <a href="{{ route('admin.indikator-kelulusan.index') }}" class="btn btn-secondary ml-2">
                                <i class="fas fa-times mr-2"></i>
                                Batal
                            </a>
                        </div>
                    </form>
                </div>
            </div>

            <!-- Info Indikator dalam Kategori -->
            @if(count($kategori->allIndikators) > 0)
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-info">
                            <i class="fas fa-list mr-2"></i>
                            Indikator dalam Kategori ini ({{ count($kategori->allIndikators) }} item)
                        </h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Urutan</th>
                                        <th>Judul</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($kategori->allIndikators as $indikator)
                                        <tr>
                                            <td>{{ $indikator->urutan }}</td>
                                            <td>{{ $indikator->judul }}</td>
                                            <td>
                                                <span class="badge badge-{{ $indikator->is_active ? 'success' : 'secondary' }}">
                                                    {{ $indikator->is_active ? 'Aktif' : 'Nonaktif' }}
                                                </span>
                                            </td>
                                            <td>
                                                <a href="{{ route('admin.indikator-kelulusan.edit-indikator', $indikator->id) }}" 
                                                   class="btn btn-warning btn-sm">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection

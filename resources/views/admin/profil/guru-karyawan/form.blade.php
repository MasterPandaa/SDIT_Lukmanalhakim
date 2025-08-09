@extends('layouts.admin')

@section('title', $title)

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Header -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-chalkboard-teacher fa-lg text-success me-2"></i>
                    {{ $title }}
                </h1>
                <a href="{{ route('admin.profil.guru-karyawan.index') }}" class="btn btn-secondary shadow-sm">
                    <i class="fas fa-arrow-left me-2"></i>
                    Kembali
                </a>
            </div>

            <!-- Form Card -->
            <div class="card shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 font-weight-bold text-primary">{{ $title }}</h6>
                </div>
                <div class="card-body">
                    <form action="{{ $action }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @if($method !== 'POST')
                            @method($method)
                        @endif

                        <div class="row">
                            <!-- Foto -->
                            <div class="col-md-4 mb-3">
                                <label for="foto" class="form-label">Foto</label>
                                <div class="text-center">
                                    @if($guru && $guru->foto)
                                        <img src="{{ $guru->foto_url }}" alt="Current photo" class="img-thumbnail mb-2" style="max-width: 200px; max-height: 200px;">
                                    @else
                                        <div class="bg-light border rounded d-flex align-items-center justify-content-center mb-2" style="width: 200px; height: 200px; margin: 0 auto;">
                                            <i class="fas fa-user fa-3x text-muted"></i>
                                        </div>
                                    @endif
                                    <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto" accept="image/*">
                                    @error('foto')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                    <small class="form-text text-muted">Format: JPG, JPEG, PNG. Maksimal 2MB.</small>
                                </div>
                            </div>

                            <!-- Data Pribadi -->
                            <div class="col-md-8">
                                <div class="row">
                                    <div class="col-md-6 mb-3">
                                        <label for="nama" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $guru->nama ?? '') }}" required>
                                        @error('nama')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="jabatan" class="form-label">Jabatan <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control @error('jabatan') is-invalid @enderror" id="jabatan" name="jabatan" value="{{ old('jabatan', $guru->jabatan ?? '') }}" required>
                                        @error('jabatan')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="email" class="form-label">Email</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $guru->email ?? '') }}">
                                        @error('email')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="telepon" class="form-label">Telepon</label>
                                        <input type="text" class="form-control @error('telepon') is-invalid @enderror" id="telepon" name="telepon" value="{{ old('telepon', $guru->telepon ?? '') }}">
                                        @error('telepon')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="pengalaman_mengajar" class="form-label">Pengalaman Mengajar (Tahun) <span class="text-danger">*</span></label>
                                        <input type="number" class="form-control @error('pengalaman_mengajar') is-invalid @enderror" id="pengalaman_mengajar" name="pengalaman_mengajar" value="{{ old('pengalaman_mengajar', $guru->pengalaman_mengajar ?? 0) }}" min="0" required>
                                        @error('pengalaman_mengajar')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                        @enderror
                                    </div>

                                    <div class="col-md-6 mb-3">
                                        <label for="is_active" class="form-label">Status</label>
                                        <div class="form-check">
                                            <input type="checkbox" class="form-check-input @error('is_active') is-invalid @enderror" id="is_active" name="is_active" value="1" {{ old('is_active', $guru->is_active ?? true) ? 'checked' : '' }}>
                                            <label class="form-check-label" for="is_active">
                                                Aktif
                                            </label>
                                            @error('is_active')
                                                <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Alamat -->
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="alamat" class="form-label">Alamat</label>
                                <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat" rows="2">{{ old('alamat', $guru->alamat ?? '') }}</textarea>
                                @error('alamat')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Deskripsi -->
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea class="form-control @error('deskripsi') is-invalid @enderror" id="deskripsi" name="deskripsi" rows="4">{{ old('deskripsi', $guru->deskripsi ?? '') }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Pernyataan Pribadi -->
                        <div class="row">
                            <div class="col-12 mb-3">
                                <label for="pernyataan_pribadi" class="form-label">Pernyataan Pribadi</label>
                                <textarea class="form-control @error('pernyataan_pribadi') is-invalid @enderror" id="pernyataan_pribadi" name="pernyataan_pribadi" rows="3">{{ old('pernyataan_pribadi', $guru->pernyataan_pribadi ?? '') }}</textarea>
                                @error('pernyataan_pribadi')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Social Media -->
                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="website" class="form-label">Website</label>
                                <input type="url" class="form-control @error('website') is-invalid @enderror" id="website" name="website" value="{{ old('website', $guru->website ?? '') }}">
                                @error('website')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="whatsapp" class="form-label">WhatsApp</label>
                                <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" id="whatsapp" name="whatsapp" value="{{ old('whatsapp', $guru->whatsapp ?? '') }}">
                                @error('whatsapp')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="col-md-4 mb-3">
                                <label for="instagram" class="form-label">Instagram</label>
                                <input type="text" class="form-control @error('instagram') is-invalid @enderror" id="instagram" name="instagram" value="{{ old('instagram', $guru->instagram ?? '') }}">
                                @error('instagram')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-4 mb-3">
                                <label for="facebook" class="form-label">Facebook</label>
                                <input type="text" class="form-control @error('facebook') is-invalid @enderror" id="facebook" name="facebook" value="{{ old('facebook', $guru->facebook ?? '') }}">
                                @error('facebook')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>

                        <!-- Submit Button -->
                        <div class="row">
                            <div class="col-12">
                                <hr>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>
                                    {{ $guru ? 'Perbarui' : 'Simpan' }}
                                </button>
                                <a href="{{ route('admin.profil.guru-karyawan.index') }}" class="btn btn-secondary ms-2">
                                    <i class="fas fa-times me-2"></i>
                                    Batal
                                </a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

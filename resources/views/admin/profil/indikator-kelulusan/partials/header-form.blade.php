<form action="{{ route('admin.indikator-kelulusan.update-settings') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row">
        <div class="col-md-8">
            <div class="card border-left-primary shadow h-100 py-2">
                <div class="card-body">
                    <div class="row no-gutters align-items-center">
                        <div class="col mr-2">
                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                <i class="fas fa-heading me-2"></i>Header Indikator Kelulusan
                            </div>
                            <div class="form-group mb-3">
                                <label for="judul_utama" class="form-label">Judul Utama</label>
                                <input type="text" class="form-control @error('judul_utama') is-invalid @enderror" id="judul_utama" name="judul_utama" value="{{ old('judul_utama', $setting->judul_utama) }}" required>
                                @error('judul_utama')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="judul_header" class="form-label">Judul Header</label>
                                <input type="text" class="form-control @error('judul_header') is-invalid @enderror" id="judul_header" name="judul_header" value="{{ old('judul_header', $setting->judul_header) }}" required>
                                @error('judul_header')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <label for="deskripsi_header" class="form-label">Deskripsi Header</label>
                                <textarea class="form-control @error('deskripsi_header') is-invalid @enderror" id="deskripsi_header" name="deskripsi_header" rows="4">{{ old('deskripsi_header', $setting->deskripsi_header) }}</textarea>
                                @error('deskripsi_header')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card border-left-info shadow h-100 py-2">
                <div class="card-body">
                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                        <i class="fas fa-image me-2"></i>Gambar Header
                    </div>
                    @if($setting->gambar_header_url)
                        <div class="mb-3">
                            <img src="{{ $setting->gambar_header_url }}" alt="Current Header Image" class="img-fluid rounded shadow" style="max-height: 200px; width: 100%; object-fit: cover;">
                        </div>
                    @endif
                    <div class="form-group mb-3">
                        <label for="gambar_header" class="form-label">Upload Gambar Header Baru</label>
                        <input type="file" class="form-control @error('gambar_header') is-invalid @enderror" id="gambar_header" name="gambar_header" accept="image/*">
                        @error('gambar_header')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                        <small class="form-text text-muted">Format yang didukung: JPEG, PNG, GIF. Maksimal 2MB.</small>
                    </div>
                    <div class="form-group mb-3">
                        <label for="video_url" class="form-label">URL Video (opsional)</label>
                        <input type="url" class="form-control @error('video_url') is-invalid @enderror" id="video_url" name="video_url" value="{{ old('video_url', $setting->video_url) }}">
                        @error('video_url')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <label for="kategori_tags" class="form-label">Kategori Tags (pisahkan dengan koma)</label>
                        <input type="text" class="form-control @error('kategori_tags') is-invalid @enderror" id="kategori_tags" name="kategori_tags" value="{{ old('kategori_tags', is_array($setting->kategori_tags) ? implode(', ', $setting->kategori_tags) : '') }}" placeholder="Unggul, Islami, Berprestasi">
                        @error('kategori_tags')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group mb-3">
                        <div class="form-check">
                            <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" {{ old('is_active', $setting->is_active) ? 'checked' : '' }}>
                            <label class="form-check-label" for="is_active">Aktifkan Halaman</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="text-center mt-4">
        <button type="submit" class="btn btn-primary">
            <i class="fas fa-save me-2"></i>Simpan Header
        </button>
    </div>
</form>
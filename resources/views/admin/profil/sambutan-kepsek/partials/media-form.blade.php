@if(isset($sambutan) && $sambutan)
<form action="{{ route('admin.profil.sambutan-kepsek.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <!-- Video URL -->
    <div class="form-section">
        <h5><i class="fas fa-video me-2"></i>Video URL</h5>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="video_url" class="font-weight-bold">URL Video <span class="text-danger">*</span></label>
                    <input type="url" class="form-control @error('video_url') is-invalid @enderror" 
                           id="video_url" name="video_url" 
                           value="{{ old('video_url', $sambutan->video_url ?? 'https://www.youtube-nocookie.com/embed/jP649ZHA8Tg') }}" required
                           placeholder="https://www.youtube-nocookie.com/embed/jP649ZHA8Tg">
                    @error('video_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">URL video yang akan ditampilkan di halaman sambutan. Gunakan format embed YouTube.</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Foto Kepsek -->
    <div class="form-section">
        <h5><i class="fas fa-image me-2"></i>Foto Kepala Sekolah</h5>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="foto_kepsek" class="font-weight-bold">Foto Utama</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('foto_kepsek') is-invalid @enderror" 
                               id="foto_kepsek" name="foto_kepsek" accept="image/*" data-preview="fotoKepsekPreview">
                        <label class="custom-file-label" for="foto_kepsek">Pilih file foto</label>
                    </div>
                    @error('foto_kepsek')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Format: JPG, JPEG, PNG, GIF. Maks: 2MB</small>
                </div>
                
                @if($sambutan->foto_kepsek)
                    <div class="form-group">
                        <label class="font-weight-bold">Foto Saat Ini</label>
                        <div class="mb-2">
                            <img src="{{ $sambutan->foto_kepsek_url }}" 
                                 alt="Foto Kepala Sekolah" class="img-thumbnail" style="max-height: 150px;">
                        </div>
                    </div>
                @endif
                
                <div class="form-group">
                    <label class="font-weight-bold">Preview Foto Baru</label>
                    <div class="logo-preview-container">
                        <img id="fotoKepsekPreview" src="#" alt="Preview Foto" class="logo-preview" 
                             style="display: none; max-height: 150px;">
                    </div>
                </div>
            </div>
            
            <div class="col-md-6">
                <div class="form-group">
                    <label for="foto_kepsek2" class="font-weight-bold">Foto Kedua</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('foto_kepsek2') is-invalid @enderror" 
                               id="foto_kepsek2" name="foto_kepsek2" accept="image/*" data-preview="fotoKepsek2Preview">
                        <label class="custom-file-label" for="foto_kepsek2">Pilih file foto</label>
                    </div>
                    @error('foto_kepsek2')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Format: JPG, JPEG, PNG, GIF. Maks: 2MB</small>
                </div>
                
                @if($sambutan->foto_kepsek2)
                    <div class="form-group">
                        <label class="font-weight-bold">Foto Saat Ini</label>
                        <div class="mb-2">
                            <img src="{{ $sambutan->foto_kepsek2_url }}" 
                                 alt="Foto Kepala Sekolah 2" class="img-thumbnail" style="max-height: 150px;">
                        </div>
                    </div>
                @endif
                
                <div class="form-group">
                    <label class="font-weight-bold">Preview Foto Baru</label>
                    <div class="logo-preview-container">
                        <img id="fotoKepsek2Preview" src="#" alt="Preview Foto 2" class="logo-preview" 
                             style="display: none; max-height: 150px;">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Preview Section -->
    <div class="form-section">
        <h5><i class="fas fa-eye me-2"></i>Preview Media</h5>
        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0"><i class="fas fa-video me-2"></i>Preview Video</h6>
                    </div>
                    <div class="card-body">
                        <div class="ratio ratio-16x9">
                            <iframe id="videoPreview" 
                                    src="{{ old('video_url', $sambutan->video_url ?? 'https://www.youtube-nocookie.com/embed/jP649ZHA8Tg') }}" 
                                    title="Video Preview" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen></iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0"><i class="fas fa-images me-2"></i>Preview Foto</h6>
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-6">
                                <h6>Foto Utama</h6>
                                <img id="fotoPreview1" src="{{ $sambutan->foto_kepsek_url }}" 
                                     alt="Foto Utama" class="img-fluid rounded" style="max-height: 120px;">
                            </div>
                            <div class="col-6">
                                <h6>Foto Kedua</h6>
                                <img id="fotoPreview2" src="{{ $sambutan->foto_kepsek2_url }}" 
                                     alt="Foto Kedua" class="img-fluid rounded" style="max-height: 120px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Information -->
    <div class="alert alert-info">
        <h6><i class="fas fa-info-circle me-2"></i>Informasi</h6>
        <ul class="mb-0 small">
            <li>Video URL harus menggunakan format embed YouTube</li>
            <li>Foto utama akan ditampilkan sebagai foto utama kepala sekolah</li>
            <li>Foto kedua akan ditampilkan sebagai foto tambahan</li>
            <li>Semua media akan ditampilkan di halaman sambutan</li>
        </ul>
    </div>

    <div class="form-group mb-0">
        <button type="submit" class="btn btn-success">
            <i class="fas fa-save me-2"></i>
            Simpan Media
        </button>
    </div>
</form>

<script>
// Live preview for video URL
document.getElementById('video_url').addEventListener('input', function() {
    document.getElementById('videoPreview').src = this.value;
});

// Image preview functionality
document.getElementById('foto_kepsek').addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('fotoKepsekPreview').src = e.target.result;
            document.getElementById('fotoKepsekPreview').style.display = 'block';
            document.getElementById('fotoPreview1').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
});

document.getElementById('foto_kepsek2').addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            document.getElementById('fotoKepsek2Preview').src = e.target.result;
            document.getElementById('fotoKepsek2Preview').style.display = 'block';
            document.getElementById('fotoPreview2').src = e.target.result;
        }
        reader.readAsDataURL(file);
    }
});
</script>
@else
<div class="text-center py-5">
    <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
    <h5>Data tidak tersedia</h5>
    <p class="text-muted">Data sambutan kepala sekolah tidak dapat dimuat.</p>
</div>
@endif 
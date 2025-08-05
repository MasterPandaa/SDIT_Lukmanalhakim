@if(isset($sambutanKepsek) && $sambutanKepsek)
<form action="{{ route('admin.sambutan-kepsek.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <!-- Media Content -->
    <div class="form-section">
        <h5><i class="fas fa-images me-2"></i>Konten Media</h5>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="video_url" class="font-weight-bold">URL Video Sambutan</label>
                    <input type="url" class="form-control @error('video_url') is-invalid @enderror" 
                           id="video_url" name="video_url" 
                           value="{{ old('video_url', $sambutanKepsek->video_url ?? 'https://www.youtube-nocookie.com/embed/jP649ZHA8Tg') }}"
                           placeholder="https://www.youtube-nocookie.com/embed/VIDEO_ID">
                    @error('video_url')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">URL video YouTube yang akan ditampilkan di halaman sambutan</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tahun_berdiri" class="font-weight-bold">Tahun Berdiri <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('tahun_berdiri') is-invalid @enderror" 
                           id="tahun_berdiri" name="tahun_berdiri" 
                           value="{{ old('tahun_berdiri', $sambutanKepsek->tahun_berdiri ?? 11) }}"
                           placeholder="11" min="1" max="100" required>
                    @error('tahun_berdiri')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Jumlah tahun sekolah telah berdiri</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Photo Upload -->
    <div class="form-section">
        <h5><i class="fas fa-user me-2"></i>Foto Kepala Sekolah</h5>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="foto_kepsek" class="font-weight-bold">Upload Foto Kepala Sekolah</label>
                    <div class="custom-file">
                        <input type="file" class="custom-file-input @error('foto_kepsek') is-invalid @enderror" 
                               id="foto_kepsek" name="foto_kepsek" accept="image/*">
                        <label class="custom-file-label" for="foto_kepsek">Pilih file gambar</label>
                    </div>
                    @error('foto_kepsek')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Format: JPG, JPEG, PNG, GIF. Maks: 2MB</small>
                </div>
            </div>
            
            @if($sambutanKepsek->foto_kepsek)
                <div class="col-md-12">
                    <div class="form-group">
                        <label class="font-weight-bold">Foto Saat Ini</label>
                        <div class="mb-2">
                            @php
                                $imagePath = 'assets/images/sambutan-kepsek/' . $sambutanKepsek->foto_kepsek;
                                $imageExists = file_exists(public_path($imagePath));
                            @endphp
                            @if($imageExists)
                                <img src="{{ asset($imagePath) }}" 
                                     alt="Foto Kepala Sekolah" class="img-thumbnail" style="max-height: 150px;">
                            @else
                                <div class="alert alert-warning">
                                    <i class="fas fa-exclamation-triangle me-2"></i>
                                    <strong>Peringatan!</strong> File gambar tidak ditemukan di server.
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endif
            
            <div class="col-md-12 mb-4">
                <div class="form-group">
                    <label class="font-weight-bold">Preview Foto Baru</label>
                    <div class="logo-preview-container">
                        <img id="imagePreview" src="#" alt="Preview Foto" class="logo-preview" 
                             style="display: none;">
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
                        <h6 class="mb-0"><i class="fas fa-video me-2"></i>Video Sambutan</h6>
                    </div>
                    <div class="card-body">
                        <div id="videoPreview">
                            <iframe id="videoPreviewFrame" 
                                    src="{{ old('video_url', $sambutanKepsek->video_url ?? 'https://www.youtube-nocookie.com/embed/jP649ZHA8Tg') }}" 
                                    width="100%" height="200" 
                                    frameborder="0" 
                                    allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" 
                                    allowfullscreen>
                            </iframe>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0"><i class="fas fa-user me-2"></i>Foto Kepala Sekolah</h6>
                    </div>
                    <div class="card-body">
                        <div id="photoPreview">
                            @if($sambutanKepsek->foto_kepsek)
                                @php
                                    $imagePath = 'assets/images/sambutan-kepsek/' . $sambutanKepsek->foto_kepsek;
                                    $imageExists = file_exists(public_path($imagePath));
                                @endphp
                                @if($imageExists)
                                    <img src="{{ asset($imagePath) }}" 
                                         alt="Foto Kepala Sekolah" class="img-fluid" style="max-height: 200px;">
                                @else
                                    <div class="text-center text-muted">
                                        <i class="fas fa-user fa-3x mb-2"></i>
                                        <p>Foto tidak tersedia</p>
                                    </div>
                                @endif
                            @else
                                <div class="text-center text-muted">
                                    <i class="fas fa-user fa-3x mb-2"></i>
                                    <p>Foto tidak tersedia</p>
                                </div>
                            @endif
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
            <li>Video akan ditampilkan dalam iframe YouTube</li>
            <li>Foto kepala sekolah akan ditampilkan di sebelah konten sambutan</li>
            <li>Tahun berdiri akan ditampilkan sebagai informasi tambahan</li>
            <li>Format video: https://www.youtube-nocookie.com/embed/VIDEO_ID</li>
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
    document.getElementById('videoPreviewFrame').src = this.value;
});

// Live preview for photo
document.getElementById('foto_kepsek').addEventListener('change', function() {
    const file = this.files[0];
    if (file) {
        const reader = new FileReader();
        reader.onload = function(e) {
            const preview = document.getElementById('imagePreview');
            preview.src = e.target.result;
            preview.style.display = 'block';
        };
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
<form action="{{ route('admin.profil.indikator-kelulusan.update') }}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    
    <div class="form-section">
        <h5><i class="fas fa-image me-2"></i>Gambar Header</h5>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="gambar_header" class="form-label">Upload Gambar Header</label>
                    <input type="file" class="form-control" id="gambar_header" name="gambar_header" accept="image/*">
                    <small class="form-text text-muted">Format: JPG, PNG, GIF. Maksimal 2MB. Ukuran optimal: 1200x600px</small>
                </div>
            </div>
            <div class="col-md-6">
                @if($indikatorKelulusan->gambar_header)
                    <div class="image-preview-container">
                        <label class="form-label">Preview Gambar Saat Ini</label>
                        <div>
                            <img src="{{ $indikatorKelulusan->gambar_header_url }}" alt="Header Image" class="image-preview" id="currentHeaderImage">
                        </div>
                    </div>
                @endif
                <div class="image-preview-container" id="newHeaderImageContainer" style="display: none;">
                    <label class="form-label">Preview Gambar Baru</label>
                    <div>
                        <img src="" alt="New Header Image" class="image-preview" id="headerImagePreview">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-section">
        <h5><i class="fas fa-heading me-2"></i>Konten Header</h5>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="judul_header" class="form-label">Judul Header</label>
                    <input type="text" class="form-control" id="judul_header" name="judul_header" 
                           value="{{ old('judul_header', $indikatorKelulusan->judul_header) }}" 
                           placeholder="Target sekolah untuk menghafal 10 juz Al-Qur'an menjadi motivasi bagi orang tua.">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="judul_utama" class="form-label">Judul Utama</label>
                    <input type="text" class="form-control" id="judul_utama" name="judul_utama" 
                           value="{{ old('judul_utama', $indikatorKelulusan->judul_utama) }}" 
                           placeholder="100 indikator Kelulusan">
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="kategori_tags" class="form-label">Kategori Tags (pisahkan dengan koma)</label>
            <input type="text" class="form-control" id="kategori_tags" name="kategori_tags" 
                   value="{{ old('kategori_tags', is_array($indikatorKelulusan->kategori_tags) ? implode(', ', $indikatorKelulusan->kategori_tags) : $indikatorKelulusan->kategori_tags) }}" 
                   placeholder="Pendidikan, Karakter, Akademik">
            <small class="form-text text-muted">Pisahkan setiap tag dengan koma. Contoh: Pendidikan, Karakter, Akademik</small>
        </div>

        <div class="form-group">
            <label for="video_url" class="form-label">URL Video (Opsional)</label>
            <input type="url" class="form-control" id="video_url" name="video_url" 
                   value="{{ old('video_url', $indikatorKelulusan->video_url) }}" 
                   placeholder="https://www.youtube.com/watch?v=...">
            <small class="form-text text-muted">URL video YouTube atau platform lainnya untuk ditampilkan di header</small>
        </div>
    </div>

    <div class="form-section">
        <h5><i class="fas fa-user me-2"></i>Informasi Pembicara</h5>
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="nama_pembicara" class="form-label">Nama Pembicara</label>
                    <input type="text" class="form-control" id="nama_pembicara" name="nama_pembicara" 
                           value="{{ old('nama_pembicara', $indikatorKelulusan->nama_pembicara) }}" 
                           placeholder="Dr. Ahmad Suryadi, M.Pd">
                </div>
                
                <div class="form-group">
                    <label for="foto_pembicara" class="form-label">Foto Pembicara</label>
                    <input type="file" class="form-control" id="foto_pembicara" name="foto_pembicara" accept="image/*">
                    <small class="form-text text-muted">Format: JPG, PNG. Maksimal 1MB. Ukuran optimal: 300x300px</small>
                </div>
            </div>
            <div class="col-md-6">
                @if($indikatorKelulusan->foto_pembicara)
                    <div class="image-preview-container">
                        <label class="form-label">Foto Pembicara Saat Ini</label>
                        <div>
                            <img src="{{ $indikatorKelulusan->foto_pembicara_url }}" alt="Foto Pembicara" class="image-preview" id="currentFotoPembicara">
                        </div>
                    </div>
                @endif
                <div class="image-preview-container" id="newFotoPembicaraContainer" style="display: none;">
                    <label class="form-label">Preview Foto Pembicara Baru</label>
                    <div>
                        <img src="" alt="New Foto Pembicara" class="image-preview" id="fotoPembicaraPreview">
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="form-group">
        <button type="submit" class="btn btn-success">
            <i class="fas fa-save me-2"></i>Simpan Perubahan Header
        </button>
        <button type="reset" class="btn btn-secondary">
            <i class="fas fa-undo me-2"></i>Reset
        </button>
    </div>
</form>

<script>
document.addEventListener('DOMContentLoaded', function() {
    // Header image preview
    document.getElementById('gambar_header').addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('headerImagePreview').src = e.target.result;
                document.getElementById('newHeaderImageContainer').style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });

    // Foto pembicara preview
    document.getElementById('foto_pembicara').addEventListener('change', function() {
        const file = this.files[0];
        if (file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                document.getElementById('fotoPembicaraPreview').src = e.target.result;
                document.getElementById('newFotoPembicaraContainer').style.display = 'block';
            }
            reader.readAsDataURL(file);
        }
    });
});
</script>
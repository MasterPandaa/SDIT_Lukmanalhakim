@if(isset($visiMisi) && $visiMisi)
<form action="{{ route('admin.profil.visi-misi.update') }}" method="POST">
    @csrf
    @method('PUT')
    
    <!-- Visi Content -->
    <div class="form-section">
        <h5><i class="fas fa-bullseye me-2"></i>Konten Visi</h5>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="visi" class="font-weight-bold">Visi Sekolah <span class="text-danger">*</span></label>
                    <textarea class="form-control @error('visi') is-invalid @enderror" 
                              id="visi" name="visi" rows="6" required
                              placeholder="Terwujudnya Generasi Unggul yang Qur'ani, Berakhlaq Mulia, Berprestasi, Peduli, Berbudaya Lingkungan, dan Berwawasan Global.​">{{ old('visi', $visiMisi->visi ?? 'Terwujudnya Generasi Unggul yang Qur\'ani, Berakhlaq Mulia, Berprestasi, Peduli, Berbudaya Lingkungan, dan Berwawasan Global.​') }}</textarea>
                    @error('visi')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Visi sekolah yang akan ditampilkan di halaman visi misi</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Information -->
    <div class="alert alert-info">
        <h6><i class="fas fa-info-circle me-2"></i>Informasi</h6>
        <ul class="mb-0 small">
            <li>Visi sekolah akan ditampilkan sebagai heading utama di section visi</li>
            <li>Gunakan format yang jelas dan mudah dibaca</li>
            <li>Visi akan ditampilkan dengan styling yang sesuai dengan tema website</li>
        </ul>
    </div>

    <div class="form-group mb-0">
        <button type="submit" class="btn btn-success">
            <i class="fas fa-save me-2"></i>
            Simpan Visi
        </button>
    </div>
</form>
@else
<div class="text-center py-5">
    <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
    <h5>Data tidak tersedia</h5>
    <p class="text-muted">Data visi misi tidak dapat dimuat.</p>
</div>
@endif

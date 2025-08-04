@if(isset($sambutan) && $sambutan)
<form action="{{ route('admin.profil.sambutan-kepsek.update') }}" method="POST">
    @csrf
    @method('PUT')
    
    <!-- Header Content -->
    <div class="form-section">
        <h5><i class="fas fa-heading me-2"></i>Konten Header</h5>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="judul" class="font-weight-bold">Judul Utama <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('judul') is-invalid @enderror" 
                           id="judul" name="judul" 
                           value="{{ old('judul', $sambutan->judul ?? 'Mewujudkan Generasi Unggul Berakhlak Mulia') }}" required
                           placeholder="Mewujudkan Generasi Unggul Berakhlak Mulia">
                    @error('judul')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Judul utama yang akan ditampilkan di halaman sambutan</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="subtitle" class="font-weight-bold">Subtitle <span class="text-danger">*</span></label>
                    <input type="text" class="form-control @error('subtitle') is-invalid @enderror" 
                           id="subtitle" name="subtitle" 
                           value="{{ old('subtitle', $sambutan->subtitle ?? 'Cerdas, Berakhlak, Menginspirasi') }}" required
                           placeholder="Cerdas, Berakhlak, Menginspirasi">
                    @error('subtitle')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Subtitle yang akan ditampilkan di bawah judul utama</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Tahun Berdiri -->
    <div class="form-section">
        <h5><i class="fas fa-calendar me-2"></i>Informasi Sekolah</h5>
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="tahun_berdiri" class="font-weight-bold">Lama Sekolah Berdiri <span class="text-danger">*</span></label>
                    <input type="number" class="form-control @error('tahun_berdiri') is-invalid @enderror" 
                           id="tahun_berdiri" name="tahun_berdiri" 
                           value="{{ old('tahun_berdiri', $sambutan->tahun_berdiri ?? 11) }}" required
                           min="1" max="100" placeholder="11">
                    @error('tahun_berdiri')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    <small class="form-text text-muted">Berapa lama sekolah telah berdiri (dalam tahun)</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Preview Section -->
    <div class="form-section">
        <h5><i class="fas fa-eye me-2"></i>Preview Header</h5>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h6 class="mb-0"><i class="fas fa-heading me-2"></i>Preview Header</h6>
                    </div>
                    <div class="card-body">
                        <div id="headerPreview" class="text-center">
                            <span class="subtitle yellow-color" id="subtitlePreview">
                                {{ old('subtitle', $sambutan->subtitle ?? 'Cerdas, Berakhlak, Menginspirasi') }}
                            </span>
                            <h2 class="title" id="judulPreview">
                                {{ old('judul', $sambutan->judul ?? 'Mewujudkan Generasi Unggul Berakhlak Mulia') }}
                            </h2>
                            <div class="about-left-content">
                                <h3 id="tahunPreview">{{ old('tahun_berdiri', $sambutan->tahun_berdiri ?? 11) }} Th</h3>
                                <p>eLHaeS Berdiri</p>
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
            <li>Judul utama akan ditampilkan sebagai heading utama di halaman sambutan</li>
            <li>Subtitle akan ditampilkan di bawah judul utama</li>
            <li>Lama sekolah berdiri akan ditampilkan sebagai informasi berapa tahun sekolah telah berdiri</li>
            <li>Semua field ini akan ditampilkan di section header halaman sambutan</li>
        </ul>
    </div>

    <div class="form-group mb-0">
        <button type="submit" class="btn btn-success">
            <i class="fas fa-save me-2"></i>
            Simpan Header
        </button>
    </div>
</form>

<script>
// Live preview for header
document.getElementById('judul').addEventListener('input', function() {
    document.getElementById('judulPreview').textContent = this.value;
});

document.getElementById('subtitle').addEventListener('input', function() {
    document.getElementById('subtitlePreview').textContent = this.value;
});

document.getElementById('tahun_berdiri').addEventListener('input', function() {
    document.getElementById('tahunPreview').textContent = this.value + ' Th';
});
</script>
@else
<div class="text-center py-5">
    <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
    <h5>Data tidak tersedia</h5>
    <p class="text-muted">Data sambutan kepala sekolah tidak dapat dimuat.</p>
</div>
@endif 
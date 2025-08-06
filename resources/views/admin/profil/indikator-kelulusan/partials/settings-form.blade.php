<div class="row">
    <div class="col-md-8">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-3">
                    <i class="fas fa-info-circle me-2"></i>Informasi Pengaturan Indikator Kelulusan
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="text-sm font-weight-bold">Judul Utama:</label>
                            <p class="mb-1">{{ $setting->judul_utama ?? 'Belum diatur' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="text-sm font-weight-bold">Judul Header:</label>
                            <p class="mb-1">{{ $setting->judul_header ?? 'Belum diatur' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="text-sm font-weight-bold">Total Kategori:</label>
                            <p class="mb-1">{{ isset($kategoris) ? count($kategoris) : 0 }} kategori</p>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="text-sm font-weight-bold">Tags:</label>
                            <p class="mb-1">{{ is_array($setting->kategori_tags) ? implode(', ', $setting->kategori_tags) : '-' }}</p>
                        </div>
                        <div class="mb-3">
                            <label class="text-sm font-weight-bold">Terakhir Diperbarui:</label>
                            <p class="mb-1">{{ $setting->updated_at ? $setting->updated_at->format('d M Y, H:i') : 'Belum pernah' }}</p>
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <label class="text-sm font-weight-bold">Deskripsi Header:</label>
                    <p class="mb-1">{{ $setting->deskripsi_header ?? 'Belum diatur' }}</p>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card border-left-{{ $setting->is_active ? 'success' : 'danger' }} shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-{{ $setting->is_active ? 'success' : 'danger' }} text-uppercase mb-3">
                    <i class="fas fa-{{ $setting->is_active ? 'check-circle' : 'times-circle' }} me-2"></i>Status Halaman
                </div>
                <div class="text-center mb-4">
                    <div class="mb-3">
                        <span class="badge badge-{{ $setting->is_active ? 'success' : 'danger' }} badge-lg">
                            {{ $setting->is_active ? 'AKTIF' : 'NON-AKTIF' }}
                        </span>
                    </div>
                    <p class="text-muted small">
                        @if($setting->is_active)
                            Halaman indikator kelulusan sedang ditampilkan di halaman publik
                        @else
                            Halaman indikator kelulusan tidak ditampilkan di halaman publik
                        @endif
                    </p>
                </div>
                <form action="{{ route('admin.indikator-kelulusan.update-settings') }}" method="POST">
                    @csrf
                    @method('PUT')
                    <input type="hidden" name="judul_utama" value="{{ $setting->judul_utama }}">
                    <input type="hidden" name="judul_header" value="{{ $setting->judul_header }}">
                    <input type="hidden" name="deskripsi_header" value="{{ $setting->deskripsi_header }}">
                    <input type="hidden" name="kategori_tags" value="{{ is_array($setting->kategori_tags) ? implode(', ', $setting->kategori_tags) : '' }}">
                    <input type="hidden" name="is_active" value="{{ $setting->is_active ? 0 : 1 }}">
                    <div class="text-center">
                        <button type="submit" class="btn btn-{{ $setting->is_active ? 'danger' : 'success' }} btn-sm" onclick="return confirm('Yakin ingin {{ $setting->is_active ? 'menonaktifkan' : 'mengaktifkan' }} halaman?')">
                            <i class="fas fa-{{ $setting->is_active ? 'times' : 'check' }} me-2"></i>
                            {{ $setting->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
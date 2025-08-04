@if(isset($visiMisi) && $visiMisi)
<!-- Status Settings -->
<div class="form-section">
    <h5><i class="fas fa-toggle-on me-2"></i>Status Konten</h5>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0"><i class="fas fa-info-circle me-2"></i>Status Saat Ini</h6>
                </div>
                <div class="card-body">
                    <div class="d-flex align-items-center">
                        @if($visiMisi->is_active)
                            <div class="badge badge-success badge-lg me-3">
                                <i class="fas fa-check-circle me-2"></i>Aktif
                            </div>
                            <p class="mb-0 text-success">Konten visi misi sedang ditampilkan di halaman publik</p>
                        @else
                            <div class="badge badge-danger badge-lg me-3">
                                <i class="fas fa-times-circle me-2"></i>Nonaktif
                            </div>
                            <p class="mb-0 text-danger">Konten visi misi tidak ditampilkan di halaman publik</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0"><i class="fas fa-cogs me-2"></i>Aksi</h6>
                </div>
                <div class="card-body">
                    <div class="d-grid gap-2">
                        @if($visiMisi->is_active)
                            <a href="{{ route('admin.profil.visi-misi.toggle') }}" 
                               class="btn btn-warning"
                               onclick="return confirm('Apakah Anda yakin ingin menonaktifkan konten visi misi?')">
                                <i class="fas fa-eye-slash me-2"></i>Nonaktifkan Konten
                            </a>
                        @else
                            <a href="{{ route('admin.profil.visi-misi.toggle') }}" 
                               class="btn btn-success"
                               onclick="return confirm('Apakah Anda yakin ingin mengaktifkan konten visi misi?')">
                                <i class="fas fa-eye me-2"></i>Aktifkan Konten
                            </a>
                        @endif
                        <a href="{{ route('visi-misi') }}" target="_blank" class="btn btn-info">
                            <i class="fas fa-external-link-alt me-2"></i>Lihat Halaman Publik
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Content Information -->
<div class="form-section">
    <h5><i class="fas fa-chart-bar me-2"></i>Informasi Konten</h5>
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0"><i class="fas fa-file-alt me-2"></i>Detail Konten</h6>
                </div>
                <div class="card-body">
                    <table class="table table-sm">
                        <tbody>
                            <tr>
                                <td><strong>Judul Header:</strong></td>
                                <td>{{ $visiMisi->judul_header ?? 'Belum diisi' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Deskripsi Header:</strong></td>
                                <td>{{ Str::limit($visiMisi->deskripsi_header ?? 'Belum diisi', 50) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Visi:</strong></td>
                                <td>{{ Str::limit($visiMisi->visi ?? 'Belum diisi', 50) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Jumlah Misi:</strong></td>
                                <td>{{ isset($visiMisi->misi_items) ? count($visiMisi->misi_items) : 0 }} item</td>
                            </tr>
                            <tr>
                                <td><strong>Gambar Header:</strong></td>
                                <td>
                                    @if($visiMisi->gambar_header)
                                        <span class="badge badge-success">Ada</span>
                                    @else
                                        <span class="badge badge-warning">Tidak ada</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Terakhir Diupdate:</strong></td>
                                <td>{{ $visiMisi->updated_at ? $visiMisi->updated_at->format('d/m/Y H:i') : 'Belum pernah' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0"><i class="fas fa-list me-2"></i>Daftar Misi</h6>
                </div>
                <div class="card-body">
                    @if(isset($visiMisi->misi_items) && is_array($visiMisi->misi_items))
                        <div class="list-group list-group-flush">
                            @foreach($visiMisi->misi_items as $index => $item)
                                <div class="list-group-item d-flex align-items-center">
                                    <div class="me-3">
                                        <i class="{{ $item['icon'] ?? 'icofont-credit-card' }} text-success"></i>
                                    </div>
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1">{{ $item['judul'] ?? 'Judul tidak ada' }}</h6>
                                        <small class="text-muted">{{ Str::limit($item['deskripsi'] ?? 'Deskripsi tidak ada', 80) }}</small>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    @else
                        <div class="text-center py-3">
                            <i class="fas fa-exclamation-triangle fa-2x text-warning mb-2"></i>
                            <p class="text-muted mb-0">Tidak ada data misi</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="form-section">
    <h5><i class="fas fa-bolt me-2"></i>Aksi Cepat</h5>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-3">
                            <a href="#header" class="btn btn-outline-primary w-100 mb-2" data-bs-toggle="tab">
                                <i class="fas fa-heading me-2"></i>Edit Header
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="#visi" class="btn btn-outline-success w-100 mb-2" data-bs-toggle="tab">
                                <i class="fas fa-bullseye me-2"></i>Edit Visi
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="#misi" class="btn btn-outline-info w-100 mb-2" data-bs-toggle="tab">
                                <i class="fas fa-list me-2"></i>Edit Misi
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('visi-misi') }}" target="_blank" class="btn btn-outline-secondary w-100 mb-2">
                                <i class="fas fa-eye me-2"></i>Preview
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Information -->
<div class="alert alert-info">
    <h6><i class="fas fa-info-circle me-2"></i>Informasi Pengaturan</h6>
    <ul class="mb-0 small">
        <li>Status aktif/nonaktif mengontrol apakah konten ditampilkan di halaman publik</li>
        <li>Konten yang nonaktif akan tetap tersimpan di database</li>
        <li>Gunakan tombol toggle untuk mengubah status konten</li>
        <li>Informasi konten menampilkan ringkasan data yang tersimpan</li>
        <li>Aksi cepat memudahkan navigasi ke section tertentu</li>
    </ul>
</div>
@else
<div class="text-center py-5">
    <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
    <h5>Data tidak tersedia</h5>
    <p class="text-muted">Data visi misi tidak dapat dimuat.</p>
</div>
@endif 
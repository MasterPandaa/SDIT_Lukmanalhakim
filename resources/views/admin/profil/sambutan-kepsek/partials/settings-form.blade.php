@if(isset($sambutan) && $sambutan)
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
                                <td><strong>Judul:</strong></td>
                                <td>{{ $sambutan->judul ?? 'Belum diisi' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Subtitle:</strong></td>
                                <td>{{ $sambutan->subtitle ?? 'Belum diisi' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Tahun Berdiri:</strong></td>
                                <td>{{ $sambutan->tahun_berdiri ?? 'Belum diisi' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Sambutan:</strong></td>
                                <td>{{ Str::limit(strip_tags($sambutan->sambutan ?? 'Belum diisi'), 50) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Video URL:</strong></td>
                                <td>
                                    @if($sambutan->video_url)
                                        <span class="badge badge-success">Ada</span>
                                    @else
                                        <span class="badge badge-warning">Tidak ada</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Foto Utama:</strong></td>
                                <td>
                                    @if($sambutan->foto_kepsek)
                                        <span class="badge badge-success">Ada</span>
                                    @else
                                        <span class="badge badge-warning">Tidak ada</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Foto Kedua:</strong></td>
                                <td>
                                    @if($sambutan->foto_kepsek2)
                                        <span class="badge badge-success">Ada</span>
                                    @else
                                        <span class="badge badge-warning">Tidak ada</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Terakhir Diupdate:</strong></td>
                                <td>{{ $sambutan->updated_at ? $sambutan->updated_at->format('d/m/Y H:i') : 'Belum pernah' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0"><i class="fas fa-eye me-2"></i>Preview Konten</h6>
                </div>
                <div class="card-body">
                    <div class="text-center">
                        <h6>Header</h6>
                        <p class="text-muted mb-2">{{ $sambutan->subtitle ?? 'Subtitle' }}</p>
                        <h5 class="mb-3">{{ $sambutan->judul ?? 'Judul' }}</h5>
                        
                        <h6>Media</h6>
                        <div class="row">
                            <div class="col-6">
                                <small>Foto Utama</small>
                                @if($sambutan->foto_kepsek)
                                    <img src="{{ $sambutan->foto_kepsek_url }}" 
                                         alt="Foto Utama" class="img-fluid rounded" style="max-height: 80px;">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 80px;">
                                        <small class="text-muted">Tidak ada foto</small>
                                    </div>
                                @endif
                            </div>
                            <div class="col-6">
                                <small>Foto Kedua</small>
                                @if($sambutan->foto_kepsek2)
                                    <img src="{{ $sambutan->foto_kepsek2_url }}" 
                                         alt="Foto Kedua" class="img-fluid rounded" style="max-height: 80px;">
                                @else
                                    <div class="bg-light rounded d-flex align-items-center justify-content-center" style="height: 80px;">
                                        <small class="text-muted">Tidak ada foto</small>
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
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
                            <a href="#content" class="btn btn-outline-success w-100 mb-2" data-bs-toggle="tab">
                                <i class="fas fa-file-alt me-2"></i>Edit Sambutan
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="#media" class="btn btn-outline-info w-100 mb-2" data-bs-toggle="tab">
                                <i class="fas fa-images me-2"></i>Edit Media
                            </a>
                        </div>
                        <div class="col-md-3">
                            <a href="{{ route('sambutan-kepsek') }}" target="_blank" class="btn btn-outline-secondary w-100 mb-2">
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
        <li>Informasi konten menampilkan ringkasan data yang tersimpan</li>
        <li>Preview konten menunjukkan tampilan yang akan muncul di halaman publik</li>
        <li>Aksi cepat memudahkan navigasi ke section tertentu</li>
        <li>Semua perubahan akan langsung terlihat di halaman publik</li>
        <li>Pastikan semua field penting sudah diisi sebelum menyimpan</li>
    </ul>
</div>
@else
<div class="text-center py-5">
    <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
    <h5>Data tidak tersedia</h5>
    <p class="text-muted">Data sambutan kepala sekolah tidak dapat dimuat.</p>
</div>
@endif 
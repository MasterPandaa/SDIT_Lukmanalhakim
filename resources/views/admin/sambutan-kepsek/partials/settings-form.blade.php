@if(isset($sambutanKepsek) && $sambutanKepsek)
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
                        @if($sambutanKepsek->is_active)
                            <div class="badge badge-success badge-lg me-3">
                                <i class="fas fa-check-circle me-2"></i>Aktif
                            </div>
                            <p class="mb-0 text-success">Konten sambutan kepala sekolah sedang ditampilkan di halaman publik</p>
                        @else
                            <div class="badge badge-danger badge-lg me-3">
                                <i class="fas fa-times-circle me-2"></i>Nonaktif
                            </div>
                            <p class="mb-0 text-danger">Konten sambutan kepala sekolah tidak ditampilkan di halaman publik</p>
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
                        @if($sambutanKepsek->is_active)
                            <a href="{{ route('admin.sambutan-kepsek.toggle') }}" 
                               class="btn btn-warning"
                               onclick="return confirm('Apakah Anda yakin ingin menonaktifkan konten sambutan kepala sekolah?')">
                                <i class="fas fa-eye-slash me-2"></i>Nonaktifkan Konten
                            </a>
                        @else
                            <a href="{{ route('admin.sambutan-kepsek.toggle') }}" 
                               class="btn btn-success"
                               onclick="return confirm('Apakah Anda yakin ingin mengaktifkan konten sambutan kepala sekolah?')">
                                <i class="fas fa-eye me-2"></i>Aktifkan Konten
                            </a>
                        @endif
                        <a href="{{ route('sambutan-kepsek') }}" target="_blank" class="btn btn-info">
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
                                <td>{{ $sambutanKepsek->judul_header ?? 'Belum diisi' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Deskripsi Header:</strong></td>
                                <td>{{ Str::limit($sambutanKepsek->deskripsi_header ?? 'Belum diisi', 50) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Sambutan:</strong></td>
                                <td>{{ Str::limit($sambutanKepsek->sambutan ?? 'Belum diisi', 50) }}</td>
                            </tr>
                            <tr>
                                <td><strong>Video URL:</strong></td>
                                <td>
                                    @if($sambutanKepsek->video_url)
                                        <span class="badge badge-success">Ada</span>
                                    @else
                                        <span class="badge badge-warning">Tidak ada</span>
                                    @endif
                                </td>
                            </tr>
                            <tr>
                                <td><strong>Tahun Berdiri:</strong></td>
                                <td>{{ $sambutanKepsek->tahun_berdiri ?? 'Belum diisi' }}</td>
                            </tr>
                            <tr>
                                <td><strong>Terakhir Diupdate:</strong></td>
                                <td>{{ $sambutanKepsek->updated_at ? $sambutanKepsek->updated_at->format('d/m/Y H:i') : 'Belum pernah' }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">
                    <h6 class="mb-0"><i class="fas fa-images me-2"></i>Media</h6>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-12 mb-3">
                            <h6>Gambar Header</h6>
                            @if($sambutanKepsek->gambar_header)
                                @php
                                    $imagePath = 'assets/images/sambutan-kepsek/' . $sambutanKepsek->gambar_header;
                                    $imageExists = file_exists(public_path($imagePath));
                                @endphp
                                @if($imageExists)
                                    <img src="{{ asset($imagePath) }}" 
                                         alt="Gambar Header" class="img-thumbnail" style="max-height: 80px;">
                                    <p class="small text-success mt-1 mb-0">
                                        <i class="fas fa-check-circle me-1"></i>Tersedia
                                    </p>
                                @else
                                    <div class="alert alert-warning small py-2 mb-0">
                                        <i class="fas fa-exclamation-triangle me-1"></i>File tidak ditemukan
                                    </div>
                                @endif
                            @else
                                <p class="small text-muted mb-0">
                                    <i class="fas fa-times-circle me-1"></i>Tidak ada gambar
                                </p>
                            @endif
                        </div>
                        <div class="col-12">
                            <h6>Foto Kepala Sekolah</h6>
                            @if($sambutanKepsek->foto_kepsek)
                                @php
                                    $imagePath = 'assets/images/sambutan-kepsek/' . $sambutanKepsek->foto_kepsek;
                                    $imageExists = file_exists(public_path($imagePath));
                                @endphp
                                @if($imageExists)
                                    <img src="{{ asset($imagePath) }}" 
                                         alt="Foto Kepala Sekolah" class="img-thumbnail" style="max-height: 80px;">
                                    <p class="small text-success mt-1 mb-0">
                                        <i class="fas fa-check-circle me-1"></i>Tersedia
                                    </p>
                                @else
                                    <div class="alert alert-warning small py-2 mb-0">
                                        <i class="fas fa-exclamation-triangle me-1"></i>File tidak ditemukan
                                    </div>
                                @endif
                            @else
                                <p class="small text-muted mb-0">
                                    <i class="fas fa-times-circle me-1"></i>Tidak ada foto
                                </p>
                            @endif
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
                        <div class="col-md-4">
                            <a href="#header" class="btn btn-outline-primary w-100 mb-2" data-bs-toggle="tab">
                                <i class="fas fa-heading me-2"></i>Edit Header
                            </a>
                        </div>
                        <div class="col-md-4">
                            <a href="#sambutan" class="btn btn-outline-success w-100 mb-2" data-bs-toggle="tab">
                                <i class="fas fa-comments me-2"></i>Edit Sambutan
                            </a>
                        </div>
                        <div class="col-md-4">
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
        <li>Status aktif/nonaktif mengontrol apakah konten ditampilkan di halaman publik</li>
        <li>Konten yang nonaktif akan tetap tersimpan di database</li>
        <li>Gunakan tombol toggle untuk mengubah status konten</li>
        <li>Informasi konten menampilkan ringkasan data yang tersimpan</li>
        <li>Aksi cepat memudahkan navigasi ke section tertentu</li>
        <li>Media menampilkan status gambar dan foto yang diupload</li>
    </ul>
</div>
@else
<div class="text-center py-5">
    <i class="fas fa-exclamation-triangle fa-3x text-warning mb-3"></i>
    <h5>Data tidak tersedia</h5>
    <p class="text-muted">Data sambutan kepala sekolah tidak dapat dimuat.</p>
</div>
@endif
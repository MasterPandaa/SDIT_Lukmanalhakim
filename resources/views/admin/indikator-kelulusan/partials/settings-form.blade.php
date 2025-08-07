@if(isset($indikatorKelulusan) && $indikatorKelulusan)
<!-- Status Settings -->
<div class="form-section">
    <h5><i class="fas fa-toggle-on me-2"></i>Status Halaman</h5>
    <div class="row">
        <div class="col-md-8">
            <div class="d-flex align-items-center">
                <div class="me-3">
                    @if($indikatorKelulusan->is_active)
                        <div class="badge badge-success badge-lg me-3">
                            <i class="fas fa-check-circle me-1"></i>
                            Halaman Aktif
                        </div>
                    @else
                        <div class="badge badge-secondary badge-lg me-3">
                            <i class="fas fa-times-circle me-1"></i>
                            Halaman Nonaktif
                        </div>
                    @endif
                </div>
                <div>
                    <p class="mb-0">
                        Status halaman saat ini: 
                        <strong>{{ $indikatorKelulusan->is_active ? 'Aktif' : 'Nonaktif' }}</strong>
                    </p>
                    <small class="text-muted">
                        {{ $indikatorKelulusan->is_active ? 'Halaman dapat diakses oleh pengunjung' : 'Halaman tidak dapat diakses oleh pengunjung' }}
                    </small>
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="d-grid gap-2">
                @if($indikatorKelulusan->is_active)
                    <a href="{{ route('admin.indikator-kelulusan.toggle') }}"
                       class="btn btn-warning"
                       onclick="return confirm('Yakin ingin menonaktifkan halaman Indikator Kelulusan?')">
                        <i class="fas fa-toggle-off me-2"></i>Nonaktifkan Halaman
                    </a>
                @else
                    <a href="{{ route('admin.indikator-kelulusan.toggle') }}"
                       class="btn btn-success"
                       onclick="return confirm('Yakin ingin mengaktifkan halaman Indikator Kelulusan?')">
                        <i class="fas fa-toggle-on me-2"></i>Aktifkan Halaman
                    </a>
                @endif
                <a href="{{ route('indikator-kelulusan') }}" target="_blank" class="btn btn-info">
                    <i class="fas fa-external-link-alt me-2"></i>Lihat Halaman Publik
                </a>
            </div>
        </div>
    </div>
</div>

<!-- Content Summary -->
<div class="form-section">
    <h5><i class="fas fa-info-circle me-2"></i>Ringkasan Konten</h5>
    <div class="table-responsive">
        <table class="table table-bordered">
            <tbody>
                <tr>
                    <td><strong>Judul Header:</strong></td>
                    <td>{{ $indikatorKelulusan->judul_header ?? 'Belum diisi' }}</td>
                </tr>
                <tr>
                    <td><strong>Judul Utama:</strong></td>
                    <td>{{ $indikatorKelulusan->judul_utama ?? 'Belum diisi' }}</td>
                </tr>
                <tr>
                    <td><strong>Deskripsi Header:</strong></td>
                    <td>{{ Str::limit($indikatorKelulusan->deskripsi_header ?? 'Belum diisi', 50) }}</td>
                </tr>
                <tr>
                    <td><strong>Nama Pembicara:</strong></td>
                    <td>{{ $indikatorKelulusan->nama_pembicara ?? 'Belum diisi' }}</td>
                </tr>
                <tr>
                    <td><strong>Video URL:</strong></td>
                    <td>
                        @if($indikatorKelulusan->video_url)
                            <span class="badge badge-success">Ada</span>
                            <a href="{{ $indikatorKelulusan->video_url }}" target="_blank" class="btn btn-sm btn-outline-primary ms-2">
                                <i class="fas fa-external-link-alt"></i>
                            </a>
                        @else
                            <span class="badge badge-secondary">Belum diisi</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td><strong>Kategori Tags:</strong></td>
                    <td>
                        @if($indikatorKelulusan->kategori_tags && is_array($indikatorKelulusan->kategori_tags))
                            @foreach($indikatorKelulusan->kategori_tags as $tag)
                                <span class="badge badge-primary me-1">{{ $tag }}</span>
                            @endforeach
                        @else
                            <span class="text-muted">Belum diisi</span>
                        @endif
                    </td>
                </tr>
                <tr>
                    <td><strong>Terakhir Diupdate:</strong></td>
                    <td>{{ $indikatorKelulusan->updated_at ? $indikatorKelulusan->updated_at->format('d/m/Y H:i') : 'Belum pernah' }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>

<!-- Media Files -->
<div class="form-section">
    <h5><i class="fas fa-images me-2"></i>File Media</h5>
    <div class="row">
        <div class="col-md-6">
            <h6>Gambar Header</h6>
            @if($indikatorKelulusan->gambar_header)
                @php
                    $imagePath = 'assets/images/indikator-kelulusan/' . $indikatorKelulusan->gambar_header;
                    $imageExists = file_exists(public_path($imagePath));
                @endphp
                @if($imageExists)
                    <img src="{{ asset($imagePath) }}" alt="Header Image" class="img-thumbnail mb-2" style="max-width: 200px;">
                    <br>
                    <small class="text-success">
                        <i class="fas fa-check-circle me-1"></i>
                        File tersedia: {{ $indikatorKelulusan->gambar_header }}
                    </small>
                @else
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        File tidak ditemukan: {{ $indikatorKelulusan->gambar_header }}
                    </div>
                @endif
            @else
                <div class="text-muted">
                    <i class="fas fa-image fa-3x mb-2"></i>
                    <p>Belum ada gambar header</p>
                </div>
            @endif
        </div>
        <div class="col-md-6">
            <h6>Foto Pembicara</h6>
            @if($indikatorKelulusan->foto_pembicara)
                @php
                    $imagePath = 'assets/images/indikator-kelulusan/' . $indikatorKelulusan->foto_pembicara;
                    $imageExists = file_exists(public_path($imagePath));
                @endphp
                @if($imageExists)
                    <img src="{{ asset($imagePath) }}" alt="Foto Pembicara" class="img-thumbnail mb-2" style="max-width: 200px;">
                    <br>
                    <small class="text-success">
                        <i class="fas fa-check-circle me-1"></i>
                        File tersedia: {{ $indikatorKelulusan->foto_pembicara }}
                    </small>
                @else
                    <div class="alert alert-warning">
                        <i class="fas fa-exclamation-triangle me-2"></i>
                        File tidak ditemukan: {{ $indikatorKelulusan->foto_pembicara }}
                    </div>
                @endif
            @else
                <div class="text-muted">
                    <i class="fas fa-user fa-3x mb-2"></i>
                    <p>Belum ada foto pembicara</p>
                </div>
            @endif
        </div>
    </div>
</div>

<!-- Quick Actions -->
<div class="form-section">
    <h5><i class="fas fa-bolt me-2"></i>Aksi Cepat</h5>
    <div class="row">
        <div class="col-md-4">
            <a href="{{ route('indikator-kelulusan') }}" target="_blank" class="btn btn-outline-secondary w-100 mb-2">
                <i class="fas fa-eye me-2"></i>Preview
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('admin.indikator-kelulusan.create-kategori') }}" class="btn btn-outline-success w-100 mb-2">
                <i class="fas fa-plus me-2"></i>Tambah Kategori
            </a>
        </div>
        <div class="col-md-4">
            <a href="{{ route('admin.indikator-kelulusan.create-indikator') }}" class="btn btn-outline-info w-100 mb-2">
                <i class="fas fa-plus me-2"></i>Tambah Indikator
            </a>
        </div>
    </div>
</div>

<!-- System Information -->
<div class="form-section">
    <h5><i class="fas fa-server me-2"></i>Informasi Sistem</h5>
    <div class="row">
        <div class="col-md-6">
            <table class="table table-sm">
                <tr>
                    <td><strong>ID Record:</strong></td>
                    <td>{{ $indikatorKelulusan->id }}</td>
                </tr>
                <tr>
                    <td><strong>Dibuat:</strong></td>
                    <td>{{ $indikatorKelulusan->created_at ? $indikatorKelulusan->created_at->format('d/m/Y H:i') : '-' }}</td>
                </tr>
                <tr>
                    <td><strong>Diupdate:</strong></td>
                    <td>{{ $indikatorKelulusan->updated_at ? $indikatorKelulusan->updated_at->format('d/m/Y H:i') : '-' }}</td>
                </tr>
            </table>
        </div>
        <div class="col-md-6">
            <div class="alert alert-info">
                <h6><i class="fas fa-lightbulb me-2"></i>Tips</h6>
                <ul class="mb-0">
                    <li>Pastikan semua field header sudah diisi dengan benar</li>
                    <li>Upload gambar dengan resolusi yang baik untuk hasil optimal</li>
                    <li>Aktifkan halaman setelah semua konten siap</li>
                    <li>Periksa preview halaman secara berkala</li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endif
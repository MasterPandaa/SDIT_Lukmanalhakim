<div class="form-section">
    <h5><i class="fas fa-toggle-on me-2"></i>Status Halaman</h5>
    
    <form action="{{ route('admin.indikator-kelulusan.toggle') }}" method="GET" class="d-inline">
        <div class="form-group">
            <div class="d-flex align-items-center">
                <div class="form-check form-switch">
                    <input class="form-check-input" type="checkbox" id="pageStatus" 
                           {{ $indikatorKelulusan->is_active ? 'checked' : '' }} 
                           onchange="this.form.submit()">
                    <label class="form-check-label" for="pageStatus">
                        <strong>Halaman Indikator Kelulusan {{ $indikatorKelulusan->is_active ? 'Aktif' : 'Nonaktif' }}</strong>
                    </label>
                </div>
                <span class="badge bg-{{ $indikatorKelulusan->is_active ? 'success' : 'secondary' }} ms-3">
                    {{ $indikatorKelulusan->is_active ? 'AKTIF' : 'NONAKTIF' }}
                </span>
            </div>
            <small class="form-text text-muted">
                {{ $indikatorKelulusan->is_active ? 'Halaman dapat diakses oleh pengunjung' : 'Halaman tidak dapat diakses oleh pengunjung' }}
            </small>
        </div>
    </form>
</div>

<div class="form-section">
    <h5><i class="fas fa-info-circle me-2"></i>Informasi Halaman</h5>
    
    <div class="row">
        <div class="col-md-6">
            <div class="card border-primary">
                <div class="card-body">
                    <h6 class="card-title text-primary">
                        <i class="fas fa-link me-2"></i>URL Halaman
                    </h6>
                    <p class="card-text">
                        <a href="{{ route('indikator-kelulusan') }}" target="_blank" class="text-decoration-none">
                            {{ route('indikator-kelulusan') }}
                            <i class="fas fa-external-link-alt ms-1"></i>
                        </a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card border-info">
                <div class="card-body">
                    <h6 class="card-title text-info">
                        <i class="fas fa-calendar me-2"></i>Terakhir Diperbarui
                    </h6>
                    <p class="card-text">
                        {{ $indikatorKelulusan->updated_at ? $indikatorKelulusan->updated_at->format('d M Y, H:i') : 'Belum pernah diperbarui' }}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-section">
    <h5><i class="fas fa-chart-pie me-2"></i>Ringkasan Konten</h5>
    
    <div class="row">
        <div class="col-md-3">
            <div class="card text-center border-success">
                <div class="card-body">
                    <i class="fas fa-folder fa-2x text-success mb-2"></i>
                    <h4 class="card-title text-success">{{ $kategoris->count() }}</h4>
                    <p class="card-text">Total Kategori</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center border-info">
                <div class="card-body">
                    <i class="fas fa-list fa-2x text-info mb-2"></i>
                    <h4 class="card-title text-info">{{ $kategoris->sum(function($kategori) { return $kategori->indikators->count(); }) }}</h4>
                    <p class="card-text">Total Indikator</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center border-primary">
                <div class="card-body">
                    <i class="fas fa-eye fa-2x text-primary mb-2"></i>
                    <h4 class="card-title text-primary">{{ $kategoris->where('is_active', true)->count() }}</h4>
                    <p class="card-text">Kategori Aktif</p>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card text-center border-warning">
                <div class="card-body">
                    <i class="fas fa-check-circle fa-2x text-warning mb-2"></i>
                    <h4 class="card-title text-warning">{{ $kategoris->sum(function($kategori) { return $kategori->activeIndikators->count(); }) }}</h4>
                    <p class="card-text">Indikator Aktif</p>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="form-section">
    <h5><i class="fas fa-cogs me-2"></i>Pengaturan Lanjutan</h5>
    
    <form action="{{ route('admin.indikator-kelulusan.update-settings') }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="row">
            <div class="col-md-6">
                <div class="form-group">
                    <label for="meta_title" class="form-label">Meta Title (SEO)</label>
                    <input type="text" class="form-control" id="meta_title" name="meta_title" 
                           value="{{ old('meta_title', $indikatorKelulusan->meta_title) }}" 
                           placeholder="Indikator Kelulusan - SDIT Lukmanalhakim">
                    <small class="form-text text-muted">Judul yang akan muncul di hasil pencarian Google</small>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="meta_keywords" class="form-label">Meta Keywords (SEO)</label>
                    <input type="text" class="form-control" id="meta_keywords" name="meta_keywords" 
                           value="{{ old('meta_keywords', $indikatorKelulusan->meta_keywords) }}" 
                           placeholder="indikator kelulusan, pendidikan, sekolah islam">
                    <small class="form-text text-muted">Kata kunci untuk SEO, pisahkan dengan koma</small>
                </div>
            </div>
        </div>

        <div class="form-group">
            <label for="meta_description" class="form-label">Meta Description (SEO)</label>
            <textarea class="form-control" id="meta_description" name="meta_description" rows="3" 
                      placeholder="Deskripsi singkat tentang halaman indikator kelulusan untuk SEO">{{ old('meta_description', $indikatorKelulusan->meta_description) }}</textarea>
            <small class="form-text text-muted">Deskripsi yang akan muncul di hasil pencarian Google (maksimal 160 karakter)</small>
        </div>

        <div class="form-group">
            <button type="submit" class="btn btn-primary">
                <i class="fas fa-save me-2"></i>Simpan Pengaturan
            </button>
        </div>
    </form>
</div>

<div class="form-section">
    <h5><i class="fas fa-tools me-2"></i>Aksi Cepat</h5>
    
    <div class="row">
        <div class="col-md-6">
            <div class="d-grid gap-2">
                <a href="{{ route('admin.indikator-kelulusan.create-kategori') }}" class="btn btn-success">
                    <i class="fas fa-plus me-2"></i>Tambah Kategori Baru
                </a>
                <a href="{{ route('admin.indikator-kelulusan.create-indikator') }}" class="btn btn-info">
                    <i class="fas fa-plus me-2"></i>Tambah Indikator Baru
                </a>
            </div>
        </div>
        <div class="col-md-6">
            <div class="d-grid gap-2">
                <a href="{{ route('indikator-kelulusan') }}" target="_blank" class="btn btn-primary">
                    <i class="fas fa-eye me-2"></i>Lihat Halaman Publik
                </a>
                <button type="button" class="btn btn-warning" onclick="location.reload()">
                    <i class="fas fa-sync-alt me-2"></i>Refresh Halaman
                </button>
            </div>
        </div>
    </div>
</div>

@if($kategoris->count() > 0)
<div class="form-section">
    <h5><i class="fas fa-list-alt me-2"></i>Daftar Kategori</h5>
    
    <div class="table-responsive">
        <table class="table table-striped">
            <thead>
                <tr>
                    <th width="5%">#</th>
                    <th width="30%">Nama Kategori</th>
                    <th width="25%">Deskripsi</th>
                    <th width="15%">Jumlah Indikator</th>
                    <th width="10%">Status</th>
                    <th width="15%">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kategoris->sortBy('urutan') as $kategori)
                    <tr>
                        <td>{{ $kategori->urutan }}</td>
                        <td><strong>{{ $kategori->nama }}</strong></td>
                        <td>{{ Str::limit($kategori->deskripsi, 50) ?: '-' }}</td>
                        <td>
                            <span class="badge bg-info">{{ $kategori->indikators->count() }}</span>
                            <span class="badge bg-success">{{ $kategori->activeIndikators->count() }} aktif</span>
                        </td>
                        <td>
                            <span class="badge bg-{{ $kategori->is_active ? 'success' : 'secondary' }}">
                                {{ $kategori->is_active ? 'Aktif' : 'Nonaktif' }}
                            </span>
                        </td>
                        <td>
                            <div class="btn-group btn-group-sm">
                                <a href="{{ route('admin.indikator-kelulusan.edit-kategori', $kategori->id) }}" 
                                   class="btn btn-warning" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>
                                <a href="{{ route('admin.indikator-kelulusan.toggle-kategori-status', $kategori->id) }}" 
                                   class="btn btn-{{ $kategori->is_active ? 'secondary' : 'success' }}" 
                                   title="{{ $kategori->is_active ? 'Nonaktifkan' : 'Aktifkan' }}">
                                    <i class="fas fa-{{ $kategori->is_active ? 'eye-slash' : 'eye' }}"></i>
                                </a>
                            </div>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endif
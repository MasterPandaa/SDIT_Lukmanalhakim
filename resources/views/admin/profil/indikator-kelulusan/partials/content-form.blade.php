<div class="row mb-4">
    <div class="col-md-4">
        <div class="stats-card">
            <div class="stats-number">{{ $kategoris->count() }}</div>
            <div class="stats-label">Total Kategori</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stats-card">
            <div class="stats-number">{{ $kategoris->sum(function($kategori) { return $kategori->indikators->count(); }) }}</div>
            <div class="stats-label">Total Indikator</div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="stats-card">
            <div class="stats-number">{{ $kategoris->sum(function($kategori) { return $kategori->activeIndikators->count(); }) }}</div>
            <div class="stats-label">Indikator Aktif</div>
        </div>
    </div>
</div>

<div class="form-section">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h5><i class="fas fa-list me-2"></i>Manajemen Kategori & Indikator</h5>
        <div>
            <a href="{{ route('admin.indikator-kelulusan.create-kategori') }}" class="btn btn-primary btn-sm">
                <i class="fas fa-plus me-1"></i>Tambah Kategori
            </a>
            <a href="{{ route('admin.indikator-kelulusan.create-indikator') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus me-1"></i>Tambah Indikator
            </a>
        </div>
    </div>

    @if($kategoris->count() > 0)
        <div class="accordion" id="kategoriAccordion">
            @foreach($kategoris as $index => $kategori)
                <div class="accordion-item mb-3">
                    <h2 class="accordion-header" id="heading{{ $kategori->id }}">
                        <button class="accordion-button {{ $index === 0 ? '' : 'collapsed' }}" type="button" 
                                data-bs-toggle="collapse" data-bs-target="#collapse{{ $kategori->id }}" 
                                aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse{{ $kategori->id }}">
                            <div class="d-flex justify-content-between align-items-center w-100 me-3">
                                <div>
                                    <strong>{{ strtoupper($kategori->nama) }}</strong>
                                    <span class="badge bg-{{ $kategori->is_active ? 'success' : 'secondary' }} ms-2">
                                        {{ $kategori->is_active ? 'Aktif' : 'Nonaktif' }}
                                    </span>
                                </div>
                                <div>
                                    <span class="badge bg-info">{{ $kategori->indikators->count() }} Indikator</span>
                                    <span class="badge bg-success">{{ $kategori->activeIndikators->count() }} Aktif</span>
                                </div>
                            </div>
                        </button>
                    </h2>
                    <div id="collapse{{ $kategori->id }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" 
                         aria-labelledby="heading{{ $kategori->id }}" data-bs-parent="#kategoriAccordion">
                        <div class="accordion-body">
                            <div class="d-flex justify-content-between align-items-center mb-3">
                                <div>
                                    <p class="mb-1"><strong>Deskripsi:</strong> {{ $kategori->deskripsi ?: 'Tidak ada deskripsi' }}</p>
                                    <p class="mb-0"><strong>Urutan:</strong> {{ $kategori->urutan }}</p>
                                </div>
                                <div>
                                    <a href="{{ route('admin.indikator-kelulusan.edit-kategori', $kategori->id) }}" 
                                       class="btn btn-warning btn-sm">
                                        <i class="fas fa-edit"></i> Edit
                                    </a>
                                    <a href="{{ route('admin.indikator-kelulusan.toggle-kategori-status', $kategori->id) }}" 
                                       class="btn btn-{{ $kategori->is_active ? 'secondary' : 'success' }} btn-sm">
                                        <i class="fas fa-{{ $kategori->is_active ? 'eye-slash' : 'eye' }}"></i>
                                        {{ $kategori->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                                    </a>
                                    <form action="{{ route('admin.indikator-kelulusan.destroy-kategori', $kategori->id) }}" 
                                          method="POST" class="d-inline" 
                                          onsubmit="return confirm('Yakin ingin menghapus kategori ini? Semua indikator dalam kategori ini juga akan terhapus.')">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">
                                            <i class="fas fa-trash"></i> Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>

                            @if($kategori->indikators->count() > 0)
                                <div class="table-responsive">
                                    <table class="table table-sm table-striped">
                                        <thead>
                                            <tr>
                                                <th width="5%">#</th>
                                                <th width="50%">Judul Indikator</th>
                                                <th width="15%">Durasi</th>
                                                <th width="10%">Status</th>
                                                <th width="20%">Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($kategori->indikators->sortBy('urutan') as $indikator)
                                                <tr>
                                                    <td>{{ $indikator->urutan }}</td>
                                                    <td>{{ $indikator->judul }}</td>
                                                    <td>{{ $indikator->durasi ?: '-' }}</td>
                                                    <td>
                                                        <span class="badge bg-{{ $indikator->is_active ? 'success' : 'secondary' }}">
                                                            {{ $indikator->is_active ? 'Aktif' : 'Nonaktif' }}
                                                        </span>
                                                    </td>
                                                    <td>
                                                        <div class="btn-group btn-group-sm">
                                                            <a href="{{ route('admin.indikator-kelulusan.edit-indikator', $indikator->id) }}" 
                                                               class="btn btn-warning btn-sm">
                                                                <i class="fas fa-edit"></i>
                                                            </a>
                                                            <a href="{{ route('admin.indikator-kelulusan.toggle-indikator-status', $indikator->id) }}" 
                                                               class="btn btn-{{ $indikator->is_active ? 'secondary' : 'success' }} btn-sm">
                                                                <i class="fas fa-{{ $indikator->is_active ? 'eye-slash' : 'eye' }}"></i>
                                                            </a>
                                                            <form action="{{ route('admin.indikator-kelulusan.destroy-indikator', $indikator->id) }}" 
                                                                  method="POST" class="d-inline" 
                                                                  onsubmit="return confirm('Yakin ingin menghapus indikator ini?')">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-danger btn-sm">
                                                                    <i class="fas fa-trash"></i>
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                            @else
                                <div class="alert alert-info">
                                    <i class="fas fa-info-circle me-2"></i>
                                    Belum ada indikator dalam kategori ini. 
                                    <a href="{{ route('admin.indikator-kelulusan.create-indikator') }}?kategori_id={{ $kategori->id }}" class="alert-link">
                                        Tambah indikator sekarang
                                    </a>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-warning">
            <i class="fas fa-exclamation-triangle me-2"></i>
            Belum ada kategori yang dibuat. 
            <a href="{{ route('admin.indikator-kelulusan.create-kategori') }}" class="alert-link">
                Buat kategori pertama Anda sekarang
            </a>
        </div>
    @endif
</div>

<div class="form-section">
    <h5><i class="fas fa-chart-bar me-2"></i>Ringkasan Statistik</h5>
    
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Distribusi Kategori</h6>
                    <div class="progress mb-2">
                        <div class="progress-bar bg-success" role="progressbar" 
                             style="width: {{ $kategoris->where('is_active', true)->count() / max($kategoris->count(), 1) * 100 }}%">
                            {{ $kategoris->where('is_active', true)->count() }} Aktif
                        </div>
                    </div>
                    <small class="text-muted">
                        {{ $kategoris->where('is_active', true)->count() }} dari {{ $kategoris->count() }} kategori aktif
                    </small>
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h6 class="card-title">Distribusi Indikator</h6>
                    @php
                        $totalIndikator = $kategoris->sum(function($kategori) { return $kategori->indikators->count(); });
                        $totalAktif = $kategoris->sum(function($kategori) { return $kategori->activeIndikators->count(); });
                    @endphp
                    <div class="progress mb-2">
                        <div class="progress-bar bg-info" role="progressbar" 
                             style="width: {{ $totalAktif / max($totalIndikator, 1) * 100 }}%">
                            {{ $totalAktif }} Aktif
                        </div>
                    </div>
                    <small class="text-muted">
                        {{ $totalAktif }} dari {{ $totalIndikator }} indikator aktif
                    </small>
                </div>
            </div>
        </div>
    </div>
</div>
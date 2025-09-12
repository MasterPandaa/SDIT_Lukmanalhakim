@php
    // Helper to badge active status
    function status_badge($active) {
        return $active
            ? '<span class="badge bg-success"><i class="fas fa-check me-1"></i>Aktif</span>'
            : '<span class="badge bg-secondary"><i class="fas fa-ban me-1"></i>Nonaktif</span>';
    }
@endphp

<div class="form-section">
    <div class="d-flex flex-wrap align-items-center justify-content-between mb-3">
        <h5 class="mb-2 mb-md-0"><i class="fas fa-list me-2 text-success"></i>Konten Indikator</h5>
        <div class="d-flex gap-2">
            <a href="{{ route('admin.indikator-kelulusan.create-kategori') }}" class="btn btn-outline-success btn-sm">
                <i class="fas fa-folder-plus me-1"></i>Tambah Kategori
            </a>
            <a href="{{ route('admin.indikator-kelulusan.create-indikator') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus me-1"></i>Tambah Indikator
            </a>
        </div>
    </div>

    @if($kategoris->isEmpty())
        <div class="alert alert-info">
            <i class="fas fa-info-circle me-2"></i>
            Belum ada kategori. Silakan klik "Tambah Kategori" untuk mulai menambahkan.
        </div>
    @endif

    <div class="accordion" id="kategoriAccordion">
        @foreach($kategoris as $index => $kategori)
            <div class="card mb-3 shadow-sm">
                <div class="card-header d-flex align-items-center justify-content-between" id="heading-{{ $kategori->id }}">
                    <div class="d-flex align-items-center gap-2">
                        <button class="btn btn-link text-decoration-none" type="button" data-bs-toggle="collapse" data-bs-target="#collapse-{{ $kategori->id }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="collapse-{{ $kategori->id }}">
                            <strong class="text-dark">{{ $kategori->urutan }}. {{ $kategori->nama }}</strong>
                        </button>
                        {!! status_badge($kategori->is_active) !!}
                        <span class="text-muted small ms-2">({{ $kategori->allIndikators->count() }} indikator)</span>
                    </div>
                    <div class="btn-group btn-group-sm" role="group">
                        <a href="{{ route('admin.indikator-kelulusan.edit-kategori', $kategori->id) }}" class="btn btn-outline-primary" data-bs-toggle="tooltip" title="Ubah Kategori">
                            <i class="fas fa-edit"></i>
                        </a>
                        <a href="{{ route('admin.indikator-kelulusan.toggle-kategori-status', $kategori->id) }}" class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Aktif/Nonaktifkan">
                            <i class="fas fa-power-off"></i>
                        </a>
                        <form action="{{ route('admin.indikator-kelulusan.destroy-kategori', $kategori->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Hapus kategori ini? Semua indikator di kategori ini juga akan terhapus.');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Hapus Kategori">
                                <i class="fas fa-trash"></i>
                            </button>
                        </form>
                    </div>
                </div>

                <div id="collapse-{{ $kategori->id }}" class="collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="heading-{{ $kategori->id }}" data-bs-parent="#kategoriAccordion">
                    <div class="card-body">
                        @if($kategori->allIndikators->isEmpty())
                            <div class="alert alert-light border d-flex align-items-center justify-content-between">
                                <div>
                                    <i class="fas fa-info-circle me-2 text-muted"></i>
                                    Belum ada indikator pada kategori ini.
                                </div>
                                <a href="{{ route('admin.indikator-kelulusan.create-indikator') }}" class="btn btn-sm btn-success">
                                    <i class="fas fa-plus me-1"></i>Tambah Indikator
                                </a>
                            </div>
                        @else
                            <div class="table-responsive">
                                <table class="table table-striped align-middle">
                                    <thead class="table-light">
                                        <tr>
                                            <th style="width: 60px;">Urut</th>
                                            <th>Judul</th>
                                            <th style="width: 140px;">Durasi</th>
                                            <th style="width: 110px;">Status</th>
                                            <th style="width: 170px;">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($kategori->allIndikators as $indikator)
                                            <tr>
                                                <td class="fw-semibold">{{ $indikator->urutan }}</td>
                                                <td>
                                                    <div class="fw-semibold text-dark">{{ $indikator->judul }}</div>
                                                    @if($indikator->deskripsi)
                                                        <div class="text-muted small">{{ Str::limit($indikator->deskripsi, 140) }}</div>
                                                    @endif
                                                </td>
                                                <td>{{ $indikator->durasi ?: '-' }}</td>
                                                <td>{!! status_badge($indikator->is_active) !!}</td>
                                                <td>
                                                    <div class="btn-group btn-group-sm" role="group">
                                                        <a href="{{ route('admin.indikator-kelulusan.edit-indikator', $indikator->id) }}" class="btn btn-outline-primary" data-bs-toggle="tooltip" title="Ubah Indikator">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="{{ route('admin.indikator-kelulusan.toggle-indikator-status', $indikator->id) }}" class="btn btn-outline-warning" data-bs-toggle="tooltip" title="Aktif/Nonaktifkan">
                                                            <i class="fas fa-power-off"></i>
                                                        </a>
                                                        <form action="{{ route('admin.indikator-kelulusan.destroy-indikator', $indikator->id) }}" method="POST" class="d-inline-block" onsubmit="return confirm('Hapus indikator ini?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-outline-danger" data-bs-toggle="tooltip" title="Hapus Indikator">
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
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>

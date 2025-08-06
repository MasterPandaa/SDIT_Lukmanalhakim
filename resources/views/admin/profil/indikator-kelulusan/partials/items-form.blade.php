<div class="d-flex justify-content-between align-items-center mb-4">
    <h5 class="mb-0">
        <i class="fas fa-list me-2"></i>Daftar Kategori & Indikator
    </h5>
    <div>
        <a href="{{ route('admin.indikator-kelulusan.create-kategori') }}" class="btn btn-success btn-sm">
            <i class="fas fa-plus me-1"></i> Tambah Kategori
        </a>
        <a href="{{ route('admin.indikator-kelulusan.create-indikator') }}" class="btn btn-info btn-sm">
            <i class="fas fa-plus me-1"></i> Tambah Indikator
        </a>
    </div>
</div>
@if(count($kategoris) > 0)
    <div class="accordion" id="kategoriAccordion">
        @foreach($kategoris as $kategori)
            <div class="card mb-3">
                <div class="card-header" id="heading{{ $kategori->id }}">
                    <div class="d-flex justify-content-between align-items-center">
                        <h2 class="mb-0">
                            <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapse{{ $kategori->id }}" aria-expanded="true" aria-controls="collapse{{ $kategori->id }}">
                                <i class="fas fa-folder me-2"></i>
                                {{ $kategori->nama }}
                                <span class="badge badge-{{ $kategori->is_active ? 'success' : 'secondary' }} ms-2">
                                    {{ $kategori->is_active ? 'Aktif' : 'Nonaktif' }}
                                </span>
                                <span class="badge badge-info ms-1">
                                    {{ $kategori->allIndikators->count() }} item
                                </span>
                            </button>
                        </h2>
                        <div class="btn-group">
                            <a href="{{ route('admin.indikator-kelulusan.edit-kategori', $kategori->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('admin.indikator-kelulusan.toggle-kategori-status', $kategori->id) }}" class="btn btn-{{ $kategori->is_active ? 'secondary' : 'success' }} btn-sm">
                                <i class="fas fa-{{ $kategori->is_active ? 'eye-slash' : 'eye' }}"></i>
                            </a>
                            <form action="{{ route('admin.indikator-kelulusan.destroy-kategori', $kategori->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus kategori ini? Semua indikator di dalamnya akan ikut terhapus!')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </div>
                </div>
                <div id="collapse{{ $kategori->id }}" class="collapse" aria-labelledby="heading{{ $kategori->id }}" data-parent="#kategoriAccordion">
                    <div class="card-body">
                        @if($kategori->deskripsi)
                            <p class="text-muted mb-3">{{ $kategori->deskripsi }}</p>
                        @endif
                        @if(count($kategori->allIndikators) > 0)
                            <div class="table-responsive">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Urutan</th>
                                            <th>Judul</th>
                                            <th>Durasi</th>
                                            <th>Status</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($kategori->allIndikators as $indikator)
                                            <tr>
                                                <td>{{ $indikator->urutan }}</td>
                                                <td>{{ $indikator->judul }}</td>
                                                <td>{{ $indikator->durasi }}</td>
                                                <td>
                                                    <span class="badge badge-{{ $indikator->is_active ? 'success' : 'secondary' }}">
                                                        {{ $indikator->is_active ? 'Aktif' : 'Nonaktif' }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <div class="btn-group">
                                                        <a href="{{ route('admin.indikator-kelulusan.edit-indikator', $indikator->id) }}" class="btn btn-warning btn-sm">
                                                            <i class="fas fa-edit"></i>
                                                        </a>
                                                        <a href="{{ route('admin.indikator-kelulusan.toggle-indikator-status', $indikator->id) }}" class="btn btn-{{ $indikator->is_active ? 'secondary' : 'success' }} btn-sm">
                                                            <i class="fas fa-{{ $indikator->is_active ? 'eye-slash' : 'eye' }}"></i>
                                                        </a>
                                                        <form action="{{ route('admin.indikator-kelulusan.destroy-indikator', $indikator->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Yakin ingin menghapus indikator ini?')">
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
                            <div class="text-center py-4">
                                <i class="fas fa-inbox fa-3x text-muted mb-3"></i>
                                <p class="text-muted">Belum ada indikator dalam kategori ini.</p>
                                <a href="{{ route('admin.indikator-kelulusan.create-indikator') }}" class="btn btn-info">
                                    <i class="fas fa-plus me-2"></i>Tambah Indikator
                                </a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        @endforeach
    </div>
@endif
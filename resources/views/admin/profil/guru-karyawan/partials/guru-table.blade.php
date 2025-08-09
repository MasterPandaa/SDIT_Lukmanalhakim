<!-- Toolbar -->
<div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-2 mb-3">
    <div class="input-group w-100 w-md-50" style="max-width: 520px;">
        <span class="input-group-text bg-white"><i class="fas fa-search text-muted"></i></span>
        <input type="text" id="guruSearch" class="form-control" placeholder="Cari nama, jabatan, atau email..." aria-label="Pencarian">
    </div>
    <div class="d-flex align-items-center gap-2">
        <a href="{{ route('admin.profil.guru-karyawan.create') }}" class="btn btn-success">
            <i class="fas fa-plus me-2"></i> Tambah
        </a>
    </div>
    
    <style>
        .table thead.sticky-head th { position: sticky; top: 0; z-index: 2; background: #f8f9fa; }
        .table-hover tbody tr:hover { background-color: #f6fbff; }
        .avatar { width: 48px; height: 48px; object-fit: cover; border-radius: 50%; border: 1px solid #e9ecef; }
        .avatar-placeholder {
            width: 48px; height: 48px; display: inline-flex; align-items: center; justify-content: center;
            border-radius: 50% !important; background: #e9ecef !important; color: #6c757d !important; border: 1px solid #dee2e6 !important;
        }
        .avatar-placeholder i { font-size: 1.125rem; line-height: 1; }
        .name-cell { line-height: 1.1; }
        .name-cell small { font-size: .775rem; }
        .badge-soft-success { color: #198754; background-color: rgba(25,135,84,.12); }
        .badge-soft-danger { color: #dc3545; background-color: rgba(220,53,69,.12); }
        /* Status text colors */
        table.table .badge.bg-success, 
        table.table .badge.badge-soft-success,
        table.table .badge.bg-success-subtle { 
            color: #ffffff !important; 
            background-color: #198754 !important;
        }
        table.table .badge.bg-danger, 
        table.table .badge.badge-soft-danger,
        table.table .badge.bg-danger-subtle { 
            color: #ffffff !important; 
            background-color: #dc3545 !important;
        }
        .badge-soft-secondary { color: #6c757d; background-color: rgba(108,117,125,.12); }
        .badge-pill { border-radius: 50rem; padding: .35rem .6rem; font-weight: 600; }
        .rating i { font-size: .9rem; }
        .table td, .table th { vertical-align: middle; }
    </style>
</div>

<!-- Data Table -->
<div class="table-responsive">
    <table class="table table-striped table-hover table-borderless align-middle">
        <thead class="sticky-head">
            <tr class="text-uppercase text-muted small">
                <th>No</th>
                <th>Foto</th>
                <th>Nama</th>
                <th>Jabatan</th>
                <th>Email</th>
                <th>Pengalaman</th>
                <th>Status</th>
                <th class="text-end">Aksi</th>
            </tr>
        </thead>
        <tbody id="guruTableBody">
            @forelse($gurus as $index => $guru)
                <tr>
                    <td class="text-muted">{{ $gurus->firstItem() + $index }}</td>
                    <td>
                        @php
                            $foto = !empty($guru->foto)
                                ? $guru->foto_url
                                : asset('assets/images/icon-image/icon-profile.jpeg');
                        @endphp
                        <img src="{{ $foto }}" alt="{{ $guru->nama ?? 'Default' }}" class="avatar" loading="lazy" decoding="async">
                    </td>
                    <td class="name-cell">
                        <div class="fw-semibold">{{ $guru->nama }}</div>
                    </td>
                    <td>
                        <span class="badge badge-pill bg-secondary-subtle text-secondary">{{ $guru->jabatan }}</span>
                    </td>
                    <td>
                        @if($guru->email)
                            <span class="small"><i class="far fa-envelope me-1 text-muted"></i>{{ $guru->email }}</span>
                        @else
                            <span class="small text-muted">-</span>
                        @endif
                    </td>
                    <td>
                        <span class="small fw-semibold">{{ $guru->pengalaman_mengajar }} th</span>
                    </td>
                    <td>
                        @if($guru->is_active)
                            <span class="badge bg-success text-white px-2 py-1 rounded-pill" style="font-size: 0.75rem; font-weight: 600;">Aktif</span>
                        @else
                            <span class="badge bg-danger text-white px-2 py-1 rounded-pill" style="font-size: 0.75rem; font-weight: 600;">Tidak Aktif</span>
                        @endif
                    </td>
                    <td class="text-end">
                        <div class="btn-group btn-group-sm" role="group" aria-label="Aksi">
                            <a href="{{ route('admin.profil.guru-karyawan.edit', $guru->id) }}" class="btn btn-outline-primary" title="Edit">
                                <i class="fas fa-edit"></i>
                            </a>
                            <a href="{{ route('guru.detail', $guru->id) }}" target="_blank" class="btn btn-outline-info" title="Lihat Detail">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="{{ route('admin.profil.guru-karyawan.guru.toggle', $guru->id) }}" class="btn btn-outline-{{ $guru->is_active ? 'warning' : 'success' }}" title="{{ $guru->is_active ? 'Nonaktifkan' : 'Aktifkan' }}" onclick="return confirm('Apakah Anda yakin ingin {{ $guru->is_active ? 'menonaktifkan' : 'mengaktifkan' }} guru ini?')">
                                <i class="fas fa-{{ $guru->is_active ? 'eye-slash' : 'eye' }}"></i>
                            </a>
                            <form action="{{ route('admin.profil.guru-karyawan.destroy', $guru->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus guru ini?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-outline-danger" title="Hapus">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="8" class="text-center py-5">
                        <div class="text-muted">
                            <i class="fas fa-users fa-3x mb-3"></i>
                            <p class="mb-3">Belum ada data guru atau karyawan</p>
                            <a href="{{ route('admin.profil.guru-karyawan.create') }}" class="btn btn-success">
                                <i class="fas fa-plus me-2"></i>
                                Tambah Guru/Karyawan Pertama
                            </a>
                        </div>
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>

<!-- Pagination -->
@if($gurus->hasPages())
    <div class="d-flex justify-content-center mt-4">
        {{ $gurus->links() }}
    </div>
@endif

<!-- Lightweight client-side filter -->
<script>
    (function(){
        const search = document.getElementById('guruSearch');
        const body = document.getElementById('guruTableBody');
        if(!search || !body) return;
        const filter = () => {
            const q = search.value.toLowerCase();
            Array.from(body.querySelectorAll('tr')).forEach(tr => {
                const text = tr.innerText.toLowerCase();
                const okText = !q || text.includes(q);
                tr.style.display = okText ? '' : 'none';
            });
        };
        search.addEventListener('input', filter);
    })();
    </script>

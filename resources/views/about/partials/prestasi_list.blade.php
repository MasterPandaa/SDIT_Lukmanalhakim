<div class="row g-4">
    @forelse($prestasi as $item)
        @php
            $img = $item->gambar ? asset('storage/'.$item->gambar) : asset('assets/images/achive/01.png');
            $tgl = optional($item->tanggal);
            $lvlText = $item->tingkat ?? 'Umum';
            $lvlSlug = $item->tingkat ? \Illuminate\Support\Str::slug($item->tingkat) : 'umum';
        @endphp
        <div class="col-12 col-sm-6 col-lg-4 card-col" data-tingkat="{{ $lvlSlug }}">
            <div class="card h-100 border-0 overflow-hidden prestasi-card">
                <div class="position-relative">
                    <img src="{{ $img }}" class="w-100 card-img-top-zoom" alt="{{ $item->judul }}" loading="lazy">
                    <div class="gradient-overlay"></div>
                    <span class="badge bg-primary position-absolute top-0 start-0 m-2">{{ $lvlText }}</span>
                    <span class="badge bg-dark position-absolute top-0 end-0 m-2">{{ $tgl ? $tgl->format('d M Y') : '-' }}</span>
                </div>
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title mb-2 text-truncate" title="{{ $item->judul }}">{{ $item->judul }}</h5>
                    <p class="card-text text-muted small mb-3 line-clamp-3">{{ $item->deskripsi }}</p>
                    <div class="mt-auto d-flex flex-wrap gap-2">
                        @if($item->peraih)
                            <span class="badge rounded-pill bg-success-subtle text-success border border-success"><i class="fas fa-user-graduate me-1"></i>{{ $item->peraih }}</span>
                        @endif
                        @if($item->penyelenggara)
                            <span class="badge rounded-pill bg-info-subtle text-info border border-info"><i class="fas fa-building me-1"></i>{{ $item->penyelenggara }}</span>
                        @endif
                    </div>
                </div>
                <div class="card-footer bg-white border-0 pt-0 px-3 pb-3">
                    <button class="btn btn-sm btn-outline-primary w-100" data-bs-toggle="modal" data-bs-target="#prestasiModal"
                            data-title="{{ $item->judul }}" data-img="{{ $img }}" data-desc="{{ e($item->deskripsi) }}"
                            data-date="{{ $tgl ? $tgl->format('d M Y') : '-' }}" data-tingkat="{{ $lvlText }}"
                            data-peraih="{{ $item->peraih ?? '-' }}" data-penyelenggara="{{ $item->penyelenggara ?? '-' }}">
                        <i class="fas fa-eye me-1"></i> Detail Prestasi
                    </button>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12"><div class="alert alert-info">Belum ada data prestasi.</div></div>
    @endforelse
</div>
<div class="d-flex justify-content-center mt-4">
    {{ $prestasi->links() }}
</div>

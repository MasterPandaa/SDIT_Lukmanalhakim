<div class="row g-4">
    @forelse($galeri as $item)
        @php
            $img = $item->foto ? asset('storage/'.$item->foto) : asset('assets/images/galeri/01.jpg');
        @endphp
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100 text-center border-0 overflow-hidden galeri-card">
                <img src="{{ $img }}" class="card-img-top" alt="{{ $item->judul }}" style="height:200px;object-fit:cover;box-shadow:none;">
                <div class="card-body p-2">
                    <h6 class="card-title mb-1 text-truncate" title="{{ $item->judul }}">{{ $item->judul }}</h6>
                    @if(!empty($item->deskripsi))
                        <p class="mb-0 text-muted small" style="display:-webkit-box;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden;">{{ \Illuminate\Support\Str::limit(strip_tags($item->deskripsi), 160) }}</p>
                    @endif
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center text-muted">Belum ada data.</div>
    @endforelse
</div>
<div class="d-flex justify-content-end mt-3">
    {{ $galeri->links() }}
</div>

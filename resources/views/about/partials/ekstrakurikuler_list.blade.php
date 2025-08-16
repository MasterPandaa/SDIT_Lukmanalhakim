<div class="row g-4">
    @forelse($ekstrakurikuler as $item)
        @php
            $img = $item->gambar ? asset('storage/'.$item->gambar) : asset('assets/images/category/icon/01.jpg');
        @endphp
        <div class="col-6 col-md-4 col-lg-3">
            <div class="card h-100 text-center border-0 overflow-hidden ekstra-card">
                <div class="pt-3">
                    <img src="{{ $img }}" class="mx-auto d-block" alt="{{ $item->nama }}" style="width:80px;height:80px;object-fit:cover;box-shadow:none;">
                </div>
                <div class="card-body p-2">
                    <h6 class="card-title mb-0 text-truncate" title="{{ $item->nama }}">{{ $item->nama }}</h6>
                </div>
            </div>
        </div>
    @empty
        <div class="col-12 text-center text-muted">Belum ada data.</div>
    @endforelse
</div>
<div class="d-flex justify-content-end mt-3">
    {{ $ekstrakurikuler->links() }}
</div>

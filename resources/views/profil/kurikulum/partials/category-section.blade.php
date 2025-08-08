<div class="category-section padding-tb section-bg style-3">
    <div class="container">
        <div class="section-header text-center">
            <span class="subtitle">{{ $kurikulum->subtitle ?? 'Teach on edulon' }}</span>
            @if(!empty($kurikulum->deskripsi))
                <h2 class="title">{!! $kurikulum->deskripsi !!}</h2>
            @else
                <h2 class="title">SD Islam Terpadu Luqman Al Hakim Sleman menerapkan empat kurikulum terpadu</h2>
            @endif
        </div>
        <div class="section-wrapper">
            @php
                $items = $kurikulum?->items?->where('is_active', true) ?? collect();
            @endphp
            <div class="row g-4 justify-content-center row-cols-lg-2 row-cols-sm-2 row-cols-1">
                @forelse($items as $item)
                <div class="col">
                    <div class="category-item text-center hover-effect">
                        <div class="category-inner">
                            <div class="category-thumb">
                                <img src="{{ $item->gambar_url }}" alt="{{ $item->judul }}">
                            </div>
                            <div class="category-content">
                                <a href="#"><h4>{{ $item->judul }}</h4></a>
                                <div class="text-gray-700">{!! $item->deskripsi !!}</div>
                            </div>
                        </div>
                    </div>
                </div>
                @empty
                <div class="col-12">
                    <div class="empty-state text-center bg-white rounded shadow-sm">
                        <h5 class="mb-2">Belum ada item kurikulum aktif</h5>
                        <p class="mb-0">Silakan tambahkan item melalui halaman admin.</p>
                    </div>
                </div>
                @endforelse
            </div>
        </div>
    </div>
</div>

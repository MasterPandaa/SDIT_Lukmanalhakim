@if($artikels->count() > 0)
<div class="row" id="artikelGrid">
  @foreach($artikels as $artikel)
  <div class="col-lg-4 col-md-6 mb-4">
    <div class="card h-100 border-0">
      @if($artikel->gambar)
        <img src="{{ $artikel->gambar_url }}" class="card-img-top" alt="{{ $artikel->judul }}" style="height: 200px; object-fit: cover; box-shadow:none;">
      @endif
      <div class="card-body">
        <div class="mb-2 d-flex justify-content-between align-items-center">
          <div>
            @if($artikel->kategori)
              <span class="badge bg-success">{{ $artikel->kategori }}</span>
            @endif
          </div>
          <small class="text-muted"><i class="fas fa-calendar-alt me-1"></i>{{ $artikel->formatted_published_at }}</small>
        </div>
        <h5 class="card-title mb-2" title="{{ $artikel->judul }}">{{ Str::limit($artikel->judul, 80) }}</h5>
        <p class="card-text text-muted mb-3">{{ $artikel->ringkasan ? Str::limit($artikel->ringkasan, 120) : Str::limit(strip_tags($artikel->konten), 120) }}</p>
        <div class="d-flex justify-content-between align-items-center">
          <small class="text-muted"><i class="fas fa-user me-1"></i>{{ $artikel->penulis ?? 'Admin' }}</small>
          <a href="{{ route('blog-single', $artikel->slug) }}" class="btn btn-outline-success btn-sm">Baca</a>
        </div>
      </div>
    </div>
  </div>
  @endforeach
</div>
<div class="d-flex justify-content-center mt-3" id="paginationWrapper">
  {{ $artikels->links() }}
</div>
@else
<div class="text-center py-5">
  <i class="fas fa-newspaper fa-3x text-muted mb-3"></i>
  <h5 class="text-muted">Belum ada artikel yang dipublikasi</h5>
  <p class="text-muted">Artikel akan muncul di sini setelah dipublikasi oleh admin.</p>
</div>
@endif

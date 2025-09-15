@if($artikels->count() > 0)
<div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center g-4" id="artikelGrid">
  @foreach($artikels as $artikel)
  <div class="col">
    <div class="post-item">
      <div class="post-inner">
        <div class="post-thumb">
          <a href="{{ route('about.artikel.show', $artikel->slug) }}">
            <img src="{{ $artikel->gambar_url }}" alt="{{ $artikel->judul }}" class="img-fluid" style="width: 100%; height: 200px; object-fit: cover;"
                 onerror="this.onerror=null;this.src='{{ asset('assets/images/blog/01.jpg') }}';">
          </a>
        </div>
        <div class="post-content">
          <a href="{{ route('about.artikel.show', $artikel->slug) }}">
            <h4 title="{{ $artikel->judul }}">{{ $artikel->judul }}</h4>
          </a>
          <div class="meta-post">
            <ul class="lab-ul">
              <li><i class="icofont-ui-user"></i>{{ $artikel->penulis ?? 'Admin' }}</li>
              <li><i class="icofont-calendar"></i>{{ $artikel->formatted_published_at ?? ($artikel->published_at?->format('F d, Y')) }}</li>
            </ul>
          </div>
          <p>{{ $artikel->ringkasan ? Str::limit($artikel->ringkasan, 150) : Str::limit(strip_tags($artikel->konten), 150) }}</p>
        </div>
        <div class="post-footer">
          <div class="pf-left">
            <a href="{{ route('about.artikel.show', $artikel->slug) }}" class="lab-btn-text">Baca selengkapnya <i class="icofont-external-link"></i></a>
          </div>
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

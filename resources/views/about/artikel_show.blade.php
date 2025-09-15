@extends('layouts.app')

@section('title', $artikel->judul)

@section('content')
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>{{ $artikel->judul }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('about.artikel') }}">Artikel</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $artikel->judul }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row justify-content-center">
        <div class="col-lg-8">
            <article class="blog-post">
                <div class="blog-post-header mb-4">
                    @if($artikel->gambar)
                    <div class="mb-4 rounded overflow-hidden">
                        <img src="{{ $artikel->gambar_url }}" alt="{{ $artikel->judul }}" class="img-fluid w-100">
                    </div>
                    @endif
                    
                    <div class="d-flex align-items-center mb-3">
                        @if($artikel->penulis)
                        <div class="d-flex align-items-center me-4">
                            <i class="fas fa-user me-2 text-primary"></i>
                            <span>{{ $artikel->penulis }}</span>
                        </div>
                        @endif
                        @if($artikel->kategori)
                        <div class="d-flex align-items-center me-4">
                            <i class="fas fa-folder me-2 text-primary"></i>
                            <span>{{ $artikel->kategori }}</span>
                        </div>
                        @endif
                        @if($artikel->published_at)
                        <div class="d-flex align-items-center">
                            <i class="far fa-calendar-alt me-2 text-primary"></i>
                            <span>{{ $artikel->published_at->translatedFormat('d F Y') }}</span>
                        </div>
                        @endif
                    </div>
                </div>

                <div class="blog-post-content mb-5">
                    {!! $artikel->konten_rendered !!}
                </div>

                @if($artikel->youtube_url)
                <div class="ratio ratio-16x9 mb-5">
                    {!! $artikel->youtube_iframe !!}
                </div>
                @endif

                <div class="blog-post-footer border-top pt-4">
                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex align-items-center">
                            <span class="me-2">Bagikan:</span>
                            <div class="social-share">
                                <a href="https://www.facebook.com/sharer/sharer.php?u={{ urlencode(route('about.artikel.show', $artikel->slug)) }}" 
                                   target="_blank" class="btn btn-sm btn-outline-primary me-2">
                                    <i class="fab fa-facebook-f"></i>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(route('about.artikel.show', $artikel->slug)) }}&text={{ urlencode($artikel->judul) }}" 
                                   target="_blank" class="btn btn-sm btn-outline-info me-2">
                                    <i class="fab fa-twitter"></i>
                                </a>
                                <a href="whatsapp://send?text={{ urlencode($artikel->judul . ' ' . route('about.artikel.show', $artikel->slug)) }}" 
                                   class="btn btn-sm btn-outline-success">
                                    <i class="fab fa-whatsapp"></i>
                                </a>
                            </div>
                        </div>
                        <a href="{{ route('about.artikel') }}" class="btn btn-outline-secondary">
                            <i class="fas fa-arrow-left me-2"></i> Kembali ke Daftar Artikel
                        </a>
                    </div>
                </div>
            </article>
        </div>
    </div>

    @if($related->count() > 0)
    <div class="row mt-5">
        <div class="col-12">
            <h4 class="mb-4">Artikel Terkait</h4>
            <div class="row">
                @foreach($related as $item)
                <div class="col-md-4 mb-4">
                    <div class="card h-100 border-0 shadow-sm">
                        @if($item->gambar)
                        <img src="{{ $item->gambar_url }}" class="card-img-top" alt="{{ $item->judul }}" style="height: 200px; object-fit: cover;">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">
                                <a href="{{ route('about.artikel.show', $item->slug) }}" class="text-decoration-none">
                                    {{ Str::limit($item->judul, 60) }}
                                </a>
                            </h5>
                            <p class="card-text text-muted small">
                                {{ Str::limit(strip_tags($item->ringkasan), 100) }}
                            </p>
                        </div>
                        <div class="card-footer bg-transparent border-top-0">
                            <a href="{{ route('about.artikel.show', $item->slug) }}" class="btn btn-sm btn-outline-primary">
                                Baca Selengkapnya
                            </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </div>
    @endif
</div>

<style>
.blog-post-content {
    line-height: 1.8;
    color: #4a5568;
}

.blog-post-content h2,
.blog-post-content h3,
.blog-post-content h4 {
    margin-top: 1.5em;
    margin-bottom: 0.8em;
    color: #2d3748;
}

.blog-post-content p {
    margin-bottom: 1.5em;
}

.blog-post-content img {
    max-width: 100%;
    height: auto;
    border-radius: 0.5rem;
    margin: 1.5em 0;
}

.social-share .btn {
    width: 34px;
    height: 34px;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    padding: 0;
}
</style>
@endsection

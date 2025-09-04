@extends('layouts.app')

@section('title', $artikel->judul)

@section('content')
<!-- Page Header Section Start -->
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
                            <li class="breadcrumb-item active" aria-current="page">{{ Str::limit($artikel->judul, 30) }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header Section Ending -->

<!-- Blog Single Section Start -->
<div class="blog-section blog-single padding-tb section-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                <article class="blog-article">
                    <div class="section-wrapper">
                        <div class="row row-cols-1 justify-content-center g-4">
                            <div class="col">
                                <div class="post-item style-2">
                                    <div class="post-inner">
                                        @if($artikel->gambar)
                                        <div class="post-thumb">
                                            <img src="{{ $artikel->gambar_url }}" alt="{{ $artikel->judul }}" class="w-100 rounded shadow-sm">
                                        </div>
                                        @else
                                        <div class="post-thumb bg-light d-flex align-items-center justify-content-center">
                                            <i class="fas fa-newspaper fa-4x text-muted"></i>
                                        </div>
                                        @endif
                                        
                                        <div class="post-content">
                                            <div class="article-header">
                                                <h1 class="article-title">{{ $artikel->judul }}</h1>
                                                
                                                <div class="article-meta">
                                                    <div class="meta-item">
                                                        <i class="icofont-calendar"></i>
                                                        <span>{{ $artikel->formatted_published_at }}</span>
                                                    </div>
                                                    <div class="meta-item">
                                                        <i class="icofont-ui-user"></i>
                                                        <span>{{ $artikel->penulis ?? 'Admin' }}</span>
                                                    </div>
                                                    @if($artikel->kategori)
                                                    <div class="meta-item">
                                                        <i class="icofont-tag"></i>
                                                        <span class="badge bg-primary">{{ $artikel->kategori }}</span>
                                                    </div>
                                                    @endif
                                                </div>
                                            </div>
                                            
                                            @if($artikel->ringkasan)
                                                <div class="article-summary">
                                                    <div class="alert alert-info">
                                                        <i class="fas fa-info-circle me-2"></i>
                                                        <strong>Ringkasan:</strong> {{ $artikel->ringkasan }}
                                                    </div>
                                                </div>
                                            @endif

                                            @if($artikel->youtube_iframe)
                                                <div class="article-video">
                                                    {!! $artikel->youtube_iframe !!}
                                                </div>
                                            @endif

                                            <div class="article-content">
                                                {!! $artikel->konten_rendered !!}
                                            </div>

                                            @if($artikel->kategori)
                                            <div class="article-footer">
                                                <div class="tags-section">
                                                    <h6><i class="fas fa-tags me-2"></i>Tags:</h6>
                                                    <div class="tags">
                                                        <span class="badge bg-secondary me-2">{{ $artikel->kategori }}</span>
                                                        <span class="badge bg-secondary me-2">Berita Sekolah</span>
                                                        <span class="badge bg-secondary me-2">SDIT Lukmanalhakim</span>
                                                    </div>
                                                </div>
                                                
                                                <div class="social-share">
                                                    <h6><i class="fas fa-share-alt me-2"></i>Bagikan:</h6>
                                                    <div class="social-icons">
                                                        <a href="#" class="btn btn-sm btn-outline-primary me-2" title="Facebook">
                                                            <i class="icofont-facebook"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-sm btn-outline-info me-2" title="Twitter">
                                                            <i class="icofont-twitter"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-sm btn-outline-primary me-2" title="LinkedIn">
                                                            <i class="icofont-linkedin"></i>
                                                        </a>
                                                        <a href="#" class="btn btn-sm btn-outline-danger me-2" title="Instagram">
                                                            <i class="icofont-instagram"></i>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                @if($relatedArticles->count() > 0)
                                <div class="navigation-section">
                                    <div class="row">
                                        <div class="col-md-6">
                                            @if($relatedArticles->first())
                                            <a href="{{ route('blog-single', $relatedArticles->first()->slug) }}" class="btn btn-outline-primary w-100">
                                                <i class="icofont-double-left me-2"></i>
                                                <div class="nav-text">
                                                    <small>Artikel Sebelumnya</small>
                                                    <div>{{ Str::limit($relatedArticles->first()->judul, 30) }}</div>
                                                </div>
                                            </a>
                                            @endif
                                        </div>
                                        <div class="col-md-6">
                                            @if($relatedArticles->count() > 1)
                                            <a href="{{ route('blog-single', $relatedArticles[1]->slug) }}" class="btn btn-outline-primary w-100">
                                                <div class="nav-text">
                                                    <small>Artikel Selanjutnya</small>
                                                    <div>{{ Str::limit($relatedArticles[1]->judul, 30) }}</div>
                                                </div>
                                                <i class="icofont-double-right ms-2"></i>
                                            </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endif

                                @if($relatedArticles->count() > 0)
                                <div class="related-articles">
                                    <div class="section-title">
                                        <h4><i class="fas fa-newspaper me-2"></i>Artikel Terkait</h4>
                                    </div>
                                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center g-4">
                                        @foreach($relatedArticles->take(3) as $relatedArticle)
                                        <div class="col">
                                            <div class="card h-100 shadow-sm">
                                                <div class="card-body">
                                                    <div class="related-thumb mb-3">
                                                        <a href="{{ route('blog-single', $relatedArticle->slug) }}">
                                                            @if($relatedArticle->gambar)
                                                                <img src="{{ $relatedArticle->gambar_url }}" 
                                                                     alt="{{ $relatedArticle->judul }}"
                                                                     class="img-fluid rounded">
                                                            @else
                                                                <div class="bg-light d-flex align-items-center justify-content-center rounded" 
                                                                     style="height: 150px;">
                                                                    <i class="fas fa-newspaper fa-2x text-muted"></i>
                                                                </div>
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="related-content">
                                                        <h6 class="card-title">
                                                            <a href="{{ route('blog-single', $relatedArticle->slug) }}" 
                                                               class="text-decoration-none">
                                                                {{ $relatedArticle->judul }}
                                                            </a>
                                                        </h6>
                                                        <div class="meta-post">
                                                            <small class="text-muted">
                                                                <i class="icofont-calendar me-1"></i>
                                                                {{ $relatedArticle->formatted_published_at }}
                                                            </small>
                                                        </div>
                                                        @if($relatedArticle->ringkasan)
                                                            <p class="card-text mt-2">
                                                                <small class="text-muted">
                                                                    {{ Str::limit($relatedArticle->ringkasan, 80) }}
                                                                </small>
                                                            </p>
                                                        @endif
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        @endforeach
                                    </div>
                                </div>
                                @endif
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            
            <div class="col-lg-4 col-12">
                <aside class="blog-sidebar">

                    <div class="widget widget-category mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title"><i class="fas fa-folder me-2"></i>Kategori Artikel</h6>
                                <ul class="list-unstyled">
                                    @php
                                        $categories = \App\Models\Artikel::where('is_active', true)
                                            ->whereNotNull('published_at')
                                            ->where('published_at', '<=', now())
                                            ->whereNotNull('kategori')
                                            ->selectRaw('kategori, COUNT(*) as count')
                                            ->groupBy('kategori')
                                            ->get();
                                    @endphp
                                    
                                    @foreach($categories as $category)
                                    <li class="mb-2">
                                        <a href="{{ route('blog') }}?kategori={{ urlencode($category->kategori) }}" 
                                           class="d-flex justify-content-between align-items-center text-decoration-none">
                                            <span><i class="icofont-double-right me-2"></i>{{ $category->kategori }}</span>
                                            <span class="badge bg-primary">{{ $category->count }}</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="widget widget-post mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title"><i class="fas fa-fire me-2"></i>Artikel Populer</h6>
                                @php
                                    $popularArticles = \App\Models\Artikel::where('is_active', true)
                                        ->whereNotNull('published_at')
                                        ->where('published_at', '<=', now())
                                        ->orderBy('published_at', 'desc')
                                        ->limit(5)
                                        ->get();
                                @endphp
                                
                                @foreach($popularArticles as $popularArticle)
                                <div class="popular-post-item d-flex mb-3">
                                    <div class="post-thumb me-3">
                                        <a href="{{ route('blog-single', $popularArticle->slug) }}">
                                            @if($popularArticle->gambar)
                                                <img src="{{ $popularArticle->gambar_url }}" 
                                                     alt="{{ $popularArticle->judul }}"
                                                     class="rounded" 
                                                     style="width: 60px; height: 60px; object-fit: cover;">
                                            @else
                                                <div class="bg-light d-flex align-items-center justify-content-center rounded" 
                                                     style="width: 60px; height: 60px;">
                                                    <i class="fas fa-newspaper text-muted"></i>
                                                </div>
                                            @endif
                                        </a>
                                    </div>
                                    <div class="post-content">
                                        <h6 class="mb-1">
                                            <a href="{{ route('blog-single', $popularArticle->slug) }}" 
                                               class="text-decoration-none">
                                                {{ Str::limit($popularArticle->judul, 40) }}
                                            </a>
                                        </h6>
                                        <small class="text-muted">
                                            <i class="icofont-calendar me-1"></i>
                                            {{ $popularArticle->formatted_published_at }}
                                        </small>
                                    </div>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    <div class="widget widget-archive mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title"><i class="fas fa-archive me-2"></i>Arsip Artikel</h6>
                                @php
                                    $archives = \App\Models\Artikel::where('is_active', true)
                                        ->whereNotNull('published_at')
                                        ->where('published_at', '<=', now())
                                        ->selectRaw('YEAR(published_at) as year, MONTH(published_at) as month, COUNT(*) as count')
                                        ->groupBy('year', 'month')
                                        ->orderBy('year', 'desc')
                                        ->orderBy('month', 'desc')
                                        ->limit(6)
                                        ->get();
                                @endphp
                                
                                <ul class="list-unstyled">
                                    @foreach($archives as $archive)
                                    <li class="mb-2">
                                        <a href="{{ route('blog') }}?year={{ $archive->year }}&month={{ $archive->month }}" 
                                           class="d-flex justify-content-between align-items-center text-decoration-none">
                                            <span>
                                                <i class="icofont-double-right me-2"></i>
                                                {{ \Carbon\Carbon::createFromDate($archive->year, $archive->month, 1)->format('F Y') }}
                                            </span>
                                            <span class="badge bg-secondary">{{ $archive->count }}</span>
                                        </a>
                                    </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>

                    <div class="widget widget-tags mb-4">
                        <div class="card">
                            <div class="card-body">
                                <h6 class="card-title"><i class="fas fa-tags me-2"></i>Tags Populer</h6>
                                <div class="tags">
                                    @php
                                        $tags = ['Ramadhan', 'Tahfidz', 'Olimpiade', 'PPDB', 'Prestasi', 'Kegiatan', 'Ekstrakurikuler', 'Pendidikan', 'Al-Qur\'an'];
                                    @endphp
                                    
                                    @foreach($tags as $tag)
                                    <a href="{{ route('blog') }}?tag={{ urlencode($tag) }}" 
                                       class="badge bg-light text-dark text-decoration-none me-1 mb-1">
                                        {{ $tag }}
                                    </a>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
<!-- Blog Single Section Ending -->

<style>
.blog-article .article-header {
    margin-bottom: 2rem;
}

.blog-article .article-title {
    font-size: 2.5rem;
    font-weight: 700;
    color: #333;
    margin-bottom: 1rem;
    line-height: 1.2;
}

.blog-article .article-meta {
    display: flex;
    flex-wrap: wrap;
    gap: 1rem;
    margin-bottom: 1.5rem;
}

.blog-article .meta-item {
    display: flex;
    align-items: center;
    gap: 0.5rem;
    color: #666;
    font-size: 0.9rem;
}

.blog-article .article-summary {
    margin-bottom: 2rem;
}

.blog-article .article-content {
    font-size: 1.1rem;
    line-height: 1.8;
    color: #333;
}

.blog-article .article-content h1, 
.blog-article .article-content h2, 
.blog-article .article-content h3, 
.blog-article .article-content h4, 
.blog-article .article-content h5, 
.blog-article .article-content h6 {
    margin-top: 2rem;
    margin-bottom: 1rem;
    color: #333;
}

.blog-article .article-content p {
    margin-bottom: 1.5rem;
}

.blog-article .article-content ul, 
.blog-article .article-content ol {
    margin-bottom: 1.5rem;
    padding-left: 2rem;
}

.blog-article .article-content li {
    margin-bottom: 0.5rem;
}

/* Enforce 16:9 aspect ratio for main article image */
.blog-article .post-item .post-thumb {
    position: relative;
    width: 100%;
    aspect-ratio: 16 / 9;
    overflow: hidden;
    background-color: #f8f9fa;
}
.blog-article .post-item .post-inner {
    border-radius: 12px;
    overflow: hidden; /* clip image/content to rounded corners */
    background: #fff;
    box-shadow: 0 8px 24px rgba(0,0,0,0.08);
}
.blog-article .post-item .post-thumb > img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    display: block;
}
.blog-article .post-item .post-thumb.bg-light {
    display: flex;
    align-items: center;
    justify-content: center;
    aspect-ratio: 16 / 9;
}

.blog-article .article-footer {
    margin-top: 3rem;
    padding-top: 2rem;
    border-top: 1px solid #eee;
}

/* Footer layout: stack on mobile */
.blog-article .article-footer { display: flex !important; flex-direction: column; gap: 1rem; }
.blog-article .article-footer .tags-section,
.blog-article .article-footer .social-share { display: block; width: 100%; clear: both; }
/* Force vertical stacking inside tags-section */
.blog-article .article-footer .tags-section {
    display: flex; flex-direction: column; align-items: flex-start; text-align: left; gap: .5rem;
}
.blog-article .article-footer .tags-section > * { width: 100%; }
.blog-article .article-footer .tags-section h6 { display: block; margin: 0 0 .5rem 0; float: none; order: 1; width: 100%; }
.blog-article .article-footer .tags-section .tags { order: 2; }
/* Remove any top borders/separators causing misalignment */
.blog-article .article-footer .tags-section,
.blog-article .article-footer .tags-section * {
    border-top: 0 !important;
}
.blog-article .article-footer .tags-section { margin-top: 0 !important; padding-top: 0 !important; }
.blog-article .article-footer .tags-section hr { display: none !important; height: 0 !important; margin: 0 !important; }
/* Ensure tag items are below the label (not floating to the right) */
.blog-article .article-footer .tags-section .tags {
    display: flex !important;
    flex-wrap: wrap;
    gap: .5rem;
    float: none;
    clear: both;
    justify-content: flex-start;
    width: 100% !important;
}
.blog-article .tags-section .tags { margin: 0 !important; }
.blog-article .tags-section .tags .badge { margin: 0; }
.blog-article .article-footer .social-share { margin-top: 1rem; }

/* Desktop: two equal columns, aligned to the top */
@media (min-width: 768px) {
  .blog-article .article-footer {
    display: grid !important;
    grid-template-columns: 1fr 1fr;
    align-items: start;
    column-gap: 2rem;
  }
  .blog-article .article-footer .social-share { order: 1; width: 100%; margin-top: 0; }
  .blog-article .article-footer .tags-section { order: 2; width: 100%; margin-top: 0; }
}

.blog-article .tags-section,
.blog-article .social-share {
    margin-bottom: 1.5rem;
}

.blog-article .tags-section h6,
.blog-article .social-share h6 {
    margin: 0 0 1rem 0; /* remove any top margin offset */
    padding: 0;         /* normalize heading padding */
    border: 0;          /* ensure no top border on headings */
    color: #333;
}

.blog-article .social-icons {
    display: flex;
    gap: 0.5rem;
}

.navigation-section {
    margin: 3rem 0;
    padding: 2rem 0;
    border-top: 1px solid #eee;
    border-bottom: 1px solid #eee;
}

.navigation-section .nav-text {
    text-align: left;
}

.navigation-section .btn {
    text-align: left;
    padding: 1rem;
    height: auto;
}

.related-articles {
    margin-top: 3rem;
}

.related-articles .section-title {
    margin-bottom: 2rem;
    text-align: center;
}

.related-articles .section-title h4 {
    color: #333;
    font-weight: 600;
}

.blog-sidebar .card {
    border: none;
    box-shadow: 0 2px 10px rgba(0,0,0,0.1);
    border-radius: 10px;
}

.blog-sidebar .card-title {
    color: #333;
    font-weight: 600;
    margin-bottom: 1rem;
}

.blog-sidebar .popular-post-item:hover {
    background-color: #f8f9fa;
    border-radius: 5px;
    padding: 0.5rem;
    margin: -0.5rem;
}

.blog-sidebar .tags .badge:hover {
    background-color: #007bff !important;
    color: white !important;
}

@media (max-width: 768px) {
    .blog-article .article-title {
        font-size: 2rem;
    }
    
    .blog-article .article-meta {
        flex-direction: column;
        gap: 0.5rem;
    }
    
    .navigation-section .btn {
        margin-bottom: 1rem;
    }
}
</style>
@endsection 
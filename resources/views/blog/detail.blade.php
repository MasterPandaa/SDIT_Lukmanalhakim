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
                            <li class="breadcrumb-item"><a href="{{ route('blog') }}">Berita</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $artikel->judul }}</li>
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
                <article>
                    <div class="section-wrapper">
                        <div class="row row-cols-1 justify-content-center g-4">
                            <div class="col">
                                <div class="post-item style-2">
                                    <div class="post-inner">
                                        @if($artikel->gambar)
                                        <div class="post-thumb">
                                            <img src="{{ $artikel->gambar_url }}" alt="{{ $artikel->judul }}" class="w-100">
                                        </div>
                                        @endif
                                        <div class="post-content">
                                            <h2>{{ $artikel->judul }}</h2>
                                            <div class="meta-post">
                                                <ul class="lab-ul">
                                                    <li><a href="#"><i class="icofont-calendar"></i> {{ $artikel->formatted_published_at }}</a></li>
                                                    <li><a href="#"><i class="icofont-ui-user"></i> {{ $artikel->penulis ?? 'Admin' }}</a></li>
                                                    @if($artikel->kategori)
                                                        <li><a href="#"><i class="icofont-tag"></i> {{ $artikel->kategori }}</a></li>
                                                    @endif
                                                    <li><a href="#"><i class="icofont-speech-comments"></i> 0 Komentar</a></li>
                                                </ul>
                                            </div>
                                            
                                            @if($artikel->ringkasan)
                                                <div class="article-summary">
                                                    <p class="lead">{{ $artikel->ringkasan }}</p>
                                                </div>
                                            @endif

                                            <div class="article-content">
                                                {!! $artikel->konten !!}
                                            </div>

                                            @if($artikel->kategori)
                                            <div class="tags-section">
                                                <ul class="tags lab-ul">
                                                    <li><a href="#">{{ $artikel->kategori }}</a></li>
                                                    <li><a href="#">Berita Sekolah</a></li>
                                                    <li><a href="#">SDIT Lukmanalhakim</a></li>
                                                </ul>
                                                <ul class="lab-ul social-icons">
                                                    <li>
                                                        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="pinterest"><i class="icofont-pinterest"></i></a>
                                                    </li>
                                                </ul> 
                                            </div>
                                            @endif
                                        </div>
                                    </div>
                                </div>

                                @if($relatedArticles->count() > 0)
                                <div class="navigations-part">
                                    <div class="left">
                                        @if($relatedArticles->first())
                                        <a href="{{ route('blog-single', $relatedArticles->first()->slug) }}" class="prev">
                                            <i class="icofont-double-left"></i>Artikel Sebelumnya
                                        </a>
                                        @endif
                                    </div>
                                    <div class="right">
                                        @if($relatedArticles->count() > 1)
                                        <a href="{{ route('blog-single', $relatedArticles[1]->slug) }}" class="next">
                                            Artikel Selanjutnya<i class="icofont-double-right"></i>
                                        </a>
                                        @endif
                                    </div>
                                </div>
                                @endif

                                @if($relatedArticles->count() > 0)
                                <div class="releted-post">
                                    <div class="title">
                                        <h5>Artikel Terkait</h5>
                                    </div>
                                    <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center g-4">
                                        @foreach($relatedArticles->take(3) as $relatedArticle)
                                        <div class="col">
                                            <div class="post-item">
                                                <div class="post-inner">
                                                    <div class="post-thumb">
                                                        <a href="{{ route('blog-single', $relatedArticle->slug) }}">
                                                            @if($relatedArticle->gambar)
                                                                <img src="{{ $relatedArticle->gambar_url }}" alt="{{ $relatedArticle->judul }}">
                                                            @else
                                                                <img src="{{ asset('assets/images/blog/default.jpg') }}" alt="{{ $relatedArticle->judul }}">
                                                            @endif
                                                        </a>
                                                    </div>
                                                    <div class="post-content">
                                                        <a href="{{ route('blog-single', $relatedArticle->slug) }}"><h6>{{ $relatedArticle->judul }}</h6></a>
                                                        <div class="meta-post">
                                                            <ul class="lab-ul">
                                                                <li><i class="icofont-calendar"></i> {{ $relatedArticle->formatted_published_at }}</li>
                                                            </ul>
                                                        </div>
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
                <aside>
                    <div class="widget widget-search">
                        <form action="/" class="search-wrapper">
                            <input type="text" name="s" placeholder="Cari...">
                            <button type="submit"><i class="icofont-search-2"></i></button>
                        </form>
                    </div>
                    <div class="widget widget-category">
                        <div class="widget-header">
                            <h5 class="title">Kategori Berita</h5>
                        </div>
                        <ul class="widget-wrapper">
                            <li>
                                <a href="#" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>Kegiatan Sekolah</span><span>12</span></a>
                            </li>
                            <li>
                                <a href="#" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>Prestasi</span><span>08</span></a>
                            </li>
                            <li>
                                <a href="#" class="d-flex active flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>Pengumuman</span><span>05</span></a>
                            </li>
                            <li>
                                <a href="#" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>Tahfidz</span><span>07</span></a>
                            </li>
                            <li>
                                <a href="#" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>Ekstrakurikuler</span><span>03</span></a>
                            </li>
                            <li>
                                <a href="#" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>PPDB</span><span>02</span></a>
                            </li>
                        </ul>
                    </div>

                    <div class="widget widget-post">
                        <div class="widget-header">
                            <h5 class="title">Berita Populer</h5>
                        </div>
                        <ul class="widget-wrapper">
                            <li class="d-flex flex-wrap justify-content-between">
                                <div class="post-thumb">
                                    <a href="{{ route('blog-single', 'kegiatan-ramadhan-sdit-lukmanalhakim') }}"><img src="{{ asset('assets/images/blog/01.jpg') }}" alt="post"></a>
                                </div>
                                <div class="post-content">
                                    <a href="{{ route('blog-single', 'kegiatan-ramadhan-sdit-lukmanalhakim') }}"><h6>Kegiatan Ramadhan SDIT Lukmanalhakim</h6></a>
                                    <p>15 Juni 2025</p>
                                </div>
                            </li>
                            <li class="d-flex flex-wrap justify-content-between">
                                <div class="post-thumb">
                                    <a href="{{ route('blog-single', 'prestasi-olimpiade-matematika') }}"><img src="{{ asset('assets/images/blog/02.jpg') }}" alt="post"></a>
                                </div>
                                <div class="post-content">
                                    <a href="{{ route('blog-single', 'prestasi-olimpiade-matematika') }}"><h6>Prestasi Olimpiade Matematika</h6></a>
                                    <p>10 Juni 2025</p>
                                </div>
                            </li>
                            <li class="d-flex flex-wrap justify-content-between">
                                <div class="post-thumb">
                                    <a href="{{ route('blog-single', 'ppdb-tahun-ajaran-2025-2026') }}"><img src="{{ asset('assets/images/blog/03.jpg') }}" alt="post"></a>
                                </div>
                                <div class="post-content">
                                    <a href="{{ route('blog-single', 'ppdb-tahun-ajaran-2025-2026') }}"><h6>PPDB Tahun Ajaran 2025/2026</h6></a>
                                    <p>5 Juni 2025</p>
                                </div>
                            </li>
                            <li class="d-flex flex-wrap justify-content-between">
                                <div class="post-thumb">
                                    <a href="{{ route('blog-single', 'kunjungan-edukatif-ke-museum') }}"><img src="{{ asset('assets/images/blog/04.jpg') }}" alt="post"></a>
                                </div>
                                <div class="post-content">
                                    <a href="{{ route('blog-single', 'kunjungan-edukatif-ke-museum') }}"><h6>Kunjungan Edukatif ke Museum</h6></a>
                                    <p>1 Juni 2025</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="widget widget-archive">
                        <div class="widget-header">
                            <h5 class="title">Arsip Berita</h5>
                        </div>
                        <ul class="widget-wrapper">
                            <li><a href="archive.html" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>Juni</span><span>2025</span></a> </li>
                            <li><a href="archive.html" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>Mei</span><span>2025</span></a></li>
                            <li><a href="archive.html" class="d-flex active flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>April</span><span>2025</span></a></li>
                            <li><a href="archive.html" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>Maret</span><span>2025</span></a></li>
                            <li><a href="archive.html" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>Februari</span><span>2025</span></a></li>
                            <li><a href="archive.html" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>Januari</span><span>2025</span></a></li>
                        </ul>
                    </div>

                    <div class="widget widget-instagram">
                        <div class="widget-header">
                            <h5 class="title">Galeri Foto</h5>
                        </div>
                        <ul class="widget-wrapper d-flex flex-wrap justify-content-center">
                            <li><a data-rel="lightcase" href="{{ asset('assets/images/blog/01.jpg') }}"><img src="{{ asset('assets/images/blog/01.jpg') }}" alt="product"></a></li>
                            <li><a data-rel="lightcase" href="{{ asset('assets/images/blog/02.jpg') }}"><img src="{{ asset('assets/images/blog/02.jpg') }}" alt="product"></a></li>
                            <li><a data-rel="lightcase" href="{{ asset('assets/images/blog/03.jpg') }}"><img src="{{ asset('assets/images/blog/03.jpg') }}" alt="product"></a></li>
                            <li><a data-rel="lightcase" href="{{ asset('assets/images/blog/04.jpg') }}"><img src="{{ asset('assets/images/blog/04.jpg') }}" alt="product"></a></li>
                            <li><a data-rel="lightcase" href="{{ asset('assets/images/blog/05.jpg') }}"><img src="{{ asset('assets/images/blog/05.jpg') }}" alt="product"></a></li>
                            <li><a data-rel="lightcase" href="{{ asset('assets/images/blog/06.jpg') }}"><img src="{{ asset('assets/images/blog/06.jpg') }}" alt="product"></a></li>
                            <li><a data-rel="lightcase" href="{{ asset('assets/images/blog/07.jpg') }}"><img src="{{ asset('assets/images/blog/07.jpg') }}" alt="product"></a></li>
                            <li><a data-rel="lightcase" href="{{ asset('assets/images/blog/08.jpg') }}"><img src="{{ asset('assets/images/blog/08.jpg') }}" alt="product"></a></li>
                            <li><a data-rel="lightcase" href="{{ asset('assets/images/blog/09.jpg') }}"><img src="{{ asset('assets/images/blog/09.jpg') }}" alt="product"></a></li>
                        </ul>
                    </div>

                    <div class="widget widget-tags">
                        <div class="widget-header">
                            <h5 class="title">Tags Populer</h5>
                        </div>
                        <ul class="widget-wrapper">
                            <li><a href="#">Ramadhan</a></li>
                            <li><a href="#" class="active">Tahfidz</a></li>
                            <li><a href="#">Olimpiade</a></li>
                            <li><a href="#">PPDB</a></li>
                            <li><a href="#">Prestasi</a></li>
                            <li><a href="#">Kegiatan</a></li>
                            <li><a href="#">Ekstrakurikuler</a></li>
                            <li><a href="#">Pendidikan</a></li>
                            <li><a href="#">Al-Qur'an</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
<!-- Blog Single Section Ending -->
@endsection 
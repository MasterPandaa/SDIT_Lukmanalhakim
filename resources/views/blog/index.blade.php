@extends('layouts.app')

@section('title', 'Berita')

@section('content')
<!-- Page Header Section Start -->
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Berita & Kegiatan</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Berita</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header Section Ending -->

<!-- Blog Section Start -->
<div class="blog-section padding-tb section-bg">
    <div class="container">
        <div class="section-wrapper">
            @if($artikels->count() > 0)
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center g-4">
                    @foreach($artikels as $artikel)
                    <div class="col">
                        <div class="post-item">
                            <div class="post-inner">
                                <div class="post-thumb">
                                    <a href="{{ route('blog-single', $artikel->slug) }}">
                                        @if($artikel->gambar)
                                            <img src="{{ $artikel->gambar_url }}" alt="{{ $artikel->judul }}">
                                        @else
                                            <img src="{{ asset('assets/images/blog/default.jpg') }}" alt="{{ $artikel->judul }}">
                                        @endif
                                    </a>
                                </div>
                                <div class="post-content">
                                    <a href="{{ route('blog-single', $artikel->slug) }}"><h4>{{ $artikel->judul }}</h4></a>
                                    <div class="meta-post">
                                        <ul class="lab-ul">
                                            <li><i class="icofont-ui-user"></i> {{ $artikel->penulis ?? 'Admin' }}</li>
                                            <li><i class="icofont-calendar"></i> {{ $artikel->formatted_published_at }}</li>
                                            @if($artikel->kategori)
                                                <li><i class="icofont-tag"></i> {{ $artikel->kategori }}</li>
                                            @endif
                                        </ul>
                                    </div>
                                    <p>{{ $artikel->ringkasan ?? $artikel->excerpt }}</p>
                                </div>
                                <div class="post-footer">
                                    <div class="pf-left">
                                        <a href="{{ route('blog-single', $artikel->slug) }}" class="lab-btn-text">Selengkapnya <i class="icofont-external-link"></i></a>
                                    </div>
                                    <div class="pf-right">
                                        <i class="icofont-comment"></i>
                                        <span class="comment-count">0</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>

                <!-- Pagination -->
                @if($artikels->hasPages())
                    <div class="pagination-wrapper">
                        <div class="d-flex justify-content-center">
                            {{ $artikels->links() }}
                        </div>
                    </div>
                @endif
            @else
                <div class="text-center py-5">
                    <div class="empty-state">
                        <i class="icofont-newspaper" style="font-size: 4rem; color: #ccc;"></i>
                        <h4 class="mt-3">Belum ada artikel</h4>
                        <p class="text-muted">Artikel akan ditampilkan di sini setelah dipublikasikan.</p>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>
<!-- Blog Section Ending -->
@endsection 
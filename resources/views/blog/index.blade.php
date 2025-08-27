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
            @php
                $hasFilters = request()->filled('kategori') || request()->filled('tag') || request()->filled('year') || request()->filled('month') || request()->filled('search');
            @endphp

            @if($hasFilters)
                <div class="filter-bar card shadow-sm mb-3">
                    <div class="card-body d-flex flex-wrap align-items-center justify-content-between gap-2">
                        <div class="d-flex flex-wrap align-items-center gap-2">
                            <strong class="me-1">Filter aktif:</strong>
                            @if(request('kategori'))
                                <span class="badge bg-primary">Kategori: {{ request('kategori') }}</span>
                            @endif
                            @if(request('tag'))
                                <span class="badge bg-success">Tag: {{ request('tag') }}</span>
                            @endif
                            @if(request('year'))
                                <span class="badge bg-secondary">Tahun: {{ request('year') }}</span>
                            @endif
                            @if(request('month'))
                                <span class="badge bg-secondary">Bulan: {{ request('month') }}</span>
                            @endif
                            @if(request('search'))
                                <span class="badge bg-info text-dark">Cari: {{ request('search') }}</span>
                            @endif
                        </div>
                        <div>
                            <a href="{{ route('blog') }}" class="btn btn-sm btn-outline-secondary">Hapus filter</a>
                        </div>
                    </div>
                </div>
            @endif

            <!-- Filter Form Bar -->
            <div class="card shadow-sm mb-4">
                <form action="{{ route('blog') }}" method="GET" class="card-body row g-3 align-items-end">
                    <div class="col-12 col-md-4">
                        <label for="search" class="form-label mb-1">Cari</label>
                        <input type="text" name="search" id="search" value="{{ request('search') }}" placeholder="Cari judul atau isi..." class="form-control">
                    </div>
                    <div class="col-6 col-md-3">
                        <label for="kategori" class="form-label mb-1">Kategori</label>
                        <select name="kategori" id="kategori" class="form-select">
                            <option value="">Semua Kategori</option>
                            @isset($categories)
                                @foreach($categories as $c)
                                    <option value="{{ $c->kategori }}" {{ request('kategori') == $c->kategori ? 'selected' : '' }}>
                                        {{ $c->kategori }} ({{ $c->count }})
                                    </option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                    <div class="col-6 col-md-2">
                        <label for="year" class="form-label mb-1">Tahun</label>
                        <select name="year" id="year" class="form-select">
                            <option value="">Semua</option>
                            @isset($archives)
                                @php
                                    $years = collect($archives)->pluck('year')->unique()->sortDesc();
                                @endphp
                                @foreach($years as $y)
                                    <option value="{{ $y }}" {{ request('year') == $y ? 'selected' : '' }}>{{ $y }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                    <div class="col-12 col-md-auto d-grid d-md-flex justify-content-md-end gap-2">
                        <button type="submit" class="btn btn-primary">Filter</button>
                        <a href="{{ route('blog') }}" class="btn btn-primary">Reset</a>
                    </div>
                </form>
            </div>

            @if($artikels->count() > 0)
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center g-4">
                    @foreach($artikels as $artikel)
                    <div class="col d-flex">
                        <div class="post-item w-100 h-100">
                            <div class="post-inner d-flex flex-column h-100">
                                <div class="post-thumb ratio-16x9">
                                    <a href="{{ route('blog-single', $artikel->slug) }}">
                                        <img src="{{ $artikel->gambar_url }}" alt="{{ $artikel->judul }}" onerror="this.onerror=null;this.src='{{ asset('assets/images/default/artikel-default.jpg') }}';">
                                    </a>
                                </div>
                                <div class="post-content flex-grow-1">
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
                                <div class="post-footer mt-auto">
                                    <div class="pf-left">
                                        <a href="{{ route('blog-single', $artikel->slug) }}" class="lab-btn-text">Selengkapnya <i class="icofont-external-link"></i></a>
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

@push('styles')
<style>
/* Equal-height cards & 16:9 thumbnails */
.blog-section .post-item .post-inner { 
    border-radius: 12px; 
    background: #fff; 
    box-shadow: 0 6px 18px rgba(0,0,0,0.06);
}
.blog-section .post-item .post-thumb { 
    position: relative; 
    width: 100%; 
    overflow: hidden; 
    background: #f8f9fa; 
}
/* Modern CSS aspect-ratio with fallback class */
.blog-section .post-item .post-thumb.ratio-16x9 { aspect-ratio: 16/9; }
.blog-section .post-item .post-thumb > img { 
    width: 100%; 
    height: 100%; 
    object-fit: cover; 
    display: block; 
}
.blog-section .post-item .post-content { padding: 1rem 1.25rem .5rem; }
.blog-section .post-item .post-footer { 
    padding: .75rem 1.25rem 1rem; 
    border-top: 1px solid #eee; 
}
.blog-section .post-item .post-footer .pf-left { margin-left: -20px; margin-top: 10px; }
.blog-section .post-item .post-footer .lab-btn-text { display: inline-flex; align-items: center; }
</style>
@endpush
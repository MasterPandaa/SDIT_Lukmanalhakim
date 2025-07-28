@extends('layouts.app')

@section('title', $kurikulum->judul ?? 'Kurikulum')

@section('content')
<div class="main-wrapper">
    <!-- Breadcrumb Area -->
    <div class="breadcrumb-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="breadcrumb-wrap">
                        <nav aria-label="breadcrumb">
                            <h3 class="breadcrumb-title">{{ $kurikulum->judul ?? 'Kurikulum' }}</h3>
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                                <li class="breadcrumb-item"><a href="#">Profil</a></li>
                                <li class="breadcrumb-item active" aria-current="page">{{ $kurikulum->judul ?? 'Kurikulum' }}</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Course Area -->
    <div class="course-area section-space--ptb_100">
        <div class="container">
            @if($kurikulum)
                <!-- Header Section -->
                <div class="row align-items-center section-space--mb_60">
                    <div class="col-lg-8">
                        <div class="section-title-wrap">
                            <h3 class="heading">{{ $kurikulum->judul }}</h3>
                            @if($kurikulum->subtitle)
                                <h6 class="section-sub-title text-primary">{{ $kurikulum->subtitle }}</h6>
                            @endif
                            @if($kurikulum->deskripsi)
                                <div class="text-gray-700 mt-3">
                                    {!! $kurikulum->deskripsi !!}
                                </div>
                            @endif
                        </div>
                    </div>
                    @if($kurikulum->gambar_header)
                        <div class="col-lg-4">
                            <div class="image-wrap">
                                <img src="{{ $kurikulum->gambar_header_url }}" alt="{{ $kurikulum->judul }}" class="img-fluid rounded shadow">
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Kurikulum Items -->
                @if($kurikulum->items->count() > 0)
                    <div class="row">
                        @foreach($kurikulum->items as $item)
                            <div class="col-lg-6 col-md-6 mb-4">
                                <div class="single-course-wrap h-100 hover-effect shadow-sm">
                                    <div class="single-course-image-wrap">
                                        <a href="#" class="single-course-image d-block">
                                            <img src="{{ $item->gambar_url }}" alt="{{ $item->judul }}" class="img-fluid">
                                        </a>
                                        <div class="single-course-header">
                                            <div class="single-course-header-left">
                                                <h5 class="category">
                                                    <span class="course-price" style="background-color: {{ $item->color }};">
                                                        <i class="{{ $item->icon }}" style="color: white;"></i>
                                                    </span>
                                                </h5>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="single-course-text-wrap">
                                        <div class="single-course-text">
                                            <h4 class="single-course-heading">
                                                <a href="#" style="color: {{ $item->color }};">{{ $item->judul }}</a>
                                            </h4>
                                            <div class="single-course-content">
                                                {!! $item->deskripsi !!}
                                            </div>
                                        </div>
                                        <div class="single-course-content-bottom">
                                            <div class="single-course-meta">
                                                <span class="badge" style="background-color: {{ $item->color }}; color: white;">
                                                    Kurikulum {{ $item->urutan }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                @else
                    <div class="row">
                        <div class="col-12">
                            <div class="text-center py-5">
                                <div class="empty-state">
                                    <i class="fa fa-book fa-3x text-muted mb-3"></i>
                                    <h4 class="text-muted">Belum Ada Data Kurikulum</h4>
                                    <p class="text-muted">Data kurikulum sedang dalam proses penyusunan.</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @else
                <!-- Fallback jika belum ada data -->
                <div class="row align-items-center section-space--mb_60">
                    <div class="col-lg-12">
                        <div class="section-title-wrap text-center">
                            <h3 class="heading">Kurikulum</h3>
                            <h6 class="section-sub-title text-primary">Teach on edulon</h6>
                            <p class="text-gray-700 mt-3">
                                Sistem kurikulum sedang dalam tahap pengembangan. Silakan kembali lagi nanti untuk informasi lebih lengkap.
                            </p>
                        </div>
                    </div>
                </div>
            @endif
        </div>
    </div>
</div>

<style>
.hover-effect {
    transition: all 0.3s ease;
    border: 1px solid #eee;
}

.hover-effect:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
}

.single-course-wrap {
    border-radius: 10px;
    overflow: hidden;
    background: white;
}

.single-course-image {
    position: relative;
    overflow: hidden;
}

.single-course-image img {
    transition: transform 0.3s ease;
    height: 200px;
    object-fit: cover;
    width: 100%;
}

.single-course-image:hover img {
    transform: scale(1.05);
}

.course-price {
    width: 50px;
    height: 50px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 18px;
}

.single-course-text-wrap {
    padding: 25px;
}

.single-course-heading a {
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
}

.single-course-heading a:hover {
    opacity: 0.8;
}

.single-course-content {
    margin: 15px 0;
    line-height: 1.6;
}

.single-course-content p {
    margin-bottom: 10px;
}

.single-course-content ul {
    padding-left: 20px;
}

.single-course-content li {
    margin-bottom: 5px;
}

.empty-state {
    padding: 50px 20px;
}

.image-wrap img {
    max-height: 300px;
    object-fit: cover;
}

@media (max-width: 768px) {
    .single-course-image img {
        height: 180px;
    }
    
    .single-course-text-wrap {
        padding: 20px;
    }
}
</style>
@endsection 
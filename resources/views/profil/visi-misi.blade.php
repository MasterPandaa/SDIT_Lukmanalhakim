@extends('layouts.app')

@section('title', 'Visi & Misi')

@section('content')
<style>
/* Custom fix for banner-section.style-7 margin issue */
.banner-section.style-7 {
    margin-top: 0 !important;
}
@media (min-width: 992px) {
    .banner-section.style-7 {
        margin-top: 0 !important;
    }
}
</style>

<!-- Pageheader section start here -->
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Visi & Misi</h2>
                    <p class="desc">Mengenal visi dan misi SDIT Luqman Al Hakim Sleman</p>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Visi & Misi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Pageheader section ending here -->

<!-- Banner section start here -->
<section class="banner-section style-7" style="padding-top: 50px; padding-bottom: 50px;">
    <div class="container">
        <div class="section-wrapper">
            <div class="banner-top">
                <div class="row justify-content-center">
                    <div class="offset-xl-6 col-xl-6">
                        <div class="banner-content">
                            <h2 class="title">{{ $visiMisi->judul_header }}</h2>
                            <p class="desc">{{ $visiMisi->deskripsi_header }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner section ending here -->

<!-- Features Start Here -->
<section class="feature-section style-2 style-4 padding-tb pb-0">
    <div class="container">
        <div class="section-header text-center">
            <span class="subtitle yellow-color">Visi Sekolah</span>
            <h2 class="title">{{ $visiMisi->visi }}</h2>
        </div>
        <div class="section-header text-center">
            <span class="subtitle yellow-color">Misi Sekolah</span>
        </div>
        <div class="section-wrapper">
            <div class="row g-4 justify-content-center align-items-center">
                <div class="col-lg-4 col-sm-6 col-12 order-lg-0">
                    <div class="left text-lg-end">
                        @foreach(array_slice($visiMisi->misi_items, 0, 3) as $item)
                        <div class="feature-item">
                            <div class="feature-inner flex-lg-row-reverse">
                                <div class="feature-icon">
                                    <i class="{{ $item['icon'] }}"></i>
                                </div>
                                <div class="feature-content">
                                    <h5>{{ $item['judul'] }}</h5>
                                    <p>{{ $item['deskripsi'] }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12 order-lg-2">
                    <div class="right">
                        @foreach(array_slice($visiMisi->misi_items, 3, 3) as $item)
                        <div class="feature-item">
                            <div class="feature-inner">
                                <div class="feature-icon">
                                    <i class="{{ $item['icon'] }}"></i>
                                </div>
                                <div class="feature-content">
                                    <h5>{{ $item['judul'] }}</h5>
                                    <p>{{ $item['deskripsi'] }}</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
                <div class="col-lg-4 col-sm-6 col-12 order-lg-1">
                    <div class="feature-thumb">
                        <div class="abs-thumb">
                            <img src="{{ $visiMisi->gambar_header_url ?? asset('assets/images/feature/10.png') }}" alt="education">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Features End Here -->

<!-- Offer Section Start Here -->
<div class="offer-section padding-tb">
    <div class="container">
        <div class="row g-4 justify-content-center align-items-center">
            <div class="col-lg-6 col-12">
                <div class="section-header">
                    <h2 class="title">Penerimaan Peserta Didik Baru</h2>
                    <p>Mari Bergabung Bersama Kami</p>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="section-wrapper">
                    <div class="offer-area">
                        <h3 class="title"><span>Discount</span> <b>30%.</b> Gelombang I</h3>
                        <ul class="lab-ul date" data-date="July 09, 2022 18:25:25">
                            <li>
                                <h2 class="count-title"><span class="days">124</span></h2>
                                <p class="days_text">Day</p>
                            </li>
                            <li>
                                <h2 class="count-title"><span class="hours">0</span></h2>
                                <p class="hours_text">Hour</p>
                            </li>
                            <li>
                                <h2 class="count-title"><span class="minutes">25</span></h2>
                                <p class="minu_text">Minute</p>
                            </li>
                            <li>
                                <h2 class="count-title"><span class="seconds">43</span></h2>
                                <p class="seco_text">Secound</p>
                            </li>
                        </ul>
                        <a href="https://psb.luqmanalhakim.sch.id/" class="lab-btn"><span>Register Now</span></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Offer Section Ending Here -->

<!-- Instructors Section Start Here -->
<div class="instructor-section style-3 padding-tb section-bg-ash">
    <div class="container">
        <div class="section-header text-center">
            <span class="subtitle">Why Choose Us</span>
            <h2 class="title">Get Everything for Learning</h2>
        </div>
        <div class="section-wrapper">
            <div class="instructor-bottom">
                <div class="instructor-slider overflow-hidden">
                    <div class="instructor-navi instructor-slider-next"><i class="icofont-rounded-double-right"></i></div>
                    <div class="instructor-navi instructor-slider-prev"><i class="icofont-rounded-double-left"></i></div>
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="instructor-item">
                                <div class="instructor-inner">
                                    <div class="instructor-thumb">
                                        <img src="{{ asset('assets/images/instructor/11.jpg') }}" alt="instructor">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="instructor-item">
                                <div class="instructor-inner">
                                    <div class="instructor-thumb">
                                        <img src="{{ asset('assets/images/instructor/12.jpg') }}" alt="instructor">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="instructor-item">
                                <div class="instructor-inner">
                                    <div class="instructor-thumb">
                                        <img src="{{ asset('assets/images/instructor/13.jpg') }}" alt="instructor">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="instructor-item">
                                <div class="instructor-inner">
                                    <div class="instructor-thumb">
                                        <img src="{{ asset('assets/images/instructor/14.jpg') }}" alt="instructor">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="instructor-item">
                                <div class="instructor-inner">
                                    <div class="instructor-thumb">
                                        <img src="{{ asset('assets/images/instructor/15.jpg') }}" alt="instructor">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="instructor-item">
                                <div class="instructor-inner">
                                    <div class="instructor-thumb">
                                        <img src="{{ asset('assets/images/instructor/10.jpg') }}" alt="instructor">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Instructors Section Ending Here -->
@endsection 
@extends('layouts.app')

@section('title', 'Indikator Kelulusan')

@section('content')
<!-- Page Header section start here -->
<div class="pageheader-section style-2">
    <div class="container">
        <div class="row justify-content-center justify-content-lg-between align-items-center flex-row-reverse">
            <div class="col-lg-7 col-12">
                <div class="pageheader-thumb">
                    <img src="{{ asset('assets/images/pageheader/02.jpg') }}" alt="rajibraj91" class="w-100">
                    <a href="https://www.youtube.com/embed/rVzgmeZ3uYg?si=8WVqbZjyTAMas1q-" class="video-button" data-rel="lightcase"><i class="icofont-ui-play"></i></a>
                </div>
            </div>
            <div class="col-lg-5 col-12">
                <div class="pageheader-content">
                    <div class="course-category">
                        <a href="#" class="course-cate">Unggul</a>
                        <a href="#" class="course-cate">Islami</a>
                        <a href="#" class="course-cate">Berprestasi</a>
                    </div>
                    <h2 class="phs-title">Target sekolah untuk menghafal 10 juz Al-Qur'an menjadi motivasi bagi orang tua.</h2>
                    <div class="phs-thumb">
                        <img src="{{ asset('assets/images/pageheader/03.jpg') }}" alt="rajibraj91">
                        <span>Rohmat Sunaryo</span>
                        <div class="course-reiew">
                            <span class="ratting">
                                <i class="icofont-ui-rating"></i>
                                <i class="icofont-ui-rating"></i>
                                <i class="icofont-ui-rating"></i>
                                <i class="icofont-ui-rating"></i>
                                <i class="icofont-ui-rating"></i>
                            </span>
                            <span class="ratting-count">
                               
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header section ending here -->

<!-- course section start here -->
<div class="course-single-section padding-tb section-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="main-part">
                    <div class="course-video">
                        <div class="course-video-title">
                            <h2>100 indikator Kelulusan</h2>
                        </div>
                        <!-- ini indikator -->
                        <div class="course-video-content">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <!-- ini sub judulnya -->
                                    <div class="accordion-header" id="accordion01">
                                        <button class="d-flex flex-wrap justify-content-between" data-bs-toggle="collapse" data-bs-target="#videolist1" aria-expanded="true" aria-controls="videolist1"><span>AKIDAH LURUS</span></button>
                                    </div>
                                    <div id="videolist1" class="accordion-collapse collapse show" aria-labelledby="accordion01" data-bs-parent="#accordionExample">
                                        <ul class="lab-ul video-item-list">
                                            <li class="d-flex flex-wrap justify-content-between">
                                                <div class="video-item-title">1.1 Welcome to the course 02:30 minutes</div>
                                            </li>
                                            <li class="d-flex flex-wrap justify-content-between">
                                                <div class="video-item-title">1.2 How to set up your photoshop workspace 08:33 minutes</div>
                                            </li>
                                            <li class="d-flex flex-wrap justify-content-between">
                                                <div class="video-item-title">1.3 Essential Photoshop Tools 03:38 minutes</div>
                                            </li>
                                            <li class="d-flex flex-wrap justify-content-between">
                                                <div class="video-item-title">1.4 Finding inspiration 02:30 minutes</div>
                                            </li>
                                            <li class="d-flex flex-wrap justify-content-between">
                                                <div class="video-item-title">1.5 Choosing Your Format 03:48 minutes</div>
                                            </li>
                                        </ul>
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
<!-- course section ending here -->
@endsection 
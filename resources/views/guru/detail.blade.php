@extends('layouts.app')

@section('title', 'Detail Guru')

@section('content')
<!-- Page Header Section Start -->
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Ahmad Fauzi, S.Pd</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ahmad Fauzi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header Section Ending -->

<!-- Instructor Single Section Start -->
<section class="instructor-single-section padding-tb section-bg">
    <div class="container">
        <div class="instructor-wrapper">
            <div class="instructor-single-top">
                <div class="instructor-single-item d-flex flex-wrap justify-content-between">
                    <div class="instructor-single-thumb">
                        <img src="{{ asset('assets/images/instructor/single/01.jpg') }}" alt="instructor">
                    </div>
                    <div class="instructor-single-content">
                        <h4 class="title">Ahmad Fauzi, S.Pd</h4>
                        <p class="ins-dege">Kepala Sekolah</p>
                        <span class="ratting">
                            <i class="icofont-ui-rating"></i>
                            <i class="icofont-ui-rating"></i>
                            <i class="icofont-ui-rating"></i>
                            <i class="icofont-ui-rating"></i>
                            <i class="icofont-ui-rating"></i>
                        </span>
                        <p class="ins-desc">Seorang pendidik berpengalaman dengan lebih dari 15 tahun mengajar di bidang pendidikan dasar. Memiliki latar belakang pendidikan S1 Pendidikan Guru Sekolah Dasar dari Universitas Negeri Jakarta dan sedang menempuh S2 Manajemen Pendidikan.</p>
                        <h6 class="subtitle">Pernyataan Pribadi</h6>
                        <p class="ins-desc">Assalamu'alaikum, saya Ahmad Fauzi, Kepala Sekolah SDIT Lukmanalhakim. Saya memiliki dedikasi tinggi dalam dunia pendidikan, khususnya pendidikan Islam. Saya percaya bahwa pendidikan yang baik harus mampu mengintegrasikan nilai-nilai agama dengan ilmu pengetahuan umum.</p>
                        <ul class="lab-ul">
                            <li class="d-flex flex-wrap justify-content-start">
                                <span class="list-name">Alamat</span>
                                <span class="list-attr">SDIT Lukmanalhakim, Jl. Contoh No. 123, Kota, Indonesia</span>
                            </li>
                            <li class="d-flex flex-wrap justify-content-start">
                                <span class="list-name">Email</span>
                                <span class="list-attr">ahmad.fauzi@sditlukmanalhakim.sch.id</span>
                            </li>
                            <li class="d-flex flex-wrap justify-content-start">
                                <span class="list-name">Telepon</span>
                                <span class="list-attr">+62 812-3456-7890</span>
                            </li>
                            <li class="d-flex flex-wrap justify-content-start">
                                <span class="list-name">Website</span>
                                <span class="list-attr">www.sditlukmanalhakim.sch.id</span>
                            </li>
                            <li class="d-flex flex-wrap justify-content-start">
                                <span class="list-name">Ikuti Kami</span>
                                <ul class="lab-ul list-attr d-flex flex-wrap justify-content-start">
                                    <li>
                                        <a class="facebook" href="#"><i class="icofont-facebook"></i></a>
                                    </li>
                                    <li>
                                        <a class="twitter" href="#"><i class="icofont-twitter"></i></a>
                                    </li>
                                    <li>
                                        <a class="instagram" href="#"><i class="icofont-instagram"></i></a>
                                    </li>
                                    <li>
                                        <a class="linkedin" href="#"><i class="icofont-linkedin"></i></a>
                                    </li>
                                    <li>
                                        <a class="youtube" href="#"><i class="icofont-youtube"></i></a>
                                    </li>
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="instructor-single-bottom d-flex flex-wrap mt-4">
                <div class="col-xl-6 pb-5 pb-xl-0 d-flex flex-wrap justify-content-lg-start justify-content-between">
                    <h4 class="subtitle">Kemampuan Bahasa</h4>
                    <div class="text-center skill-item">
                        <div class="skill-thumb">
                            <div class="circles text-center">
                                <div class="circle first" data-percent="95">
                                    <strong>95<i>%</i></strong>
                                </div>							
                            </div>
                        </div>
                        <p>Bahasa Indonesia</p>
                    </div>
                    <div class="text-center skill-item">
                        <div class="skill-thumb">
                            <div class="circles text-center">
                                <div class="circle second" data-percent="85">
                                    <strong>85<i>%</i></strong>
                                </div>							
                            </div>
                        </div>
                        <p>Bahasa Inggris</p>
                    </div>
                    <div class="text-center skill-item">
                        <div class="skill-thumb">
                            <div class="circles text-center">
                                <div class="circle third" data-percent="90">
                                    <strong>90<i>%</i></strong>
                                </div>							
                            </div>
                        </div>
                        <p>Bahasa Arab</p>
                    </div>
                </div>
                <div class="col-xl-6 d-flex flex-wrap justify-content-lg-start justify-content-between">
                    <h4 class="subtitle">Penghargaan</h4>
                    <div class="skill-item text-center">
                        <div class="skill-thumb">
                            <img src="{{ asset('assets/images/instructor/single/icon/01.png') }}" alt="instructor">
                        </div>
                        <p>Guru Teladan 2018</p>
                    </div>
                    <div class="skill-item text-center">
                        <div class="skill-thumb">
                            <img src="{{ asset('assets/images/instructor/single/icon/02.png') }}" alt="instructor">
                        </div>
                        <p>Kepala Sekolah Berprestasi 2020</p>
                    </div>
                    <div class="skill-item text-center">
                        <div class="skill-thumb">
                            <img src="{{ asset('assets/images/instructor/single/icon/03.png') }}" alt="instructor">
                        </div>
                        <p>Tokoh Pendidikan 2022</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Instructor Single Section Ending -->
@endsection 
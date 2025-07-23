@extends('layouts.app')

@section('title', 'Guru')

@section('content')
<!-- Page Header Section Start -->
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Guru SDIT Lukmanalhakim</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Guru</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header Section Ending -->

<!-- Instructor Section Start -->
<div class="instructor-section padding-tb section-bg">
    <div class="container">
        <div class="section-header text-center">
            <span>Tenaga Pendidik</span>
            <h2>Guru-guru Profesional Kami</h2>
        </div>
        <div class="section-wrapper">
            <div class="row g-4 justify-content-center row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4">
                <div class="col">
                    <div class="instructor-item">
                        <div class="instructor-inner">
                            <div class="instructor-thumb">
                                <img src="{{ asset('assets/images/instructor/01.jpg') }}" alt="instructor">
                            </div>
                            <div class="instructor-content">
                                <a href="{{ route('guru.detail', 1) }}"><h4>Ahmad Fauzi, S.Pd</h4></a>
                                <p>Kepala Sekolah</p>
                                <ul class="lab-ul social-icons">
                                    <li><a href="#"><i class="icofont-facebook"></i></a></li>
                                    <li><a href="#"><i class="icofont-twitter"></i></a></li>
                                    <li><a href="#"><i class="icofont-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="instructor-item">
                        <div class="instructor-inner">
                            <div class="instructor-thumb">
                                <img src="{{ asset('assets/images/instructor/02.jpg') }}" alt="instructor">
                            </div>
                            <div class="instructor-content">
                                <a href="{{ route('guru.detail', 2) }}"><h4>Siti Aminah, S.Pd.I</h4></a>
                                <p>Guru Kelas 1</p>
                                <ul class="lab-ul social-icons">
                                    <li><a href="#"><i class="icofont-facebook"></i></a></li>
                                    <li><a href="#"><i class="icofont-twitter"></i></a></li>
                                    <li><a href="#"><i class="icofont-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="instructor-item">
                        <div class="instructor-inner">
                            <div class="instructor-thumb">
                                <img src="{{ asset('assets/images/instructor/03.jpg') }}" alt="instructor">
                            </div>
                            <div class="instructor-content">
                                <a href="{{ route('guru.detail', 3) }}"><h4>Muhammad Rizki, S.Pd</h4></a>
                                <p>Guru Kelas 2</p>
                                <ul class="lab-ul social-icons">
                                    <li><a href="#"><i class="icofont-facebook"></i></a></li>
                                    <li><a href="#"><i class="icofont-twitter"></i></a></li>
                                    <li><a href="#"><i class="icofont-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="instructor-item">
                        <div class="instructor-inner">
                            <div class="instructor-thumb">
                                <img src="{{ asset('assets/images/instructor/04.jpg') }}" alt="instructor">
                            </div>
                            <div class="instructor-content">
                                <a href="{{ route('guru.detail', 4) }}"><h4>Fatimah Azzahra, S.Pd</h4></a>
                                <p>Guru Kelas 3</p>
                                <ul class="lab-ul social-icons">
                                    <li><a href="#"><i class="icofont-facebook"></i></a></li>
                                    <li><a href="#"><i class="icofont-twitter"></i></a></li>
                                    <li><a href="#"><i class="icofont-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="instructor-item">
                        <div class="instructor-inner">
                            <div class="instructor-thumb">
                                <img src="{{ asset('assets/images/instructor/05.jpg') }}" alt="instructor">
                            </div>
                            <div class="instructor-content">
                                <a href="{{ route('guru.detail', 5) }}"><h4>Abdullah Hasan, S.Pd.I</h4></a>
                                <p>Guru Kelas 4</p>
                                <ul class="lab-ul social-icons">
                                    <li><a href="#"><i class="icofont-facebook"></i></a></li>
                                    <li><a href="#"><i class="icofont-twitter"></i></a></li>
                                    <li><a href="#"><i class="icofont-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="instructor-item">
                        <div class="instructor-inner">
                            <div class="instructor-thumb">
                                <img src="{{ asset('assets/images/instructor/06.jpg') }}" alt="instructor">
                            </div>
                            <div class="instructor-content">
                                <a href="{{ route('guru.detail', 6) }}"><h4>Aisyah Putri, S.Pd</h4></a>
                                <p>Guru Kelas 5</p>
                                <ul class="lab-ul social-icons">
                                    <li><a href="#"><i class="icofont-facebook"></i></a></li>
                                    <li><a href="#"><i class="icofont-twitter"></i></a></li>
                                    <li><a href="#"><i class="icofont-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="instructor-item">
                        <div class="instructor-inner">
                            <div class="instructor-thumb">
                                <img src="{{ asset('assets/images/instructor/07.jpg') }}" alt="instructor">
                            </div>
                            <div class="instructor-content">
                                <a href="{{ route('guru.detail', 7) }}"><h4>Umar Faruk, S.Pd</h4></a>
                                <p>Guru Kelas 6</p>
                                <ul class="lab-ul social-icons">
                                    <li><a href="#"><i class="icofont-facebook"></i></a></li>
                                    <li><a href="#"><i class="icofont-twitter"></i></a></li>
                                    <li><a href="#"><i class="icofont-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="instructor-item">
                        <div class="instructor-inner">
                            <div class="instructor-thumb">
                                <img src="{{ asset('assets/images/instructor/08.jpg') }}" alt="instructor">
                            </div>
                            <div class="instructor-content">
                                <a href="{{ route('guru.detail', 8) }}"><h4>Khadijah Nur, S.Pd.I</h4></a>
                                <p>Guru Tahfidz</p>
                                <ul class="lab-ul social-icons">
                                    <li><a href="#"><i class="icofont-facebook"></i></a></li>
                                    <li><a href="#"><i class="icofont-twitter"></i></a></li>
                                    <li><a href="#"><i class="icofont-instagram"></i></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Instructor Section Ending -->
@endsection 
@extends('layouts.app')

@section('title', 'Akses Ditolak')

@section('content')
<!-- 403 section start here -->
<div class="four-zero-section padding-tb section-bg">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-4 col-sm-6 col-12">
                <div class="four-zero-content">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/images/logo/01.png') }}" alt="SDIT Lukmanalhakim">
                    </a>
                    <h2 class="title">Error 403!</h2>
                    <p>Oops! Anda Tidak Memiliki Izin Untuk Mengakses Halaman Ini</p>
                    <a href="{{ route('home') }}" class="lab-btn"><span>Kembali ke Beranda <i class="icofont-external-link"></i></span></a>
                </div>
            </div>
            <div class="col-lg-8 col-sm-6 col-12">
                <div class="foue-zero-thumb">
                    <img src="{{ asset('assets/images/403.png') }}" alt="403">
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 403 section ending here -->
@endsection 
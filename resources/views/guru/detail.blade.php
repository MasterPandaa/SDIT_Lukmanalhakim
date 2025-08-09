@extends('layouts.app')

@section('title', 'Detail Guru')

@section('content')
<!-- Page Header Section Start -->
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>{{ $guru->nama }}</h2>

                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $guru->nama }}</li>

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
                        <img src="{{ $guru->foto_url }}" alt="{{ $guru->nama }}">

                    </div>
                    <div class="instructor-single-content">
                        <h4 class="title">{{ $guru->nama }}</h4>
                        <p class="ins-dege">{{ $guru->jabatan }}</p>
                        @if(!empty($guru->deskripsi))
                            <p class="ins-desc">{{ $guru->deskripsi }}</p>
                        @endif
                        <h6 class="subtitle">Pernyataan Pribadi</h6>
                        <p class="ins-desc">{{ $guru->pernyataan_pribadi }}</p>
                        <ul class="lab-ul">
                            <li class="d-flex flex-wrap justify-content-start">
                                <span class="list-name">Alamat</span>
                                <span class="list-attr">{{ $guru->alamat }}</span>
                            </li>
                            <li class="d-flex flex-wrap justify-content-start">
                                <span class="list-name">Email</span>
                                <span class="list-attr">{{ $guru->email }}</span>
                            </li>
                            <li class="d-flex flex-wrap justify-content-start">
                                <span class="list-name">Telepon</span>
                                <span class="list-attr">{{ $guru->telepon }}</span>
                            </li>
                            <li class="d-flex flex-wrap justify-content-start">
                                <span class="list-name">Website</span>
                                <span class="list-attr">{{ $guru->website }}</span>
                            </li>
                            <li class="d-flex flex-wrap justify-content-start">
                                <span class="list-name">Ikuti Kami</span>
                                <ul class="lab-ul list-attr d-flex flex-wrap justify-content-start">
                                    @if($guru->facebook)
                                        <li>
                                            <a class="facebook" href="https://facebook.com/{{ $guru->facebook }}" target="_blank"><i class="icofont-facebook"></i></a>
                                        </li>
                                    @endif
                                    @if($guru->instagram)
                                        <li>
                                            <a class="instagram" href="https://instagram.com/{{ $guru->instagram }}" target="_blank"><i class="icofont-instagram"></i></a>
                                        </li>
                                    @endif
                                    @if($guru->whatsapp)
                                        <li>
                                            <a class="whatsapp" href="https://wa.me/{{ $guru->whatsapp }}" target="_blank"><i class="icofont-whatsapp"></i></a>
                                        </li>
                                    @endif
                                </ul>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Instructor Single Section Ending -->
@endsection
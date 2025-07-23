@extends('layouts.app')

@section('title', 'Kurikulum')

@section('content')
<!-- Page Header Section Start -->
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Kurikulum</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kurikulum</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header Section Ending -->

<!-- Kurikulum Section Start -->
<section class="about-section padding-tb section-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-header text-center">
                    <span>Kurikulum</span>
                    <h2>Kurikulum SDIT Lukmanalhakim</h2>
                </div>
                <div class="section-wrapper">
                    <div class="about-item">
                        <div class="about-inner">
                            <div class="about-content">
                                <p class="mb-4">
                                    SDIT Lukmanalhakim menerapkan kurikulum terpadu yang mengintegrasikan kurikulum nasional (Kurikulum Merdeka) dengan kurikulum khas sekolah Islam yang berbasis Al-Qur'an dan As-Sunnah. Pendekatan pembelajaran yang digunakan adalah pendekatan tematik integratif yang memadukan berbagai mata pelajaran dalam tema-tema tertentu.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Kurikulum Section Ending -->

<!-- Struktur Kurikulum Section Start -->
<section class="about-section padding-tb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-header text-center">
                    <span>Struktur Kurikulum</span>
                    <h2>Komponen Kurikulum</h2>
                </div>
                <div class="section-wrapper">
                    <div class="row g-4">
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">Kurikulum Nasional</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="lab-ul">
                                        <li>Pendidikan Agama Islam</li>
                                        <li>Pendidikan Kewarganegaraan</li>
                                        <li>Bahasa Indonesia</li>
                                        <li>Matematika</li>
                                        <li>Ilmu Pengetahuan Alam</li>
                                        <li>Ilmu Pengetahuan Sosial</li>
                                        <li>Seni Budaya dan Prakarya</li>
                                        <li>Pendidikan Jasmani, Olahraga, dan Kesehatan</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="card">
                                <div class="card-header bg-success text-white">
                                    <h5 class="mb-0">Kurikulum Khas</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="lab-ul">
                                        <li>Tahfidz Al-Qur'an</li>
                                        <li>Bahasa Arab</li>
                                        <li>Hadits dan Do'a</li>
                                        <li>Sirah Nabawiyah</li>
                                        <li>Aqidah Akhlak</li>
                                        <li>Fiqih Ibadah</li>
                                        <li>Bahasa Inggris</li>
                                        <li>Komputer dan Teknologi</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Struktur Kurikulum Section Ending -->

<!-- Program Unggulan Section Start -->
<section class="about-section padding-tb section-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-header text-center">
                    <span>Program Unggulan</span>
                    <h2>Program Unggulan SDIT Lukmanalhakim</h2>
                </div>
                <div class="section-wrapper">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="about-item">
                                <div class="about-inner">
                                    <div class="about-thumb">
                                        <img src="{{ asset('assets/images/course/01.jpg') }}" alt="Program Tahfidz">
                                    </div>
                                    <div class="about-content">
                                        <h4>Program Tahfidz Al-Qur'an</h4>
                                        <p>Program hafalan Al-Qur'an dengan target minimal 2 juz selama 6 tahun dengan metode yang menyenangkan dan sesuai kemampuan siswa.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="about-item">
                                <div class="about-inner">
                                    <div class="about-thumb">
                                        <img src="{{ asset('assets/images/course/02.jpg') }}" alt="Program Bahasa">
                                    </div>
                                    <div class="about-content">
                                        <h4>Program Bahasa Arab & Inggris</h4>
                                        <p>Pembelajaran bahasa asing secara intensif untuk mempersiapkan siswa menghadapi era global dengan pendekatan komunikatif.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="about-item">
                                <div class="about-inner">
                                    <div class="about-thumb">
                                        <img src="{{ asset('assets/images/course/03.jpg') }}" alt="Program Sains">
                                    </div>
                                    <div class="about-content">
                                        <h4>Program Sains & Teknologi</h4>
                                        <p>Pembelajaran sains dan teknologi dengan pendekatan praktis dan eksperimental untuk mengembangkan keterampilan berpikir kritis dan inovatif.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="about-item">
                                <div class="about-inner">
                                    <div class="about-thumb">
                                        <img src="{{ asset('assets/images/course/04.jpg') }}" alt="Program Karakter">
                                    </div>
                                    <div class="about-content">
                                        <h4>Program Pembentukan Karakter</h4>
                                        <p>Program pembentukan karakter Islami melalui pembiasaan dan keteladanan dalam kehidupan sehari-hari di sekolah.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Program Unggulan Section Ending -->
@endsection 
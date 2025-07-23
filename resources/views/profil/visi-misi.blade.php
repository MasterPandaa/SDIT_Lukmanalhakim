@extends('layouts.app')

@section('title', 'Visi & Misi')

@section('content')
<!-- Page Header Section Start -->
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Visi & Misi</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Visi & Misi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header Section Ending -->

<!-- Visi Misi Section Start -->
<section class="about-section padding-tb section-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-header text-center">
                    <span>Visi SDIT Lukmanalhakim</span>
                    <h2>Menjadi Lembaga Pendidikan Islam Terdepan</h2>
                </div>
                <div class="section-wrapper">
                    <div class="about-item">
                        <div class="about-inner">
                            <div class="about-content">
                                <p class="mb-4">
                                    "Menjadi lembaga pendidikan Islam terdepan yang menghasilkan generasi berakhlak mulia, cerdas, dan berprestasi berdasarkan Al-Qur'an dan As-Sunnah."
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Visi Misi Section Ending -->

<!-- Misi Section Start -->
<section class="about-section padding-tb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-header text-center">
                    <span>Misi SDIT Lukmanalhakim</span>
                    <h2>Langkah-langkah Menuju Visi</h2>
                </div>
                <div class="section-wrapper">
                    <div class="about-item">
                        <div class="about-inner">
                            <div class="about-content">
                                <ol class="mb-4">
                                    <li class="mb-3">Menyelenggarakan pendidikan yang mengintegrasikan antara ilmu pengetahuan umum dan nilai-nilai Islam.</li>
                                    <li class="mb-3">Membangun karakter siswa berdasarkan akhlakul karimah melalui pembiasaan dan keteladanan.</li>
                                    <li class="mb-3">Menerapkan metode pembelajaran yang aktif, kreatif, efektif, dan menyenangkan.</li>
                                    <li class="mb-3">Mengembangkan potensi siswa secara optimal melalui kegiatan akademik dan non-akademik.</li>
                                    <li class="mb-3">Membangun kerjasama yang harmonis antara sekolah, keluarga, dan masyarakat dalam mendidik siswa.</li>
                                    <li class="mb-3">Menciptakan lingkungan sekolah yang aman, nyaman, dan kondusif untuk proses belajar mengajar.</li>
                                    <li class="mb-3">Meningkatkan kompetensi dan profesionalisme tenaga pendidik dan kependidikan.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Misi Section Ending -->

<!-- Tujuan Section Start -->
<section class="about-section padding-tb section-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-header text-center">
                    <span>Tujuan SDIT Lukmanalhakim</span>
                    <h2>Apa yang Ingin Kami Capai</h2>
                </div>
                <div class="section-wrapper">
                    <div class="about-item">
                        <div class="about-inner">
                            <div class="about-content">
                                <ol class="mb-4">
                                    <li class="mb-3">Menghasilkan lulusan yang memiliki aqidah yang kuat dan ibadah yang benar.</li>
                                    <li class="mb-3">Membentuk siswa yang memiliki akhlak mulia dalam pergaulan sehari-hari.</li>
                                    <li class="mb-3">Mewujudkan siswa yang memiliki kemampuan akademik yang tinggi.</li>
                                    <li class="mb-3">Menghasilkan lulusan yang memiliki hafalan Al-Qur'an minimal 2 juz.</li>
                                    <li class="mb-3">Mencetak siswa yang memiliki keterampilan hidup (life skill) dan kemandirian.</li>
                                    <li class="mb-3">Membentuk siswa yang memiliki kepedulian sosial dan lingkungan.</li>
                                    <li class="mb-3">Menghasilkan lulusan yang siap melanjutkan ke jenjang pendidikan yang lebih tinggi.</li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Tujuan Section Ending -->
@endsection 
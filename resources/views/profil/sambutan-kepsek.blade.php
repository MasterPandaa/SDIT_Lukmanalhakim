@extends('layouts.app')

@section('title', 'Sambutan Kepala Sekolah')

@section('content')
<!-- Page Header Section Start -->
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Sambutan Kepala Sekolah</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Sambutan Kepala Sekolah</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header Section Ending -->

<!-- Sambutan Section Start -->
<section class="about-section padding-tb section-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-header text-center">
                    <span>Sambutan</span>
                    <h2>Kepala SDIT Lukmanalhakim</h2>
                </div>
                <div class="section-wrapper">
                    <div class="row align-items-center">
                        <div class="col-lg-4 col-12">
                            <div class="about-thumb">
                                <img src="{{ asset('assets/images/instructor/01.jpg') }}" alt="Kepala Sekolah">
                                <h4 class="text-center mt-3">Bapak Ahmad Fauzi, S.Pd</h4>
                                <p class="text-center">Kepala SDIT Lukmanalhakim</p>
                            </div>
                        </div>
                        <div class="col-lg-8 col-12">
                            <div class="about-content">
                                <p class="mb-4">
                                    Assalamu'alaikum Warahmatullahi Wabarakatuh.
                                </p>
                                <p class="mb-4">
                                    Alhamdulillah, puji syukur kita panjatkan kehadirat Allah SWT yang telah melimpahkan rahmat dan karunia-Nya sehingga SDIT Lukmanalhakim dapat terus berkembang dan memberikan pelayanan pendidikan terbaik bagi putra-putri bangsa.
                                </p>
                                <p class="mb-4">
                                    Sebagai lembaga pendidikan Islam, SDIT Lukmanalhakim berkomitmen untuk mengintegrasikan nilai-nilai Islam dalam setiap aspek pembelajaran. Kami meyakini bahwa pendidikan bukan hanya tentang transfer pengetahuan, tetapi juga pembentukan karakter dan akhlak mulia sesuai dengan ajaran Islam.
                                </p>
                                <p class="mb-4">
                                    Di era globalisasi dan perkembangan teknologi yang pesat ini, kami mempersiapkan siswa-siswi kami untuk menjadi generasi yang tidak hanya cerdas secara intelektual, tetapi juga memiliki kecerdasan spiritual dan emosional. Kami berusaha menciptakan lingkungan belajar yang kondusif, aman, dan menyenangkan sehingga setiap siswa dapat mengembangkan potensinya secara optimal.
                                </p>
                                <p class="mb-4">
                                    Kami mengajak seluruh stakeholder, baik orang tua, masyarakat, maupun pemerintah untuk bersama-sama mendukung upaya kami dalam mendidik generasi penerus bangsa yang berakhlak mulia, cerdas, dan berprestasi. Dengan kerjasama yang baik, insya Allah kita dapat mewujudkan visi dan misi SDIT Lukmanalhakim.
                                </p>
                                <p class="mb-4">
                                    Terima kasih atas kepercayaan yang telah diberikan kepada kami. Semoga Allah SWT senantiasa membimbing dan meridhai langkah kita dalam mendidik anak-anak kita.
                                </p>
                                <p class="mb-4">
                                    Wassalamu'alaikum Warahmatullahi Wabarakatuh.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Sambutan Section Ending -->
@endsection 
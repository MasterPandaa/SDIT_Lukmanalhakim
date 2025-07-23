@extends('layouts.app')

@section('title', 'Indikator Kelulusan')

@section('content')
<!-- Page Header Section Start -->
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Indikator Kelulusan</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Indikator Kelulusan</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header Section Ending -->

<!-- Indikator Section Start -->
<section class="about-section padding-tb section-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-header text-center">
                    <span>Indikator Kelulusan</span>
                    <h2>Profil Lulusan SDIT Lukmanalhakim</h2>
                </div>
                <div class="section-wrapper">
                    <div class="about-item">
                        <div class="about-inner">
                            <div class="about-content">
                                <p class="mb-4">
                                    SDIT Lukmanalhakim menetapkan standar kelulusan yang komprehensif untuk memastikan bahwa setiap lulusan memiliki kompetensi yang dibutuhkan untuk melanjutkan pendidikan ke jenjang yang lebih tinggi dan memiliki karakter Islami yang kuat.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Indikator Section Ending -->

<!-- Dimensi Kelulusan Section Start -->
<section class="about-section padding-tb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-header text-center">
                    <span>Dimensi Kelulusan</span>
                    <h2>Dimensi Profil Lulusan</h2>
                </div>
                <div class="section-wrapper">
                    <div class="row g-4">
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header bg-primary text-white">
                                    <h5 class="mb-0">Dimensi Keimanan dan Ketakwaan</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="lab-ul">
                                        <li>Memiliki aqidah yang kuat dan lurus</li>
                                        <li>Mampu melaksanakan ibadah wajib dengan benar</li>
                                        <li>Hafal minimal 2 juz Al-Qur'an</li>
                                        <li>Hafal minimal 40 hadits pilihan</li>
                                        <li>Mampu membaca Al-Qur'an dengan tartil</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header bg-success text-white">
                                    <h5 class="mb-0">Dimensi Akhlak dan Kepribadian</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="lab-ul">
                                        <li>Memiliki akhlak mulia dalam pergaulan sehari-hari</li>
                                        <li>Menghormati orang tua, guru, dan orang yang lebih tua</li>
                                        <li>Memiliki sikap jujur dan tanggung jawab</li>
                                        <li>Memiliki kedisiplinan dan kemandirian</li>
                                        <li>Memiliki kepedulian terhadap sesama dan lingkungan</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header bg-info text-white">
                                    <h5 class="mb-0">Dimensi Akademik</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="lab-ul">
                                        <li>Menguasai kompetensi dasar sesuai kurikulum nasional</li>
                                        <li>Memiliki kemampuan berpikir kritis dan kreatif</li>
                                        <li>Mampu berkomunikasi dengan baik secara lisan dan tulisan</li>
                                        <li>Memiliki kemampuan dasar dalam bahasa Arab dan Inggris</li>
                                        <li>Memiliki kemampuan dasar dalam penggunaan teknologi</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="card h-100">
                                <div class="card-header bg-warning text-dark">
                                    <h5 class="mb-0">Dimensi Keterampilan Hidup</h5>
                                </div>
                                <div class="card-body">
                                    <ul class="lab-ul">
                                        <li>Memiliki keterampilan dalam menyelesaikan masalah</li>
                                        <li>Mampu bekerja sama dalam tim</li>
                                        <li>Memiliki jiwa kepemimpinan</li>
                                        <li>Memiliki keterampilan sosial yang baik</li>
                                        <li>Memiliki keterampilan dasar dalam bidang seni dan olahraga</li>
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
<!-- Dimensi Kelulusan Section Ending -->

<!-- Penilaian Section Start -->
<section class="about-section padding-tb section-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="section-header text-center">
                    <span>Sistem Penilaian</span>
                    <h2>Penilaian Kelulusan</h2>
                </div>
                <div class="section-wrapper">
                    <div class="about-item">
                        <div class="about-inner">
                            <div class="about-content">
                                <p class="mb-4">
                                    Penilaian kelulusan di SDIT Lukmanalhakim dilakukan secara komprehensif dengan mempertimbangkan aspek kognitif, afektif, dan psikomotorik. Penilaian dilakukan melalui:
                                </p>
                                <ol class="mb-4">
                                    <li class="mb-3">Penilaian harian dan ujian semester</li>
                                    <li class="mb-3">Ujian praktik ibadah</li>
                                    <li class="mb-3">Ujian hafalan Al-Qur'an dan hadits</li>
                                    <li class="mb-3">Penilaian sikap dan perilaku</li>
                                    <li class="mb-3">Penilaian keterampilan dan proyek</li>
                                    <li class="mb-3">Ujian Akhir Sekolah</li>
                                </ol>
                                <p>
                                    Siswa dinyatakan lulus jika telah memenuhi semua kriteria kelulusan yang ditetapkan oleh sekolah dan memiliki nilai minimal sesuai dengan standar kelulusan nasional.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Penilaian Section Ending -->
@endsection 
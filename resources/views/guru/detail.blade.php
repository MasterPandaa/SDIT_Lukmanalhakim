@extends('layouts.app')

@section('title', 'Detail Guru')

@section('content')
<!-- Page Header Section Start -->
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Detail Guru</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('guru') }}">Guru</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Guru</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header Section Ending -->

<!-- Instructor Single Section Start -->
<div class="instructor-single-section padding-tb section-bg">
    <div class="container">
        <div class="instructor-wrapper">
            <div class="instructor-single-top">
                <div class="instructor-single-item">
                    <div class="instructor-single-inner">
                        <div class="instructor-single-thumb">
                            <img src="{{ asset('assets/images/instructor/single/01.jpg') }}" alt="instructor">
                        </div>
                        <div class="instructor-single-content">
                            <h4>Ahmad Fauzi, S.Pd</h4>
                            <span>Kepala Sekolah</span>
                            <p>Seorang pendidik berpengalaman dengan lebih dari 15 tahun mengajar di bidang pendidikan dasar. Memiliki latar belakang pendidikan S1 Pendidikan Guru Sekolah Dasar dari Universitas Negeri Jakarta dan sedang menempuh S2 Manajemen Pendidikan.</p>
                            <ul class="lab-ul social-icons">
                                <li><a href="#"><i class="icofont-facebook"></i></a></li>
                                <li><a href="#"><i class="icofont-twitter"></i></a></li>
                                <li><a href="#"><i class="icofont-instagram"></i></a></li>
                                <li><a href="#"><i class="icofont-linkedin"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="instructor-single-bottom">
                <div class="row g-4">
                    <div class="col-lg-8">
                        <div class="instructor-single-info">
                            <div class="instructor-info-title">
                                <h5>Tentang Saya</h5>
                            </div>
                            <div class="instructor-info-content">
                                <p>Assalamu'alaikum, saya Ahmad Fauzi, Kepala Sekolah SDIT Lukmanalhakim. Saya memiliki dedikasi tinggi dalam dunia pendidikan, khususnya pendidikan Islam. Saya percaya bahwa pendidikan yang baik harus mampu mengintegrasikan nilai-nilai agama dengan ilmu pengetahuan umum.</p>
                                <p>Sebagai kepala sekolah, saya berkomitmen untuk menciptakan lingkungan belajar yang kondusif dan menyenangkan bagi siswa. Saya juga berusaha untuk memastikan bahwa setiap guru di SDIT Lukmanalhakim dapat mengembangkan potensinya secara maksimal.</p>
                                <p>Visi saya adalah menjadikan SDIT Lukmanalhakim sebagai lembaga pendidikan Islam terdepan yang menghasilkan generasi berakhlak mulia, cerdas, dan berprestasi berdasarkan Al-Qur'an dan As-Sunnah.</p>
                            </div>
                        </div>
                        <div class="instructor-single-info">
                            <div class="instructor-info-title">
                                <h5>Pengalaman</h5>
                            </div>
                            <div class="instructor-info-content">
                                <ul class="lab-ul">
                                    <li>
                                        <div class="instructor-exp-item">
                                            <div class="instructor-exp-year">
                                                <p>2020 - Sekarang</p>
                                            </div>
                                            <div class="instructor-exp-info">
                                                <h6>Kepala Sekolah</h6>
                                                <p>SDIT Lukmanalhakim</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="instructor-exp-item">
                                            <div class="instructor-exp-year">
                                                <p>2015 - 2020</p>
                                            </div>
                                            <div class="instructor-exp-info">
                                                <h6>Wakil Kepala Sekolah Bidang Kurikulum</h6>
                                                <p>SDIT Al-Hikmah</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="instructor-exp-item">
                                            <div class="instructor-exp-year">
                                                <p>2010 - 2015</p>
                                            </div>
                                            <div class="instructor-exp-info">
                                                <h6>Guru Kelas</h6>
                                                <p>SDN 01 Jakarta Timur</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="instructor-single-info">
                            <div class="instructor-info-title">
                                <h5>Pendidikan</h5>
                            </div>
                            <div class="instructor-info-content">
                                <ul class="lab-ul">
                                    <li>
                                        <div class="instructor-exp-item">
                                            <div class="instructor-exp-year">
                                                <p>2018 - Sekarang</p>
                                            </div>
                                            <div class="instructor-exp-info">
                                                <h6>S2 Manajemen Pendidikan</h6>
                                                <p>Universitas Indonesia</p>
                                            </div>
                                        </div>
                                    </li>
                                    <li>
                                        <div class="instructor-exp-item">
                                            <div class="instructor-exp-year">
                                                <p>2006 - 2010</p>
                                            </div>
                                            <div class="instructor-exp-info">
                                                <h6>S1 Pendidikan Guru Sekolah Dasar</h6>
                                                <p>Universitas Negeri Jakarta</p>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="instructor-single-sidebar">
                            <div class="sidebar-item">
                                <div class="sidebar-title">
                                    <h6>Informasi Kontak</h6>
                                </div>
                                <div class="sidebar-content">
                                    <ul class="lab-ul">
                                        <li>
                                            <span><i class="icofont-envelope"></i> Email :</span>
                                            <span>ahmad.fauzi@sditlukmanalhakim.sch.id</span>
                                        </li>
                                        <li>
                                            <span><i class="icofont-phone"></i> Telepon :</span>
                                            <span>+62 812-3456-7890</span>
                                        </li>
                                        <li>
                                            <span><i class="icofont-location-pin"></i> Alamat :</span>
                                            <span>SDIT Lukmanalhakim, Jl. Contoh No. 123, Kota, Indonesia</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="sidebar-item">
                                <div class="sidebar-title">
                                    <h6>Keahlian</h6>
                                </div>
                                <div class="sidebar-content">
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <h6>Manajemen Pendidikan</h6>
                                            <span>95%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 95%"></div>
                                        </div>
                                    </div>
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <h6>Pengembangan Kurikulum</h6>
                                            <span>90%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 90%"></div>
                                        </div>
                                    </div>
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <h6>Kepemimpinan</h6>
                                            <span>85%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 85%"></div>
                                        </div>
                                    </div>
                                    <div class="skill-item">
                                        <div class="skill-header">
                                            <h6>Pembelajaran Aktif</h6>
                                            <span>80%</span>
                                        </div>
                                        <div class="skill-bar">
                                            <div class="skill-progress" style="width: 80%"></div>
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
</div>
<!-- Instructor Single Section Ending -->
@endsection 
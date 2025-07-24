@extends('layouts.app')

@section('title', 'Berita')

@section('content')
<!-- Page Header Section Start -->
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Berita & Kegiatan</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Berita</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header Section Ending -->

<!-- Blog Section Start -->
<div class="blog-section padding-tb section-bg">
    <div class="container">
        <div class="section-wrapper">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center g-4">
                <div class="col">
                    <div class="post-item">
                        <div class="post-inner">
                            <div class="post-thumb">
                                <a href="{{ route('blog-single', 'kegiatan-ramadhan-sdit-lukmanalhakim') }}"><img src="{{ asset('assets/images/blog/01.jpg') }}" alt="blog"></a>
                            </div>
                            <div class="post-content">
                                <a href="{{ route('blog-single', 'kegiatan-ramadhan-sdit-lukmanalhakim') }}"><h4>Kegiatan Ramadhan SDIT Lukmanalhakim</h4></a>
                                <div class="meta-post">
                                    <ul class="lab-ul">
                                        <li><i class="icofont-ui-user"></i> Admin</li>
                                        <li><i class="icofont-calendar"></i> 15 Juni 2025</li>
                                    </ul>
                                </div>
                                <p>Rangkaian kegiatan Ramadhan yang diselenggarakan SDIT Lukmanalhakim untuk menumbuhkan semangat ibadah siswa.</p>
                            </div>
                            <div class="post-footer">
                                <div class="pf-left">
                                    <a href="{{ route('blog-single', 'kegiatan-ramadhan-sdit-lukmanalhakim') }}" class="lab-btn-text">Selengkapnya <i class="icofont-external-link"></i></a>
                                </div>
                                <div class="pf-right">
                                    <i class="icofont-comment"></i>
                                    <span class="comment-count">5</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="post-item">
                        <div class="post-inner">
                            <div class="post-thumb">
                                <a href="{{ route('blog-single', 'prestasi-olimpiade-matematika') }}"><img src="{{ asset('assets/images/blog/02.jpg') }}" alt="blog"></a>
                            </div>
                            <div class="post-content">
                                <a href="{{ route('blog-single', 'prestasi-olimpiade-matematika') }}"><h4>Prestasi Olimpiade Matematika</h4></a>
                                <div class="meta-post">
                                    <ul class="lab-ul">
                                        <li><i class="icofont-ui-user"></i> Admin</li>
                                        <li><i class="icofont-calendar"></i> 10 Juni 2025</li>
                                    </ul>
                                </div>
                                <p>Siswa SDIT Lukmanalhakim berhasil meraih juara dalam kompetisi Olimpiade Matematika tingkat kota.</p>
                            </div>
                            <div class="post-footer">
                                <div class="pf-left">
                                    <a href="{{ route('blog-single', 'prestasi-olimpiade-matematika') }}" class="lab-btn-text">Selengkapnya <i class="icofont-external-link"></i></a>
                                </div>
                                <div class="pf-right">
                                    <i class="icofont-comment"></i>
                                    <span class="comment-count">3</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="post-item">
                        <div class="post-inner">
                            <div class="post-thumb">
                                <a href="{{ route('blog-single', 'ppdb-tahun-ajaran-2025-2026') }}"><img src="{{ asset('assets/images/blog/03.jpg') }}" alt="blog"></a>
                            </div>
                            <div class="post-content">
                                <a href="{{ route('blog-single', 'ppdb-tahun-ajaran-2025-2026') }}"><h4>PPDB Tahun Ajaran 2025/2026</h4></a>
                                <div class="meta-post">
                                    <ul class="lab-ul">
                                        <li><i class="icofont-ui-user"></i> Admin</li>
                                        <li><i class="icofont-calendar"></i> 5 Juni 2025</li>
                                    </ul>
                                </div>
                                <p>Informasi penerimaan peserta didik baru SDIT Lukmanalhakim untuk tahun ajaran 2025/2026.</p>
                            </div>
                            <div class="post-footer">
                                <div class="pf-left">
                                    <a href="{{ route('blog-single', 'ppdb-tahun-ajaran-2025-2026') }}" class="lab-btn-text">Selengkapnya <i class="icofont-external-link"></i></a>
                                </div>
                                <div class="pf-right">
                                    <i class="icofont-comment"></i>
                                    <span class="comment-count">7</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="post-item">
                        <div class="post-inner">
                            <div class="post-thumb">
                                <a href="{{ route('blog-single', 'kunjungan-edukatif-ke-museum') }}"><img src="{{ asset('assets/images/blog/04.jpg') }}" alt="blog"></a>
                            </div>
                            <div class="post-content">
                                <a href="{{ route('blog-single', 'kunjungan-edukatif-ke-museum') }}"><h4>Kunjungan Edukatif ke Museum</h4></a>
                                <div class="meta-post">
                                    <ul class="lab-ul">
                                        <li><i class="icofont-ui-user"></i> Admin</li>
                                        <li><i class="icofont-calendar"></i> 1 Juni 2025</li>
                                    </ul>
                                </div>
                                <p>Siswa kelas 4-6 SDIT Lukmanalhakim melakukan kunjungan edukatif ke Museum Nasional untuk mempelajari sejarah dan budaya Indonesia.</p>
                            </div>
                            <div class="post-footer">
                                <div class="pf-left">
                                    <a href="{{ route('blog-single', 'kunjungan-edukatif-ke-museum') }}" class="lab-btn-text">Selengkapnya <i class="icofont-external-link"></i></a>
                                </div>
                                <div class="pf-right">
                                    <i class="icofont-comment"></i>
                                    <span class="comment-count">2</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="post-item">
                        <div class="post-inner">
                            <div class="post-thumb">
                                <a href="{{ route('blog-single', 'pelatihan-guru-kurikulum-merdeka') }}"><img src="{{ asset('assets/images/blog/05.jpg') }}" alt="blog"></a>
                            </div>
                            <div class="post-content">
                                <a href="{{ route('blog-single', 'pelatihan-guru-kurikulum-merdeka') }}"><h4>Pelatihan Guru Kurikulum Merdeka</h4></a>
                                <div class="meta-post">
                                    <ul class="lab-ul">
                                        <li><i class="icofont-ui-user"></i> Admin</li>
                                        <li><i class="icofont-calendar"></i> 25 Mei 2025</li>
                                    </ul>
                                </div>
                                <p>Guru-guru SDIT Lukmanalhakim mengikuti pelatihan implementasi Kurikulum Merdeka untuk meningkatkan kualitas pembelajaran.</p>
                            </div>
                            <div class="post-footer">
                                <div class="pf-left">
                                    <a href="{{ route('blog-single', 'pelatihan-guru-kurikulum-merdeka') }}" class="lab-btn-text">Selengkapnya <i class="icofont-external-link"></i></a>
                                </div>
                                <div class="pf-right">
                                    <i class="icofont-comment"></i>
                                    <span class="comment-count">4</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="post-item">
                        <div class="post-inner">
                            <div class="post-thumb">
                                <a href="{{ route('blog-single', 'lomba-tahfidz-quran-antar-sekolah') }}"><img src="{{ asset('assets/images/blog/06.jpg') }}" alt="blog"></a>
                            </div>
                            <div class="post-content">
                                <a href="{{ route('blog-single', 'lomba-tahfidz-quran-antar-sekolah') }}"><h4>Lomba Tahfidz Al-Qur'an Antar Sekolah</h4></a>
                                <div class="meta-post">
                                    <ul class="lab-ul">
                                        <li><i class="icofont-ui-user"></i> Admin</li>
                                        <li><i class="icofont-calendar"></i> 20 Mei 2025</li>
                                    </ul>
                                </div>
                                <p>SDIT Lukmanalhakim menyelenggarakan lomba Tahfidz Al-Qur'an antar sekolah dasar Islam se-kota untuk memotivasi siswa dalam menghafal Al-Qur'an.</p>
                            </div>
                            <div class="post-footer">
                                <div class="pf-left">
                                    <a href="{{ route('blog-single', 'lomba-tahfidz-quran-antar-sekolah') }}" class="lab-btn-text">Selengkapnya <i class="icofont-external-link"></i></a>
                                </div>
                                <div class="pf-right">
                                    <i class="icofont-comment"></i>
                                    <span class="comment-count">6</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="post-item">
                        <div class="post-inner">
                            <div class="post-thumb">
                                <a href="{{ route('blog-single', 'kegiatan-literasi-sekolah') }}"><img src="{{ asset('assets/images/blog/07.jpg') }}" alt="blog"></a>
                            </div>
                            <div class="post-content">
                                <a href="{{ route('blog-single', 'kegiatan-literasi-sekolah') }}"><h4>Kegiatan Literasi Sekolah</h4></a>
                                <div class="meta-post">
                                    <ul class="lab-ul">
                                        <li><i class="icofont-ui-user"></i> Admin</li>
                                        <li><i class="icofont-calendar"></i> 15 Mei 2025</li>
                                    </ul>
                                </div>
                                <p>Program literasi sekolah untuk meningkatkan minat baca siswa dan mengembangkan kemampuan berpikir kritis.</p>
                            </div>
                            <div class="post-footer">
                                <div class="pf-left">
                                    <a href="{{ route('blog-single', 'kegiatan-literasi-sekolah') }}" class="lab-btn-text">Selengkapnya <i class="icofont-external-link"></i></a>
                                </div>
                                <div class="pf-right">
                                    <i class="icofont-comment"></i>
                                    <span class="comment-count">3</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="post-item">
                        <div class="post-inner">
                            <div class="post-thumb">
                                <a href="{{ route('blog-single', 'workshop-parenting-islami') }}"><img src="{{ asset('assets/images/blog/08.jpg') }}" alt="blog"></a>
                            </div>
                            <div class="post-content">
                                <a href="{{ route('blog-single', 'workshop-parenting-islami') }}"><h4>Workshop Parenting Islami</h4></a>
                                <div class="meta-post">
                                    <ul class="lab-ul">
                                        <li><i class="icofont-ui-user"></i> Admin</li>
                                        <li><i class="icofont-calendar"></i> 10 Mei 2025</li>
                                    </ul>
                                </div>
                                <p>SDIT Lukmanalhakim mengadakan workshop parenting Islami untuk orang tua siswa dengan tema "Mendidik Anak di Era Digital".</p>
                            </div>
                            <div class="post-footer">
                                <div class="pf-left">
                                    <a href="{{ route('blog-single', 'workshop-parenting-islami') }}" class="lab-btn-text">Selengkapnya <i class="icofont-external-link"></i></a>
                                </div>
                                <div class="pf-right">
                                    <i class="icofont-comment"></i>
                                    <span class="comment-count">5</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="post-item">
                        <div class="post-inner">
                            <div class="post-thumb">
                                <a href="{{ route('blog-single', 'peringatan-hari-kartini') }}"><img src="{{ asset('assets/images/blog/09.jpg') }}" alt="blog"></a>
                            </div>
                            <div class="post-content">
                                <a href="{{ route('blog-single', 'peringatan-hari-kartini') }}"><h4>Peringatan Hari Kartini</h4></a>
                                <div class="meta-post">
                                    <ul class="lab-ul">
                                        <li><i class="icofont-ui-user"></i> Admin</li>
                                        <li><i class="icofont-calendar"></i> 21 April 2025</li>
                                    </ul>
                                </div>
                                <p>SDIT Lukmanalhakim memperingati Hari Kartini dengan berbagai kegiatan menarik yang menginspirasi semangat perjuangan dan kesetaraan.</p>
                            </div>
                            <div class="post-footer">
                                <div class="pf-left">
                                    <a href="{{ route('blog-single', 'peringatan-hari-kartini') }}" class="lab-btn-text">Selengkapnya <i class="icofont-external-link"></i></a>
                                </div>
                                <div class="pf-right">
                                    <i class="icofont-comment"></i>
                                    <span class="comment-count">4</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <ul class="default-pagination lab-ul">
                <li>
                    <a href="#"><i class="icofont-rounded-left"></i></a>
                </li>
                <li>
                    <a href="#" class="active">01</a>
                </li>
                <li>
                    <a href="#">02</a>
                </li>
                <li>
                    <a href="#">03</a>
                </li>
                <li>
                    <a href="#"><i class="icofont-rounded-right"></i></a>
                </li>
            </ul>
        </div>
    </div>
</div>
<!-- Blog Section Ending -->
@endsection 
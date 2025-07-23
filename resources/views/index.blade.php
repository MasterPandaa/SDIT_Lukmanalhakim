@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
<!-- Banner Section Start -->
<section class="banner-section">
    <div class="banner-area">
        <div class="container">
            <div class="row align-items-center justify-content-center">
                <div class="col-md-7 col-12">
                    <div class="banner-content">
                        <h2 class="mb-3">Selamat Datang di SDIT Lukmanalhakim</h2>
                        <p>Sekolah Dasar Islam Terpadu yang mengintegrasikan pendidikan umum dan nilai-nilai Islam untuk membentuk generasi yang berakhlak mulia, cerdas, dan berprestasi.</p>
                        <a href="{{ route('contact') }}" class="lab-btn mt-3">Hubungi Kami</a>
                    </div>
                </div>
                <div class="col-md-5 col-12">
                    <div class="banner-thumb">
                        <img src="{{ asset('assets/images/banner/01.png') }}" alt="banner-image">
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Banner Section Ending -->

<!-- Feature Section Start -->
<section class="feature-section padding-tb">
    <div class="container">
        <div class="section-header text-center">
            <span>Keunggulan Kami</span>
            <h2>Mengapa Memilih SDIT Lukmanalhakim?</h2>
        </div>
        <div class="section-wrapper">
            <div class="row g-4 justify-content-center row-cols-1 row-cols-sm-2 row-cols-lg-3">
                <div class="col">
                    <div class="feature-item">
                        <div class="feature-inner">
                            <div class="feature-thumb">
                                <img src="{{ asset('assets/images/feature/01.png') }}" alt="feature">
                            </div>
                            <div class="feature-content">
                                <h4>Kurikulum Terintegrasi</h4>
                                <p>Menggabungkan kurikulum nasional dengan nilai-nilai Islam dalam pembelajaran sehari-hari.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="feature-item">
                        <div class="feature-inner">
                            <div class="feature-thumb">
                                <img src="{{ asset('assets/images/feature/02.png') }}" alt="feature">
                            </div>
                            <div class="feature-content">
                                <h4>Pendidik Profesional</h4>
                                <p>Guru-guru berpengalaman dan berdedikasi tinggi dalam mendidik dan membimbing siswa.</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="feature-item">
                        <div class="feature-inner">
                            <div class="feature-thumb">
                                <img src="{{ asset('assets/images/feature/03.png') }}" alt="feature">
                            </div>
                            <div class="feature-content">
                                <h4>Fasilitas Lengkap</h4>
                                <p>Menyediakan fasilitas modern yang mendukung proses belajar mengajar yang optimal.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Feature Section Ending -->

<!-- About Section Start -->
<section class="about-section padding-tb shape-1">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-6 col-12">
                <div class="about-thumb">
                    <img src="{{ asset('assets/images/about/01.png') }}" alt="about-thumb">
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="about-content">
                    <div class="section-header">
                        <span>Tentang Kami</span>
                        <h2>Pendidikan Berkualitas dengan Nilai Islam</h2>
                        <p>SDIT Lukmanalhakim didirikan dengan visi menjadi lembaga pendidikan Islam terdepan yang menghasilkan generasi berakhlak mulia, cerdas, dan berprestasi.</p>
                    </div>
                    <div class="section-wrapper">
                        <ul class="lab-ul">
                            <li>
                                <div class="sr-left">
                                    <img src="{{ asset('assets/images/about/icon/01.jpg') }}" alt="about-icon">
                                </div>
                                <div class="sr-right">
                                    <h5>Pendidikan Karakter</h5>
                                    <p>Membentuk karakter siswa berdasarkan nilai-nilai Islam dan keteladanan Rasulullah SAW.</p>
                                </div>
                            </li>
                            <li>
                                <div class="sr-left">
                                    <img src="{{ asset('assets/images/about/icon/02.jpg') }}" alt="about-icon">
                                </div>
                                <div class="sr-right">
                                    <h5>Pembelajaran Aktif</h5>
                                    <p>Metode pembelajaran yang interaktif dan menyenangkan untuk mengembangkan potensi siswa.</p>
                                </div>
                            </li>
                            <li>
                                <div class="sr-left">
                                    <img src="{{ asset('assets/images/about/icon/03.jpg') }}" alt="about-icon">
                                </div>
                                <div class="sr-right">
                                    <h5>Pengembangan Bakat</h5>
                                    <p>Program ekstrakurikuler yang beragam untuk mengembangkan bakat dan minat siswa.</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section Ending -->

<!-- Program Section Start -->
<section class="course-section padding-tb section-bg">
    <div class="container">
        <div class="section-header text-center">
            <span>Program Unggulan</span>
            <h2>Program Pendidikan Kami</h2>
        </div>
        <div class="section-wrapper">
            <div class="row g-4 justify-content-center row-cols-1 row-cols-sm-2 row-cols-lg-3">
                <div class="col">
                    <div class="course-item">
                        <div class="course-inner">
                            <div class="course-thumb">
                                <img src="{{ asset('assets/images/course/01.jpg') }}" alt="course">
                            </div>
                            <div class="course-content">
                                <h4>Tahfidz Al-Qur'an</h4>
                                <p>Program hafalan Al-Qur'an dengan metode yang menyenangkan dan sesuai kemampuan siswa.</p>
                                <a href="{{ route('course') }}" class="lab-btn-text">Selengkapnya <i class="icofont-external-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="course-item">
                        <div class="course-inner">
                            <div class="course-thumb">
                                <img src="{{ asset('assets/images/course/02.jpg') }}" alt="course">
                            </div>
                            <div class="course-content">
                                <h4>Bahasa Arab & Inggris</h4>
                                <p>Pembelajaran bahasa asing secara intensif untuk mempersiapkan siswa menghadapi era global.</p>
                                <a href="{{ route('course') }}" class="lab-btn-text">Selengkapnya <i class="icofont-external-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="course-item">
                        <div class="course-inner">
                            <div class="course-thumb">
                                <img src="{{ asset('assets/images/course/03.jpg') }}" alt="course">
                            </div>
                            <div class="course-content">
                                <h4>Sains & Teknologi</h4>
                                <p>Pembelajaran sains dan teknologi dengan pendekatan praktis dan eksperimental.</p>
                                <a href="{{ route('course') }}" class="lab-btn-text">Selengkapnya <i class="icofont-external-link"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('course') }}" class="lab-btn">Lihat Semua Program</a>
            </div>
        </div>
    </div>
</section>
<!-- Program Section Ending -->

<!-- Berita Section Start -->
<section class="blog-section padding-tb">
    <div class="container">
        <div class="section-header text-center">
            <span>Berita Terbaru</span>
            <h2>Informasi & Kegiatan Sekolah</h2>
        </div>
        <div class="section-wrapper">
            <div class="row g-4 justify-content-center row-cols-1 row-cols-md-2 row-cols-lg-3">
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
                                        <li><i class="icofont-ui-calendar"></i> 15 Juni 2025</li>
                                        <li><i class="icofont-user"></i> Admin</li>
                                    </ul>
                                </div>
                                <p>Rangkaian kegiatan Ramadhan yang diselenggarakan SDIT Lukmanalhakim untuk menumbuhkan semangat ibadah siswa.</p>
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
                                        <li><i class="icofont-ui-calendar"></i> 10 Juni 2025</li>
                                        <li><i class="icofont-user"></i> Admin</li>
                                    </ul>
                                </div>
                                <p>Siswa SDIT Lukmanalhakim berhasil meraih juara dalam kompetisi Olimpiade Matematika tingkat kota.</p>
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
                                        <li><i class="icofont-ui-calendar"></i> 5 Juni 2025</li>
                                        <li><i class="icofont-user"></i> Admin</li>
                                    </ul>
                                </div>
                                <p>Informasi penerimaan peserta didik baru SDIT Lukmanalhakim untuk tahun ajaran 2025/2026.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('blog') }}" class="lab-btn">Lihat Semua Berita</a>
            </div>
        </div>
    </div>
</section>
<!-- Berita Section Ending -->

<!-- Testimonial Section Start -->
<section class="testimonial-section padding-tb section-bg">
    <div class="container">
        <div class="section-header text-center">
            <span>Testimoni</span>
            <h2>Apa Kata Mereka?</h2>
        </div>
        <div class="section-wrapper">
            <div class="row justify-content-center">
                <div class="col-lg-8 col-12">
                    <div class="testimonial-slider">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="testimonial-inner">
                                        <div class="testimonial-thumb">
                                            <img src="{{ asset('assets/images/clients/01.jpg') }}" alt="testimonial">
                                        </div>
                                        <div class="testimonial-content">
                                            <p>Anak saya sangat senang bersekolah di SDIT Lukmanalhakim. Selain mendapatkan ilmu pengetahuan, dia juga belajar nilai-nilai agama yang sangat penting untuk pembentukan karakternya.</p>
                                            <div class="testimonial-author">
                                                <h5>Ibu Siti</h5>
                                                <span>Orang Tua Siswa</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="testimonial-inner">
                                        <div class="testimonial-thumb">
                                            <img src="{{ asset('assets/images/clients/02.jpg') }}" alt="testimonial">
                                        </div>
                                        <div class="testimonial-content">
                                            <p>SDIT Lukmanalhakim memiliki metode pembelajaran yang menyenangkan. Anak saya menjadi lebih percaya diri dan bersemangat dalam belajar sejak bersekolah di sini.</p>
                                            <div class="testimonial-author">
                                                <h5>Bapak Ahmad</h5>
                                                <span>Orang Tua Siswa</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="testimonial-item">
                                    <div class="testimonial-inner">
                                        <div class="testimonial-thumb">
                                            <img src="{{ asset('assets/images/clients/03.jpg') }}" alt="testimonial">
                                        </div>
                                        <div class="testimonial-content">
                                            <p>Saya sangat puas dengan program tahfidz di SDIT Lukmanalhakim. Anak saya yang tadinya sulit menghafal, sekarang sudah bisa menghafal beberapa surat dengan baik.</p>
                                            <div class="testimonial-author">
                                                <h5>Ibu Fatimah</h5>
                                                <span>Orang Tua Siswa</span>
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
</section>
<!-- Testimonial Section Ending -->
@endsection 
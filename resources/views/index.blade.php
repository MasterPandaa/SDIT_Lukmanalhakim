@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <!-- banner section start here -->
    <section class="banner-section style-1">
        <div class="container">
            <div class="section-wrapper">
                <div class="row align-items-center">
                    <div class="col-xxl-5 col-xl-6 col-lg-10">
                        <div class="banner-content">
                            <h6 class="subtitle text-uppercase fw-medium">Islamic education</h6>
                            <h2 class="title"><span class="d-lg-block">Sekolah Dasar</span> Islam Terpadu <span class="d-lg-block">Luqman Al Hakim</span></h2>
                            <p class="desc">"Membangun Generasi Qur'ani yang Cerdas, Berprestasi, dan Berakhlak Mulia untuk Masa Depan Gemilang"</p>
                            <a href="https://psb.luqmanalhakim.sch.id/" class="lab-btn"><span>Daftar Segera</span></a>
                            <div class="banner-catagory d-flex flex-wrap">
                                <p>Didik, Bekali, Antarkan Masa Depan Cerah!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-7 col-xl-6">
                        <div class="banner-thumb">
                            <img src="{{ asset('assets/images/banner/01.png') }}" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="all-shapes"></div>
        <div class="cbs-content-list d-none">
            <ul class="lab-ul">
                <li class="ccl-shape shape-1"><a href="#">Tahfidz Al-Quran</a></li>
                <li class="ccl-shape shape-2"><a href="#">Pendidikan Karakter</a></li>
                <li class="ccl-shape shape-3"><a href="#">Aktif & Kreatif</a></li>
                <li class="ccl-shape shape-4"><a href="#">Kurikulum Merdeka</a></li>
                <li class="ccl-shape shape-5"><a href="#">Pembiasaan Ibadah</a></li>
            </ul>
        </div>
    </section>
    <!-- banner section ending here -->

    <!-- sponsor section start here -->
    <div class="sponsor-section section-bg">
        <div class="container">
            <div class="section-wrapper">
                <div class="sponsor-slider">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="sponsor-iten">
                                <div class="sponsor-thumb">
                                    <img src="{{ asset('assets/images/sponsor/02.png') }}" alt="sponsor">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="sponsor-iten">
                                <div class="sponsor-thumb">
                                    <img src="{{ asset('assets/images/sponsor/03.png') }}" alt="sponsor">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="sponsor-iten">
                                <div class="sponsor-thumb">
                                    <img src="{{ asset('assets/images/sponsor/04.png') }}" alt="sponsor">
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="sponsor-iten">
                                <div class="sponsor-thumb">
                                    <img src="{{ asset('assets/images/sponsor/05.png') }}" alt="sponsor">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- sponsor section ending here -->

    <!-- category section start here -->
    <div class="category-section padding-tb">
        <div class="container">
            <div class="section-header text-center">
                <span class="subtitle">Program Unggulan</span>
                <h2 class="title">Bangun Generasi Berkarakter bersama Kami</h2>
            </div>
            <div class="section-wrapper">
                <div class="row g-4 justify-content-center row-cols-xl-6 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1">
                    <div class="col">
                        <div class="category-item">
                            <div class="category-inner">
                                <div class="category-thumb">
                                    <img src="{{ asset('assets/images/category/icon/01.jpg') }}" alt="Tahfiz Quran">
                                </div>
                                <div class="category-content">
                                    <a href="{{ route('course') }}">
                                        <h6>Tahfiz Quran 10 juz</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="category-item">
                            <div class="category-inner">
                                <div class="category-thumb">
                                    <img src="{{ asset('assets/images/category/icon/02.jpg') }}" alt="Pendidikan Karakter">
                                </div>
                                <div class="category-content">
                                    <a href="{{ route('course') }}">
                                        <h6>Pendidikan Karakter</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="category-item">
                            <div class="category-inner">
                                <div class="category-thumb">
                                    <img src="{{ asset('assets/images/category/icon/03.jpg') }}" alt="Fasih Membaca Quran">
                                </div>
                                <div class="category-content">
                                    <a href="{{ route('course') }}">
                                        <h6>Fasih Membaca Quran</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="category-item">
                            <div class="category-inner">
                                <div class="category-thumb">
                                    <img src="{{ asset('assets/images/category/icon/04.jpg') }}" alt="Hafal Hadis">
                                </div>
                                <div class="category-content">
                                    <a href="{{ route('course') }}">
                                        <h6>Hafal 20 Hadis Pilihan</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="category-item">
                            <div class="category-inner">
                                <div class="category-thumb">
                                    <img src="{{ asset('assets/images/category/icon/05.jpg') }}" alt="Asessmen AKM">
                                </div>
                                <div class="category-content">
                                    <a href="{{ route('course') }}">
                                        <h6>Sukses Asessmen AKM</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="category-item">
                            <div class="category-inner">
                                <div class="category-thumb">
                                    <img src="{{ asset('assets/images/category/icon/06.jpg') }}" alt="Program Kepesantrenan">
                                </div>
                                <div class="category-content">
                                    <a href="{{ route('course') }}">
                                        <h6>Program Kepesantrenan</h6>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- category section start here -->

    <!-- Achievement section start here -->
    <div class="achievement-section style-3 padding-tb">
        <div class="container">
            <div class="section-wrapper">
                <div class="counter-part">
                    <div class="row g-4 row-cols-lg-4 row-cols-sm-2 row-cols-1 justify-content-center">
                        <div class="col">
                            <div class="count-item">
                                <div class="count-inner">
                                    <div class="count-icon">
                                        <i class="icofont-users-alt-4"></i>
                                    </div>
                                    <div class="count-content">
                                        <h2><span class="count" data-to="465" data-speed="1500"></span><span></span></h2>
                                        <p>Peserta Didik</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="count-item">
                                <div class="count-inner">
                                    <div class="count-icon">
                                        <i class="icofont-graduate-alt"></i>
                                    </div>
                                    <div class="count-content">
                                        <h2><span class="count" data-to="76" data-speed="1500"></span><span></span></h2>
                                        <p>Guru dan Staff Profesional</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="count-item">
                                <div class="count-inner">
                                    <div class="count-icon">
                                        <i class="icofont-notification"></i>
                                    </div>
                                    <div class="count-content">
                                        <h2><span class="count" data-to="28" data-speed="1500"></span><span></span></h2>
                                        <p>Jumlah Kelas</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="count-item">
                                <div class="count-inner">
                                    <div class="count-icon">
                                        <i class="icofont-clock-time"></i>
                                    </div>
                                    <div class="count-content">
                                        <h2><span class="count" data-to="10" data-speed="1500"></span><span></span></h2>
                                        <p>Ekstakulikuer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Achievement section ending here -->

    <!-- student feedbak section start here -->
    <div class="student-feedbak-section padding-tb shape-img">
        <div class="container">
            <div class="section-header text-center">
                <span class="subtitle">Tak kenal Maka Tak Sayang</span>
                <h2 class="title">Sekilas Tentang Kami</h2>
            </div>
            <div class="section-wrapper">
                <div class="row justify-content-center row-cols-lg-2 row-cols-1">
                    <div class="col">
                        <div class="sf-left">
                            <div class="sfl-thumb">
                                <img src="{{ asset('assets/images/feedback/01.jpg') }}" alt="student feedback">
                                <a href="https://www.youtube.com/embed/09QEtaoi2Lk" class="video-button" data-rel="lightcase"><i class="icofont-ui-play"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="stu-feed-item">
                            <div class="stu-feed-inner">
                                <div class="stu-feed-top">
                                    <div class="sft-left">
                                        <div class="sftl-thumb">
                                            <img src="{{ asset('assets/images/feedback/student/01.jpg') }}" alt="student feedback">
                                        </div>
                                        <div class="sftl-content">
                                            <a href="#"><h6>Ibu Siti</h6></a>
                                            <span>Wali Murid Kelas 2</span>
                                        </div>
                                    </div>
                                    <div class="sft-right">
                                        <span class="ratting">
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="stu-feed-bottom">
                                    <p>"Alhamdulillah, anak saya semakin semangat belajar sejak bersekolah di SDIT Luqman Al Hakim Sleman. Guru-gurunya sabar, pembelajarannya menarik, dan nilai-nilai Islam diterapkan dengan baik. Terima kasih!</p>
                                </div>
                            </div>
                        </div>
                        <div class="stu-feed-item">
                            <div class="stu-feed-inner">
                                <div class="stu-feed-top">
                                    <div class="sft-left">
                                        <div class="sftl-thumb">
                                            <img src="{{ asset('assets/images/feedback/student/02.jpg') }}" alt="student feedback">
                                        </div>
                                        <div class="sftl-content">
                                            <a href="#"><h6>Bapak Ahmad</h6></a>
                                            <span>Wali Murid Kelas 3</span>
                                        </div>
                                    </div>
                                    <div class="sft-right">
                                        <span class="ratting">
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                        </span>
                                    </div>
                                </div>
                                <div class="stu-feed-bottom">
                                    <p>"Anak saya jadi lebih disiplin, mandiri, dan mencintai ilmu agama sejak sekolah di SDIT Luqman Al Hakim. Lingkungan belajar yang nyaman membuatnya betah. Sangat puas dengan sekolah ini!"</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- student feedbak section ending here -->

    <!-- Instructors Section Start Here -->
    <div class="instructor-section padding-tb section-bg">
        <div class="container">
            <div class="section-header text-center">
                <span class="subtitle">Profil Guru & Staf</span>
                <h2 class="title">Temukan informasi tentang guru dan staf kami</h2>
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
                                    <a href="{{ route('guru') }}"><h4>Ahmad Faizal Bhakti Islami, S.Pd.</h4></a>
                                    <p>Guru Mupel PAIBP</p>
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
                                    <a href="{{ route('guru') }}"><h4>Atika Nurmaningtyas,
                                        S.Pd., Gr.</h4></a>
                                    <p>Guru Tema Kelas 6B</p>
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
                                    <a href="{{ route('guru') }}"><h4>Rofidah Qonitah
                                        Taqqiyah, S.Psi.
                                        </h4></a>
                                    <p>Guru Bimbingan Konseling</p>
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
                                    <a href="{{ route('guru') }}"><h4>Muhammad FajarKholilulloh, S.Pd</h4></a>
                                    <p>Guru Tahfidz Kelas 6A</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="text-center footer-btn">
                    <p>Ingin mengetahui lebih lanjut?<a href="{{ route('guru') }}">Klik di sini</a></p>
                </div>
            </div>
        </div>
    </div>
    <!-- Instructors Section Ending Here -->

    <!-- blog section start here -->
    <div class="blog-section padding-tb section-bg">
        <div class="container">
            <div class="section-header text-center">
                <span class="subtitle">Berita dan Artikel</span>
                <h2 class="title">"Setiap Halaman yang Dibaca, Membawa Kita ke Tempat Baru!" </h2>
            </div>
            <div class="section-wrapper">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center g-4">
                    <div class="col">
                        <div class="post-item">
                            <div class="post-inner">
                                <div class="post-thumb">
                                    <a href="{{ route('blog-single', 'bagaimana-mengelola-uang-dengan-bijak') }}"><img src="{{ asset('assets/images/blog/01.jpg') }}" alt="blog thumb"></a>
                                </div>
                                <div class="post-content">
                                    <a href="{{ route('blog-single', 'bagaimana-mengelola-uang-dengan-bijak') }}"><h4>Bagaimana Mengelola Uang dengan Bijak</h4></a>
                                    <div class="meta-post">
                                        <ul class="lab-ul">
                                            <li><i class="icofont-ui-user"></i>Umi Salamah</li>
                                            <li><i class="icofont-calendar"></i>Oktober 05, 2024</li>
                                        </ul>
                                    </div>
                                    <p>Mengelola uang dengan bijak membantu kita menggunakan keuangan secara efektif, memastikan kebutuhan terpenuhi, serta menabung dan berinvestasi untuk masa depan </p>
                                </div>
                                <div class="post-footer">
                                    <div class="pf-left">
                                        <a href="{{ route('blog-single', 'bagaimana-mengelola-uang-dengan-bijak') }}" class="lab-btn-text">Read more <i class="icofont-external-link"></i></a>
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
                                    <a href="{{ route('blog-single', 'sebuah-sekolah-yang-menyenangkan') }}"><img src="{{ asset('assets/images/blog/02.jpg') }}" alt="blog thumb"></a>
                                </div>
                                <div class="post-content">
                                    <a href="{{ route('blog-single', 'sebuah-sekolah-yang-menyenangkan') }}"><h4>Sebuah Sekolah yang Menyenangkan</h4></a>
                                    <div class="meta-post">
                                        <ul class="lab-ul">
                                            <li><i class="icofont-ui-user"></i>Berliana</li>
                                            <li><i class="icofont-calendar"></i>Desember 13, 2024</li>
                                        </ul>
                                    </div>
                                    <p>Sekolah yang menyenangkan adalah tempat di mana belajar terasa seru, guru dan teman-teman saling mendukung, serta setiap hari penuh dengan pengalaman baru yang menginspirasi.</p>
                                </div>
                                <div class="post-footer">
                                    <div class="pf-left">
                                        <a href="{{ route('blog-single', 'sebuah-sekolah-yang-menyenangkan') }}" class="lab-btn-text">Read more <i class="icofont-external-link"></i></a>
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
                                    <a href="{{ route('blog-single', 'perkembangan-ai-untuk-pembelajaran') }}"><img src="{{ asset('assets/images/blog/03.jpg') }}" alt="blog thumb"></a>
                                </div>
                                <div class="post-content">
                                    <a href="{{ route('blog-single', 'perkembangan-ai-untuk-pembelajaran') }}"><h4>Perkembangan AI untuk Pembelajaran</h4></a>
                                    <div class="meta-post">
                                        <ul class="lab-ul">
                                            <li><i class="icofont-ui-user"></i>Ahmad Faizal</li>
                                            <li><i class="icofont-calendar"></i>April 23, 2024</li>
                                        </ul>
                                    </div>
                                    <p>Artificial Intelligence (AI) dalam pembelajaran membantu siswa belajar lebih interaktif, personal, dan efisien dengan teknologi cerdas yang menyesuaikan materi sesuai kebutuhan mereka.</p>
                                </div>
                                <div class="post-footer">
                                    <div class="pf-left">
                                        <a href="{{ route('blog-single', 'perkembangan-ai-untuk-pembelajaran') }}" class="lab-btn-text">Read more <i class="icofont-external-link"></i></a>
                                    </div>
                                    <div class="pf-right">
                                        <i class="icofont-comment"></i>
                                        <span class="comment-count">3</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="text-center footer-btn">
                        <p>Ingin mengetahui lebih lanjut?<a href="{{ route('blog') }}"> Klik di sini</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- blog section ending here -->

    <!-- Clients Section Start Here -->
    <div class="clients-section padding-tb">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="title">Apa Kata Alumni?</h2>
            </div>
            <div class="section-wrapper">
                <div class="clients-slider overflow-hidden">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide">
                            <div class="client-item">
                                <div class="client-inner">
                                    <div class="client-thumb">
                                        <img src="{{ asset('assets/images/clients/01.jpg') }}" alt="education">
                                    </div>
                                    <div class="client-content">
                                        <p>"Aku bangga jadi alumni SDIT Luqman Al Hakim! Gurunya baik dan sabar banget, ngajarin kita bukan cuma pelajaran sekolah, tapi juga cara jadi anak yang shalih. Kegiatan di sekolah juga seru, ada outbound, tahfidz, dan lomba-lomba yang bikin aku jadi lebih percaya diri. Sekolah ini benar-benar ngajarin ilmu dunia dan akhirat!"</p>
                                        <div class="client-info">
                                            <h6 class="client-name">Aulia Rahmawati</h6>
                                            <span class="client-degi">Alumni 2022</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="client-item">
                                <div class="client-inner">
                                    <div class="client-thumb">
                                        <img src="{{ asset('assets/images/clients/02.jpg') }}" alt="education">
                                    </div>
                                    <div class="client-content">
                                        <p>Belajar di SDIT Luqman Al Hakim itu pengalaman yang nggak terlupakan! Selain akademiknya bagus, sekolah ini juga ngajarin akhlak dan nilai-nilai Islam dengan cara yang seru. Aku jadi lebih disiplin, hafalan Qur'anku bertambah, dan yang paling penting, aku punya banyak teman yang baik. Terima kasih, SDIT Luqman Al Hakim!"</p>
                                        <div class="client-info">
                                            <h6 class="client-name">Aisyah Rahmawati</h6>
                                            <span class="client-degi">Alumni 2019</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="swiper-slide">
                            <div class="client-item">
                                <div class="client-inner">
                                    <div class="client-thumb">
                                        <img src="{{ asset('assets/images/clients/03.jpg') }}" alt="education">
                                    </div>
                                    <div class="client-content">
                                        <p>"Sekolah di SDIT Luqman Al Hakim bikin aku banyak belajar tentang arti persahabatan, kerja sama, dan kepemimpinan. Aku dulu sering ikut organisasi sekolah dan berbagai lomba, yang bikin aku jadi lebih percaya diri. Ilmu yang aku dapat di sini nggak cuma akademik, tapi juga ilmu kehidupan!"</p>
                                        <div class="client-info">
                                            <h6 class="client-name">Ahmad Zaki</h6>
                                            <span class="client-degi">Alumni 2020</span>
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
    <!-- Clients Section Ending Here -->

    <!-- WhatsApp Floating Button -->
    @if(config('whatsapp.enabled', true))
    <div class="whatsapp-float" onclick="toggleWhatsAppPopup()">
        <i class="fab fa-whatsapp"></i>
    </div>
    @endif

    <!-- WhatsApp Popup -->
    @if(config('whatsapp.enabled', true))
    <div id="whatsapp-popup" class="whatsapp-popup">
        <div class="whatsapp-popup-content">
            <div class="whatsapp-popup-header">
                <div class="whatsapp-popup-title">
                    <i class="fab fa-whatsapp"></i>
                    <span>{{ config('whatsapp.admin_name', 'Admin eLHaeS') }}</span>
                </div>
                <button class="whatsapp-popup-close" onclick="closeWhatsAppPopup()">
                    <i class="fas fa-times"></i>
                </button>
            </div>
            <div class="whatsapp-popup-body">
                <div class="whatsapp-message">
                    <p>{{ config('whatsapp.popup_message', 'Assalamualikum, ada yang bisa kami bantu?') }}</p>
                </div>
                <button class="whatsapp-open-chat" onclick="openWhatsAppChat()">
                    <i class="fas fa-paper-plane"></i>
                    Open chat
                </button>
            </div>
        </div>
    </div>
    @endif
@endsection

@push('styles')
<style>
/* Program Unggulan Cards - Position and Size Fix */
.category-section {
    background: #f8f9fa;
}

.category-item {
    margin-bottom: 15px;
}

.category-inner {
    background: white;
    border-radius: 10px;
    padding: 20px 15px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 140px;
    text-align: center;
}

.category-thumb {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 12px;
}

.category-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}

.category-content h6 {
    font-size: 13px;
    font-weight: 600;
    color: #333;
    margin: 0;
    text-align: center;
    line-height: 1.3;
}

.category-content a {
    text-decoration: none;
    color: inherit;
}

.category-content a:hover {
    text-decoration: none;
}

/* Section Header Improvements */
.section-header .subtitle {
    color: #ff6b35;
    font-weight: 600;
    font-size: 16px;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 10px;
    display: block;
}

.section-header .title {
    color: #333;
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 0;
    line-height: 1.3;
}

/* WhatsApp Floating Button */
.whatsapp-float {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 60px;
    height: 60px;
    background-color: #25D366;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 30px;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);
    transition: all 0.3s ease;
    z-index: 1000;
}

.whatsapp-float:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(37, 211, 102, 0.6);
}

/* WhatsApp Popup */
.whatsapp-popup {
    position: fixed;
    bottom: 100px;
    right: 30px;
    width: 300px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
    z-index: 1001;
    display: none;
    animation: slideInUp 0.3s ease;
}

.whatsapp-popup.show {
    display: block;
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.whatsapp-popup-header {
    background: #25D366;
    color: white;
    padding: 15px 20px;
    border-radius: 12px 12px 0 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.whatsapp-popup-title {
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 600;
}

.whatsapp-popup-title i {
    font-size: 18px;
}

.whatsapp-popup-close {
    background: none;
    border: none;
    color: white;
    cursor: pointer;
    font-size: 16px;
    padding: 0;
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: background-color 0.3s ease;
}

.whatsapp-popup-close:hover {
    background-color: rgba(255, 255, 255, 0.2);
}

.whatsapp-popup-body {
    padding: 20px;
}

.whatsapp-message {
    background: #f0f0f0;
    padding: 12px 16px;
    border-radius: 18px;
    margin-bottom: 15px;
    position: relative;
}

.whatsapp-message::before {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 20px;
    width: 0;
    height: 0;
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
    border-top: 8px solid #f0f0f0;
}

.whatsapp-message p {
    margin: 0;
    color: #333;
    font-size: 14px;
    line-height: 1.4;
}

.whatsapp-open-chat {
    width: 100%;
    background: #25D366;
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: background-color 0.3s ease;
}

.whatsapp-open-chat:hover {
    background: #128C7E;
}

.whatsapp-open-chat i {
    font-size: 14px;
}

/* Responsive */
@media (max-width: 768px) {
    .category-inner {
        min-height: 120px;
        padding: 15px 10px;
    }
    
    .category-thumb {
        width: 50px;
        height: 50px;
        margin-bottom: 10px;
    }
    
    .category-content h6 {
        font-size: 12px;
    }
    
    .section-header .title {
        font-size: 24px;
    }
    
    .whatsapp-popup {
        width: 280px;
        right: 20px;
        bottom: 90px;
    }
    
    .whatsapp-float {
        bottom: 20px;
        right: 20px;
        width: 55px;
        height: 55px;
        font-size: 28px;
    }
}
</style>
@endpush

@push('scripts')
<script>
// WhatsApp Popup Functions
function toggleWhatsAppPopup() {
    const popup = document.getElementById('whatsapp-popup');
    popup.classList.toggle('show');
}

function closeWhatsAppPopup() {
    const popup = document.getElementById('whatsapp-popup');
    popup.classList.remove('show');
}

function openWhatsAppChat() {
    // Menggunakan konfigurasi dari backend
    const phoneNumber = '{{ config("whatsapp.phone_number") }}';
    const message = '{{ config("whatsapp.default_message") }}';
    const whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;
    window.open(whatsappUrl, '_blank');
    closeWhatsAppPopup();
}

// Auto show popup after delay dari konfigurasi
document.addEventListener('DOMContentLoaded', function() {
    const delay = {{ config("whatsapp.popup_delay", 3) }} * 1000; // Convert to milliseconds
    setTimeout(function() {
        const popup = document.getElementById('whatsapp-popup');
        popup.classList.add('show');
    }, delay);
});

// Close popup when clicking outside
document.addEventListener('click', function(event) {
    const popup = document.getElementById('whatsapp-popup');
    const float = document.querySelector('.whatsapp-float');
    
    if (!popup.contains(event.target) && !float.contains(event.target)) {
        popup.classList.remove('show');
    }
});
</script>
@endpush 
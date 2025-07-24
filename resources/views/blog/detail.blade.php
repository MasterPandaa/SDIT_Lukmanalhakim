@extends('layouts.app')

@section('title', 'Detail Berita')

@section('content')
<!-- Page Header Section Start -->
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Kegiatan Ramadhan SDIT Lukmanalhakim</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('blog') }}">Berita</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Berita</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header Section Ending -->

<!-- Blog Single Section Start -->
<div class="blog-section blog-single padding-tb section-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                <article>
                    <div class="section-wrapper">
                        <div class="row row-cols-1 justify-content-center g-4">
                            <div class="col">
                                <div class="post-item style-2">
                                    <div class="post-inner">
                                        <div class="post-thumb">
                                            <img src="{{ asset('assets/images/blog/single/01.jpg') }}" alt="blog" class="w-100">
                                        </div>
                                        <div class="post-content">
                                            <h2>Kegiatan Ramadhan SDIT Lukmanalhakim</h2>
                                            <div class="meta-post">
                                                <ul class="lab-ul">
                                                    <li><a href="#"><i class="icofont-calendar"></i> 15 Juni 2025</a></li>
                                                    <li><a href="#"><i class="icofont-ui-user"></i> Admin</a></li>
                                                    <li><a href="#"><i class="icofont-speech-comments"></i> 5 Komentar</a></li>
                                                </ul>
                                            </div>
                                            <p>Bulan Ramadhan adalah bulan yang penuh berkah dan merupakan kesempatan emas untuk meningkatkan keimanan dan ketakwaan kepada Allah SWT. SDIT Lukmanalhakim telah menyelenggarakan berbagai kegiatan Ramadhan yang bertujuan untuk menumbuhkan semangat ibadah dan menanamkan nilai-nilai Islam kepada siswa-siswi.</p>

                                            <blockquote>
                                                <p>"Ramadhan adalah bulan yang penuh berkah, bulan Al-Qur'an, dan bulan untuk meningkatkan ketakwaan. Mari kita manfaatkan dengan sebaik-baiknya untuk mendidik generasi Qur'ani."</p>
                                                <cite><a href="#">...Kepala Sekolah SDIT Lukmanalhakim</a></cite>
                                            </blockquote>

                                            <p>Selama bulan Ramadhan, SDIT Lukmanalhakim mengadakan berbagai kegiatan yang dirancang khusus untuk siswa-siswi. Kegiatan-kegiatan tersebut antara lain Program Tahfidz Intensif, Pesantren Ramadhan, Buka Puasa Bersama, Santunan Anak Yatim dan Dhuafa, serta Lomba Ramadhan.</p>

                                            <img src="{{ asset('assets/images/blog/single/02.jpg') }}" alt="blog">

                                            <p>Program Tahfidz Intensif bertujuan untuk meningkatkan hafalan Al-Qur'an siswa. Setiap siswa memiliki target hafalan yang disesuaikan dengan kemampuannya. Pesantren Ramadhan diisi dengan berbagai aktivitas seperti tadarus Al-Qur'an, kajian Islam, shalat berjamaah, dan berbuka puasa bersama.</p>

                                            <div class="video-thumb">
                                                <img src="{{ asset('assets/images/blog/single/03.jpg') }}" alt="video">
                                                <a href="https://www.youtube-nocookie.com/embed/jP649ZHA8Tg" class="video-button" data-rel="lightcase"><i class="icofont-ui-play"></i></a>
                                            </div>

                                            <p>Kegiatan Ramadhan yang diselenggarakan oleh SDIT Lukmanalhakim memberikan banyak manfaat bagi siswa-siswi, di antaranya meningkatkan keimanan dan ketakwaan kepada Allah SWT, menumbuhkan semangat ibadah dan disiplin dalam beribadah, memahami makna dan hikmah puasa Ramadhan, mengembangkan kepedulian sosial dan sikap berbagi, serta memperkuat ukhuwah Islamiyah antar siswa, guru, dan karyawan.</p>

                                            <div class="tags-section">
                                                <ul class="tags lab-ul">
                                                    <li><a href="#">Ramadhan</a></li>
                                                    <li><a href="#">Kegiatan Sekolah</a></li>
                                                    <li><a href="#">Ibadah</a></li>
                                                </ul>
                                                <ul class="lab-ul social-icons">
                                                    <li>
                                                        <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
                                                    </li>
                                                    <li>
                                                        <a href="#" class="pinterest"><i class="icofont-pinterest"></i></a>
                                                    </li>
                                                </ul> 
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="navigations-part">
                                    <div class="left">
                                        <a href="#" class="prev"><i class="icofont-double-left"></i>Berita Sebelumnya</a>
                                        <a href="#" class="title">Prestasi Olimpiade Matematika Tingkat Kota</a>
                                    </div>
                                    <div class="right">
                                        <a href="#" class="prev">Berita Selanjutnya<i class="icofont-double-right"></i></a>
                                        <a href="#" class="title">PPDB Tahun Ajaran 2025/2026 Telah Dibuka</a>
                                    </div>
                                </div>

                                <div class="authors">
                                    <div class="author-thumb">
                                        <img src="{{ asset('assets/images/author/01.jpg') }}" alt="author">
                                    </div>
                                    <div class="author-content">
                                        <h5>Admin SDIT Lukmanalhakim</h5>
                                        <span>Humas Sekolah</span>
                                        <p>Tim Humas SDIT Lukmanalhakim bertugas untuk menyampaikan informasi terkini tentang kegiatan dan prestasi sekolah kepada masyarakat luas. Kami berkomitmen untuk memberikan informasi yang akurat dan bermanfaat.</p>
                                        <ul class="lab-ul social-icons">
                                            <li>
                                                <a href="#" class="facebook"><i class="icofont-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" class="twitter"><i class="icofont-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" class="linkedin"><i class="icofont-linkedin"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" class="instagram"><i class="icofont-instagram"></i></a>
                                            </li>
                                            <li>
                                                <a href="#" class="pinterest"><i class="icofont-pinterest"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>

                                <div id="comments" class="comments">
                                    <h4 class="title-border">02 Komentar</h4>
                                    <ul class="comment-list">
                                        <li class="comment">
                                            <div class="com-thumb">
                                                <img alt="author" src="{{ asset('assets/images/author/02.jpg') }}">          
                                            </div>
                                            <div class="com-content">
                                                <div class="com-title">
                                                    <div class="com-title-meta">
                                                        <h6>Ahmad Fauzi</h6>
                                                        <span>15 Juni 2025, 10:30 WIB</span>
                                                    </div>
                                                    <span class="reply">
                                                        <a class="comment-reply-link" href="#"><i class="icofont-reply-all"></i>Balas</a>
                                                    </span>
                                                </div>
                                                <p>Alhamdulillah, kegiatan Ramadhan di SDIT Lukmanalhakim berjalan dengan lancar dan sukses. Semoga kegiatan ini memberikan manfaat bagi siswa-siswi dalam meningkatkan keimanan dan ketakwaan kepada Allah SWT.</p>
                                            </div>
                                            <ul class="comment-list">
                                                <li class="comment">
                                                    <div class="com-thumb">
                                                        <img alt="author" src="{{ asset('assets/images/author/03.jpg') }}">  
                                                    </div>
                                                    <div class="com-content">
                                                        <div class="com-title">
                                                            <div class="com-title-meta">
                                                                <h6>Siti Aminah</h6>
                                                                <span>15 Juni 2025, 11:15 WIB</span>
                                                            </div>
                                                            <span class="reply">
                                                                <a class="comment-reply-link" href="#"><i class="icofont-reply-all"></i>Balas</a>                        
                                                            </span>
                                                        </div>
                                                        <p>Sangat bangga dengan kegiatan Ramadhan yang diselenggarakan oleh SDIT Lukmanalhakim. Anak saya sangat antusias mengikuti kegiatan-kegiatan tersebut, terutama program tahfidz intensif.</p>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>

                                <div id="respond" class="comment-respond mb-lg-0">
                                    <h4 class="title-border">Tinggalkan Komentar</h4>
                                    <div class="add-comment">
                                        <form action="#" method="post" id="commentform" class="comment-form">
                                            <input name="name" type="text" value="" placeholder="Nama">
                                            <input name="email" type="text" value="" placeholder="Email">
                                            <input name="url" type="text" value="" placeholder="Subjek">
                                            <textarea id="comment-reply" name="comment" rows="5" placeholder="Tulis komentar Anda di sini"></textarea>
                                            <button type="submit" class="lab-btn"><span>Kirim Komentar</span></button>
                                        </form>
                                    </div>			
                                </div>
                            </div>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-lg-4 col-12">
                <aside>
                    <div class="widget widget-search">
                        <form action="/" class="search-wrapper">
                            <input type="text" name="s" placeholder="Cari...">
                            <button type="submit"><i class="icofont-search-2"></i></button>
                        </form>
                    </div>
                    <div class="widget widget-category">
                        <div class="widget-header">
                            <h5 class="title">Kategori Berita</h5>
                        </div>
                        <ul class="widget-wrapper">
                            <li>
                                <a href="#" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>Kegiatan Sekolah</span><span>12</span></a>
                            </li>
                            <li>
                                <a href="#" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>Prestasi</span><span>08</span></a>
                            </li>
                            <li>
                                <a href="#" class="d-flex active flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>Pengumuman</span><span>05</span></a>
                            </li>
                            <li>
                                <a href="#" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>Tahfidz</span><span>07</span></a>
                            </li>
                            <li>
                                <a href="#" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>Ekstrakurikuler</span><span>03</span></a>
                            </li>
                            <li>
                                <a href="#" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>PPDB</span><span>02</span></a>
                            </li>
                        </ul>
                    </div>

                    <div class="widget widget-post">
                        <div class="widget-header">
                            <h5 class="title">Berita Populer</h5>
                        </div>
                        <ul class="widget-wrapper">
                            <li class="d-flex flex-wrap justify-content-between">
                                <div class="post-thumb">
                                    <a href="{{ route('blog-single', 'kegiatan-ramadhan-sdit-lukmanalhakim') }}"><img src="{{ asset('assets/images/blog/01.jpg') }}" alt="post"></a>
                                </div>
                                <div class="post-content">
                                    <a href="{{ route('blog-single', 'kegiatan-ramadhan-sdit-lukmanalhakim') }}"><h6>Kegiatan Ramadhan SDIT Lukmanalhakim</h6></a>
                                    <p>15 Juni 2025</p>
                                </div>
                            </li>
                            <li class="d-flex flex-wrap justify-content-between">
                                <div class="post-thumb">
                                    <a href="{{ route('blog-single', 'prestasi-olimpiade-matematika') }}"><img src="{{ asset('assets/images/blog/02.jpg') }}" alt="post"></a>
                                </div>
                                <div class="post-content">
                                    <a href="{{ route('blog-single', 'prestasi-olimpiade-matematika') }}"><h6>Prestasi Olimpiade Matematika</h6></a>
                                    <p>10 Juni 2025</p>
                                </div>
                            </li>
                            <li class="d-flex flex-wrap justify-content-between">
                                <div class="post-thumb">
                                    <a href="{{ route('blog-single', 'ppdb-tahun-ajaran-2025-2026') }}"><img src="{{ asset('assets/images/blog/03.jpg') }}" alt="post"></a>
                                </div>
                                <div class="post-content">
                                    <a href="{{ route('blog-single', 'ppdb-tahun-ajaran-2025-2026') }}"><h6>PPDB Tahun Ajaran 2025/2026</h6></a>
                                    <p>5 Juni 2025</p>
                                </div>
                            </li>
                            <li class="d-flex flex-wrap justify-content-between">
                                <div class="post-thumb">
                                    <a href="{{ route('blog-single', 'kunjungan-edukatif-ke-museum') }}"><img src="{{ asset('assets/images/blog/04.jpg') }}" alt="post"></a>
                                </div>
                                <div class="post-content">
                                    <a href="{{ route('blog-single', 'kunjungan-edukatif-ke-museum') }}"><h6>Kunjungan Edukatif ke Museum</h6></a>
                                    <p>1 Juni 2025</p>
                                </div>
                            </li>
                        </ul>
                    </div>

                    <div class="widget widget-archive">
                        <div class="widget-header">
                            <h5 class="title">Arsip Berita</h5>
                        </div>
                        <ul class="widget-wrapper">
                            <li><a href="archive.html" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>Juni</span><span>2025</span></a> </li>
                            <li><a href="archive.html" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>Mei</span><span>2025</span></a></li>
                            <li><a href="archive.html" class="d-flex active flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>April</span><span>2025</span></a></li>
                            <li><a href="archive.html" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>Maret</span><span>2025</span></a></li>
                            <li><a href="archive.html" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>Februari</span><span>2025</span></a></li>
                            <li><a href="archive.html" class="d-flex flex-wrap justify-content-between"><span><i class="icofont-double-right"></i>Januari</span><span>2025</span></a></li>
                        </ul>
                    </div>

                    <div class="widget widget-instagram">
                        <div class="widget-header">
                            <h5 class="title">Galeri Foto</h5>
                        </div>
                        <ul class="widget-wrapper d-flex flex-wrap justify-content-center">
                            <li><a data-rel="lightcase" href="{{ asset('assets/images/blog/01.jpg') }}"><img src="{{ asset('assets/images/blog/01.jpg') }}" alt="product"></a></li>
                            <li><a data-rel="lightcase" href="{{ asset('assets/images/blog/02.jpg') }}"><img src="{{ asset('assets/images/blog/02.jpg') }}" alt="product"></a></li>
                            <li><a data-rel="lightcase" href="{{ asset('assets/images/blog/03.jpg') }}"><img src="{{ asset('assets/images/blog/03.jpg') }}" alt="product"></a></li>
                            <li><a data-rel="lightcase" href="{{ asset('assets/images/blog/04.jpg') }}"><img src="{{ asset('assets/images/blog/04.jpg') }}" alt="product"></a></li>
                            <li><a data-rel="lightcase" href="{{ asset('assets/images/blog/05.jpg') }}"><img src="{{ asset('assets/images/blog/05.jpg') }}" alt="product"></a></li>
                            <li><a data-rel="lightcase" href="{{ asset('assets/images/blog/06.jpg') }}"><img src="{{ asset('assets/images/blog/06.jpg') }}" alt="product"></a></li>
                            <li><a data-rel="lightcase" href="{{ asset('assets/images/blog/07.jpg') }}"><img src="{{ asset('assets/images/blog/07.jpg') }}" alt="product"></a></li>
                            <li><a data-rel="lightcase" href="{{ asset('assets/images/blog/08.jpg') }}"><img src="{{ asset('assets/images/blog/08.jpg') }}" alt="product"></a></li>
                            <li><a data-rel="lightcase" href="{{ asset('assets/images/blog/09.jpg') }}"><img src="{{ asset('assets/images/blog/09.jpg') }}" alt="product"></a></li>
                        </ul>
                    </div>

                    <div class="widget widget-tags">
                        <div class="widget-header">
                            <h5 class="title">Tags Populer</h5>
                        </div>
                        <ul class="widget-wrapper">
                            <li><a href="#">Ramadhan</a></li>
                            <li><a href="#" class="active">Tahfidz</a></li>
                            <li><a href="#">Olimpiade</a></li>
                            <li><a href="#">PPDB</a></li>
                            <li><a href="#">Prestasi</a></li>
                            <li><a href="#">Kegiatan</a></li>
                            <li><a href="#">Ekstrakurikuler</a></li>
                            <li><a href="#">Pendidikan</a></li>
                            <li><a href="#">Al-Qur'an</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
<!-- Blog Single Section Ending -->
@endsection 
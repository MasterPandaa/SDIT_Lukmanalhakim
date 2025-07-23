@extends('layouts.app')

@section('title', 'Detail Berita')

@section('content')
<!-- Page Header Section Start -->
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Detail Berita</h2>
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
<div class="blog-single padding-tb section-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8 col-12">
                <article>
                    <div class="section-wrapper">
                        <div class="post-item">
                            <div class="post-inner">
                                <div class="post-thumb">
                                    <img src="{{ asset('assets/images/blog/01.jpg') }}" alt="blog">
                                </div>
                                <div class="post-content">
                                    <h2>Kegiatan Ramadhan SDIT Lukmanalhakim</h2>
                                    <div class="meta-post">
                                        <ul class="lab-ul">
                                            <li><i class="icofont-ui-calendar"></i> 15 Juni 2025</li>
                                            <li><i class="icofont-user"></i> Admin</li>
                                            <li><i class="icofont-comment"></i> 5 Komentar</li>
                                        </ul>
                                    </div>
                                    <p>Bulan Ramadhan adalah bulan yang penuh berkah dan merupakan kesempatan emas untuk meningkatkan keimanan dan ketakwaan kepada Allah SWT. SDIT Lukmanalhakim telah menyelenggarakan berbagai kegiatan Ramadhan yang bertujuan untuk menumbuhkan semangat ibadah dan menanamkan nilai-nilai Islam kepada siswa-siswi.</p>
                                    <h4>Kegiatan Ramadhan di SDIT Lukmanalhakim</h4>
                                    <p>Selama bulan Ramadhan, SDIT Lukmanalhakim mengadakan berbagai kegiatan yang dirancang khusus untuk siswa-siswi. Kegiatan-kegiatan tersebut antara lain:</p>
                                    <h5>1. Program Tahfidz Intensif</h5>
                                    <p>Selama bulan Ramadhan, siswa-siswi SDIT Lukmanalhakim mengikuti program tahfidz intensif. Program ini bertujuan untuk meningkatkan hafalan Al-Qur'an siswa. Setiap siswa memiliki target hafalan yang disesuaikan dengan kemampuannya.</p>
                                    <div class="post-thumb mb-4">
                                        <img src="{{ asset('assets/images/blog/single/01.jpg') }}" alt="blog">
                                    </div>
                                    <h5>2. Pesantren Ramadhan</h5>
                                    <p>SDIT Lukmanalhakim mengadakan Pesantren Ramadhan selama 3 hari untuk siswa kelas 4-6. Kegiatan ini diisi dengan berbagai aktivitas seperti tadarus Al-Qur'an, kajian Islam, shalat berjamaah, dan berbuka puasa bersama. Pesantren Ramadhan ini bertujuan untuk memberikan pengalaman spiritual yang mendalam bagi siswa.</p>
                                    <h5>3. Buka Puasa Bersama</h5>
                                    <p>Setiap hari Jumat, SDIT Lukmanalhakim mengadakan buka puasa bersama untuk seluruh siswa, guru, dan karyawan. Kegiatan ini bertujuan untuk mempererat silaturahmi dan mengajarkan nilai-nilai kebersamaan kepada siswa.</p>
                                    <div class="post-thumb mb-4">
                                        <img src="{{ asset('assets/images/blog/single/02.jpg') }}" alt="blog">
                                    </div>
                                    <h5>4. Santunan Anak Yatim dan Dhuafa</h5>
                                    <p>Sebagai bentuk kepedulian sosial, SDIT Lukmanalhakim mengadakan kegiatan santunan untuk anak yatim dan dhuafa. Siswa-siswi diajarkan untuk berbagi dengan sesama, terutama di bulan Ramadhan yang penuh berkah.</p>
                                    <h5>5. Lomba Ramadhan</h5>
                                    <p>Untuk memeriahkan bulan Ramadhan, SDIT Lukmanalhakim mengadakan berbagai lomba seperti lomba adzan, lomba hafalan surat pendek, lomba ceramah, dan lomba kaligrafi. Lomba-lomba ini bertujuan untuk mengasah bakat dan kemampuan siswa dalam bidang keagamaan.</p>
                                    <div class="post-thumb mb-4">
                                        <img src="{{ asset('assets/images/blog/single/03.jpg') }}" alt="blog">
                                    </div>
                                    <h4>Manfaat Kegiatan Ramadhan</h4>
                                    <p>Kegiatan Ramadhan yang diselenggarakan oleh SDIT Lukmanalhakim memberikan banyak manfaat bagi siswa-siswi, di antaranya:</p>
                                    <ul class="lab-ul">
                                        <li><i class="icofont-tick-mark"></i> Meningkatkan keimanan dan ketakwaan kepada Allah SWT</li>
                                        <li><i class="icofont-tick-mark"></i> Menumbuhkan semangat ibadah dan disiplin dalam beribadah</li>
                                        <li><i class="icofont-tick-mark"></i> Memahami makna dan hikmah puasa Ramadhan</li>
                                        <li><i class="icofont-tick-mark"></i> Mengembangkan kepedulian sosial dan sikap berbagi</li>
                                        <li><i class="icofont-tick-mark"></i> Memperkuat ukhuwah Islamiyah antar siswa, guru, dan karyawan</li>
                                    </ul>
                                    <h4>Penutup</h4>
                                    <p>Kegiatan Ramadhan di SDIT Lukmanalhakim telah berjalan dengan lancar dan sukses. Kami berharap kegiatan ini dapat memberikan dampak positif bagi perkembangan spiritual dan karakter siswa-siswi. Semoga Allah SWT senantiasa membimbing dan meridhai langkah kita dalam mendidik generasi penerus bangsa yang berakhlak mulia, cerdas, dan berprestasi.</p>
                                    <div class="tags-section">
                                        <ul class="tags lab-ul">
                                            <li><a href="#">Ramadhan</a></li>
                                            <li><a href="#">Kegiatan Sekolah</a></li>
                                            <li><a href="#">Ibadah</a></li>
                                            <li><a href="#">Tahfidz</a></li>
                                        </ul>
                                        <ul class="lab-ul social-icons">
                                            <li><a href="#"><i class="icofont-facebook"></i></a></li>
                                            <li><a href="#"><i class="icofont-twitter"></i></a></li>
                                            <li><a href="#"><i class="icofont-instagram"></i></a></li>
                                            <li><a href="#"><i class="icofont-youtube"></i></a></li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="navigations-part">
                            <div class="left">
                                <a href="#" class="prev"><i class="icofont-double-left"></i> Berita Sebelumnya</a>
                                <a href="#" class="title">Prestasi Olimpiade Matematika</a>
                            </div>
                            <div class="right">
                                <a href="#" class="next">Berita Selanjutnya <i class="icofont-double-right"></i></a>
                                <a href="#" class="title">PPDB Tahun Ajaran 2025/2026</a>
                            </div>
                        </div>
                        <div class="comments">
                            <h4 class="title-border">5 Komentar</h4>
                            <ul class="comment-list lab-ul">
                                <li class="comment">
                                    <div class="com-thumb">
                                        <img alt="author" src="{{ asset('assets/images/author/01.jpg') }}">
                                    </div>
                                    <div class="com-content">
                                        <div class="com-title">
                                            <div class="com-title-meta">
                                                <h6>Ahmad Fauzi</h6>
                                                <span>15 Juni 2025, 10:30 WIB</span>
                                            </div>
                                            <span class="reply"><a href="#"><i class="icofont-reply-all"></i>Balas</a></span>
                                        </div>
                                        <p>Alhamdulillah, kegiatan Ramadhan di SDIT Lukmanalhakim berjalan dengan lancar dan sukses. Semoga kegiatan ini memberikan manfaat bagi siswa-siswi dalam meningkatkan keimanan dan ketakwaan kepada Allah SWT.</p>
                                    </div>
                                </li>
                                <li class="comment">
                                    <div class="com-thumb">
                                        <img alt="author" src="{{ asset('assets/images/author/02.jpg') }}">
                                    </div>
                                    <div class="com-content">
                                        <div class="com-title">
                                            <div class="com-title-meta">
                                                <h6>Siti Aminah</h6>
                                                <span>15 Juni 2025, 11:15 WIB</span>
                                            </div>
                                            <span class="reply"><a href="#"><i class="icofont-reply-all"></i>Balas</a></span>
                                        </div>
                                        <p>Sangat bangga dengan kegiatan Ramadhan yang diselenggarakan oleh SDIT Lukmanalhakim. Anak saya sangat antusias mengikuti kegiatan-kegiatan tersebut, terutama program tahfidz intensif. Terima kasih kepada seluruh guru dan karyawan yang telah membimbing anak-anak kami.</p>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="comment-form">
                            <h4 class="title-border">Tinggalkan Komentar</h4>
                            <form action="#" class="contact-form">
                                <div class="form-group">
                                    <input type="text" name="name" class="form-control" placeholder="Nama Anda *">
                                </div>
                                <div class="form-group">
                                    <input type="email" name="email" class="form-control" placeholder="Email Anda *">
                                </div>
                                <div class="form-group">
                                    <textarea name="message" class="form-control" placeholder="Komentar Anda *"></textarea>
                                </div>
                                <button type="submit" class="lab-btn">
                                    <span>Kirim Komentar</span>
                                </button>
                            </form>
                        </div>
                    </div>
                </article>
            </div>
            <div class="col-lg-4 col-12">
                <aside>
                    <div class="widget widget-search">
                        <div class="widget-header">
                            <h5>Cari Berita</h5>
                        </div>
                        <form action="/" class="search-wrapper">
                            <input type="text" name="s" placeholder="Cari di sini...">
                            <button type="submit"><i class="icofont-search-2"></i></button>
                        </form>
                    </div>
                    <div class="widget widget-category">
                        <div class="widget-header">
                            <h5>Kategori Berita</h5>
                        </div>
                        <ul class="widget-wrapper lab-ul">
                            <li><a href="#">Kegiatan Sekolah <span>(12)</span></a></li>
                            <li><a href="#">Prestasi <span>(8)</span></a></li>
                            <li><a href="#">Pengumuman <span>(5)</span></a></li>
                            <li><a href="#">Tahfidz <span>(7)</span></a></li>
                            <li><a href="#">Ekstrakurikuler <span>(3)</span></a></li>
                            <li><a href="#">PPDB <span>(2)</span></a></li>
                        </ul>
                    </div>
                    <div class="widget widget-post">
                        <div class="widget-header">
                            <h5>Berita Terbaru</h5>
                        </div>
                        <ul class="widget-wrapper lab-ul">
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
                        </ul>
                    </div>
                    <div class="widget widget-archive">
                        <div class="widget-header">
                            <h5>Arsip Berita</h5>
                        </div>
                        <ul class="widget-wrapper lab-ul">
                            <li><a href="#">Juni 2025 <span>(4)</span></a></li>
                            <li><a href="#">Mei 2025 <span>(7)</span></a></li>
                            <li><a href="#">April 2025 <span>(5)</span></a></li>
                            <li><a href="#">Maret 2025 <span>(6)</span></a></li>
                            <li><a href="#">Februari 2025 <span>(3)</span></a></li>
                            <li><a href="#">Januari 2025 <span>(4)</span></a></li>
                        </ul>
                    </div>
                    <div class="widget widget-tags">
                        <div class="widget-header">
                            <h5>Tags Populer</h5>
                        </div>
                        <ul class="widget-wrapper lab-ul">
                            <li><a href="#">Ramadhan</a></li>
                            <li><a href="#">Tahfidz</a></li>
                            <li><a href="#">Olimpiade</a></li>
                            <li><a href="#">PPDB</a></li>
                            <li><a href="#">Prestasi</a></li>
                            <li><a href="#">Kegiatan</a></li>
                            <li><a href="#">Ekstrakurikuler</a></li>
                            <li><a href="#">Pendidikan</a></li>
                        </ul>
                    </div>
                </aside>
            </div>
        </div>
    </div>
</div>
<!-- Blog Single Section Ending -->
@endsection 
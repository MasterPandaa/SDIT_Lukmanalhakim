@extends('layouts.app')

@section('title', 'Guru')

@section('content')
<!-- Page Header Section Start -->
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Guru SDIT Lukmanalhakim</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="#">Tentang</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Guru & Karyawan  </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header Section Ending -->

<!-- Instructors Section Start Here -->
<div class="instructor-section padding-tb section-bg">
    <div class="container">
        <div class="section-wrapper">
            <div class="row g-4 justify-content-center row-cols-1 row-cols-sm-2 row-cols-lg-3 row-cols-xl-4">
                @if(isset($gurus) && $gurus->count() > 0)
                    @foreach($gurus as $guru)
                        <div class="col">
                            <div class="instructor-item">
                                <div class="instructor-inner">
                                    <div class="instructor-thumb">
                                        <img src="{{ $guru->foto_url }}" alt="{{ $guru->nama }}">
                                    </div>
                                    <div class="instructor-content">
                                        <a href="{{ route('guru.detail', $guru->id) }}"><h4>{{ $guru->nama }}</h4></a>
                                        <p>{{ $guru->jabatan }}</p>
                                        <!-- Social Media Icons -->
                                        <div class="social-media-icons mt-2">
                                            @if($guru->whatsapp)
                                                <a href="https://wa.me/{{ $guru->whatsapp }}" target="_blank" class="social-icon whatsapp" title="WhatsApp">
                                                    <i class="icofont-whatsapp"></i>
                                                </a>
                                            @endif
                                            @if($guru->instagram)
                                                <a href="https://instagram.com/{{ $guru->instagram }}" target="_blank" class="social-icon instagram" title="Instagram">
                                                    <i class="icofont-instagram"></i>
                                                </a>
                                            @endif
                                            @if($guru->facebook)
                                                <a href="https://facebook.com/{{ $guru->facebook }}" target="_blank" class="social-icon facebook" title="Facebook">
                                                    <i class="icofont-facebook"></i>
                                                </a>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                <div class="instructor-footer">
                                    <ul class="lab-ul d-flex flex-wrap justify-content-between align-items-center">
                                        <li><i class="icofont-book-alt"></i> {{ $guru->pengalaman_mengajar }} Tahun Mengajar</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <!-- Fallback static content jika belum ada data dari database -->
                    <div class="col">
                        <div class="instructor-item">
                            <div class="instructor-inner">
                                <div class="instructor-thumb">
                                    <img src="{{ asset('assets/images/instructor/01.jpg') }}" alt="instructor">
                                </div>
                                <div class="instructor-content">
                                    <a href="{{ route('guru.detail', 1) }}"><h4>Ahmad Fauzi, S.Pd</h4></a>
                                    <p>Kepala Sekolah</p>
                                    <span class="ratting">
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                    </span>
                                    
                                    <!-- Social Media Icons -->
                                    <div class="social-media-icons mt-2">
                                        <a href="https://wa.me/6281234567890" target="_blank" class="social-icon whatsapp" title="WhatsApp">
                                            <i class="icofont-whatsapp"></i>
                                        </a>
                                        <a href="https://instagram.com/ahmadfauzi" target="_blank" class="social-icon instagram" title="Instagram">
                                            <i class="icofont-instagram"></i>
                                        </a>
                                        <a href="https://facebook.com/ahmadfauzi" target="_blank" class="social-icon facebook" title="Facebook">
                                            <i class="icofont-facebook"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="instructor-footer">
                                <ul class="lab-ul d-flex flex-wrap justify-content-between align-items-center">
                                    <li><i class="icofont-book-alt"></i> 10 Tahun Mengajar</li>
                                    <li><i class="icofont-users-alt-3"></i> 120 Siswa</li>
                                </ul>
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
                                    <a href="{{ route('guru.detail', 2) }}"><h4>Siti Aminah, S.Pd.I</h4></a>
                                    <p>Guru Kelas 1</p>
                                    <span class="ratting">
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                    </span>
                                    
                                    <!-- Social Media Icons -->
                                    <div class="social-media-icons mt-2">
                                        <a href="https://wa.me/6281234567891" target="_blank" class="social-icon whatsapp" title="WhatsApp">
                                            <i class="icofont-whatsapp"></i>
                                        </a>
                                        <a href="https://instagram.com/sitiaminah" target="_blank" class="social-icon instagram" title="Instagram">
                                            <i class="icofont-instagram"></i>
                                        </a>
                                        <a href="https://facebook.com/sitiaminah" target="_blank" class="social-icon facebook" title="Facebook">
                                            <i class="icofont-facebook"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="instructor-footer">
                                <ul class="lab-ul d-flex flex-wrap justify-content-between align-items-center">
                                    <li><i class="icofont-book-alt"></i> 8 Tahun Mengajar</li>
                                    <li><i class="icofont-users-alt-3"></i> 25 Siswa</li>
                                </ul>
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
                                    <a href="{{ route('guru.detail', 3) }}"><h4>Muhammad Rizki, S.Pd</h4></a>
                                    <p>Guru Kelas 2</p>
                                    <span class="ratting">
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                    </span>
                                    
                                    <!-- Social Media Icons -->
                                    <div class="social-media-icons mt-2">
                                        <a href="https://wa.me/6281234567892" target="_blank" class="social-icon whatsapp" title="WhatsApp">
                                            <i class="icofont-whatsapp"></i>
                                        </a>
                                        <a href="https://instagram.com/muhammadrizki" target="_blank" class="social-icon instagram" title="Instagram">
                                            <i class="icofont-instagram"></i>
                                        </a>
                                        <a href="https://facebook.com/muhammadrizki" target="_blank" class="social-icon facebook" title="Facebook">
                                            <i class="icofont-facebook"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="instructor-footer">
                                <ul class="lab-ul d-flex flex-wrap justify-content-between align-items-center">
                                    <li><i class="icofont-book-alt"></i> 6 Tahun Mengajar</li>
                                    <li><i class="icofont-users-alt-3"></i> 28 Siswa</li>
                                </ul>
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
                                    <a href="{{ route('guru.detail', 4) }}"><h4>Fatimah Azzahra, S.Pd</h4></a>
                                    <p>Guru Kelas 3</p>
                                    <span class="ratting">
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                    </span>
                                    
                                    <!-- Social Media Icons -->
                                    <div class="social-media-icons mt-2">
                                        <a href="https://wa.me/6281234567893" target="_blank" class="social-icon whatsapp" title="WhatsApp">
                                            <i class="icofont-whatsapp"></i>
                                        </a>
                                        <a href="https://instagram.com/fatimahazzahra" target="_blank" class="social-icon instagram" title="Instagram">
                                            <i class="icofont-instagram"></i>
                                        </a>
                                        <a href="https://facebook.com/fatimahazzahra" target="_blank" class="social-icon facebook" title="Facebook">
                                            <i class="icofont-facebook"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="instructor-footer">
                                <ul class="lab-ul d-flex flex-wrap justify-content-between align-items-center">
                                    <li><i class="icofont-book-alt"></i> 5 Tahun Mengajar</li>
                                    <li><i class="icofont-users-alt-3"></i> 26 Siswa</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="instructor-item">
                            <div class="instructor-inner">
                                <div class="instructor-thumb">
                                    <img src="{{ asset('assets/images/instructor/05.jpg') }}" alt="instructor">
                                </div>
                                <div class="instructor-content">
                                    <a href="{{ route('guru.detail', 5) }}"><h4>Abdullah Hasan, S.Pd.I</h4></a>
                                    <p>Guru Kelas 4</p>
                                    <span class="ratting">
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                    </span>
                                    
                                    <!-- Social Media Icons -->
                                    <div class="social-media-icons mt-2">
                                        <a href="https://wa.me/6281234567894" target="_blank" class="social-icon whatsapp" title="WhatsApp">
                                            <i class="icofont-whatsapp"></i>
                                        </a>
                                        <a href="https://instagram.com/abdullahhasan" target="_blank" class="social-icon instagram" title="Instagram">
                                            <i class="icofont-instagram"></i>
                                        </a>
                                        <a href="https://facebook.com/abdullahhasan" target="_blank" class="social-icon facebook" title="Facebook">
                                            <i class="icofont-facebook"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="instructor-footer">
                                <ul class="lab-ul d-flex flex-wrap justify-content-between align-items-center">
                                    <li><i class="icofont-book-alt"></i> 7 Tahun Mengajar</li>
                                    <li><i class="icofont-users-alt-3"></i> 24 Siswa</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="instructor-item">
                            <div class="instructor-inner">
                                <div class="instructor-thumb">
                                    <img src="{{ asset('assets/images/instructor/06.jpg') }}" alt="instructor">
                                </div>
                                <div class="instructor-content">
                                    <a href="{{ route('guru.detail', 6) }}"><h4>Aisyah Putri, S.Pd</h4></a>
                                    <p>Guru Kelas 5</p>
                                    <span class="ratting">
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                    </span>
                                    
                                    <!-- Social Media Icons -->
                                    <div class="social-media-icons mt-2">
                                        <a href="https://wa.me/6281234567895" target="_blank" class="social-icon whatsapp" title="WhatsApp">
                                            <i class="icofont-whatsapp"></i>
                                        </a>
                                        <a href="https://instagram.com/aisyahputri" target="_blank" class="social-icon instagram" title="Instagram">
                                            <i class="icofont-instagram"></i>
                                        </a>
                                        <a href="https://facebook.com/aisyahputri" target="_blank" class="social-icon facebook" title="Facebook">
                                            <i class="icofont-facebook"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="instructor-footer">
                                <ul class="lab-ul d-flex flex-wrap justify-content-between align-items-center">
                                    <li><i class="icofont-book-alt"></i> 6 Tahun Mengajar</li>
                                    <li><i class="icofont-users-alt-3"></i> 22 Siswa</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="instructor-item">
                            <div class="instructor-inner">
                                <div class="instructor-thumb">
                                    <img src="{{ asset('assets/images/instructor/07.jpg') }}" alt="instructor">
                                </div>
                                <div class="instructor-content">
                                    <a href="{{ route('guru.detail', 7) }}"><h4>Umar Faruk, S.Pd</h4></a>
                                    <p>Guru Kelas 6</p>
                                    <span class="ratting">
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                    </span>
                                    
                                    <!-- Social Media Icons -->
                                    <div class="social-media-icons mt-2">
                                        <a href="https://wa.me/6281234567896" target="_blank" class="social-icon whatsapp" title="WhatsApp">
                                            <i class="icofont-whatsapp"></i>
                                        </a>
                                        <a href="https://instagram.com/umarfaruk" target="_blank" class="social-icon instagram" title="Instagram">
                                            <i class="icofont-instagram"></i>
                                        </a>
                                        <a href="https://facebook.com/umarfaruk" target="_blank" class="social-icon facebook" title="Facebook">
                                            <i class="icofont-facebook"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="instructor-footer">
                                <ul class="lab-ul d-flex flex-wrap justify-content-between align-items-center">
                                    <li><i class="icofont-book-alt"></i> 9 Tahun Mengajar</li>
                                    <li><i class="icofont-users-alt-3"></i> 20 Siswa</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="instructor-item">
                            <div class="instructor-inner">
                                <div class="instructor-thumb">
                                    <img src="{{ asset('assets/images/instructor/08.jpg') }}" alt="instructor">
                                </div>
                                <div class="instructor-content">
                                    <a href="{{ route('guru.detail', 8) }}"><h4>Khadijah Nur, S.Pd.I</h4></a>
                                    <p>Guru Tahfidz</p>
                                    <span class="ratting">
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                    </span>
                                    
                                    <!-- Social Media Icons -->
                                    <div class="social-media-icons mt-2">
                                        <a href="https://wa.me/6281234567897" target="_blank" class="social-icon whatsapp" title="WhatsApp">
                                            <i class="icofont-whatsapp"></i>
                                        </a>
                                        <a href="https://instagram.com/khadija nur" target="_blank" class="social-icon instagram" title="Instagram">
                                            <i class="icofont-instagram"></i>
                                        </a>
                                        <a href="https://facebook.com/khadija nur" target="_blank" class="social-icon facebook" title="Facebook">
                                            <i class="icofont-facebook"></i>
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="instructor-footer">
                                <ul class="lab-ul d-flex flex-wrap justify-content-between align-items-center">
                                    <li><i class="icofont-book-alt"></i> 10 Tahun Mengajar</li>
                                    <li><i class="icofont-users-alt-3"></i> 120 Siswa</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
            

        </div>
    </div>
</div>
<!-- Instructors Section Ending Here -->

@if(isset($articles) && $articles->count() > 0)
<!-- Blog Section Start Here -->
<div class="blog-section padding-tb section-bg">
    <div class="container">
        <div class="section-header text-center">
            <span class="subtitle">Berita dan Artikel</span>
            <h2 class="title">"Setiap Halaman yang Dibaca, Membawa Kita ke Tempat Baru!"</h2>
        </div>
        <div class="section-wrapper">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 g-4">
                @foreach($articles as $article)
                <div class="col d-flex">
                    <div class="post-item w-100">
                        <div class="post-inner">
                            <div class="post-thumb">
                                <a href="{{ route('blog-single', $article->slug) }}">
                                    <img src="{{ $article->gambar_url }}" alt="{{ $article->judul }}" class="img-fluid">
                                </a>
                            </div>
                            <div class="post-content">
                                <div class="meta-post">
                                    <a href="#" class="blog-date"><i class="icofont-calendar"></i> {{ $article->published_at->format('d F Y') }}</a>
                                    <a href="#" class="blog-author"><i class="icofont-user"></i> {{ $article->penulis ?? 'Admin' }}</a>
                                </div>
                                <h4><a href="{{ route('blog-single', $article->slug) }}">{{ $article->judul }}</a></h4>
                                <p>{{ Str::limit(strip_tags($article->ringkasan ?? $article->konten), 100) }}</p>
                                <a href="{{ route('blog-single', $article->slug) }}" class="lab-btn">Baca Selengkapnya <i class="icofont-double-right"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
            <div class="text-center mt-5">
                <a href="{{ route('blog') }}" class="lab-btn"><span>Lihat Semua Artikel</span></a>
            </div>
        </div>
    </div>
</div>
<!-- Blog Section Ending Here -->
@endif

@push('styles')
<style>
.social-media-icons {
    display: flex;
    gap: 8px;
    justify-content: center;
}

.social-icon {
    display: inline-flex;
    align-items: center;
    justify-content: center;
    width: 32px;
    height: 32px;
    border-radius: 50%;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 16px;
}

.social-icon:hover {
    transform: translateY(-2px);
    color: white;
    text-decoration: none;
}

.social-icon.whatsapp {
    background-color: #25D366;
}

.social-icon.whatsapp:hover {
    background-color: #128C7E;
}

.social-icon.instagram {
    background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%);
}

.social-icon.instagram:hover {
    background: linear-gradient(45deg, #e6683c 0%,#dc2743 25%,#cc2366 50%,#bc1888 75%,#f09433 100%);
}

.social-icon.facebook {
    background-color: #1877F2;
}

.social-icon.facebook:hover {
    background-color: #0d6efd;
}

.icofont-ui-rating-disabled {
    color: #ddd !important;
}

    /* Alumni Testimonial Styles */
    .clients-section {
        background-color: #f8f9fa;
        padding: 80px 0;
    }
    .client-item {
        height: 100%;
        display: flex;
        flex-direction: column;
        padding: 15px;
    }
    .client-inner {
        background: #fff;
        padding: 30px;
        border-radius: 15px;
        box-shadow: 0 5px 25px rgba(0, 0, 0, 0.05);
        height: 100%;
        display: flex;
        flex-direction: column;
        transition: all 0.3s ease;
        border: 1px solid #eee;
    }
    .client-inner:hover {
        transform: translateY(-5px);
        box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
    }
    .client-thumb {
        width: 100%;
        text-align: center;
        margin-bottom: 20px;
    }
    .client-thumb img {
        width: 120px;
        height: 120px;
        object-fit: cover;
        border-radius: 50%;
        border: 4px solid #fff;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
    }
    .client-content {
        flex: 1;
        display: flex;
        flex-direction: column;
        text-align: center;
    }
    .client-content p {
        font-size: 15px;
        line-height: 1.8;
        color: #555;
        margin-bottom: 25px;
        flex: 1;
        font-style: italic;
        position: relative;
        padding: 0 10px;
        font-weight: 400;
    }
    .client-content p:before,
    .client-content p:after {
        content: '"';
        font-size: 50px;
        position: absolute;
        color: rgba(0, 0, 0, 0.07);
        font-family: serif;
        line-height: 1;
    }
    .client-content p:before {
        left: -5px;
        top: -15px;
    }
    .client-content p:after {
        right: -5px;
        bottom: -30px;
    }
    .client-info {
        text-align: center;
        margin-top: auto;
        padding-top: 15px;
        border-top: 1px solid #f0f0f0;
    }
    .client-name {
        font-size: 18px;
        font-weight: 700;
        color: #2c3e50;
        margin-bottom: 5px;
    }
    .client-degi {
        font-size: 14px;
        color: #7f8c8d;
        display: block;
        font-weight: 400;
    }
    
    /* Slider Navigation */
    .client-pagination {
        text-align: center;
        margin-top: 30px;
    }
    .client-pagination .swiper-pagination-bullet {
        width: 10px;
        height: 10px;
        background: #ddd;
        opacity: 1;
        margin: 0 5px;
        transition: all 0.3s ease;
    }
    .client-pagination .swiper-pagination-bullet-active {
        background: #3498db;
        width: 30px;
        border-radius: 5px;
    }
    
    /* Ensure all slides have the same height */
    .swiper-slide {
        height: auto;
    }
    
    /* Section Header */
    .section-header .title {
        color: #2c3e50;
        margin-bottom: 15px;
        font-weight: 700;
        position: relative;
        display: inline-block;
        padding-bottom: 10px;
    }
    .section-header .title:after {
        content: '';
        position: absolute;
        width: 50px;
        height: 3px;
        background: #3498db;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
    }
    .section-header .subtitle {
        color: #3498db;
        font-weight: 600;
        text-transform: uppercase;
        letter-spacing: 1px;
        font-size: 14px;
        margin-bottom: 10px;
        display: block;
    }

    /* Article Card Styles */
    .post-item {
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    .post-inner {
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        height: 100%;
        display: flex;
        flex-direction: column;
        box-shadow: 0 5px 15px rgba(0, 0, 0, 0.05);
        transition: all 0.3s ease;
    }
    .post-inner:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0, 0, 0, 0.1);
    }
    .post-thumb {
        position: relative;
        overflow: hidden;
        height: 200px;
    }
    .post-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
        transition: transform 0.5s ease;
    }
    .post-item:hover .post-thumb img {
        transform: scale(1.05);
    }
    .post-content {
        padding: 25px;
        flex: 1;
        display: flex;
        flex-direction: column;
    }
    .meta-post {
        display: flex;
        flex-wrap: wrap;
        gap: 15px;
        margin-bottom: 15px;
        font-size: 13px;
        color: #666;
    }
    .meta-post a {
        color: #666;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    .meta-post a:hover {
        color: var(--primary-color);
    }
    .meta-post i {
        margin-right: 5px;
    }
    .post-content h4 {
        margin-bottom: 15px;
        line-height: 1.4;
        flex: 1;
    }
    .post-content h4 a {
        color: #222;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    .post-content h4 a:hover {
        color: var(--primary-color);
    }
    .post-content p {
        color: #666;
        margin-bottom: 20px;
        line-height: 1.6;
        flex: 1;
    }
    .lab-btn {
        display: inline-block;
        padding: 10px 20px;
        background: var(--primary-color);
        color: #fff;
        border-radius: 5px;
        text-decoration: none;
        transition: all 0.3s ease;
        align-self: flex-start;
        margin-top: auto;
    }
    .lab-btn:hover {
        background: #1a73e8;
        transform: translateY(-2px);
        color: #fff;
    }
    .lab-btn i {
        margin-left: 5px;
        transition: transform 0.3s ease;
    }
    .lab-btn:hover i {
        transform: translateX(3px);
    }
    
    /* Ensure all cards have the same height */
    .row-cols-md-2 > *, 
    .row-cols-xl-3 > * {
        display: flex;
        flex-direction: column;
    }
</style>
@endpush

@if(isset($alumni) && $alumni->count() > 0)
<!-- Alumni Testimonial Section Start -->
<div class="clients-section padding-tb">
    <div class="container">
        <div class="section-header text-center">
            <span class="subtitle">Testimoni</span>
            <h2 class="title">Apa Kata Alumni?</h2>
        </div>
        <div class="section-wrapper">
            <div class="clients-slider overflow-hidden">
                <div class="swiper-wrapper">
                    @foreach($alumni as $alumnus)
                    <div class="swiper-slide">
                        <div class="client-item">
                            <div class="client-inner">
                                <div class="client-thumb">
                                    <img src="{{ $alumnus->foto_url }}" alt="{{ $alumnus->nama }}" class="img-fluid">
                                </div>
                                <div class="client-content">
                                    <p>{{ $alumnus->testimoni }}</p>
                                    <div class="client-info">
                                        <h6 class="client-name">{{ $alumnus->nama }}</h6>
                                        <span class="client-degi">
                                            Alumni {{ $alumnus->tahun_lulus }}
                                            @if($alumnus->pendidikan_lanjutan || $alumnus->pekerjaan)
                                                • {{ $alumnus->pendidikan_lanjutan ?: $alumnus->pekerjaan }}
                                            @endif
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                <div class="client-pagination"></div>
            </div>
        </div>
    </div>
</div>
<!-- Alumni Testimonial Section End -->
@endif

@push('scripts')
<script>
    // Initialize testimonial slider
    document.addEventListener('DOMContentLoaded', function() {
        var swiper = new Swiper('.clients-slider', {
            slidesPerView: 1,
            spaceBetween: 30,
            loop: true,
            autoplay: {
                delay: 5000,
                disableOnInteraction: false,
            },
            pagination: {
                el: '.client-pagination',
                clickable: true,
            },
            breakpoints: {
                640: {
                    slidesPerView: 1,
                },
                768: {
                    slidesPerView: 2,
                },
                992: {
                    slidesPerView: 3,
                }
            }
        });
    });
</script>
@endpush

@endsection
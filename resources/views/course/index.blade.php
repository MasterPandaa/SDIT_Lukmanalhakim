@extends('layouts.app')

@section('title', 'Program')

@section('content')
<!-- Page Header Section Start -->
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Program Pendidikan</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Program</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header Section Ending -->

<!-- Course Section Start -->
<div class="course-section padding-tb section-bg">
    <div class="container">
        <div class="section-header text-center">
            <span>Program Unggulan</span>
            <h2>Program Pendidikan SDIT Lukmanalhakim</h2>
        </div>
        <div class="section-wrapper">
            <div class="row g-4 justify-content-center row-cols-xl-3 row-cols-md-2 row-cols-1">
                <div class="col">
                    <div class="course-item">
                        <div class="course-inner">
                            <div class="course-thumb">
                                <img src="{{ asset('assets/images/course/01.jpg') }}" alt="course">
                            </div>
                            <div class="course-content">
                                <div class="course-category">
                                    <div class="course-cate">
                                        <a href="#">Keagamaan</a>
                                    </div>
                                    <div class="course-reiew">
                                        <span class="ratting">
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                        </span>
                                    </div>
                                </div>
                                <a href="{{ route('course.detail', 1) }}"><h4>Program Tahfidz Al-Qur'an</h4></a>
                                <p>Program hafalan Al-Qur'an dengan target minimal 2 juz selama 6 tahun dengan metode yang menyenangkan dan sesuai kemampuan siswa.</p>
                                <div class="course-footer">
                                    <div class="course-author">
                                        <img src="{{ asset('assets/images/course/author/01.jpg') }}" alt="course author">
                                        <a href="{{ route('guru.detail', 8) }}">Khadijah Nur, S.Pd.I</a>
                                    </div>
                                    <div class="course-btn">
                                        <a href="{{ route('course.detail', 1) }}" class="lab-btn-text">Selengkapnya <i class="icofont-external-link"></i></a>
                                    </div>
                                </div>
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
                                <div class="course-category">
                                    <div class="course-cate">
                                        <a href="#">Bahasa</a>
                                    </div>
                                    <div class="course-reiew">
                                        <span class="ratting">
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                        </span>
                                    </div>
                                </div>
                                <a href="{{ route('course.detail', 2) }}"><h4>Program Bahasa Arab & Inggris</h4></a>
                                <p>Pembelajaran bahasa asing secara intensif untuk mempersiapkan siswa menghadapi era global dengan pendekatan komunikatif.</p>
                                <div class="course-footer">
                                    <div class="course-author">
                                        <img src="{{ asset('assets/images/course/author/02.jpg') }}" alt="course author">
                                        <a href="{{ route('guru.detail', 2) }}">Siti Aminah, S.Pd.I</a>
                                    </div>
                                    <div class="course-btn">
                                        <a href="{{ route('course.detail', 2) }}" class="lab-btn-text">Selengkapnya <i class="icofont-external-link"></i></a>
                                    </div>
                                </div>
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
                                <div class="course-category">
                                    <div class="course-cate">
                                        <a href="#">Sains</a>
                                    </div>
                                    <div class="course-reiew">
                                        <span class="ratting">
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                        </span>
                                    </div>
                                </div>
                                <a href="{{ route('course.detail', 3) }}"><h4>Program Sains & Teknologi</h4></a>
                                <p>Pembelajaran sains dan teknologi dengan pendekatan praktis dan eksperimental untuk mengembangkan keterampilan berpikir kritis dan inovatif.</p>
                                <div class="course-footer">
                                    <div class="course-author">
                                        <img src="{{ asset('assets/images/course/author/03.jpg') }}" alt="course author">
                                        <a href="{{ route('guru.detail', 3) }}">Muhammad Rizki, S.Pd</a>
                                    </div>
                                    <div class="course-btn">
                                        <a href="{{ route('course.detail', 3) }}" class="lab-btn-text">Selengkapnya <i class="icofont-external-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="course-item">
                        <div class="course-inner">
                            <div class="course-thumb">
                                <img src="{{ asset('assets/images/course/04.jpg') }}" alt="course">
                            </div>
                            <div class="course-content">
                                <div class="course-category">
                                    <div class="course-cate">
                                        <a href="#">Karakter</a>
                                    </div>
                                    <div class="course-reiew">
                                        <span class="ratting">
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                        </span>
                                    </div>
                                </div>
                                <a href="{{ route('course.detail', 4) }}"><h4>Program Pembentukan Karakter</h4></a>
                                <p>Program pembentukan karakter Islami melalui pembiasaan dan keteladanan dalam kehidupan sehari-hari di sekolah.</p>
                                <div class="course-footer">
                                    <div class="course-author">
                                        <img src="{{ asset('assets/images/course/author/04.jpg') }}" alt="course author">
                                        <a href="{{ route('guru.detail', 4) }}">Fatimah Azzahra, S.Pd</a>
                                    </div>
                                    <div class="course-btn">
                                        <a href="{{ route('course.detail', 4) }}" class="lab-btn-text">Selengkapnya <i class="icofont-external-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="course-item">
                        <div class="course-inner">
                            <div class="course-thumb">
                                <img src="{{ asset('assets/images/course/05.jpg') }}" alt="course">
                            </div>
                            <div class="course-content">
                                <div class="course-category">
                                    <div class="course-cate">
                                        <a href="#">Olahraga</a>
                                    </div>
                                    <div class="course-reiew">
                                        <span class="ratting">
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                        </span>
                                    </div>
                                </div>
                                <a href="{{ route('course.detail', 5) }}"><h4>Program Olahraga & Kesehatan</h4></a>
                                <p>Program pengembangan fisik dan kesehatan melalui berbagai aktivitas olahraga dan pembiasaan hidup sehat.</p>
                                <div class="course-footer">
                                    <div class="course-author">
                                        <img src="{{ asset('assets/images/course/author/05.jpg') }}" alt="course author">
                                        <a href="{{ route('guru.detail', 5) }}">Abdullah Hasan, S.Pd.I</a>
                                    </div>
                                    <div class="course-btn">
                                        <a href="{{ route('course.detail', 5) }}" class="lab-btn-text">Selengkapnya <i class="icofont-external-link"></i></a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="course-item">
                        <div class="course-inner">
                            <div class="course-thumb">
                                <img src="{{ asset('assets/images/course/06.jpg') }}" alt="course">
                            </div>
                            <div class="course-content">
                                <div class="course-category">
                                    <div class="course-cate">
                                        <a href="#">Seni</a>
                                    </div>
                                    <div class="course-reiew">
                                        <span class="ratting">
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                            <i class="icofont-ui-rating"></i>
                                        </span>
                                    </div>
                                </div>
                                <a href="{{ route('course.detail', 6) }}"><h4>Program Seni & Kreativitas</h4></a>
                                <p>Program pengembangan bakat dan kreativitas siswa melalui berbagai kegiatan seni dan keterampilan.</p>
                                <div class="course-footer">
                                    <div class="course-author">
                                        <img src="{{ asset('assets/images/course/author/06.jpg') }}" alt="course author">
                                        <a href="{{ route('guru.detail', 6) }}">Aisyah Putri, S.Pd</a>
                                    </div>
                                    <div class="course-btn">
                                        <a href="{{ route('course.detail', 6) }}" class="lab-btn-text">Selengkapnya <i class="icofont-external-link"></i></a>
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
<!-- Course Section Ending -->
@endsection 
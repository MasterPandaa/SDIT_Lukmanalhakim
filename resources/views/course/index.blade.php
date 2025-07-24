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

<!-- Group Select Section Start -->
<div class="group-select-section">
    <div class="container">
        <div class="section-wrapper">
            <div class="row align-items-center g-4">
                <div class="col-md-1">
                    <div class="group-select-left">
                        <i class="icofont-abacus-alt"></i>
                        <span>Filter</span>
                    </div>
                </div>
                <div class="col-md-11">
                    <div class="group-select-right">
                        <div class="row g-2 row-cols-lg-4 row-cols-sm-2 row-cols-1">
                            <div class="col">
                                <div class="select-item">
                                    <select>
                                        <option value="">Semua Kategori</option>
                                        <option value="keagamaan">Keagamaan</option>
                                        <option value="bahasa">Bahasa</option>
                                        <option value="sains">Sains & Teknologi</option>
                                        <option value="karakter">Pembentukan Karakter</option>
                                        <option value="olahraga">Olahraga & Kesehatan</option>
                                        <option value="seni">Seni & Kreativitas</option>
                                    </select>
                                    <div class="select-icon">
                                        <i class="icofont-rounded-down"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="select-item">
                                    <select>
                                        <option value="">Semua Kelas</option>
                                        <option value="kelas1">Kelas 1</option>
                                        <option value="kelas2">Kelas 2</option>
                                        <option value="kelas3">Kelas 3</option>
                                        <option value="kelas4">Kelas 4</option>
                                        <option value="kelas5">Kelas 5</option>
                                        <option value="kelas6">Kelas 6</option>
                                    </select>
                                    <div class="select-icon">
                                        <i class="icofont-rounded-down"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="select-item">
                                    <select>
                                        <option value="">Semua Hari</option>
                                        <option value="senin">Senin</option>
                                        <option value="selasa">Selasa</option>
                                        <option value="rabu">Rabu</option>
                                        <option value="kamis">Kamis</option>
                                        <option value="jumat">Jumat</option>
                                    </select>
                                    <div class="select-icon">
                                        <i class="icofont-rounded-down"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="col">
                                <div class="select-item">
                                    <select>
                                        <option value="">Semua Durasi</option>
                                        <option value="30">30 Menit</option>
                                        <option value="60">60 Menit</option>
                                        <option value="90">90 Menit</option>
                                        <option value="120">120 Menit</option>
                                    </select>
                                    <div class="select-icon">
                                        <i class="icofont-rounded-down"></i>
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
<!-- Group Select Section Ending -->

<!-- Course Section Start -->
<div class="course-section padding-tb section-bg">
    <div class="container">
        <div class="section-wrapper">
            <div class="course-showing-part">
                <div class="d-flex flex-wrap align-items-center justify-content-between">
                    <div class="course-showing-part-left">
                        <p>Menampilkan 1-6 dari 6 program</p>
                    </div>
                    <div class="course-showing-part-right d-flex flex-wrap align-items-center">
                        <span>Urutkan :</span>
                        <div class="select-item">
                            <select>
                                <option value="">Pilih Urutan</option>
                                <option value="populer">Terpopuler</option>
                                <option value="terbaru">Terbaru</option>
                                <option value="terlama">Terlama</option>
                            </select>
                            <div class="select-icon">
                                <i class="icofont-rounded-down"></i>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row g-4 justify-content-center row-cols-xl-3 row-cols-md-2 row-cols-1">
                <div class="col">
                    <div class="course-item">
                        <div class="course-inner">
                            <div class="course-thumb">
                                <img src="{{ asset('assets/images/course/01.jpg') }}" alt="course">
                            </div>
                            <div class="course-content">
                                <div class="course-price">Unggulan</div>
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
                                <a href="{{ route('course.detail', 1) }}"><h5>Program Tahfidz Al-Qur'an</h5></a>
                                <div class="course-details">
                                    <div class="couse-count"><i class="icofont-video-alt"></i> 3x Pertemuan/Minggu</div>
                                    <div class="couse-topic"><i class="icofont-signal"></i> Kelas 1-6</div>
                                </div>
                                <div class="course-footer">
                                    <div class="course-author">
                                        <img src="{{ asset('assets/images/course/author/01.jpg') }}" alt="course author">
                                        <a href="{{ route('guru.detail', 8) }}" class="ca-name">Khadijah Nur, S.Pd.I</a>
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
                                <div class="course-price">Unggulan</div>
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
                                <a href="{{ route('course.detail', 2) }}"><h5>Program Bahasa Arab & Inggris</h5></a>
                                <div class="course-details">
                                    <div class="couse-count"><i class="icofont-video-alt"></i> 2x Pertemuan/Minggu</div>
                                    <div class="couse-topic"><i class="icofont-signal"></i> Kelas 1-6</div>
                                </div>
                                <div class="course-footer">
                                    <div class="course-author">
                                        <img src="{{ asset('assets/images/course/author/02.jpg') }}" alt="course author">
                                        <a href="{{ route('guru.detail', 2) }}" class="ca-name">Siti Aminah, S.Pd.I</a>
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
                                <div class="course-price">Unggulan</div>
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
                                <a href="{{ route('course.detail', 3) }}"><h5>Program Sains & Teknologi</h5></a>
                                <div class="course-details">
                                    <div class="couse-count"><i class="icofont-video-alt"></i> 2x Pertemuan/Minggu</div>
                                    <div class="couse-topic"><i class="icofont-signal"></i> Kelas 3-6</div>
                                </div>
                                <div class="course-footer">
                                    <div class="course-author">
                                        <img src="{{ asset('assets/images/course/author/03.jpg') }}" alt="course author">
                                        <a href="{{ route('guru.detail', 3) }}" class="ca-name">Muhammad Rizki, S.Pd</a>
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
                                <div class="course-price">Unggulan</div>
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
                                <a href="{{ route('course.detail', 4) }}"><h5>Program Pembentukan Karakter</h5></a>
                                <div class="course-details">
                                    <div class="couse-count"><i class="icofont-video-alt"></i> 5x Pertemuan/Minggu</div>
                                    <div class="couse-topic"><i class="icofont-signal"></i> Kelas 1-6</div>
                                </div>
                                <div class="course-footer">
                                    <div class="course-author">
                                        <img src="{{ asset('assets/images/course/author/04.jpg') }}" alt="course author">
                                        <a href="{{ route('guru.detail', 4) }}" class="ca-name">Fatimah Azzahra, S.Pd</a>
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
                                <div class="course-price">Unggulan</div>
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
                                <a href="{{ route('course.detail', 5) }}"><h5>Program Olahraga & Kesehatan</h5></a>
                                <div class="course-details">
                                    <div class="couse-count"><i class="icofont-video-alt"></i> 3x Pertemuan/Minggu</div>
                                    <div class="couse-topic"><i class="icofont-signal"></i> Kelas 1-6</div>
                                </div>
                                <div class="course-footer">
                                    <div class="course-author">
                                        <img src="{{ asset('assets/images/course/author/05.jpg') }}" alt="course author">
                                        <a href="{{ route('guru.detail', 5) }}" class="ca-name">Abdullah Hasan, S.Pd.I</a>
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
                                <div class="course-price">Unggulan</div>
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
                                <a href="{{ route('course.detail', 6) }}"><h5>Program Seni & Kreativitas</h5></a>
                                <div class="course-details">
                                    <div class="couse-count"><i class="icofont-video-alt"></i> 2x Pertemuan/Minggu</div>
                                    <div class="couse-topic"><i class="icofont-signal"></i> Kelas 1-6</div>
                                </div>
                                <div class="course-footer">
                                    <div class="course-author">
                                        <img src="{{ asset('assets/images/course/author/06.jpg') }}" alt="course author">
                                        <a href="{{ route('guru.detail', 6) }}" class="ca-name">Aisyah Putri, S.Pd</a>
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
<!-- Course Section Ending -->
@endsection 
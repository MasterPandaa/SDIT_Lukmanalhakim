@extends('layouts.app')

@section('title', 'Detail Program')

@section('content')
<!-- Page Header Section Start -->
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Program Tahfidz Al-Qur'an</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item"><a href="{{ route('course') }}">Program</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Detail Program</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header Section Ending -->

<!-- Course Single Section Start -->
<div class="course-single-section padding-tb section-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="main-part">
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
                                        <span class="ratting-count">
                                            5.0 (35 Ulasan)
                                        </span>
                                    </div>
                                </div>
                                <h3>Program Tahfidz Al-Qur'an</h3>
                                <div class="course-details">
                                    <div class="couse-count"><i class="icofont-video-alt"></i> 3x Pertemuan/Minggu</div>
                                    <div class="couse-topic"><i class="icofont-signal"></i> Kelas 1-6</div>
                                </div>
                                <p>Program Tahfidz Al-Qur'an di SDIT Lukmanalhakim adalah program unggulan yang bertujuan untuk membekali siswa dengan kemampuan menghafal Al-Qur'an. Program ini dirancang dengan metode yang menyenangkan dan sesuai dengan kemampuan siswa, sehingga siswa dapat menghafal Al-Qur'an dengan mudah dan menyenangkan.</p>
                                
                                <div class="course-tab">
                                    <nav class="course-tab-nav">
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <button class="nav-link active" id="nav-overview-tab" data-bs-toggle="tab" data-bs-target="#nav-overview" type="button" role="tab" aria-controls="nav-overview" aria-selected="true">Deskripsi</button>
                                            <button class="nav-link" id="nav-curriculum-tab" data-bs-toggle="tab" data-bs-target="#nav-curriculum" type="button" role="tab" aria-controls="nav-curriculum" aria-selected="false">Kurikulum</button>
                                            <button class="nav-link" id="nav-instructor-tab" data-bs-toggle="tab" data-bs-target="#nav-instructor" type="button" role="tab" aria-controls="nav-instructor" aria-selected="false">Pengajar</button>
                                            <button class="nav-link" id="nav-reviews-tab" data-bs-toggle="tab" data-bs-target="#nav-reviews" type="button" role="tab" aria-controls="nav-reviews" aria-selected="false">Ulasan</button>
                                        </div>
                                    </nav>
                                    <div class="tab-content" id="nav-tabContent">
                                        <!-- Overview -->
                                        <div class="tab-pane fade show active" id="nav-overview" role="tabpanel" aria-labelledby="nav-overview-tab">
                                            <div class="course-desc">
                                                <h4>Tujuan Program</h4>
                                                <ul class="lab-ul">
                                                    <li><i class="icofont-tick-mark"></i> Membekali siswa dengan hafalan Al-Qur'an minimal 2 juz selama 6 tahun</li>
                                                    <li><i class="icofont-tick-mark"></i> Menanamkan kecintaan terhadap Al-Qur'an sejak dini</li>
                                                    <li><i class="icofont-tick-mark"></i> Melatih kemampuan membaca Al-Qur'an dengan tartil</li>
                                                    <li><i class="icofont-tick-mark"></i> Memahami makna dan kandungan ayat-ayat yang dihafal</li>
                                                    <li><i class="icofont-tick-mark"></i> Mengamalkan nilai-nilai Al-Qur'an dalam kehidupan sehari-hari</li>
                                                </ul>
                                                <h4>Metode Pembelajaran</h4>
                                                <p>Program Tahfidz Al-Qur'an di SDIT Lukmanalhakim menggunakan metode Talaqqi dan Muroja'ah. Metode Talaqqi adalah metode di mana guru membacakan ayat yang akan dihafal dan siswa menirukan. Sedangkan metode Muroja'ah adalah metode pengulangan hafalan secara berkala untuk menjaga hafalan yang sudah dimiliki.</p>
                                                <p>Selain itu, program ini juga menggunakan metode CBSA (Cara Belajar Siswa Aktif) di mana siswa aktif dalam proses pembelajaran. Siswa tidak hanya menghafal, tetapi juga memahami makna dan kandungan ayat yang dihafal melalui berbagai aktivitas seperti games, cerita, dan visualisasi.</p>
                                                <h4>Evaluasi</h4>
                                                <p>Evaluasi program Tahfidz Al-Qur'an dilakukan secara berkala melalui:</p>
                                                <ul class="lab-ul">
                                                    <li><i class="icofont-tick-mark"></i> Setoran hafalan harian</li>
                                                    <li><i class="icofont-tick-mark"></i> Ujian hafalan mingguan</li>
                                                    <li><i class="icofont-tick-mark"></i> Ujian hafalan semester</li>
                                                    <li><i class="icofont-tick-mark"></i> Ujian akhir tahun</li>
                                                </ul>
                                                <p>Hasil evaluasi akan dilaporkan kepada orang tua siswa melalui buku penghubung dan raport semester.</p>
                                            </div>
                                        </div>
                                        
                                        <!-- Curriculum -->
                                        <div class="tab-pane fade" id="nav-curriculum" role="tabpanel" aria-labelledby="nav-curriculum-tab">
                                            <div class="course-curriculum">
                                                <div class="curriculum-list">
                                                    <div class="accordion" id="accordionExample">
                                                        <div class="accordion-item">
                                                            <div class="accordion-header" id="headingOne">
                                                                <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                                                    Target Hafalan Per Kelas
                                                                </button>
                                                            </div>
                                                            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <div class="table-responsive">
                                                                        <table class="table table-bordered">
                                                                            <thead>
                                                                                <tr>
                                                                                    <th>Kelas</th>
                                                                                    <th>Target Hafalan</th>
                                                                                </tr>
                                                                            </thead>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <td>Kelas 1</td>
                                                                                    <td>Juz 30 (An-Nas s.d. An-Naba')</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Kelas 2</td>
                                                                                    <td>Juz 29 (Al-Mulk s.d. Al-Mursalat)</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Kelas 3</td>
                                                                                    <td>Surat-surat pilihan (Yasin, Al-Waqi'ah, Ar-Rahman)</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Kelas 4</td>
                                                                                    <td>Surat-surat pilihan (Al-Kahfi, Al-Mulk)</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Kelas 5</td>
                                                                                    <td>Juz 1 (Al-Fatihah s.d. Al-Baqarah ayat 141)</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <td>Kelas 6</td>
                                                                                    <td>Muroja'ah semua hafalan dan persiapan ujian</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="accordion-item">
                                                            <div class="accordion-header" id="headingTwo">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                                                    Jadwal Kegiatan
                                                                </button>
                                                            </div>
                                                            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <ul class="lab-ul">
                                                                        <li><i class="icofont-calendar"></i> <span>Senin: 07.30 - 08.30 WIB</span></li>
                                                                        <li><i class="icofont-calendar"></i> <span>Rabu: 07.30 - 08.30 WIB</span></li>
                                                                        <li><i class="icofont-calendar"></i> <span>Jumat: 07.30 - 08.30 WIB</span></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="accordion-item">
                                                            <div class="accordion-header" id="headingThree">
                                                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                                                    Materi Pendukung
                                                                </button>
                                                            </div>
                                                            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                                                <div class="accordion-body">
                                                                    <ul class="lab-ul">
                                                                        <li><i class="icofont-book-alt"></i> <span>Buku Panduan Tahfidz</span></li>
                                                                        <li><i class="icofont-book-alt"></i> <span>Buku Tajwid Praktis</span></li>
                                                                        <li><i class="icofont-book-alt"></i> <span>Muroja'ah Cards</span></li>
                                                                        <li><i class="icofont-book-alt"></i> <span>Al-Qur'an dan Terjemah</span></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Instructor -->
                                        <div class="tab-pane fade" id="nav-instructor" role="tabpanel" aria-labelledby="nav-instructor-tab">
                                            <div class="course-instructor">
                                                <div class="instructor-item">
                                                    <div class="instructor-inner">
                                                        <div class="instructor-thumb">
                                                            <img src="{{ asset('assets/images/course/author/01.jpg') }}" alt="instructor">
                                                        </div>
                                                        <div class="instructor-content">
                                                            <h5><a href="{{ route('guru.detail', 8) }}">Khadijah Nur, S.Pd.I</a></h5>
                                                            <span>Guru Tahfidz</span>
                                                            <p>Seorang hafidz Al-Qur'an dengan pengalaman mengajar lebih dari 10 tahun. Lulusan Pondok Pesantren Tahfidz Al-Qur'an dan Sarjana Pendidikan Agama Islam.</p>
                                                            <ul class="lab-ul social-icons">
                                                                <li><a href="#"><i class="icofont-facebook"></i></a></li>
                                                                <li><a href="#"><i class="icofont-twitter"></i></a></li>
                                                                <li><a href="#"><i class="icofont-instagram"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="instructor-item">
                                                    <div class="instructor-inner">
                                                        <div class="instructor-thumb">
                                                            <img src="{{ asset('assets/images/course/author/02.jpg') }}" alt="instructor">
                                                        </div>
                                                        <div class="instructor-content">
                                                            <h5><a href="{{ route('guru.detail', 9) }}">Ahmad Fauzi, S.Pd.I</a></h5>
                                                            <span>Asisten Guru Tahfidz</span>
                                                            <p>Hafidz Al-Qur'an 30 juz dengan pengalaman mengajar 5 tahun. Lulusan Pondok Pesantren Tahfidz Al-Qur'an dan Sarjana Pendidikan Agama Islam.</p>
                                                            <ul class="lab-ul social-icons">
                                                                <li><a href="#"><i class="icofont-facebook"></i></a></li>
                                                                <li><a href="#"><i class="icofont-twitter"></i></a></li>
                                                                <li><a href="#"><i class="icofont-instagram"></i></a></li>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        
                                        <!-- Reviews -->
                                        <div class="tab-pane fade" id="nav-reviews" role="tabpanel" aria-labelledby="nav-reviews-tab">
                                            <div class="course-reviews">
                                                <div class="review-item">
                                                    <div class="review-inner">
                                                        <div class="review-thumb">
                                                            <img src="{{ asset('assets/images/author/01.jpg') }}" alt="review">
                                                        </div>
                                                        <div class="review-content">
                                                            <div class="review-header">
                                                                <h5>Muhammad Ilham</h5>
                                                                <div class="rating">
                                                                    <i class="icofont-ui-rating"></i>
                                                                    <i class="icofont-ui-rating"></i>
                                                                    <i class="icofont-ui-rating"></i>
                                                                    <i class="icofont-ui-rating"></i>
                                                                    <i class="icofont-ui-rating"></i>
                                                                </div>
                                                            </div>
                                                            <p>Program Tahfidz di SDIT Lukmanalhakim sangat baik. Anak saya yang awalnya sulit menghafal, sekarang sudah bisa menghafal dengan baik berkat metode yang menyenangkan.</p>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="review-item">
                                                    <div class="review-inner">
                                                        <div class="review-thumb">
                                                            <img src="{{ asset('assets/images/author/02.jpg') }}" alt="review">
                                                        </div>
                                                        <div class="review-content">
                                                            <div class="review-header">
                                                                <h5>Siti Aminah</h5>
                                                                <div class="rating">
                                                                    <i class="icofont-ui-rating"></i>
                                                                    <i class="icofont-ui-rating"></i>
                                                                    <i class="icofont-ui-rating"></i>
                                                                    <i class="icofont-ui-rating"></i>
                                                                    <i class="icofont-ui-rating"></i>
                                                                </div>
                                                            </div>
                                                            <p>Guru-guru Tahfidz di SDIT Lukmanalhakim sangat sabar dan telaten dalam membimbing anak-anak. Mereka juga mengajarkan nilai-nilai Al-Qur'an dalam kehidupan sehari-hari.</p>
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
            </div>
            <div class="col-lg-4">
                <div class="sidebar-part">
                    <div class="course-side-detail">
                        <div class="csd-title">
                            <h4>Informasi Program</h4>
                        </div>
                        <div class="csd-content">
                            <ul class="lab-ul">
                                <li>
                                    <div class="csdc-left"><i class="icofont-teacher"></i>Pengajar</div>
                                    <div class="csdc-right">Khadijah Nur, S.Pd.I</div>
                                </li>
                                <li>
                                    <div class="csdc-left"><i class="icofont-users-alt-3"></i>Jumlah Siswa</div>
                                    <div class="csdc-right">Maks. 20 siswa/kelas</div>
                                </li>
                                <li>
                                    <div class="csdc-left"><i class="icofont-clock-time"></i>Durasi</div>
                                    <div class="csdc-right">60 menit/pertemuan</div>
                                </li>
                                <li>
                                    <div class="csdc-left"><i class="icofont-calendar"></i>Jadwal</div>
                                    <div class="csdc-right">Senin, Rabu, Jumat</div>
                                </li>
                                <li>
                                    <div class="csdc-left"><i class="icofont-book-alt"></i>Materi</div>
                                    <div class="csdc-right">Al-Qur'an & Tajwid</div>
                                </li>
                                <li>
                                    <div class="csdc-left"><i class="icofont-certificate-alt-1"></i>Sertifikat</div>
                                    <div class="csdc-right">Ya, setelah lulus</div>
                                </li>
                            </ul>
                            <div class="sidebar-btn">
                                <a href="{{ route('contact') }}" class="lab-btn"><span>Daftar Sekarang</span></a>
                            </div>
                        </div>
                    </div>
                    <div class="course-side-cetagory">
                        <div class="csc-title">
                            <h5>Program Lainnya</h5>
                        </div>
                        <div class="csc-content">
                            <ul class="lab-ul">
                                <li><a href="{{ route('course.detail', 2) }}"><i class="icofont-double-right"></i> Program Bahasa Arab & Inggris</a></li>
                                <li><a href="{{ route('course.detail', 3) }}"><i class="icofont-double-right"></i> Program Sains & Teknologi</a></li>
                                <li><a href="{{ route('course.detail', 4) }}"><i class="icofont-double-right"></i> Program Pembentukan Karakter</a></li>
                                <li><a href="{{ route('course.detail', 5) }}"><i class="icofont-double-right"></i> Program Olahraga & Kesehatan</a></li>
                                <li><a href="{{ route('course.detail', 6) }}"><i class="icofont-double-right"></i> Program Seni & Kreativitas</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="course-side-help">
                        <div class="csh-title">
                            <h5>Butuh Bantuan?</h5>
                        </div>
                        <div class="csh-content">
                            <p>Jika Anda memiliki pertanyaan tentang program ini, silakan hubungi kami.</p>
                            <a href="{{ route('contact') }}" class="lab-btn"><span>Hubungi Kami</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Course Single Section Ending -->
@endsection 
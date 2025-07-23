@extends('layouts.app')

@section('title', 'Detail Program')

@section('content')
<!-- Page Header Section Start -->
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Detail Program</h2>
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
                                <h3>Program Tahfidz Al-Qur'an</h3>
                                <div class="course-details">
                                    <div class="couse-count"><i class="icofont-users-alt-3"></i> Untuk Kelas 1-6</div>
                                    <div class="couse-topic"><i class="icofont-book"></i> Target: 2 Juz</div>
                                    <div class="couse-time"><i class="icofont-clock-time"></i> 3x Pertemuan/Minggu</div>
                                </div>
                                <p>Program Tahfidz Al-Qur'an di SDIT Lukmanalhakim adalah program unggulan yang bertujuan untuk membekali siswa dengan kemampuan menghafal Al-Qur'an. Program ini dirancang dengan metode yang menyenangkan dan sesuai dengan kemampuan siswa, sehingga siswa dapat menghafal Al-Qur'an dengan mudah dan menyenangkan.</p>
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
                                <h4>Target Hafalan</h4>
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
                    <div class="course-side-instructor">
                        <div class="csi-title">
                            <h4>Pengajar</h4>
                        </div>
                        <div class="csi-content">
                            <div class="csi-author">
                                <div class="csi-author-thumb">
                                    <img src="{{ asset('assets/images/course/author/01.jpg') }}" alt="author">
                                </div>
                                <div class="csi-author-info">
                                    <h5><a href="{{ route('guru.detail', 8) }}">Khadijah Nur, S.Pd.I</a></h5>
                                    <span>Guru Tahfidz</span>
                                </div>
                            </div>
                            <p>Seorang hafidz Al-Qur'an dengan pengalaman mengajar lebih dari 10 tahun. Lulusan Pondok Pesantren Tahfidz Al-Qur'an dan Sarjana Pendidikan Agama Islam.</p>
                            <ul class="lab-ul csi-social">
                                <li><a href="#"><i class="icofont-facebook"></i></a></li>
                                <li><a href="#"><i class="icofont-twitter"></i></a></li>
                                <li><a href="#"><i class="icofont-instagram"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Course Single Section Ending -->
@endsection 
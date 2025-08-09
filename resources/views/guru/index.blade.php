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
@endsection

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
</style>
@endpush 
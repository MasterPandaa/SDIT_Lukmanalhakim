<!-- Header Section Start -->
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="header-top-area">
                <ul class="lab-ul left">
                    <li>
                        <i class="icofont-ui-call"></i> <span>+62 857-4725-5761</span>
                    </li>
                    <li>
                        <i class="icofont-location-pin"></i> Sleman, Yogyakarta
                    </li>
                </ul>
                <ul class="lab-ul social-icons d-flex align-items-center">
                    <li><p>Find us on : </p></li>
                    <li><a href="#" class="fb"><i class="icofont-facebook"></i></a></li>
                    <li><a href="#" class="twitter"><i class="icofont-instagram"></i></a></li>
                    <li><a href="#" class="vimeo"><i class="icofont-youtube-play"></i></a></li>
                    <li><a href="#" class="skype"><i class="icofont-google-map"></i></a></li>
                    <!-- <li><a href="#" class="rss"><i class="icofont-rss-feed"></i></a></li> -->
                </ul>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        <img src="{{ asset('assets/images/logo/01.png') }}" alt="logo">
                    </a>
                </div>
                <div class="menu-area">
                    <div class="menu">
                        <ul class="lab-ul">
                            <li>
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li>
                                <a href="#0">Profil</a>
                                <ul class="lab-ul">
                                    <li><a href="{{ route('visi-misi') }}">Visi Misi</a></li>
                                    <li><a href="{{ route('sambutan-kepsek') }}">Sambutan Kepala Sekolah</a></li>
                                    <li><a href="{{ route('kurikulum') }}">Kurikulum</a></li>
                                    <li><a href="{{ route('indikator-kelulusan') }}">Indikator kelulusan</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#0">About</a>
                                <ul class="lab-ul">
                                    <li><a href="#">Prestasi</a></li>
                                    <li><a href="#">Ekstakulikuer</a></li>
                                    <li><a href="#">Fasilitas</a></li>
                                    <li><a href="#">Galeri</a></li>
                                    <li><a href="#">Alumni</a></li>
                                    <li><a href="#">Artikel</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </div>
                    
                    <!-- <a href="login.html" class="login"><i class="icofont-user"></i> <span>LOG IN</span> </a> -->
                    <a href="https://psb.luqmanalhakim.sch.id/" class="signup"><i class="icofont-users"></i> <span>DAFTAR</span> </a>

                    <!-- toggle icons -->
                    <div class="header-bar d-lg-none">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div class="ellepsis-bar d-lg-none">
                        <i class="icofont-info-square"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
</header>
<!-- Header Section Ending --> 
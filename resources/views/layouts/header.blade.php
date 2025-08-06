@php
    try {
        $websiteSettings = App\Http\Controllers\Admin\WebsiteSettingController::getWebsiteSettings();
    } catch (\Exception $e) {
        $websiteSettings = new App\Models\WebsiteSetting();
    }
@endphp

<!-- Header Section Start -->
<header class="header-section">
    <div class="header-top">
        <div class="container">
            <div class="header-top-area">
                <ul class="lab-ul left">
                    @if($websiteSettings->header_phone)
                        <li>
                            <i class="icofont-ui-call"></i> <span>{{ $websiteSettings->header_phone }}</span>
                        </li>
                    @endif
                    @if($websiteSettings->header_address)
                        <li>
                            <i class="icofont-location-pin"></i> {{ $websiteSettings->header_address }}
                        </li>
                    @endif
                </ul>
                <ul class="lab-ul social-icons d-flex align-items-center">
                    <li><p>Find us on : </p></li>
                    @if($websiteSettings->header_facebook)
                        <li><a href="{{ $websiteSettings->header_facebook }}" class="fb" target="_blank"><i class="icofont-facebook"></i></a></li>
                    @endif
                    @if($websiteSettings->header_instagram)
                        <li><a href="{{ $websiteSettings->header_instagram }}" class="twitter" target="_blank"><i class="icofont-instagram"></i></a></li>
                    @endif
                    @if($websiteSettings->header_youtube)
                        <li><a href="{{ $websiteSettings->header_youtube }}" class="vimeo" target="_blank"><i class="icofont-youtube-play"></i></a></li>
                    @endif
                    @if($websiteSettings->header_google_map)
                        <li><a href="{{ $websiteSettings->header_google_map }}" class="skype" target="_blank"><i class="icofont-google-map"></i></a></li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="{{ route('home') }}">
                        @if($websiteSettings->header_logo)
                            @php
                                $logoPath = 'storage/' . $websiteSettings->header_logo;
                                $logoExists = file_exists(public_path($logoPath));
                            @endphp
                            @if($logoExists)
                                <img src="{{ asset($logoPath) }}" alt="logo">
                            @else
                                <img src="{{ asset('assets/images/logo/01.png') }}" alt="logo">
                            @endif
                        @else
                            <img src="{{ asset('assets/images/logo/01.png') }}" alt="logo">
                        @endif
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
                                    <li><a href="{{ route('guru-karyawan') }}">Guru & Karyawan</a></li>
                                    <li><a href="{{ route('sambutan-kepsek') }}">Sambutan Kepala Sekolah</a></li>
                                    <li><a href="{{ route('kurikulum') }}">Kurikulum</a></li>
                                    <li><a href="{{ route('indikator-kelulusan') }}">Indikator kelulusan</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#0">About</a>
                                <ul class="lab-ul">
                                    <li><a href="{{ route('about.prestasi') }}">Prestasi</a></li>
                                    <li><a href="{{ route('about.ekstrakurikuler') }}">Ekstrakulikuler</a></li>
                                    <li><a href="{{ route('about.fasilitas') }}">Fasilitas</a></li>
                                    <li><a href="{{ route('about.galeri') }}">Galeri</a></li>
                                    <li><a href="{{ route('about.alumni') }}">Alumni</a></li>
                                    <li><a href="{{ route('about.artikel') }}">Artikel</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ route('contact') }}">Contact</a></li>
                        </ul>
                    </div>
                    
                    @if($websiteSettings->header_psb_link)
                        <a href="{{ $websiteSettings->header_psb_link }}" class="signup" target="_blank"><i class="icofont-users"></i> <span>DAFTAR</span> </a>
                    @endif

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
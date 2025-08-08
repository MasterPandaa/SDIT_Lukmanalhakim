@php
    try {
        $websiteSettings = App\Http\Controllers\Admin\WebsiteSettingController::getWebsiteSettings();
    } catch (\Exception $e) {
        $websiteSettings = new App\Models\WebsiteSetting();
    }
@endphp

<style>
/* Center header social icons */
.header-top .social-icons > li > a {
  width: 28px; /* a bit narrower so there's more space from separators */
  height: 36px;
  display: flex;
  align-items: center;
  justify-content: center;
  text-align: center;
}
.header-top .social-icons > li > a i {
  line-height: 1;
  display: block;
  font-size: 18px;
}
/* ensure list itself aligns center and spacing uniform */
.header-top .social-icons {
  display: flex;
  align-items: center;
  gap: 0; /* spacing handled by li padding so borders look even */
  padding-left: 0; /* remove default ul padding */
  margin: 0;
}
/* apply spacing only to icon items, skip the first label li */
.header-top .social-icons > li:not(:first-child) {
  display: flex;
  align-items: center;
  justify-content: center;
  padding: 0 16px; /* symmetric space from both separators */
  height: 36px;      /* same as anchor height for vertical centering */
}
/* give first and last icon items a bit more breathing room from edges */
.header-top .social-icons > li:nth-child(2) { padding-left: 18px; }
.header-top .social-icons > li:last-child { padding-right: 18px; }
/* remove any default margins that could offset centering */
.header-top .social-icons > li, .header-top .social-icons > li > a { margin: 0; box-sizing: border-box; }

/* ensure the label aligns nicely with icon row */
.header-top .social-icons > li:first-child { margin-right: 12px; display: flex; align-items: center; }

/* vertically center the entire header-top row */
.header-top .header-top-area { display: flex; align-items: center; justify-content: space-between; }
</style>

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
                    @else
                        <li>
                            <i class="icofont-ui-call"></i> <span>+62 857-4725-5761</span>
                        </li>
                    @endif
                    @if($websiteSettings->header_address)
                        <li>
                            <i class="icofont-location-pin"></i> {{ $websiteSettings->header_address }}
                        </li>
                    @else
                        <li>
                            <i class="icofont-location-pin"></i> Sleman, Yogyakarta
                        </li>
                    @endif
                </ul>
                <ul class="lab-ul social-icons d-flex align-items-center">
                    <li><p>Find us on : </p></li>
                    <li><a href="{{ $websiteSettings->header_facebook ?: '#' }}" class="fb" target="_blank"><i class="icofont-facebook"></i></a></li>
                    <li><a href="{{ $websiteSettings->header_instagram ?: '#' }}" class="twitter" target="_blank"><i class="icofont-instagram"></i></a></li>
                    <li><a href="{{ $websiteSettings->header_youtube ?: '#' }}" class="vimeo" target="_blank"><i class="icofont-youtube-play"></i></a></li>
                    <li><a href="{{ $websiteSettings->header_google_map ?: '#' }}" class="skype" target="_blank"><i class="icofont-google-map"></i></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="header-bottom">
        <div class="container">
            <div class="header-wrapper">
                <div class="logo">
                    <a href="{{ \Illuminate\Support\Facades\Route::has('home') ? route('home') : url('/') }}">
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
                                <a href="{{ \Illuminate\Support\Facades\Route::has('home') ? route('home') : url('/') }}">Home</a>
                            </li>
                            <li>
                                <a href="#0">Profil</a>
                                <ul class="lab-ul">
                                    <li><a href="{{ \Illuminate\Support\Facades\Route::has('visi-misi') ? route('visi-misi') : '#' }}">Visi Misi</a></li>
                                    <li><a href="{{ \Illuminate\Support\Facades\Route::has('guru-karyawan') ? route('guru-karyawan') : '#' }}">Guru & Karyawan</a></li>
                                    <li><a href="{{ \Illuminate\Support\Facades\Route::has('sambutan-kepsek') ? route('sambutan-kepsek') : '#' }}">Sambutan Kepala Sekolah</a></li>
                                    <li><a href="{{ \Illuminate\Support\Facades\Route::has('kurikulum') ? route('kurikulum') : '#' }}">Kurikulum</a></li>
                                    <li><a href="{{ \Illuminate\Support\Facades\Route::has('indikator-kelulusan') ? route('indikator-kelulusan') : '#' }}">Indikator kelulusan</a></li>
                                </ul>
                            </li>
                            <li>
                                <a href="#0">About</a>
                                <ul class="lab-ul">
                                    <li><a href="{{ \Illuminate\Support\Facades\Route::has('about.prestasi') ? route('about.prestasi') : '#' }}">Prestasi</a></li>
                                    <li><a href="{{ \Illuminate\Support\Facades\Route::has('about.ekstrakurikuler') ? route('about.ekstrakurikuler') : '#' }}">Ekstrakulikuler</a></li>
                                    <li><a href="{{ \Illuminate\Support\Facades\Route::has('about.fasilitas') ? route('about.fasilitas') : '#' }}">Fasilitas</a></li>
                                    <li><a href="{{ \Illuminate\Support\Facades\Route::has('about.galeri') ? route('about.galeri') : '#' }}">Galeri</a></li>
                                    <li><a href="{{ \Illuminate\Support\Facades\Route::has('about.alumni') ? route('about.alumni') : '#' }}">Alumni</a></li>
                                    <li><a href="{{ \Illuminate\Support\Facades\Route::has('about.artikel') ? route('about.artikel') : '#' }}">Artikel</a></li>
                                </ul>
                            </li>
                            <li><a href="{{ \Illuminate\Support\Facades\Route::has('contact') ? route('contact') : '#' }}">Contact</a></li>
                        </ul>
                    </div>
                    
                    <a href="{{ $websiteSettings->header_psb_link ?: 'https://psb.luqmanalhakim.sch.id/' }}" class="signup" target="_blank"><i class="icofont-users"></i> <span>DAFTAR</span> </a>

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
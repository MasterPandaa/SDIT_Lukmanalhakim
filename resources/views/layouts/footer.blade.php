@php
    try {
        $websiteSettings = App\Http\Controllers\Admin\WebsiteSettingController::getWebsiteSettings();
    } catch (\Exception $e) {
        $websiteSettings = new App\Models\WebsiteSetting();
    }
    // Load contact settings to unify social links with the Contact page
    try {
        $contactSettings = App\Models\ContactSetting::getSettings();
    } catch (\Exception $e) {
        $contactSettings = null;
    }
@endphp

<style>
/* Center footer social icons and normalize spacing */
.yellow-color-section .social-icons { 
  display: flex; 
  align-items: center; 
  gap: 10px; 
  padding-left: 0; 
  margin: 0; 
}
.yellow-color-section .social-icons > li { list-style: none; margin: 0; padding: 0; }
.yellow-color-section .social-icons > li > a { 
  width: 40px; 
  height: 40px; 
  display: flex; 
  align-items: center; 
  justify-content: center; 
  padding: 0; 
  text-align: center; 
  line-height: 1; /* avoid baseline shifting */
  border-radius: 12px; /* match contact page rounded corners */
  background: #198754; /* match contact page green */
  color: #fff; /* ensure icon is white */
  transition: all 0.3s ease;
}
.yellow-color-section .social-icons > li > a i { 
  display: block; 
  line-height: 1; /* keep icon box tight */
  font-size: 18px; 
  margin: 0; 
  transform: translateY(-3px); /* optical centering for font icons */
}
/* If any icon uses SVG, center it the same way */
.yellow-color-section .social-icons > li > a svg {
  display: block;
  margin: 0;
  transform: translateY(-2px);
}
/* Hover effect to match contact page */
.yellow-color-section .social-icons > li > a:hover {
  transform: translateY(-3px);
  box-shadow: 0 10px 25px rgba(0,0,0,0.2);
  color: #fff;
}
</style>

<!-- Footer Section Start -->
<footer class="style-2 yellow-color-section">
    <div class="footer-top padding-tb">
        <div class="container">
            <div class="row g-4 row-cols-xl-4 row-cols-sm-2 row-cols-1 justify-content-center">
                <div class="col">
                    <div class="footer-item our-address">
                        <div class="footer-inner">
                            <div class="footer-content">
                                <div class="title">
                                    <img src="{{ asset('assets/images/logo/01.png') }}" alt="education">
                                </div>
                                <div class="content">
                                    @if($websiteSettings->footer_description)
                                        <p>{!! nl2br(e($websiteSettings->footer_description)) !!}</p>
                                    @else
                                        <p>SDIT Luqman Al Hakim Sleman is a leading Islamic elementary school that integrates the national curriculum with Qur’anic values and Islamic character education.<br>We are committed to nurturing a Qur’anic generation—intelligent, noble in character, independent, and ready to face the future.</p>
                                    @endif
                                    <ul class="lab-ul office-address">
                                        <li><i class="icofont-google-map"></i>{{ $websiteSettings->footer_address ?: 'New Elefent Road, Dhaka.' }}</li>
                                        <li><i class="icofont-phone"></i>{{ $websiteSettings->footer_phone ?: '+880 123 456 789' }}</li>
                                        <li><i class="icofont-envelope"></i>{{ $websiteSettings->footer_email ?: 'info@Edukon.com' }}</li>
                                    </ul>
                                    <ul class="lab-ul social-icons">
                                        @if(!empty($contactSettings?->facebook))
                                            <li>
                                                <a href="{{ $contactSettings->facebook }}" class="facebook" target="_blank" title="Facebook"><i class="icofont-facebook"></i></a>
                                            </li>
                                        @endif
                                        @if(!empty($contactSettings?->instagram))
                                            <li>
                                                <a href="{{ $contactSettings->instagram }}" class="instagram" target="_blank" title="Instagram"><i class="icofont-instagram"></i></a>
                                            </li>
                                        @endif
                                        @if(!empty($contactSettings?->youtube))
                                            <li>
                                                <a href="{{ $contactSettings->youtube }}" class="youtube" target="_blank" title="YouTube"><i class="icofont-youtube"></i></a>
                                            </li>
                                        @endif
                                        @if(!empty($contactSettings?->whatsapp))
                                            @php
                                                $wa = preg_replace('/\D+/', '', $contactSettings->whatsapp);
                                                if ($wa && substr($wa, 0, 1) === '0') { $wa = '62'.substr($wa, 1); }
                                                $waUrl = $wa ? ('https://wa.me/'.$wa) : null;
                                            @endphp
                                            @if($waUrl)
                                                <li>
                                                    <a href="{{ $waUrl }}" class="whatsapp" target="_blank" title="WhatsApp"><i class="icofont-whatsapp"></i></a>
                                                </li>
                                            @endif
                                        @endif
                                        @if(!empty($contactSettings?->tiktok))
                                            <li>
                                                <a href="{{ $contactSettings->tiktok }}" class="tiktok" target="_blank" title="TikTok"><i class="fa-brands fa-tiktok"></i></a>
                                            </li>
                                        @elseif(!empty($websiteSettings?->footer_tiktok))
                                            <li>
                                                <a href="{{ $websiteSettings->footer_tiktok }}" class="tiktok" target="_blank" title="TikTok"><i class="fa-brands fa-tiktok"></i></a>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="footer-item">
                        <div class="footer-inner">
                            <div class="footer-content">
                                <div class="title">
                                    <h4>{{ !empty($websiteSettings->getFooterPrograms()) ? 'Program' : 'Courses' }}</h4>
                                </div>
                                <div class="content">
                                    <ul class="lab-ul">
                                        @php($programs = $websiteSettings->getFooterPrograms() ?? [])
                                        @if(count($programs))
                                            @foreach($programs as $program)
                                                <li><a href="{{ $program['url'] }}">{{ $program['text'] }}</a></li>
                                            @endforeach
                                        @else
                                            <li><a href="#">All Courses</a></li>
                                            <li><a href="#">Forms and Admision materials</a></li>
                                            <li><a href="#">Professional Courses</a></li>
                                            <li><a href="#">Course Outline</a></li>
                                            <li><a href="#">Policy</a></li>
                                            <li><a href="#">FAQs</a></li>
                                            <li><a href="#">Online Course</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="footer-item">
                        <div class="footer-inner">
                            <div class="footer-content">
                                <div class="title">
                                    <h4>Link Cepat</h4>
                                </div>
                                <div class="content">
                                    <ul class="lab-ul">
                                        @php($quickLinks = $websiteSettings->getFooterQuickLinks() ?? [])
                                        @if(count($quickLinks))
                                            @foreach($quickLinks as $link)
                                                <li><a href="{{ $link['url'] }}">{{ $link['text'] }}</a></li>
                                            @endforeach
                                        @else
                                            <li><a href="#">Summer Sessions</a></li>
                                            <li><a href="#">Events</a></li>
                                            <li><a href="#">Gallery</a></li>
                                            <li><a href="#">Forums</a></li>
                                            <li><a href="#">Privacy Policy</a></li>
                                            <li><a href="#">Terms of Use</a></li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="footer-item twitter-post">
                        <div class="footer-inner">
                            <div class="footer-content">
                                <div class="title">
                                    <h4>{{ !empty($websiteSettings->getFooterNews()) ? 'Berita Terbaru' : 'Recent Tweets' }}</h4>
                                </div>
                                <div class="content">
                                    <ul class="lab-ul">
                                        @php($newsItems = $websiteSettings->getFooterNews() ?? [])
                                        @if(count($newsItems))
                                            @foreach($newsItems as $news)
                                                <li>
                                                    <i class="icofont-twitter"></i>
                                                    <p>{!! nl2br(e($news)) !!}</p>
                                                </li>
                                            @endforeach
                                        @else
                                            <li>
                                                <i class="icofont-twitter"></i>
                                                <p>Somrat islam <a href="#">@CodexCoder Edukon #HTML_Template</a> Grab your item, 50% Big Sale Offer !!</p>
                                            </li>
                                            <li>
                                                <i class="icofont-twitter"></i>
                                                <p>Somrat islam <a href="#">@CodexCoder Edukon #HTML_Template</a> Grab your item, 50% Big Sale Offer !!</p>
                                            </li>
                                        @endif
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="container">
            <div class="section-wrapper">
                @php($homeUrl = \Illuminate\Support\Facades\Route::has('home') ? route('home') : url('/'))
                <p>
                    @if($websiteSettings->footer_copyright_text)
                        &copy; {{ date('Y') }} <a href="{{ $homeUrl }}">{{ $websiteSettings->footer_copyright_text }}</a>
                        Designed by 
                        @if($websiteSettings->footer_designer_link)
                            <a href="{{ $websiteSettings->footer_designer_link }}" target="_blank">{{ $websiteSettings->footer_designer_text }}</a>
                        @else
                            <a href="#" target="_blank">{{ $websiteSettings->footer_designer_text ?? 'TIM IT SDIT Luqman Al Hakim' }}</a>
                        @endif
                    @else
                        &copy; 2021 <a href="{{ $homeUrl }}">Edukon</a> Designed by <a href="https://themeforest.net/user/CodexCoder" target="_blank">CodexCoder</a>
                    @endif
                </p>
                <div class="footer-bottom-list">
                    @php($bottomLinks = $websiteSettings->getFooterBottomLinks() ?? [])
                    @if(count($bottomLinks))
                        @foreach($bottomLinks as $link)
                            <a href="{{ $link['url'] }}">{{ $link['text'] }}</a>
                        @endforeach
                    @else
                        <a href="#">Faculty</a>
                        <a href="#">Staff</a>
                        <a href="#">Students</a>
                        <a href="#">Alumni</a>
                    @endif
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section Ending -->
 
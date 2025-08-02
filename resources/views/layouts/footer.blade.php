@php
    try {
        $websiteSettings = App\Http\Controllers\Admin\WebsiteSettingController::getWebsiteSettings();
    } catch (\Exception $e) {
        $websiteSettings = new App\Models\WebsiteSetting();
    }
@endphp

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
                                    @endif
                                    <ul class="lab-ul office-address">
                                        @if($websiteSettings->footer_address)
                                            <li><i class="icofont-google-map"></i>{{ $websiteSettings->footer_address }}</li>
                                        @endif
                                        @if($websiteSettings->footer_phone)
                                            <li><i class="icofont-phone"></i>{{ $websiteSettings->footer_phone }}</li>
                                        @endif
                                        @if($websiteSettings->footer_email)
                                            <li><i class="icofont-envelope"></i>{{ $websiteSettings->footer_email }}</li>
                                        @endif
                                    </ul>
                                    <ul class="lab-ul social-icons">
                                        @if($websiteSettings->footer_facebook)
                                            <li>
                                                <a href="{{ $websiteSettings->footer_facebook }}" class="facebook" target="_blank"><i class="icofont-facebook"></i></a>
                                            </li>
                                        @endif
                                        @if($websiteSettings->footer_twitter)
                                            <li>
                                                <a href="{{ $websiteSettings->footer_twitter }}" class="twitter" target="_blank"><i class="icofont-twitter"></i></a>
                                            </li>
                                        @endif
                                        @if($websiteSettings->footer_linkedin)
                                            <li>
                                                <a href="{{ $websiteSettings->footer_linkedin }}" class="linkedin" target="_blank"><i class="icofont-linkedin"></i></a>
                                            </li>
                                        @endif
                                        @if($websiteSettings->footer_instagram)
                                            <li>
                                                <a href="{{ $websiteSettings->footer_instagram }}" class="instagram" target="_blank"><i class="icofont-instagram"></i></a>
                                            </li>
                                        @endif
                                        @if($websiteSettings->footer_pinterest)
                                            <li>
                                                <a href="{{ $websiteSettings->footer_pinterest }}" class="pinterest" target="_blank"><i class="icofont-pinterest"></i></a>
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
                                    <h4>Program</h4>
                                </div>
                                <div class="content">
                                    <ul class="lab-ul">
                                        @foreach($websiteSettings->getFooterPrograms() as $program)
                                            <li><a href="{{ $program['url'] }}">{{ $program['text'] }}</a></li>
                                        @endforeach
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
                                        @foreach($websiteSettings->getFooterQuickLinks() as $link)
                                            <li><a href="{{ $link['url'] }}">{{ $link['text'] }}</a></li>
                                        @endforeach
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
                                    <h4>Berita Terbaru</h4>
                                </div>
                                <div class="content">
                                    <ul class="lab-ul">
                                        @foreach($websiteSettings->getFooterNews() as $news)
                                            <li>
                                                <i class="icofont-twitter"></i>
                                                <p>{!! nl2br(e($news)) !!}</p>
                                            </li>
                                        @endforeach
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
                <p>&copy; {{ date('Y') }} 
                    @if($websiteSettings->footer_copyright_text)
                        <a href="{{ route('home') }}">{{ $websiteSettings->footer_copyright_text }}</a>
                    @else
                        <a href="{{ route('home') }}">SDIT Luqman Al Hakim</a>
                    @endif
                    Designed by 
                    @if($websiteSettings->footer_designer_link)
                        <a href="{{ $websiteSettings->footer_designer_link }}" target="_blank">{{ $websiteSettings->footer_designer_text }}</a>
                    @else
                        <a href="#" target="_blank">{{ $websiteSettings->footer_designer_text ?? 'TIM IT SDIT Luqman Al Hakim' }}</a>
                    @endif
                </p>
                <div class="footer-bottom-list">
                    @foreach($websiteSettings->getFooterBottomLinks() as $link)
                        <a href="{{ $link['url'] }}">{{ $link['text'] }}</a>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</footer>
<!-- Footer Section Ending --> 
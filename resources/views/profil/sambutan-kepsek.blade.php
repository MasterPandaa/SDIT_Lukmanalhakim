@extends('layouts.app')

@section('title', 'Sambutan Kepala Sekolah')



@section('content')
<style>
    .skill-item {
        height: 100%;
        margin-bottom: 20px;
    }
    .skill-inner {
        height: 100%;
        min-height: 120px;
        display: flex;
        flex-direction: row;
        align-items: center;
        padding: 20px;
        background: #fff;
        border-radius: 10px;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }
    .skill-inner:hover {
        transform: translateY(-5px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
    }
    .skill-thumb {
        width: 80px;
        height: 80px;
        margin-right: 20px;
        flex-shrink: 0;
        border-radius: 50%;
        overflow: hidden;
    }
    .skill-thumb img {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
    .skill-content {
        text-align: left;
        flex-grow: 1;
    }
    .skill-content h5 {
        margin-bottom: 5px;
        font-size: 1.2em;
        color: #333;
        font-weight: 600;
    }
    .skill-content p {
        margin: 0;
        font-size: 0.9em;
        color: #666;
        line-height: 1.4;
    }
    .section-wrpper .row {
        margin: 0 -10px;
    }
    .section-wrpper .col {
        padding: 0 10px;
    }
</style>
<!-- Pageheader section start here -->
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>{{ $sambutanKepsek->judul_header ?? 'Sambutan Kepala Sekolah' }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item active" aria-current="page">About</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Pageheader section ending here -->

 <!-- Sambutan Kepsek Photo Layout Overrides -->
 <style>
     /* Ensure consistent photo sizing and positioning like the design */
     .about-section.style-3 .about-left {
         position: relative;
     }
     .about-section.style-3 .about-left .about-thumb {
        width: 100%;
        max-width: 480px; /* smaller main photo frame */
        aspect-ratio: 1 / 1; /* perfect square feel; adjust if needed */
        background: #fff;
        padding: 12px; /* slightly thinner white frame */
        border-radius: 12px;
        box-shadow: 0 10px 26px rgba(0,0,0,0.08);
     }
     .about-section.style-3 .about-left .about-thumb img {
         width: 100%;
         height: 100%;
         object-fit: cover; /* always fill, crop overflow */
         object-position: center top; /* keep face upper area visible */
         display: block;
        border-radius: 10px;
     }
     .about-section.style-3 .about-left .abs-thumb {
         position: absolute;
        right: 8px; /* shift slightly to the left */
        bottom: -42px; /* lowered a bit more */
        width: 52%; /* smaller overlapping photo */
         aspect-ratio: 1 / 1;
         background: #fff;
        padding: 12px;
        border-radius: 12px;
        box-shadow: 0 10px 28px rgba(0,0,0,0.12);
     }
     .about-section.style-3 .about-left .abs-thumb img {
         width: 100%;
         height: 100%;
         object-fit: cover;
         object-position: center top;
         display: block;
        border-radius: 10px;
     }
     /* Revert Tahun Berdiri badge to original theme styling: only keep position */
  .about-section.style-3 .about-left .about-left-content {
        position: absolute;
        left: -18px;
        bottom: 18px;
    }
     /* Responsiveness */
     @media (max-width: 1199.98px) {
        .about-section.style-3 .about-left .about-thumb { max-width: 460px; }
        .about-section.style-3 .about-left .abs-thumb { right: 4px; bottom: -34px; width: 56%; }
        .about-section.style-3 .about-left .about-left-content { left: -16px; bottom: 18px; }
     }
     @media (max-width: 991.98px) {
        .about-section.style-3 .about-left .about-thumb { max-width: 92%; }
        .about-section.style-3 .about-left .abs-thumb { right: 2px; bottom: -26px; width: 60%; }
        .about-section.style-3 .about-left .about-left-content { left: 6px; bottom: 14px; }
     }
     @media (max-width: 575.98px) {
         .about-section.style-3 .about-left .abs-thumb { position: relative; right: 0; bottom: 0; width: 78%; margin: 12px auto 0; }
        .about-section.style-3 .about-left .about-left-content { left: 8px; bottom: 10px; }
        .about-section.style-3 .about-left .about-left-content h3 { font-size: 24px; }
     }
 </style>

<!-- About Us Section Start Here -->
<div class="about-section style-3 padding-tb section-bg">
    <div class="container">
        <div class="row justify-content-center row-cols-xl-2 row-cols-1 align-items-center">
            <div class="col">
                <div class="about-left">
                    <div class="about-thumb">
                        @if($sambutanKepsek->foto_kepsek)
                            @php
                                $imagePath = 'assets/images/sambutan-kepsek/' . $sambutanKepsek->foto_kepsek;
                                $imageExists = file_exists(public_path($imagePath));
                            @endphp
                            @if($imageExists)
                                <img src="{{ asset($imagePath) }}" alt="Foto Kepala Sekolah">
                            @else
                                <img src="{{ asset('assets/images/default/kepsek-default.jpg') }}" alt="Foto Kepala Sekolah">
                            @endif
                        @else
                            <img src="{{ asset('assets/images/default/kepsek-default.jpg') }}" alt="Foto Kepala Sekolah">
                        @endif
                    </div>
                    @if($sambutanKepsek->foto_kedua)
                        <div class="abs-thumb">
                            @php
                                $fotoKeduaPath = 'assets/images/sambutan-kepsek/' . $sambutanKepsek->foto_kedua;
                                $fotoKeduaExists = file_exists(public_path($fotoKeduaPath));
                            @endphp
                            @if($fotoKeduaExists)
                                <img src="{{ asset($fotoKeduaPath) }}" alt="Foto Kedua Kepala Sekolah">
                            @else
                                <img src="{{ asset('assets/images/default/kepsek-default2.jpg') }}" alt="Foto Kedua Kepala Sekolah">
                            @endif
                        </div>
                    @endif
                    <div class="about-left-content">
                        <h3>{{ $sambutanKepsek->tahun_berdiri ?? '11' }} Th</h3>
                        <p>eLHaeS Berdiri</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="about-right">
                    <div class="section-header">
                                            <span class="subtitle">{{ $sambutanKepsek->deskripsi_header ?? 'Cerdas, Berakhlak, Menginspirasi' }}</span>
                    <h2 class="title">{{ $sambutanKepsek->judul_header ?? 'Mewujudkan Generasi Unggul Berakhlak Mulia' }}</h2>
                    <p>{!! $sambutanKepsek->sambutan ?? 'Sambutan belum tersedia' !!}</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- About Us Section Ending Here -->

<!-- student feedbak section start here -->
<div class="student-feedbak-section padding-tb shape-img">
    <div class="container">
        <div class="section-wrapper">
            <div class="row justify-content-center row-cols-lg-2 row-cols-1">
                <div class="col">
                    <div class="sf-left">
                        <div class="sfl-thumb">
                            <img src="{{ asset('assets/images/feedback/01.jpg') }}" alt="student feedback">
                            <a href="{{ $sambutanKepsek->video_embed_url ?? 'https://www.youtube-nocookie.com/embed/jP649ZHA8Tg?rel=0&modestbranding=1' }}" class="video-button" data-rel="lightcase"><i class="icofont-ui-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    @php
                        $defaultTestimonials = [
                            [
                                'name' => 'Ibu Siti',
                                'role' => 'Wali Murid Kelas 2',
                                'text' => 'Alhamdulillah, anak saya semakin semangat belajar sejak bersekolah di SDIT Luqman Al Hakim Sleman. Guru-gurunya sabar, pembelajarannya menarik, dan nilai-nilai Islam diterapkan dengan baik. Terima kasih!',
                                'rating' => 5,
                                'photo_path' => 'assets/images/feedback/student/01.jpg',
                            ],
                            [
                                'name' => 'Bapak Ahmad',
                                'role' => 'Wali Murid Kelas 3',
                                'text' => 'Anak saya jadi lebih disiplin, mandiri, dan mencintai ilmu agama sejak sekolah di SDIT Luqman Al Hakim. Lingkungan belajar yang nyaman membuatnya betah. Sangat puas dengan sekolah ini!',
                                'rating' => 5,
                                'photo_path' => 'assets/images/feedback/student/02.jpg',
                            ],
                        ];
                        $testimonials = !empty($sambutanKepsek->testimonials) ? $sambutanKepsek->testimonials : $defaultTestimonials;
                    @endphp
                    <div id="testimonialsList">
                        @foreach($testimonials as $i => $t)
                        @php
                            $photo = !empty($t['photo_path']) ? asset($t['photo_path']) : asset('assets/images/feedback/student/01.jpg');
                            $name = $t['name'] ?? 'Anonim';
                            $role = $t['role'] ?? '';
                            $text = $t['text'] ?? '';
                            $rating = (int)($t['rating'] ?? 5);
                            $visibleClass = $i < 2 ? 'd-block' : 'd-none';
                        @endphp
                        <div class="stu-feed-item testimonial-item {{ $visibleClass }}" data-idx="{{ $i }}">
                            <div class="stu-feed-inner">
                                <div class="stu-feed-top">
                                    <div class="sft-left">
                                        <div class="sftl-thumb">
                                            <img src="{{ $photo }}" alt="student feedback">
                                        </div>
                                        <div class="sftl-content">
                                            <a href="#"><h6>{{ $name }}</h6></a>
                                            @if($role)
                                            <span>{{ $role }}</span>
                                            @endif
                                        </div>
                                    </div>
                                    <div class="sft-right">
                                        <span class="ratting">
                                            @for($r=0; $r<max(1, min(5, $rating)); $r++)
                                                <i class="icofont-ui-rating"></i>
                                            @endfor
                                        </span>
                                    </div>
                                </div>
                                <div class="stu-feed-bottom">
                                    <p>"{{ strip_tags(html_entity_decode($text)) }}"</p>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                    @if(count($testimonials) > 2)
                        <script>
                            document.addEventListener('DOMContentLoaded', function(){
                                const items = Array.from(document.querySelectorAll('#testimonialsList .testimonial-item'));
                                let start = 0;
                                function showPair(){
                                    items.forEach(el => el.classList.add('d-none'));
                                    const first = items[start % items.length];
                                    const second = items[(start + 1) % items.length];
                                    first.classList.remove('d-none');
                                    second.classList.remove('d-none');
                                }
                                showPair();
                                if(items.length > 2){
                                    setInterval(() => {
                                        start = (start + 2) % items.length;
                                        showPair();
                                    }, 5000);
                                }
                            });
                        </script>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- student feedbak section ending here -->

<!-- Skill section start here -->
<div class="skill-section padding-tb">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-5 col-12">
                <div class="section-header">
                    <h2 class="title">Bersama, kita dukung mereka tumbuh menjadi pribadi yang kreatif, percaya diri, dan berprestasi!"</h2>
                    <a href="#" class="lab-btn"><span>Sign Up Now</span></a>
                </div>
            </div>
            <div class="col-lg-7 col-12">
                <div class="section-wrpper">
                    @php
                        $defaultSkills = [
                            ['title' => 'Bela Diri','tagline' => 'Berani, Disiplin, Tangguh!','icon_path' => 'assets/images/skill/icon/01.jpg'],
                            ['title' => 'Robotik','tagline' => 'Kreatif, Inovatif, Futuristik!','icon_path' => 'assets/images/skill/icon/02.jpg'],
                            ['title' => 'Sinematografi','tagline' => 'Ekspresi, Kreativitas,Visual!','icon_path' => 'assets/images/skill/icon/03.jpg'],
                            ['title' => 'Mini Soccer','tagline' => 'Cepat, Taktis, Seru, Sportif!','icon_path' => 'assets/images/skill/icon/04.jpg'],
                        ];
                        $skills = !empty($sambutanKepsek->skills) ? $sambutanKepsek->skills : $defaultSkills;
                    @endphp
                    <div class="row g-4 justify-content-center row-cols-sm-2 row-cols-1">
                        @foreach($skills as $s)
                        @php
                            $icon = !empty($s['icon_path']) ? asset($s['icon_path']) : asset('assets/images/skill/icon/01.jpg');
                            $title = $s['title'] ?? '';
                            $tagline = $s['tagline'] ?? '';
                        @endphp
                        <div class="col">
                            <div class="skill-item">
                                <div class="skill-inner">
                                    <div class="skill-thumb">
                                        <img src="{{ $icon }}" alt="skill thumb">
                                    </div>
                                    <div class="skill-content">
                                        <h5>{{ $title }}</h5>
                                        @if($tagline)
                                        <p>"{{ $tagline }}"</p>
                                        @endif
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Skill section ending here -->


<!-- sponsor section start here -->
<div class="sponsor-section section-bg">
    <div class="container">
        <div class="section-wrapper">
            <div class="sponsor-slider">
                <div class="swiper-wrapper">
                    <div class="swiper-slide">
                        <div class="sponsor-iten">
                            <div class="sponsor-thumb">
                                <img src="{{ asset('assets/images/sponsor/02.png') }}" alt="sponsor">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-iten">
                            <div class="sponsor-thumb">
                                <img src="{{ asset('assets/images/sponsor/03.png') }}" alt="sponsor">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-iten">
                            <div class="sponsor-thumb">
                                <img src="{{ asset('assets/images/sponsor/04.png') }}" alt="sponsor">
                            </div>
                        </div>
                    </div>
                    <div class="swiper-slide">
                        <div class="sponsor-iten">
                            <div class="sponsor-thumb">
                                <img src="{{ asset('assets/images/sponsor/05.png') }}" alt="sponsor">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- sponsor section ending here -->
@endsection 
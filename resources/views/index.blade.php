@extends('layouts.app')

@section('title', 'Beranda')

@section('content')
    <!-- banner section start here -->
    <section class="banner-section style-1">
        <div class="container">
            <div class="section-wrapper">
                <div class="row align-items-center">
                    <div class="col-xxl-5 col-xl-6 col-lg-10">
                        <div class="banner-content">
                            <h6 class="subtitle text-uppercase fw-medium">{{ $home->subtitle_hero ?? 'Islamic education' }}</h6>
                            <h2 class="title">
                                @if(!empty($home->judul_hero))
                                    {!! $home->judul_hero !!}
                                @else
                                    <span class="d-lg-block">Sekolah Dasar</span> Islam Terpadu <span class="d-lg-block">Luqman Al Hakim</span>
                                @endif
                            </h2>
                            <p class="desc">{{ $home->deskripsi_hero ?? "\"Membangun Generasi Qur'ani yang Cerdas, Berprestasi, dan Berakhlak Mulia untuk Masa Depan Gemilang\"" }}</p>
                            @php
                                $ctaUrl = $home->link_tombol ?? ($home->header_psb_link ?? 'https://psb.luqmanalhakim.sch.id/');
                                $ctaText = $home->teks_tombol ?? 'Daftar Segera';
                            @endphp
                            <a href="{{ $ctaUrl }}" class="lab-btn"><span>{{ $ctaText }}</span></a>
                            <div class="banner-catagory d-flex flex-wrap">
                                <p>Didik, Bekali, Antarkan Masa Depan Cerah!</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-xxl-7 col-xl-6">
                        <div class="banner-thumb">
                            <img src="{{ $home->gambar_hero ? asset('storage/'.$home->gambar_hero) : asset('assets/images/banner/01.png') }}" alt="img">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="all-shapes"></div>
        <div class="cbs-content-list d-none">
            <ul class="lab-ul">
                <li class="ccl-shape shape-1"><a href="#">Tahfidz Al-Quran</a></li>
                <li class="ccl-shape shape-2"><a href="#">Pendidikan Karakter</a></li>
                <li class="ccl-shape shape-3"><a href="#">Aktif & Kreatif</a></li>
                <li class="ccl-shape shape-4"><a href="#">Kurikulum Merdeka</a></li>
                <li class="ccl-shape shape-5"><a href="#">Pembiasaan Ibadah</a></li>
            </ul>
        </div>
    </section>
    <!-- banner section ending here -->

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

    <!-- category section start here -->
    <div class="category-section padding-tb">
        <div class="container">
            <div class="section-header text-center">
                <span class="subtitle">{{ $home->program_section_title ?? 'Program Unggulan' }}</span>
                <h2 class="title">{{ $home->program_section_subtitle ?? 'Bangun Generasi Berkarakter bersama Kami' }}</h2>
            </div>
            <div class="section-wrapper">
                <div class="row g-4 justify-content-center row-cols-xl-6 row-cols-lg-4 row-cols-md-3 row-cols-sm-2 row-cols-1">
                    @php
                        $programs = [];
                        for ($i = 1; $i <= 6; $i++) {
                            $text = $home->{"program_{$i}_text"} ?? null;
                            $url = $home->{"program_{$i}_url"} ?? '#';
                            $image = $home->{"program_{$i}_image"} ? asset('storage/'.$home->{"program_{$i}_image"}) : null;
                            if ($text) { $programs[] = ['text' => $text, 'url' => $url, 'image' => $image]; }
                        }
                    @endphp
                    @if(count($programs))
                        @foreach($programs as $prog)
                            <div class="col">
                                <div class="category-item">
                                    <div class="category-inner">
                                        <div class="category-thumb">
                                            <img src="{{ $prog['image'] ?? asset('assets/images/category/icon/01.jpg') }}" alt="{{ $prog['text'] }}">
                                        </div>
                                        <div class="category-content">
                                            <a href="{{ $prog['url'] ?: '#' }}">
                                                <h6>{{ $prog['text'] }}</h6>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col">
                            <div class="category-item">
                                <div class="category-inner">
                                    <div class="category-thumb">
                                        <img src="{{ asset('assets/images/category/icon/01.jpg') }}" alt="Tahfiz Quran">
                                    </div>
                                    <div class="category-content">
                                        <a href="{{ route('course') }}">
                                            <h6>Tahfiz Quran 10 juz</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="category-item">
                                <div class="category-inner">
                                    <div class="category-thumb">
                                        <img src="{{ asset('assets/images/category/icon/02.jpg') }}" alt="Pendidikan Karakter">
                                    </div>
                                    <div class="category-content">
                                        <a href="{{ route('course') }}">
                                            <h6>Pendidikan Karakter</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="category-item">
                                <div class="category-inner">
                                    <div class="category-thumb">
                                        <img src="{{ asset('assets/images/category/icon/03.jpg') }}" alt="Fasih Membaca Quran">
                                    </div>
                                    <div class="category-content">
                                        <a href="{{ route('course') }}">
                                            <h6>Fasih Membaca Quran</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="category-item">
                                <div class="category-inner">
                                    <div class="category-thumb">
                                        <img src="{{ asset('assets/images/category/icon/04.jpg') }}" alt="Hafal Hadis">
                                    </div>
                                    <div class="category-content">
                                        <a href="{{ route('course') }}">
                                            <h6>Hafal 20 Hadis Pilihan</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="category-item">
                                <div class="category-inner">
                                    <div class="category-thumb">
                                        <img src="{{ asset('assets/images/category/icon/05.jpg') }}" alt="Asessmen AKM">
                                    </div>
                                    <div class="category-content">
                                        <a href="{{ route('course') }}">
                                            <h6>Sukses Asessmen AKM</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="category-item">
                                <div class="category-inner">
                                    <div class="category-thumb">
                                        <img src="{{ asset('assets/images/category/icon/06.jpg') }}" alt="Program Kepesantrenan">
                                    </div>
                                    <div class="category-content">
                                        <a href="{{ route('course') }}">
                                            <h6>Program Kepesantrenan</h6>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
    <!-- category section start here -->

    <!-- Achievement section start here -->
    <div class="achievement-section style-3 padding-tb wave-bg">
        <!-- Layered waves (top) -->
        <div class="wave wave-top-3" aria-hidden="true"></div>
        <div class="wave wave-top-2" aria-hidden="true"></div>
        <div class="wave wave-top" aria-hidden="true"></div>
        <!-- Layered waves (bottom) -->
        <div class="wave wave-bottom-3" aria-hidden="true"></div>
        <div class="wave wave-bottom-2" aria-hidden="true"></div>
        <div class="wave wave-bottom" aria-hidden="true"></div>
        <div class="container">
            <div class="section-wrapper">
                <div class="counter-part">
                    <div class="row g-4 row-cols-lg-4 row-cols-sm-2 row-cols-1 justify-content-center">
                        <div class="col">
                            <div class="count-item">
                                <div class="count-inner">
                                    <div class="count-icon">
                                        <i class="icofont-users-alt-4"></i>
                                    </div>
                                    <div class="count-content">
                                        <h2><span class="count" data-to="{{ $home->stat_peserta_didik ?? 465 }}" data-speed="1500"></span><span></span></h2>
                                        <p>Peserta Didik</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="count-item">
                                <div class="count-inner">
                                    <div class="count-icon">
                                        <i class="icofont-graduate-alt"></i>
                                    </div>
                                    <div class="count-content">
                                        <h2><span class="count" data-to="{{ $home->stat_guru ?? 76 }}" data-speed="1500"></span><span></span></h2>
                                        <p>Guru dan Staff Profesional</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="count-item">
                                <div class="count-inner">
                                    <div class="count-icon">
                                        <i class="icofont-notification"></i>
                                    </div>
                                    <div class="count-content">
                                        <h2><span class="count" data-to="{{ $home->stat_kelas ?? 28 }}" data-speed="1500"></span><span></span></h2>
                                        <p>Jumlah Kelas</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="count-item">
                                <div class="count-inner">
                                    <div class="count-icon">
                                        <i class="icofont-clock-time"></i>
                                    </div>
                                    <div class="count-content">
                                        <h2><span class="count" data-to="{{ $home->stat_ekstrakurikuler ?? 10 }}" data-speed="1500"></span><span></span></h2>
                                        <p>Ekstakulikuer</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @push('styles')
    <style>
      /* Wave background for statistics section */
      .achievement-section.wave-bg {
        position: relative;
        background-color: #f5f6f7; /* light gray to match screenshot */
        z-index: 0;
      }
      .achievement-section.wave-bg .section-wrapper {
        position: relative;
        z-index: 2; /* ensure content sits above waves */
      }
      .achievement-section.wave-bg .wave {
        position: absolute;
        left: 0;
        width: 100%;
        height: 220px; /* increased wave height for stronger overlap */
        background-repeat: no-repeat;
        background-size: 100% 100%;
        pointer-events: none; /* don't block clicks */
        z-index: 1;
      }
      .achievement-section.wave-bg .wave.wave-top {
        top: -120px; /* deeper overlap into the section above */
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 120' preserveAspectRatio='none'><path fill='%23f5f6f7' d='M0,0 C240,80 480,80 720,40 C960,0 1200,0 1440,40 L1440,120 L0,120 Z'/></svg>");
      }
      .achievement-section.wave-bg .wave.wave-bottom {
        bottom: -120px; /* deeper overlap into the section below */
        transform: scaleY(-1); /* mirror for the bottom edge */
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 120' preserveAspectRatio='none'><path fill='%23f5f6f7' d='M0,0 C240,80 480,80 720,40 C960,0 1200,0 1440,40 L1440,120 L0,120 Z'/></svg>");
      }
      /* Additional layers for depth */
      .achievement-section.wave-bg .wave.wave-top-2 {
        top: -160px;
        height: 260px;
        opacity: .6;
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 120' preserveAspectRatio='none'><path fill='%23f5f6f7' d='M0,0 C240,80 480,80 720,40 C960,0 1200,0 1440,40 L1440,120 L0,120 Z'/></svg>");
      }
      .achievement-section.wave-bg .wave.wave-top-3 {
        top: -190px;
        height: 300px;
        opacity: .3;
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 120' preserveAspectRatio='none'><path fill='%23f5f6f7' d='M0,0 C240,80 480,80 720,40 C960,0 1200,0 1440,40 L1440,120 L0,120 Z'/></svg>");
      }
      .achievement-section.wave-bg .wave.wave-bottom-2 {
        bottom: -160px;
        height: 260px;
        opacity: .6;
        transform: scaleY(-1);
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 120' preserveAspectRatio='none'><path fill='%23f5f6f7' d='M0,0 C240,80 480,80 720,40 C960,0 1200,0 1440,40 L1440,120 L0,120 Z'/></svg>");
      }
      .achievement-section.wave-bg .wave.wave-bottom-3 {
        bottom: -190px;
        height: 300px;
        opacity: .3;
        transform: scaleY(-1);
        background-image: url("data:image/svg+xml;utf8,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 1440 120' preserveAspectRatio='none'><path fill='%23f5f6f7' d='M0,0 C240,80 480,80 720,40 C960,0 1200,0 1440,40 L1440,120 L0,120 Z'/></svg>");
      }
      /* Theme overrides for floating labels on hero (Tahfidz, Pendidikan Karakter, etc.) */
      .banner-section .cbs-content-list ul li.ccl-shape a {
        color: #fff;
      }
      /* Use site green (#26c976) and orange (#f16126) accents */
      .banner-section .cbs-content-list ul li.shape-1 a {
        background-image: linear-gradient(to right, #26c976, #00b894);
      }
      .banner-section .cbs-content-list ul li.shape-1 a::after { background: #26c976; }

      .banner-section .cbs-content-list ul li.shape-2 a {
        background-image: linear-gradient(to right, #f16126, #ff7a3d);
      }
      .banner-section .cbs-content-list ul li.shape-2 a::after { background: #f16126; }

      .banner-section .cbs-content-list ul li.shape-3 a {
        background-image: linear-gradient(to right, #26c976, #00b894);
      }
      .banner-section .cbs-content-list ul li.shape-3 a::after { background: #26c976; }

      .banner-section .cbs-content-list ul li.shape-4 a {
        background-image: linear-gradient(to right, #f16126, #ff7a3d);
      }
      .banner-section .cbs-content-list ul li.shape-4 a::after { background: #f16126; }

      .banner-section .cbs-content-list ul li.shape-5 a {
        background-image: linear-gradient(to right, #26c976, #00b894);
      }
      .banner-section .cbs-content-list ul li.shape-5 a::after { background: #26c976; }
    </style>
    @endpush
    @push('scripts')
    <script>
      // One-time counter animation for statistics section
      (function() {
        const section = document.querySelector('.achievement-section.wave-bg');
        if (!section) return;
        const originals = Array.from(section.querySelectorAll('span.count'));
        if (originals.length === 0) return;

        // Detach any previously bound plugin handlers by cloning and replacing nodes
        const counters = originals.map((el) => {
          const clone = el.cloneNode(true);
          // Ensure initial text is 0 for animation start
          clone.textContent = '0';
          // Remove class to avoid other scripts targeting it again
          clone.classList.remove('count');
          el.replaceWith(clone);
          return clone;
        });

        const animate = (el, to, duration = 1500) => {
          const start = performance.now();
          const from = parseInt(el.textContent, 10) || 0;
          const step = (now) => {
            const progress = Math.min((now - start) / duration, 1);
            const value = Math.floor(from + (to - from) * progress);
            el.textContent = value;
            if (progress < 1) {
              requestAnimationFrame(step);
            } else {
              el.textContent = to; // ensure final value
            }
          };
          requestAnimationFrame(step);
        };

        const io = new IntersectionObserver((entries) => {
          entries.forEach(entry => {
            if (entry.isIntersecting) {
              const el = entry.target;
              if (el.dataset.counted === 'true') { io.unobserve(el); return; }
              const toAttr = el.getAttribute('data-to') || el.getAttribute('data-count') || el.getAttribute('data-target') || el.dataset.to || el.dataset.count || el.dataset.target || '0';
              const to = parseInt(toAttr, 10) || 0;
              animate(el, to);
              el.dataset.counted = 'true';
              io.unobserve(el);
            }
          });
        }, { threshold: 0.3 });

        counters.forEach(el => io.observe(el));
      })();
    </script>
    @endpush
    <!-- Achievement section ending here -->

    <!-- student feedbak section start here -->
    <div class="student-feedbak-section padding-tb shape-img">
        <div class="container">
            <div class="section-header text-center">
                <span class="subtitle">Tak kenal Maka Tak Sayang</span>
                <h2 class="title">Sekilas Tentang Kami</h2>
            </div>
            <div class="section-wrapper">
                <div class="row justify-content-center row-cols-lg-2 row-cols-1">
                    <div class="col">
                        <div class="sf-left">
                            <div class="sfl-thumb">
                                <img src="{{ asset('assets/images/feedback/01.jpg') }}" alt="student feedback">
                                <a href="{{ ($sambutanKepsek?->video_embed_url ?? 'https://www.youtube-nocookie.com/embed/jP649ZHA8Tg?rel=0&modestbranding=1') }}" class="video-button" data-rel="lightcase" target="_blank" rel="noopener">
                                    <i class="icofont-ui-play"></i>
                                </a>
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
                            $testimonials = !empty($sambutanKepsek?->testimonials) ? $sambutanKepsek->testimonials : $defaultTestimonials;
                        @endphp
                        <div id="homeTestimonialsList">
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
                                    const items = Array.from(document.querySelectorAll('#homeTestimonialsList .testimonial-item'));
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
                        <div class="text-center mt-3">
                            <a href="{{ route('sambutan-kepsek') }}" class="lab-btn"><span>Lihat Selengkapnya</span></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- student feedbak section ending here -->

    <!-- Guru & Staf Section (Clients-style) Start Here -->
    <div class="clients-section padding-tb teachers-clients">
        <div class="container">
            <div class="section-header text-center">
                <span class="subtitle">Profil Guru & Staf</span>
                <h2 class="title">Temui Guru & Staf Kami</h2>
            </div>
            <div class="section-wrapper">
                <div class="clients-slider overflow-hidden">
                    <div class="swiper-wrapper">
                        @forelse($gurus as $guru)
                        <div class="swiper-slide">
                            <div class="client-item">
                                <div class="client-inner">
                                    <div class="client-thumb">
                                        <img src="{{ $guru->foto_url }}" alt="{{ $guru->nama }}" class="img-fluid">
                                    </div>
                                    <div class="client-content">
                                        @if(!empty($guru->pernyataan_pribadi))
                                        <p class="teacher-quote">"{{ $guru->pernyataan_pribadi }}"</p>
                                        @endif
                                        <div class="client-info">
                                            <h6 class="client-name">
                                                <a href="{{ route('guru.detail', $guru->id) }}" class="text-decoration-none">{{ $guru->nama }}</a>
                                            </h6>
                                            <span class="client-degi">{{ $guru->jabatan }}</span>
                                            <div class="teacher-meta">
                                                <div class="social-media-icons">
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
                                                <div class="teaching-years">
                                                    <i class="icofont-book-alt"></i> {{ $guru->pengalaman_mengajar }} Tahun Mengajar
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="swiper-slide">
                            <div class="client-item">
                                <div class="client-inner">
                                    <div class="client-thumb">
                                        <img src="{{ asset('assets/images/instructor/01.jpg') }}" alt="Guru" class="img-fluid">
                                    </div>
                                    <div class="client-content">
                                        <p class="teacher-quote">"Mendidik dengan hati, membimbing dengan teladan."</p>
                                        <div class="client-info">
                                            <h6 class="client-name"><a href="{{ route('guru') }}" class="text-decoration-none">Nama Guru</a></h6>
                                            <span class="client-degi">Jabatan</span>
                                            <div class="teacher-meta">
                                                <div class="social-media-icons">
                                                    <a href="https://wa.me/6281234567890" target="_blank" class="social-icon whatsapp" title="WhatsApp"><i class="icofont-whatsapp"></i></a>
                                                    <a href="https://instagram.com/username" target="_blank" class="social-icon instagram" title="Instagram"><i class="icofont-instagram"></i></a>
                                                    <a href="https://facebook.com/username" target="_blank" class="social-icon facebook" title="Facebook"><i class="icofont-facebook"></i></a>
                                                </div>
                                                <div class="teaching-years"><i class="icofont-book-alt"></i> 5 Tahun Mengajar</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforelse
                    </div>
                    <div class="client-pagination mt-4"></div>
                </div>
                <div class="text-center mt-4">
                    <a href="{{ route('guru') }}" class="lab-btn"><span>Lihat Semua Guru</span></a>
                </div>
            </div>
        </div>
    </div>
    <!-- Guru & Staf Section (Clients-style) Ending Here -->

    @push('styles')
    <style>
      /* Scoping styles to teachers slider only */
      .teachers-clients .teacher-meta { margin-top: 10px; display: flex; flex-direction: column; gap: 10px; }
      .teachers-clients .social-media-icons { display: flex; gap: 8px; justify-content: center; flex-wrap: nowrap; white-space: nowrap; }
      .teachers-clients .social-icon { display: inline-flex; align-items: center; justify-content: center; width: 32px; height: 32px; border-radius: 50%; color: #fff; text-decoration: none; transition: all .3s ease; font-size: 16px; }
      .teachers-clients .social-icon:hover { transform: translateY(-2px); color: #fff; text-decoration: none; }
      .teachers-clients .social-icon.whatsapp { background-color: #25D366; }
      .teachers-clients .social-icon.whatsapp:hover { background-color: #128C7E; }
      .teachers-clients .social-icon.instagram { background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); }
      .teachers-clients .social-icon.instagram:hover { background: linear-gradient(45deg, #e6683c 0%,#dc2743 25%,#cc2366 50%,#bc1888 75%,#f09433 100%); }
      .teachers-clients .social-icon.facebook { background-color: #1877F2; }
      .teachers-clients .social-icon.facebook:hover { background-color: #0d6efd; }
      .teachers-clients .teaching-years { font-size: 14px; color: #666; }
      .teachers-clients .teaching-years i { margin-right: 6px; color: var(--primary-color); }

      /* Teacher quote under photo */
      .teachers-clients .teacher-quote {
        font-style: italic;
        color: #555;
        margin: 6px auto 10px;
        text-align: center;
        max-width: 90%;
        line-height: 1.5;
        display: -webkit-box;
        -webkit-line-clamp: 3;
        -webkit-box-orient: vertical;
        overflow: hidden;
      }

      @media (max-width: 575.98px) {
        .teachers-clients .social-icon { width: 30px; height: 30px; font-size: 14px; }
      }
    </style>
    @endpush

    <!-- blog section start here -->
    <div class="blog-section padding-tb section-bg">
        <div class="container">
            <div class="section-header text-center">
                <span class="subtitle">Berita dan Artikel</span>
                <h2 class="title">"Setiap Halaman yang Dibaca, Membawa Kita ke Tempat Baru!" </h2>
            </div>
            <div class="section-wrapper">
                <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center g-4">
                    @forelse($articles as $article)
                    <div class="col">
                        <div class="post-item">
                            <div class="post-inner">
                                <div class="post-thumb">
                                    <a href="{{ route('blog-single', $article->slug) }}">
                                        <img src="{{ $article->gambar_url }}" alt="{{ $article->judul }}" class="img-fluid" style="width: 100%; height: 200px; object-fit: cover;"
                                             onerror="this.onerror=null;this.src='{{ asset('assets/images/blog/01.jpg') }}';">
                                    </a>
                                </div>
                                <div class="post-content">
                                    <a href="{{ route('blog-single', $article->slug) }}">
                                        <h4>{{ $article->judul }}</h4>
                                    </a>
                                    <div class="meta-post">
                                        <ul class="lab-ul">
                                            <li><i class="icofont-ui-user"></i>{{ $article->penulis ?? 'Admin' }}</li>
                                            <li><i class="icofont-calendar"></i>{{ $article->published_at ? $article->published_at->format('F d, Y') : 'N/A' }}</li>
                                        </ul>
                                    </div>
                                    <p>{{ $article->ringkasan ?? Str::limit(strip_tags($article->konten), 150) }}</p>
                                </div>
                                <div class="post-footer">
                                    <div class="pf-left">
                                        <a href="{{ route('blog-single', $article->slug) }}" class="lab-btn-text">Baca selengkapnya <i class="icofont-external-link"></i></a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                    @empty
                    <div class="col-12 text-center">
                        <p>Tidak ada artikel yang tersedia saat ini.</p>
                    </div>
                    @endforelse
                </div>
                @if($articles->count() > 0)
                <div class="text-center mt-5">
                    <a href="{{ route('blog') }}" class="lab-btn"><span>Lihat Semua Artikel</span></a>
                </div>
                @endif
            </div>
        </div>
    </div>
    <!-- blog section ending here -->

    @push('styles')
    <style>
      /* Equal height blog cards */
      .blog-section .post-item { height: 100%; }
      .blog-section .post-inner { display: flex; flex-direction: column; height: 100%; }
      .blog-section .post-thumb img { display: block; width: 100%; height: 200px; object-fit: cover; }
      .blog-section .post-content { flex: 1; display: flex; flex-direction: column; }
      .blog-section .post-content h4 {
        display: -webkit-box; -webkit-line-clamp: 2; -webkit-box-orient: vertical; overflow: hidden; min-height: 2.6em;
      }
      .blog-section .post-content p {
        margin-top: 8px; color: #555; display: -webkit-box; -webkit-line-clamp: 3; -webkit-box-orient: vertical; overflow: hidden; min-height: 3.9em;
      }
      .blog-section .post-footer { margin-top: auto; display: flex; align-items: center; justify-content: space-between; }
    </style>
    @endpush

    <!-- Clients Section Start Here -->
    <div class="clients-section padding-tb">
        <div class="container">
            <div class="section-header text-center">
                <h2 class="title">Apa Kata Alumni?</h2>
            </div>
            <div class="section-wrapper">
                <div class="clients-slider overflow-hidden">
                    <div class="swiper-wrapper">
                        @forelse($alumni as $alumnus)
                        <div class="swiper-slide">
                            <div class="client-item">
                                <div class="client-inner">
                                    <div class="client-thumb">
                                        <img src="{{ $alumnus->foto_url }}" alt="{{ $alumnus->nama }}" class="img-fluid">
                                    </div>
                                    <div class="client-content">
                                        <p>{{ $alumnus->testimoni_plain }}</p>
                                        <div class="client-info">
                                            <h6 class="client-name">{{ $alumnus->nama }}</h6>
                                            <span class="client-degi">
                                                Alumni {{ $alumnus->tahun_lulus }}
                                                @if($alumnus->pendidikan_lanjutan || $alumnus->pekerjaan)
                                                    • {{ $alumnus->pendidikan_lanjutan ?: $alumnus->pekerjaan }}
                                                @endif
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <!-- Fallback content if no alumni found -->
                        <div class="swiper-slide">
                            <div class="client-item">
                                <div class="client-inner">
                                    <div class="client-thumb">
                                        <img src="{{ asset('assets/images/default/alumni-default.jpg') }}" alt="Alumni" class="img-fluid">
                                    </div>
                                    <div class="client-content">
                                        <p>SDIT Luqman Al Hakim telah memberikan pondasi yang kuat untuk masa depan saya. Terima kasih atas semua ilmu dan pengalaman berharga yang diberikan.</p>
                                        <div class="client-info">
                                            <h6 class="client-name">Nama Alumni</h6>
                                            <span class="client-degi">Alumni 2023</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforelse
                    </div>
                    <div class="client-pagination mt-4"></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Clients Section Ending Here -->

    @push('styles')
    <style>
        /* Alumni Testimonial Styles */
        .clients-section {
            background-color: #f8f9fa;
            padding: 80px 0;
        }
        .client-item {
            height: 100%;
            display: flex;
            flex-direction: column;
            padding: 15px;
        }
        .client-inner {
            background: #fff;
            padding: 30px;
            border-radius: 15px;
            box-shadow: 0 5px 25px rgba(0, 0, 0, 0.05);
            height: 100%;
            display: flex;
            flex-direction: column;
            justify-content: flex-start;
            min-height: 0;
        }
        .client-inner:hover {
            transform: translateY(-5px);
            box-shadow: 0 15px 30px rgba(0, 0, 0, 0.1);
        }
        .clients-section .client-thumb {
            position: relative;
            width: 128px !important;    /* hard cap: resist theme overrides */
            height: 128px !important;
            flex: 0 0 128px !important; /* prevent flex stretch */
            margin: 0 auto 20px !important; /* center */
            display: inline-flex !important;
            align-items: center;
            justify-content: center;
            overflow: hidden;           /* clip the image */
            border-radius: 50% !important; /* always circle */
            padding: 0 !important;
            line-height: 0;
            box-sizing: border-box;
            aspect-ratio: 1 / 1;        /* keep square */
            border: 4px solid #fff;     /* inner white ring */
            /* remove any theme shadows that might look like oval rings */
            box-shadow: none !important;
            background: transparent !important;
        }
        /* Draw a guaranteed circular orange ring independent of parent distortions */
        .clients-section .client-thumb::after {
            content: "";
            position: absolute;
            inset: -3px;                 /* expand 3px around */
            width: calc(100% + 6px);
            height: calc(100% + 6px);
            aspect-ratio: 1 / 1;
            border: 3px solid #ff6a00;
            border-radius: 50%;
            pointer-events: none;
            box-sizing: border-box;
        }
        .clients-section .client-thumb img {
            width: 100% !important;    /* fill wrapper */
            height: 100% !important;
            aspect-ratio: 1 / 1;
            display: block;
            object-fit: cover;         /* crop to circle */
            object-position: center;
            border: none !important;   /* ring handled by wrapper */
            box-shadow: none !important;
            border-radius: 0 !important;
            transform: translateZ(0);  /* avoid subpixel blurring on some browsers */
        }
        /* Prevent any inherited transforms/scales that could turn circle into ellipse */
        .clients-section .client-thumb,
        .clients-section .client-thumb img {
            transform: none !important;
        }
        .client-content {
            flex: 1;
            display: flex;
            flex-direction: column;
            text-align: center;
        }
        .client-content p {
            font-size: 15px;
            line-height: 1.8;
            color: #555;
            margin-bottom: 25px;
            flex: 1;
            font-style: italic;
            position: relative;
            padding: 0 10px;
            font-weight: 400;
        }
        .client-content p:before,
        .client-content p:after {
            content: '"';
            font-size: 50px;
            position: absolute;
            color: rgba(0, 0, 0, 0.07);
            font-family: serif;
            line-height: 1;
        }
        .client-content p:before {
            left: -5px;
            top: -15px;
        }
        .client-content p:after {
            right: -5px;
            bottom: -30px;
        }
        .client-info {
            text-align: center;
            margin-top: auto;
            padding-top: 15px;
            border-top: 1px solid #f0f0f0;
        }
        .client-name {
            font-size: 18px;
            font-weight: 700;
            color: #2c3e50;
            margin-bottom: 5px;
        }
        .client-degi {
            font-size: 14px;
            color: #7f8c8d;
            display: block;
            font-weight: 400;
        }
        
        /* Slider Navigation */
        .client-pagination {
            text-align: center;
            margin-top: 30px;
        }
        .client-pagination .swiper-pagination-bullet {
            width: 10px;
            height: 10px;
            background: #ddd;
            opacity: 1;
            margin: 0 5px;
            transition: all 0.3s ease;
        }
        .client-pagination .swiper-pagination-bullet-active {
            background: #3498db;
            width: 30px;
            border-radius: 5px;
        }
        
        /* Ensure all slides have the same height */
        .swiper-slide {
            height: auto;
        }
        
        /* Section Header */
        .section-header .title {
            color: #2c3e50;
            margin-bottom: 15px;
            font-weight: 700;
            position: relative;
            display: inline-block;
            padding-bottom: 10px;
        }
        .section-header .title:after {
            content: '';
            position: absolute;
            width: 50px;
            height: 3px;
            background: #3498db;
            bottom: 0;
            left: 50%;
            transform: translateX(-50%);
        }
        .section-header .subtitle {
            color: #3498db;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 1px;
            font-size: 14px;
            margin-bottom: 10px;
            display: block;
        }
    </style>
    @endpush

    
@endsection

@push('styles')
<style>
/* Program Unggulan Cards - Position and Size Fix */
.category-section {
    background: #f8f9fa;
}

.category-item {
    margin-bottom: 15px;
    height: 100%;
    display: flex;
    width: 100%;
}

.category-inner {
    background: white;
    border-radius: 10px;
    padding: 20px 15px;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    height: 100%;
    display: flex;
    flex-direction: column;
    align-items: center;
    justify-content: center;
    min-height: 140px;
    text-align: center;
}

/* Make columns flex to allow equal-height cards */
.category-section .row > .col {
    display: flex;
}

.category-thumb {
    width: 60px;
    height: 60px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    margin-bottom: 12px;
}

.category-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    border-radius: 50%;
}

.category-content h6 {
    font-size: 13px;
    font-weight: 600;
    color: #333;
    margin: 0;
    text-align: center;
    line-height: 1.3;
}

.category-content a {
    text-decoration: none;
    color: inherit;
}

.category-content a:hover {
    text-decoration: none;
}

/* Section Header Improvements */
.section-header .subtitle {
    color: #ff6b35;
    font-weight: 600;
    font-size: 16px;
    text-transform: uppercase;
    letter-spacing: 1px;
    margin-bottom: 10px;
    display: block;
}

.section-header .title {
    color: #333;
    font-size: 32px;
    font-weight: 700;
    margin-bottom: 0;
    line-height: 1.3;
}

/* WhatsApp Floating Button */
.whatsapp-float {
    position: fixed;
    bottom: 30px;
    right: 30px;
    width: 60px;
    height: 60px;
    background-color: #25D366;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    font-size: 30px;
    cursor: pointer;
    box-shadow: 0 4px 12px rgba(37, 211, 102, 0.4);
    transition: all 0.3s ease;
    z-index: 999;
}

.whatsapp-float:hover {
    transform: scale(1.1);
    box-shadow: 0 6px 20px rgba(37, 211, 102, 0.6);
}

/* WhatsApp Popup */
.whatsapp-popup {
    position: fixed;
    bottom: 100px;
    right: 30px;
    width: 300px;
    background: white;
    border-radius: 12px;
    box-shadow: 0 8px 32px rgba(0, 0, 0, 0.15);
    z-index: 1001;
    display: none;
    animation: slideInUp 0.3s ease;
}

.whatsapp-popup.show {
    display: block;
}

@keyframes slideInUp {
    from {
        opacity: 0;
        transform: translateY(20px);
    }
    to {
        opacity: 1;
        transform: translateY(0);
    }
}

.whatsapp-popup-header {
    background: #25D366;
    color: white;
    padding: 15px 20px;
    border-radius: 12px 12px 0 0;
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.whatsapp-popup-title {
    display: flex;
    align-items: center;
    gap: 8px;
    font-weight: 600;
}

.whatsapp-popup-title i {
    font-size: 18px;
}

.whatsapp-popup-close {
    background: none;
    border: none;
    color: white;
    cursor: pointer;
    font-size: 16px;
    padding: 0;
    width: 24px;
    height: 24px;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 50%;
    transition: background-color 0.3s ease;
}

.whatsapp-popup-close:hover {
    background-color: rgba(255, 255, 255, 0.2);
}

.whatsapp-popup-body {
    padding: 20px;
}

.whatsapp-message {
    background: #f0f0f0;
    padding: 12px 16px;
    border-radius: 18px;
    margin-bottom: 15px;
    position: relative;
}

.whatsapp-message::before {
    content: '';
    position: absolute;
    bottom: -8px;
    left: 20px;
    width: 0;
    height: 0;
    border-left: 8px solid transparent;
    border-right: 8px solid transparent;
    border-top: 8px solid #f0f0f0;
}

.whatsapp-message p {
    margin: 0;
    color: #333;
    font-size: 14px;
    line-height: 1.4;
}

.whatsapp-open-chat {
    width: 100%;
    background: #25D366;
    color: white;
    border: none;
    padding: 12px 20px;
    border-radius: 8px;
    cursor: pointer;
    font-weight: 600;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 8px;
    transition: background-color 0.3s ease;
}

.whatsapp-open-chat:hover {
    background: #128C7E;
}

.whatsapp-open-chat i {
    font-size: 14px;
}

/* Instructor Slider Styles */
.instructor-slider {
    position: relative;
    padding: 0 10px;
}

.instructor-slider .swiper-wrapper {
    align-items: flex-start;
}

.instructor-slider .swiper-slide {
    width: 320px;
    height: auto;
    margin-right: 20px;
    display: flex;
}
@media (min-width: 576px) {
    .instructor-slider .swiper-slide { width: 360px; }
}
@media (min-width: 768px) {
    .instructor-slider .swiper-slide { width: 440px; }
}
@media (min-width: 992px) {
    .instructor-slider .swiper-slide { width: 520px; }
}
@media (min-width: 1200px) {
    .instructor-slider .swiper-slide { width: 560px; }
}

.instructor-item {
    background: white;
    border-radius: 15px;
    padding: 25px 20px;
    box-shadow: 0 5px 20px rgba(0, 0, 0, 0.1);
    transition: all 0.3s ease;
    height: auto;
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    min-height: 0;
}

.instructor-item:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15);
}

.instructor-inner {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 8px;
}

.instructor-thumb {
    width: 120px;
    height: 120px;
    border-radius: 50%;
    overflow: hidden;
    margin: 0 auto 20px;
    border: 3px solid #f0f0f0;
}

.instructor-thumb img {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.instructor-content {
    text-align: center;
    margin-bottom: 20px;
    flex: 1;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
}

.instructor-content h4 {
    font-size: 16px;
    font-weight: 600;
    margin-bottom: 8px;
    color: #333;
    line-height: 1.3;
}

.instructor-content p {
    font-size: 14px;
    color: #666;
    margin-bottom: 12px;
    line-height: 1.4;
    word-wrap: break-word;
    overflow-wrap: break-word;
}

.ratting {
    display: flex;
    justify-content: center;
    gap: 3px;
    margin-bottom: 15px;
}

.ratting i {
    font-size: 14px;
}

.ratting i.icofont-ui-rating-disabled {
    color: #ddd;
}

.social-media-icons {
    display: flex;
    justify-content: center;
    gap: 8px;
    margin-top: 8px;
    flex-wrap: nowrap;
    white-space: nowrap;
}

.social-icon {
    width: 32px;
    height: 32px;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    color: white;
    text-decoration: none;
    transition: all 0.3s ease;
    font-size: 16px;
}

.social-icon.whatsapp {
    background: #25D366;
}

.social-icon.instagram {
    background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);
}

.social-icon.facebook {
    background: #1877F2;
}

.social-icon:hover {
    transform: translateY(-2px);
}

.instructor-footer {
    border-top: 1px solid #eee;
    padding-top: 15px;
    margin-top: 12px;
}

.instructor-footer ul {
    list-style: none;
    padding: 0;
    margin: 0;
    font-size: 12px;
    color: #666;
}

.instructor-footer li {
    display: flex;
    align-items: center;
    gap: 6px;
    margin-bottom: 6px;
    line-height: 1.3;
}

.instructor-footer i {
    color: var(--primary-color);
    font-size: 14px;
    flex-shrink: 0;
}

/* Additional fixes for consistent sizing */
.instructor-slider .swiper-slide:last-child {
    margin-right: 0;
}

.instructor-item {
    box-sizing: border-box;
}

/* Ensure consistent text wrapping */
.instructor-content h4,
.instructor-content p {
    word-wrap: break-word;
    overflow-wrap: break-word;
}

/* Responsive */
@media (max-width: 768px) {
    .category-inner {
        min-height: 120px;
        padding: 15px 10px;
    }
    
    .category-thumb {
        width: 50px;
        height: 50px;
        margin-bottom: 10px;
    }
    
    .category-content h6 {
        font-size: 12px;
    }
    
    .section-header .title {
        font-size: 24px;
    }
    
    /* Keep narrower on small screens; base width above already handles <576px */
    .instructor-slider .swiper-slide { margin-right: 15px; }
    
    .instructor-item {
        padding: 20px 15px;
        min-height: 300px;
    }
    
    .instructor-thumb {
        width: 80px;
        height: 80px;
        margin-bottom: 15px;
    }
    
    .instructor-content h4 {
        font-size: 15px;
    }
    
    .instructor-content p {
        font-size: 13px;
    }
    
    .social-icon {
        width: 32px;
        height: 32px;
        font-size: 14px;
    }
    
    .ratting i {
        font-size: 14px;
    }
    
}
</style>
@endpush

@push('scripts')
<script>
// Initialize Instructor Slider
document.addEventListener('DOMContentLoaded', function() {
    const instructorSlider = new Swiper('.instructor-slider', {
        slidesPerView: 'auto',
        spaceBetween: 20,
        grabCursor: true,
        autoplay: {
            delay: 3000,
            disableOnInteraction: false,
        },
        breakpoints: {
            576: {
                slidesPerView: 'auto',
                spaceBetween: 15,
            },
            768: {
                slidesPerView: 'auto',
                spaceBetween: 20,
            },
            1024: {
                slidesPerView: 'auto',
                spaceBetween: 25,
            },
            1200: {
                slidesPerView: 'auto',
                spaceBetween: 30,
            }
        }
    });
});
</script>
@endpush 
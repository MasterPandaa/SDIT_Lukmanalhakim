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
                    <h2>{{ $sambutan->judul ?? 'Sambutan Kepala Sekolah' }}</h2>
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

<!-- About Us Section Start Here -->
<div class="about-section style-3 padding-tb section-bg">
    <div class="container">
        <div class="row justify-content-center row-cols-xl-2 row-cols-1 align-items-center">
            <div class="col">
                <div class="about-left">
                    <div class="about-thumb">
                        <img src="{{ $sambutan ? $sambutan->foto_kepsek_url : asset('assets/images/about/01.jpg') }}" alt="about">
                    </div>
                    <div class="abs-thumb">
                        <img src="{{ $sambutan ? $sambutan->foto_kepsek2_url : asset('assets/images/about/02.jpg') }}" alt="about">
                    </div>
                    <div class="about-left-content">
                        <h3>{{ $sambutan->tahun_berdiri ?? '11' }} Th</h3>
                        <p>eLHaeS Berdiri</p>
                    </div>
                </div>
            </div>
            <div class="col">
                <div class="about-right">
                    <div class="section-header">
                        <span class="subtitle">{{ $sambutan->subtitle ?? 'Cerdas, Berakhlak, Menginspirasi' }}</span>
                        <h2 class="title">{{ $sambutan->judul ?? 'Mewujudkan Generasi Unggul Berakhlak Mulia' }}</h2>
                        <p>{!! $sambutan->sambutan ?? 'Sambutan belum tersedia' !!}</p>
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
                            <a href="{{ $sambutan->video_url ?? 'https://www.youtube-nocookie.com/embed/jP649ZHA8Tg' }}" class="video-button" data-rel="lightcase"><i class="icofont-ui-play"></i></a>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="stu-feed-item">
                        <div class="stu-feed-inner">
                            <div class="stu-feed-top">
                                <div class="sft-left">
                                    <div class="sftl-thumb">
                                        <img src="{{ asset('assets/images/feedback/student/01.jpg') }}" alt="student feedback">
                                    </div>
                                    <div class="sftl-content">
                                        <a href="#"><h6>Ibu Siti</h6></a>
                                        <span>Wali Murid Kelas 2</span>
                                    </div>
                                </div>
                                <div class="sft-right">
                                    <span class="ratting">
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="stu-feed-bottom">
                                <p>"Alhamdulillah, anak saya semakin semangat belajar sejak bersekolah di SDIT Luqman Al Hakim Sleman. Guru-gurunya sabar, pembelajarannya menarik, dan nilai-nilai Islam diterapkan dengan baik. Terima kasih!</p>
                            </div>
                        </div>
                    </div>
                    <div class="stu-feed-item">
                        <div class="stu-feed-inner">
                            <div class="stu-feed-top">
                                <div class="sft-left">
                                    <div class="sftl-thumb">
                                        <img src="{{ asset('assets/images/feedback/student/02.jpg') }}" alt="student feedback">
                                    </div>
                                    <div class="sftl-content">
                                        <a href="#"><h6>Bapak Ahmad</h6></a>
                                        <span>Wali Murid Kelas 3</span>
                                    </div>
                                </div>
                                <div class="sft-right">
                                    <span class="ratting">
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                        <i class="icofont-ui-rating"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="stu-feed-bottom">
                                <p>"Anak saya jadi lebih disiplin, mandiri, dan mencintai ilmu agama sejak sekolah di SDIT Luqman Al Hakim. Lingkungan belajar yang nyaman membuatnya betah. Sangat puas dengan sekolah ini!"</p>
                            </div>
                        </div>
                    </div>
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
                    <div class="row g-4 justify-content-center row-cols-sm-2 row-cols-1">
                        <div class="col">
                            <div class="skill-item">
                                <div class="skill-inner">
                                    <div class="skill-thumb">
                                        <img src="{{ asset('assets/images/skill/icon/01.jpg') }}" alt="skill thumb">
                                    </div>
                                    <div class="skill-content">
                                        <h5>Bela Diri</h5>
                                        <p>"Berani, Disiplin, Tangguh!"</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="skill-item">
                                <div class="skill-inner">
                                    <div class="skill-thumb">
                                        <img src="{{ asset('assets/images/skill/icon/02.jpg') }}" alt="skill thumb">
                                    </div>
                                    <div class="skill-content">
                                        <h5>Robotik</h5>
                                        <p>"Kreatif, Inovatif, Futuristik!"</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="skill-item">
                                <div class="skill-inner">
                                    <div class="skill-thumb">
                                        <img src="{{ asset('assets/images/skill/icon/03.jpg') }}" alt="skill thumb">
                                    </div>
                                    <div class="skill-content">
                                        <h5>Sinematografi</h5>
                                        <p>"Ekspresi, Kreativitas,Visual!"</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="skill-item">
                                <div class="skill-inner">
                                    <div class="skill-thumb">
                                        <img src="{{ asset('assets/images/skill/icon/04.jpg') }}" alt="skill thumb">
                                    </div>
                                    <div class="skill-content">
                                        <h5>Mini Soccer</h5>
                                        <p>"Cepat, Taktis, Seru, Sportif!"</p>
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
<!-- Skill section ending here -->

<!-- blog section start here -->
<div class="blog-section padding-tb">
    <div class="container">
        <div class="section-header text-center">
            <h2 class="title">Artikel dan Majalah</h2>
        </div>
        <div class="section-wrapper">
            <div class="row row-cols-1 row-cols-md-2 row-cols-xl-3 justify-content-center g-4">
                <div class="col">
                    <div class="post-item">
                        <div class="post-inner">
                            <div class="post-thumb">
                                <a href="{{ route('blog-single', 'scottish-creatives') }}"><img src="{{ asset('assets/images/blog/01.jpg') }}" alt="blog thumb"></a>
                            </div>
                            <div class="post-content">
                                <a href="{{ route('blog-single', 'scottish-creatives') }}"><h4>Scottish Creatives To Receive Funded Business.</h4></a>
                                <div class="meta-post">
                                    <ul class="lab-ul">
                                        <li><i class="icofont-ui-user"></i>Begrass Tyson</li>
                                        <li><i class="icofont-calendar"></i>April 23,2021</li>
                                    </ul>
                                </div>
                                <p>Pluoresnts customize prancing apcente customer service anding ands asing in straelg Interacvely cordinate performe</p>
                            </div>
                            <div class="post-footer">
                                <div class="pf-left">
                                    <a href="{{ route('blog-single', 'scottish-creatives') }}" class="lab-btn-text">Read more <i class="icofont-external-link"></i></a>
                                </div>
                                <div class="pf-right">
                                    <i class="icofont-comment"></i>
                                    <span class="comment-count">3</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="post-item">
                        <div class="post-inner">
                            <div class="post-thumb">
                                <a href="{{ route('blog-single', 'scottish-creatives-2') }}"><img src="{{ asset('assets/images/blog/02.jpg') }}" alt="blog thumb"></a>
                            </div>
                            <div class="post-content">
                                <a href="{{ route('blog-single', 'scottish-creatives-2') }}"><h4>Scottish Creatives To Receive Funded Business.</h4></a>
                                <div class="meta-post">
                                    <ul class="lab-ul">
                                        <li><i class="icofont-ui-user"></i>Begrass Tyson</li>
                                        <li><i class="icofont-calendar"></i>April 23,2021</li>
                                    </ul>
                                </div>
                                <p>Pluoresnts customize prancing apcente customer service anding ands asing in straelg Interacvely cordinate performe</p>
                            </div>
                            <div class="post-footer">
                                <div class="pf-left">
                                    <a href="{{ route('blog-single', 'scottish-creatives-2') }}" class="lab-btn-text">Read more <i class="icofont-external-link"></i></a>
                                </div>
                                <div class="pf-right">
                                    <i class="icofont-comment"></i>
                                    <span class="comment-count">3</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="post-item">
                        <div class="post-inner">
                            <div class="post-thumb">
                                <a href="{{ route('blog-single', 'scottish-creatives-3') }}"><img src="{{ asset('assets/images/blog/03.jpg') }}" alt="blog thumb"></a>
                            </div>
                            <div class="post-content">
                                <a href="{{ route('blog-single', 'scottish-creatives-3') }}"><h4>Scottish Creatives To Receive Funded Business.</h4></a>
                                <div class="meta-post">
                                    <ul class="lab-ul">
                                        <li><i class="icofont-ui-user"></i>Begrass Tyson</li>
                                        <li><i class="icofont-calendar"></i>April 23,2021</li>
                                    </ul>
                                </div>
                                <p>Pluoresnts customize prancing apcente customer service anding ands asing in straelg Interacvely cordinate performe</p>
                            </div>
                            <div class="post-footer">
                                <div class="pf-left">
                                    <a href="{{ route('blog-single', 'scottish-creatives-3') }}" class="lab-btn-text">Read more <i class="icofont-external-link"></i></a>
                                </div>
                                <div class="pf-right">
                                    <i class="icofont-comment"></i>
                                    <span class="comment-count">3</span>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- blog section ending here -->

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
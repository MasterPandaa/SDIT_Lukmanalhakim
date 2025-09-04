<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Security-Policy" content="frame-src 'self' https://www.youtube.com https://www.youtube-nocookie.com https://youtube.com https://youtu.be https://www.google.com https://maps.google.com;">
    <title>@yield('title') - SDIT Lukmanalhakim</title>
    
    <link rel="shortcut icon" href="{{ asset('assets/images/x-icon.png') }}" type="image/x-icon">

    <!-- CSS Files -->
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/icofont.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/lightcase.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
    
    <!-- Global overrides: page header title and breadcrumb sizes -->
    <style>
      /* Page header title */
      .pageheader-section .pageheader-content h2 {
        font-weight: 800;
        line-height: 1.2;
        font-size: 36px;
      }
      @media (min-width: 768px) {
        .pageheader-section .pageheader-content h2 { font-size: 46px; }
      }
      @media (min-width: 1200px) {
        .pageheader-section .pageheader-content h2 { font-size: 56px; }
      }
      /* Page header description */
      .pageheader-section .pageheader-content p.desc {
        font-size: 19px;
      }
      /* Breadcrumb */
      .pageheader-section .breadcrumb {
        font-size: 17px;
      }
    </style>
    
    <!-- Font Awesome for WhatsApp icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    @stack('styles')
</head>
<body>
    <!-- preloader start here -->
    <div class="preloader">
        <div class="preloader-inner">
            <div class="preloader-icon">
                <span></span>
                <span></span>
            </div>
        </div>
    </div>
    <!-- preloader ending here -->

    <!-- scrollToTop start here -->
    <a href="#" class="scrollToTop"><i class="icofont-rounded-up"></i></a>
    <!-- scrollToTop ending here -->

    <!-- Header -->
    @include('layouts.header')
    <!-- /Header -->

    <!-- Main Content -->
    @yield('content')
    <!-- /Main Content -->

    <!-- Footer -->
    @include('layouts.footer')
    <!-- /Footer -->

    <!-- JavaScript -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/progress.js') }}"></script>
    <script src="{{ asset('assets/js/lightcase.js') }}"></script>
    <script src="{{ asset('assets/js/counter-up.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.js') }}"></script>
    <script src="{{ asset('assets/js/functions.js') }}"></script>
    
    @stack('scripts')
</body>
</html> 
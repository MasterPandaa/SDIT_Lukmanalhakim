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
      /* Floating actions base: keep scrollToTop above FAB (z=999) but below popup (z=1001) */
      a.scrollToTop {
        position: fixed;
        right: 20px;
        bottom: 20px;
        z-index: 1000;
      }
    </style>
    
    <!-- Font Awesome for WhatsApp icons -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    
    <!-- Global WhatsApp Styles -->
    @include('layouts.partials.whatsapp-styles')

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

    <!-- Global WhatsApp Float & Popup -->
    @include('layouts.partials.whatsapp')

    <!-- JavaScript -->
    <script src="{{ asset('assets/js/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/swiper.min.js') }}"></script>
    <script src="{{ asset('assets/js/progress.js') }}"></script>
    <script src="{{ asset('assets/js/lightcase.js') }}"></script>
    <script src="{{ asset('assets/js/counter-up.js') }}"></script>
    <script src="{{ asset('assets/js/isotope.pkgd.js') }}"></script>
    <script src="{{ asset('assets/js/functions.js') }}"></script>
    
    <script>
      // Keep scrollToTop positioned using the same floating logic as .whatsapp-float
      (function(){
        const SPACING = 12; // px gap above WhatsApp button
        const MIN_RIGHT = 20; // px default right gap
        const MIN_BOTTOM = 20; // px default bottom gap
        const scrollBtn = document.querySelector('a.scrollToTop');
        if (!scrollBtn) return;

        function findWhatsAppFab() {
          // Match the dedicated floating button if present
          const el = document.querySelector('.whatsapp-float');
          if (el) return el;
          // Fallbacks (in case class name changes)
          return (document.querySelector('a[href*="wa.me"], a[href*="api.whatsapp.com"]')) || null;
        }

        function positionScrollBtn() {
          const fab = findWhatsAppFab();
          if (!fab) {
            scrollBtn.style.right = MIN_RIGHT + 'px';
            scrollBtn.style.bottom = MIN_BOTTOM + 'px';
            return;
          }
          const style = window.getComputedStyle(fab);
          // Read the declared bottom/right of the FAB so we mimic its floating logic exactly
          let fabBottom = parseInt(style.bottom, 10);
          let fabRight = parseInt(style.right, 10);
          const rect = fab.getBoundingClientRect();
          const height = Math.round(rect.height);
          const width = Math.round(rect.width);
          // Fallback to rect if computed styles are not numeric (e.g., 'auto')
          if (!Number.isFinite(fabBottom)) {
            fabBottom = Math.round(window.innerHeight - rect.bottom);
          }
          if (!Number.isFinite(fabRight)) {
            fabRight = Math.round(window.innerWidth - rect.right);
          }
          const right = Math.max(MIN_RIGHT, fabRight);
          const bottom = Math.max(MIN_BOTTOM, fabBottom + height + SPACING);
          scrollBtn.style.right = right + 'px';
          scrollBtn.style.bottom = bottom + 'px';
          // Match size and shape with WhatsApp FAB (as on home page)
          scrollBtn.style.width = width + 'px';
          scrollBtn.style.height = height + 'px';
          scrollBtn.style.borderRadius = style.borderRadius || '50%';
          scrollBtn.style.display = 'flex';
          scrollBtn.style.alignItems = 'center';
          scrollBtn.style.justifyContent = 'center';
          const icon = scrollBtn.querySelector('i');
          if (icon) {
            const fabFontSize = parseInt(style.fontSize, 10);
            if (Number.isFinite(fabFontSize)) {
              icon.style.fontSize = fabFontSize + 'px';
            }
          }
        }

        // Recalculate on load/resize (debounced). No need to listen to scroll for fixed elements.
        let rafId = null;
        function schedule() {
          if (rafId) cancelAnimationFrame(rafId);
          rafId = requestAnimationFrame(positionScrollBtn);
        }
        window.addEventListener('load', schedule, { passive: true });
        window.addEventListener('resize', schedule, { passive: true });

        // Observe DOM changes (some WhatsApp widgets mount late)
        const mo = new MutationObserver(schedule);
        mo.observe(document.documentElement, { childList: true, subtree: true });
        schedule();
      })();
    </script>
    
    @stack('scripts')
</body>
</html>
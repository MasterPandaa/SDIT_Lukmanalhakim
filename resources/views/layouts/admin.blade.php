<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Admin Panel - SDIT Lukmanalhakim</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
    <!-- SweetAlert2 Theme -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@sweetalert2/theme-borderless@5.0.15/borderless.min.css" integrity="sha384-fj1g8jv4P4wWQ1kVqXoVQ3bG8w3e3o0kZJd0I6lqkz7b2m4Z0nOeJkqk8b0S4j7y" crossorigin="anonymous">
    <style>
        :root {
            --primary-color: #27ae60;
            --secondary-color: #f39c12;
            --accent-color: #e74c3c;
            --dark-color: #2c3e50;
            --light-color: #ecf0f1;
            --success-color: #2ecc71;
            --warning-color: #f1c40f;
            --danger-color: #e74c3c;
            --info-color: #3498db;
        }
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #f5f8fa;
            color: #333;
            min-height: 100vh;
        }
        .wrapper {
            display: flex;
            width: 100%;
            min-height: 100vh;
            overflow-x: hidden;
        }
        .sidebar {
            min-width: 280px;
            max-width: 280px;
            background: linear-gradient(135deg, var(--primary-color), #219150);
            color: white;
            transition: all 0.3s;
            position: fixed;
            top: 0;
            left: 0;
            height: 100vh;
            z-index: 999;
            box-shadow: 3px 0 10px rgba(0,0,0,0.1);
            display: flex;
            flex-direction: column;
            overflow-y: auto;
        }
        .sidebar-header {
            padding: 1.5rem 1rem;
            text-align: center;
            margin-bottom: 1rem;
        }
        .logo-text {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.5rem;
            color: white;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
        }
        .sidebar .nav-link {
            color: rgba(255,255,255,0.8);
            padding: 0.75rem 1rem;
            border-radius: 8px;
            margin: 0 10px 2px 10px;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            text-decoration: none;
            font-weight: 500;
        }
        .sidebar .nav-link:hover {
            color: white;
            background: rgba(255,255,255,0.1);
            transform: translateX(5px);
        }
        .sidebar .nav-link.active {
            color: white;
            background: rgba(255,255,255,0.2);
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }
        .sidebar .nav-link i {
            width: 20px;
            margin-right: 10px;
            font-size: 1rem;
        }
        .sidebar .nav-link .ms-auto {
            margin-left: auto;
            transition: transform 0.3s ease;
        }
        .sidebar .collapse.show .nav-link .ms-auto {
            transform: rotate(180deg);
        }
        .sidebar .collapse .nav-link {
            padding-left: 2.5rem;
            font-size: 0.9rem;
        }
        .sidebar .collapse .nav-link:hover {
            background: rgba(255,255,255,0.05);
        }
        #content {
            margin-left: 280px;
            transition: all 0.3s;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
            width: calc(100% - 280px);
            background-color: #f8f9fa;
        }
        #content.active {
            margin-left: 0;
            width: 100%;
        }
        .content-wrapper {
            flex: 1;
            padding: 2rem;
            width: 100%;
            background-color: transparent;
            min-height: calc(100vh - 100px);
            position: relative;
        }
        .modern-header {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border-bottom: 1px solid #e9ecef;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            padding: 1.25rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
            min-height: 80px;
            display: flex;
            align-items: center;
        }
        .breadcrumb {
            background: transparent;
            padding: 0;
            margin: 0;
        }
        .breadcrumb-item a {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 0.95rem;
            font-weight: 500;
        }
        .breadcrumb-item.active {
            color: var(--primary-color);
            font-size: 0.95rem;
            font-weight: 600;
        }
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
            transition: all 0.3s ease;
            border: none;
            background: #ffffff;
            margin-bottom: 1.5rem;
        }
        .btn {
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
            padding: 0.75rem 1.5rem;
            font-size: 0.95rem;
            border: none;
        }
        .btn-success {
            background: linear-gradient(135deg, var(--success-color), #27ae60);
            color: white;
        }
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), #219150);
            color: white;
        }
        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
        }
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(39, 174, 96, 0.25);
            background-color: #fff;
        }
        .nav-tabs .nav-link {
            border: none;
            border-radius: 8px 8px 0 0;
            margin-right: 0.5rem;
            font-weight: 500;
            color: #6c757d;
            transition: all 0.3s ease;
        }
        .nav-tabs .nav-link:hover {
            background: rgba(39, 174, 96, 0.1);
            color: var(--primary-color);
        }
        .nav-tabs .nav-link.active {
            background: var(--primary-color);
            color: white;
            border: none;
        }
        @media (max-width: 1024px) {
            .sidebar {
                margin-left: -280px;
            }
            .sidebar.active {
                margin-left: 0;
            }
            #content {
                margin-left: 0;
                width: 100%;
            }
        }
    </style>
    @stack('styles')
</head>
<body>
<div class="wrapper">
    @if(session('admin_logged_in'))
    <!-- Sidebar -->
    <nav id="sidebar" class="sidebar">
        <div class="sidebar-header">
            <h4 class="logo-text mb-1">SDIT Lukmanalhakim</h4>
            <p class="text-light opacity-75 small">Admin Panel</p>
        </div>
        
        <ul class="nav flex-column">
            <li class="nav-item">
                <a class="nav-link {{ request()->is('adminpanel/dashboard') ? 'active' : '' }}" href="{{ route('admin.dashboard') }}">
                    <i class="fas fa-tachometer-alt"></i> Dashboard
                </a>
            </li>
            
            <!-- Website Section -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('adminpanel/website*') ? 'active' : '' }}" href="#websiteSubmenu" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="websiteSubmenu">
                    <i class="fas fa-globe"></i> Website
                    <i class="fas fa-chevron-down ms-auto"></i>
                </a>
                <div class="collapse {{ request()->is('adminpanel/website*') ? 'show' : '' }}" id="websiteSubmenu">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('adminpanel/website/home') ? 'active' : '' }}" href="{{ route('admin.website.home') }}">
                                <i class="fas fa-home"></i> Home
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('adminpanel/website/settings*') ? 'active' : '' }}" href="{{ route('admin.website.settings.index') }}">
                                <i class="fas fa-cogs"></i> Pengaturan Website
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <!-- Profil Section -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('adminpanel/profil*') ? 'active' : '' }}" href="#profilSubmenu" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="profilSubmenu">
                    <i class="fas fa-building"></i> Profil
                    <i class="fas fa-chevron-down ms-auto"></i>
                </a>
                <div class="collapse {{ request()->is('adminpanel/profil*') ? 'show' : '' }}" id="profilSubmenu">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('adminpanel/profil/visi-misi*') ? 'active' : '' }}" href="{{ route('admin.profil.visi-misi.index') }}">
                                <i class="fas fa-bullseye"></i> Visi Misi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('adminpanel/profil/sambutan-kepsek*') ? 'active' : '' }}" href="{{ route('admin.profil.sambutan-kepsek.index') }}">
                                <i class="fas fa-user-tie"></i> Sambutan Kepsek
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('adminpanel/profil/kurikulum*') ? 'active' : '' }}" href="{{ route('admin.profil.kurikulum') }}">
                                <i class="fas fa-book-open"></i> Kurikulum
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('adminpanel/profil/indikator-kelulusan*') ? 'active' : '' }}" href="{{ route('admin.profil.indikator-kelulusan.index') }}">
                                <i class="fas fa-graduation-cap"></i> Indikator Kelulusan
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('adminpanel/profil/guru-karyawan*') ? 'active' : '' }}" href="{{ route('admin.profil.guru-karyawan.index') }}">
                                <i class="fas fa-users"></i> Guru & Karyawan
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <!-- About Section -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('adminpanel/about*') ? 'active' : '' }}" href="#aboutSubmenu" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="aboutSubmenu">
                    <i class="fas fa-info-circle"></i> About
                    <i class="fas fa-chevron-down ms-auto"></i>
                </a>
                <div class="collapse {{ request()->is('adminpanel/about*') ? 'show' : '' }}" id="aboutSubmenu">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('adminpanel/about/prestasi*') ? 'active' : '' }}" href="{{ route('admin.about.prestasi.index') }}">
                                <i class="fas fa-trophy"></i> Prestasi
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('adminpanel/about/ekstrakurikuler*') ? 'active' : '' }}" href="{{ route('admin.about.ekstrakurikuler.index') }}">
                                <i class="fas fa-music"></i> Ekstrakurikuler
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('adminpanel/about/fasilitas*') ? 'active' : '' }}" href="{{ route('admin.about.fasilitas.index') }}">
                                <i class="fas fa-cogs"></i> Fasilitas
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('adminpanel/about/galeri*') ? 'active' : '' }}" href="{{ route('admin.about.galeri.index') }}">
                                <i class="fas fa-images"></i> Galeri
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('adminpanel/about/alumni*') ? 'active' : '' }}" href="{{ route('admin.about.alumni.index') }}">
                                <i class="fas fa-user-graduate"></i> Alumni
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('adminpanel/about/artikel*') ? 'active' : '' }}" href="{{ route('admin.about.artikel.index') }}">
                                <i class="fas fa-newspaper"></i> Artikel
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <!-- Contact Section -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('adminpanel/contact*') ? 'active' : '' }}" href="{{ route('admin.contact.index') }}">
                    <i class="fas fa-envelope"></i> Contact
                </a>
            </li>
            
            <!-- Log Section -->
            <li class="nav-item">
                <a class="nav-link {{ request()->is('adminpanel/log*') ? 'active' : '' }}" href="#logSubmenu" data-bs-toggle="collapse" role="button" aria-expanded="false" aria-controls="logSubmenu">
                    <i class="fas fa-file-alt"></i> Log
                    <i class="fas fa-chevron-down ms-auto"></i>
                </a>
                <div class="collapse {{ request()->is('adminpanel/log*') ? 'show' : '' }}" id="logSubmenu">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('adminpanel/log/system*') ? 'active' : '' }}" href="{{ route('admin.log.system') }}">
                                <i class="fas fa-exclamation-triangle"></i> Log System
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link {{ request()->is('adminpanel/log/database*') ? 'active' : '' }}" href="{{ route('admin.log.database') }}">
                                <i class="fas fa-database"></i> Log Database
                            </a>
                        </li>
                    </ul>
                </div>
            </li>
            
            <li class="nav-item mt-2">
                <form action="{{ route('admin.logout') }}" method="POST">
                    @csrf
                    <button type="submit" class="nav-link text-white border-0 bg-transparent w-100 text-start" style="background-color: rgba(231, 76, 60, 0.2) !important;">
                        <i class="fas fa-sign-out-alt"></i> Logout
                    </button>
                </form>
            </li>
        </ul>
    </nav>
    @endif
    
    <!-- Main Content -->
    <div id="content">
        @if(session('admin_logged_in'))
        <!-- Modern Header -->
        <nav class="navbar navbar-expand-lg modern-header">
            <div class="container-fluid px-4">
                <div class="d-flex align-items-center justify-content-between w-100">
                    <!-- Left Side: Sidebar Toggle + Breadcrumb -->
                    <div class="d-flex align-items-center">
                        <!-- Sidebar Toggle -->
                        <button type="button" id="sidebarCollapse" class="btn btn-link d-md-none me-3">
                            <i class="fas fa-bars"></i>
                        </button>
                        
                        <!-- Breadcrumb -->
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb mb-0">
                                <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                @if(request()->is('adminpanel/website*'))
                                    <li class="breadcrumb-item"><a href="#">Website</a></li>
                                    @if(request()->is('adminpanel/website/home'))
                                        <li class="breadcrumb-item active">Home</li>
                                    @elseif(request()->is('adminpanel/website/settings*'))
                                        <li class="breadcrumb-item active">Pengaturan Website</li>
                                    @endif
                                @elseif(request()->is('adminpanel/profil*'))
                                    <li class="breadcrumb-item"><a href="#">Profil</a></li>
                                    @if(request()->is('adminpanel/profil/visi-misi*'))
                                        <li class="breadcrumb-item active">Visi Misi</li>
                                    @elseif(request()->is('adminpanel/profil/sambutan-kepsek*'))
                                        <li class="breadcrumb-item active">Sambutan Kepsek</li>
                                    @elseif(request()->is('adminpanel/profil/kurikulum*'))
                                        <li class="breadcrumb-item active">Kurikulum</li>
                                    @elseif(request()->is('adminpanel/profil/indikator-kelulusan*'))
                                        <li class="breadcrumb-item active">Indikator Kelulusan</li>
                                    @elseif(request()->is('adminpanel/profil/guru-karyawan*'))
                                        <li class="breadcrumb-item active">Guru & Karyawan</li>
                                    @endif
                                @elseif(request()->is('adminpanel/about*'))
                                    <li class="breadcrumb-item"><a href="#">About</a></li>
                                    @if(request()->is('adminpanel/about/prestasi*'))
                                        <li class="breadcrumb-item active">Prestasi</li>
                                    @elseif(request()->is('adminpanel/about/ekstrakurikuler*'))
                                        <li class="breadcrumb-item active">Ekstrakurikuler</li>
                                    @elseif(request()->is('adminpanel/about/fasilitas*'))
                                        <li class="breadcrumb-item active">Fasilitas</li>
                                    @elseif(request()->is('adminpanel/about/galeri*'))
                                        <li class="breadcrumb-item active">Galeri</li>
                                    @elseif(request()->is('adminpanel/about/alumni*'))
                                        <li class="breadcrumb-item active">Alumni</li>
                                    @elseif(request()->is('adminpanel/about/artikel*'))
                                        <li class="breadcrumb-item active">Artikel</li>
                                    @elseif(request()->is('adminpanel/about/guru*'))
                                        <li class="breadcrumb-item active">Guru</li>
                                    @endif
                                @elseif(request()->is('adminpanel/contact*'))
                                    <li class="breadcrumb-item active">Contact</li>
                                @elseif(request()->is('adminpanel/log*'))
                                    <li class="breadcrumb-item"><a href="#">Log</a></li>
                                    @if(request()->is('adminpanel/log/system*'))
                                        <li class="breadcrumb-item active">System</li>
                                    @elseif(request()->is('adminpanel/log/database*'))
                                        <li class="breadcrumb-item active">Database</li>
                                    @endif
                                @else
                                    <li class="breadcrumb-item active" aria-current="page">@yield('title')</li>
                                @endif
                            </ol>
                        </nav>
                    </div>
                    
                    <!-- Right Side: User Profile -->
                    <div class="d-flex align-items-center">
                        <style>
                        .profile-toggle { transition: all .2s ease; background-color: var(--light-color, #f8f9fa); border: 1px solid rgba(39,174,96,.2); }
                        .profile-toggle:hover { background: rgba(39,174,96,.08); box-shadow: 0 2px 10px rgba(0,0,0,.06); }
                        .profile-toggle:active { transform: translateY(0.5px); }
                        .avatar-circle { width: 32px; height: 32px; border-radius: 50%; display: inline-flex; align-items: center; justify-content: center; font-weight: 600; color: var(--primary-color); background: linear-gradient(135deg, rgba(39,174,96,.08), var(--light-color, #ffffff)); border: 1px solid rgba(39,174,96,.25); }
                        .dropdown-menu.profile-menu { min-width: 220px; box-shadow: 0 8px 24px rgba(0,0,0,.08); border: 1px solid rgba(39,174,96,.15); }
                        .dropdown-header.small { font-size: .8rem; color: rgba(44,62,80,.7); }
                        .dropdown-item:hover { background: rgba(39,174,96,.08); }
                        .dropdown-divider { border-top-color: rgba(39,174,96,.2); }
                        @media (max-width: 575.98px) {
                            .profile-toggle { padding-left: .5rem !important; padding-right: .5rem !important; gap: .5rem !important; }
                        }
                        </style>
                        <div class="dropdown">
                            @php
                                $adminName = session('admin_name') ?? 'Admin';
                                $parts = preg_split('/\s+/', trim($adminName));
                                $initials = strtoupper(mb_substr($parts[0] ?? 'A',0,1) . (isset($parts[1]) ? mb_substr($parts[1],0,1) : ''));
                            @endphp
                            <button class="btn border-0 d-flex align-items-center gap-2 px-3 py-1 rounded-pill shadow-sm profile-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="avatar-circle">{{ $initials }}</span>
                                <span class="fw-semibold d-none d-sm-inline" style="color: var(--primary-color)">{{ $adminName }}</span>
                                <i class="fas fa-chevron-down small ms-1" style="color: var(--primary-color)"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end profile-menu">
                                <li class="dropdown-header small px-3 pt-2 pb-1">Masuk sebagai</li>
                                <li class="px-3 pb-2"><span class="fw-semibold">{{ $adminName }}</span></li>
                                <li><hr class="dropdown-divider"></li>
                                <li><a class="dropdown-item d-flex align-items-center" href="{{ route('admin.password.edit') }}"><i class="fas fa-lock me-2" style="color: var(--primary-color)"></i> Ganti Password</a></li>
                                <li><a class="dropdown-item d-flex align-items-center" href="#"><i class="fas fa-cog me-2" style="color: var(--primary-color)"></i> Pengaturan</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item d-flex align-items-center" style="color: var(--accent-color)">
                                            <i class="fas fa-sign-out-alt me-2" style="color: var(--accent-color)"></i> Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </nav>
        @endif
        
        <div class="content-wrapper">
            @yield('content')
        </div>
        
        @if(session('admin_logged_in'))
        <footer class="mt-5 pt-3 pb-2 text-center text-muted border-top">
            <p>&copy; {{ date('Y') }} SDIT Lukmanalhakim - Admin Panel</p>
        </footer>
        @endif
    </div>
</div>

<!-- jQuery -->
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  // Set CSRF token for all jQuery AJAX requests globally
  (function() {
    var tokenMeta = document.querySelector('meta[name="csrf-token"]');
    if (tokenMeta && window.jQuery) {
      $.ajaxSetup({
        headers: {
          'X-CSRF-TOKEN': tokenMeta.getAttribute('content'),
          'X-Requested-With': 'XMLHttpRequest'
        }
      });
    }
  })();
</script>
<!-- Bootstrap JS Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<!-- SweetAlert2 Core -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
document.addEventListener('DOMContentLoaded', function() {
    const sidebar = document.getElementById('sidebar');
    const content = document.getElementById('content');
    const sidebarCollapse = document.getElementById('sidebarCollapse');
    
    if (sidebarCollapse) {
        sidebarCollapse.addEventListener('click', function() {
            sidebar.classList.toggle('active');
            content.classList.toggle('active');
        });
    }
    
    // Handle window resize
    window.addEventListener('resize', function() {
        if (window.innerWidth > 768) {
            sidebar.classList.remove('active');
            content.classList.remove('active');
        }
    });
});
</script>
<script>
// Global toast & alert for flash messages and validation errors
document.addEventListener('DOMContentLoaded', function() {
  if (typeof Swal === 'undefined') return;
  const toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3500,
    timerProgressBar: true,
    showCloseButton: true,
    customClass: {
      popup: 'shadow'
    }
  });

  // Flash messages
  @if(session('success'))
    toast.fire({ icon: 'success', title: @json(session('success')) });
  @endif
  @if(session('error'))
    toast.fire({ icon: 'error', title: @json(session('error')) });
  @endif
  @if(session('warning'))
    toast.fire({ icon: 'warning', title: @json(session('warning')) });
  @endif
  @if(session('info'))
    toast.fire({ icon: 'info', title: @json(session('info')) });
  @endif

  // Validation errors (if any)
  @if($errors->any())
    Swal.fire({
      icon: 'error',
      title: 'Terjadi Kesalahan Validasi',
      html: `{!! implode('', $errors->all('<div class="text-start">• :message</div>')) !!}`,
      confirmButtonText: 'Mengerti',
      confirmButtonColor: '#27ae60',
      width: 520
    });
  @endif
});
</script>
@stack('scripts')
@yield('scripts')
</body>
</html>
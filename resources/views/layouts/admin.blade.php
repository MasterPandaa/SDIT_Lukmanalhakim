<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel - SDIT Lukmanalhakim</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&family=Poppins:wght@400;500;600;700&display=swap" rel="stylesheet">
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
        }
        .sidebar .position-sticky {
            position: relative;
            height: 100vh;
            overflow-y: auto;
            padding-bottom: 1rem;
        }
        .sidebar .position-sticky::-webkit-scrollbar {
            width: 6px;
        }
        .sidebar .position-sticky::-webkit-scrollbar-thumb {
            background: rgba(255,255,255,0.2);
            border-radius: 3px;
        }
        .sidebar .position-sticky {
            scrollbar-width: thin;
            scrollbar-color: rgba(255,255,255,0.2) rgba(255,255,255,0.1);
        }
        .sidebar-header {
            position: sticky;
            top: 0;
            background: linear-gradient(135deg, var(--primary-color), #219150);
            padding: 1.5rem 1rem;
            text-align: center;
            z-index: 2;
            margin-bottom: 1rem;
        }
        .logo-text {
            font-family: 'Poppins', sans-serif;
            font-weight: 700;
            font-size: 1.5rem;
            color: white;
            text-shadow: 1px 1px 3px rgba(0,0,0,0.2);
        }
        .admin-profile {
            position: sticky;
            top: 85px;
            background: rgba(0,0,0,0.1);
            margin: 0 15px 1rem 15px;
            padding: 1.2rem;
            border-radius: 10px;
            z-index: 1;
            display: flex;
            align-items: center;
        }
        .admin-avatar {
            width: 52px;
            height: 52px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--secondary-color), #f1c40f);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 1rem;
            box-shadow: 0 4px 8px rgba(0,0,0,0.2);
        }
        .admin-avatar i {
            font-size: 1.5rem;
            color: white;
        }
        .admin-info h6 {
            margin: 0;
            font-weight: 600;
            color: white;
        }
        .admin-info p {
            margin: 0;
            font-size: 0.85rem;
            opacity: 0.8;
        }
        .sidebar-divider {
            height: 1px;
            background: rgba(255,255,255,0.2);
            margin: 1rem 15px;
        }
        .sidebar-heading {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: rgba(255,255,255,0.7);
            margin: 1rem 15px 0.5rem 15px;
        }
        .sidebar .nav-item { margin: 0; }
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
        
        /* Modern Header Styles */
        .modern-header {
            background: linear-gradient(135deg, #ffffff 0%, #f8f9fa 100%);
            border-bottom: 1px solid #e9ecef;
            box-shadow: 0 2px 10px rgba(0,0,0,0.08);
            padding: 1rem 0;
            position: sticky;
            top: 0;
            z-index: 1000;
        }
        
        .sidebar-toggle {
            color: var(--dark-color);
            font-size: 1.2rem;
            padding: 0.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .sidebar-toggle:hover {
            background: rgba(39, 174, 96, 0.1);
            color: var(--primary-color);
        }
        
        .page-title-wrapper {
            display: flex;
            flex-direction: column;
        }
        
        .page-title {
            font-size: 1.5rem;
            font-weight: 700;
            color: var(--dark-color);
            margin: 0;
        }
        
        .breadcrumb-wrapper {
            margin-top: 0.25rem;
            text-align: center;
        }
        
        .breadcrumb {
            background: transparent;
            padding: 0;
            margin: 0;
            justify-content: center;
        }
        
        .breadcrumb-item a {
            color: var(--primary-color);
            text-decoration: none;
            font-size: 1rem;
            font-weight: 500;
        }
        
        .breadcrumb-item.active {
            color: var(--primary-color);
            font-size: 1rem;
            font-weight: 500;
            text-decoration: none;
        }
        
        .breadcrumb-item.active::before {
            color: #6c757d;
            font-weight: normal;
        }
        
        /* Ensure all breadcrumb separators have consistent styling */
        .breadcrumb-item + .breadcrumb-item::before {
            color: #6c757d;
            font-weight: normal;
            font-size: 1rem;
        }
        
        .header-actions {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        
        /* Date Time Display */
        .datetime-wrapper {
            background: linear-gradient(135deg, var(--primary-color), #219150);
            padding: 0.5rem 1rem;
            border-radius: 25px;
            color: white;
        }
        
        .datetime-display {
            display: flex;
            align-items: center;
            font-size: 0.9rem;
            font-weight: 500;
        }
        
        .datetime-display .date {
            margin-right: 0.5rem;
        }
        
        .datetime-display .time {
            font-weight: 600;
        }
        
        /* User Profile */
        .user-profile-btn {
            display: flex;
            align-items: center;
            color: var(--dark-color);
            text-decoration: none;
            padding: 0.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
        }
        
        .user-profile-btn:hover {
            background: rgba(39, 174, 96, 0.1);
            color: var(--primary-color);
        }
        
        .user-avatar {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            background: linear-gradient(135deg, var(--primary-color), #219150);
            display: flex;
            align-items: center;
            justify-content: center;
            margin-right: 0.75rem;
            color: white;
            font-size: 1.2rem;
        }
        
        .user-info {
            display: flex;
            flex-direction: column;
            text-align: left;
        }
        
        .user-name {
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--dark-color);
        }
        
        .user-role {
            font-size: 0.75rem;
            color: #6c757d;
        }
        
        .user-dropdown {
            min-width: 200px;
            border: none;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            border-radius: 12px;
        }
        
        /* Content Area */
        #content {
            margin-left: 280px;
            transition: all 0.3s;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }
        
        #content.active {
            margin-left: 0;
        }
        
        .content-wrapper {
            flex: 1;
            padding: 2rem;
        }
        
        /* Responsive */
        @media (max-width: 768px) {
            .sidebar {
                margin-left: -280px;
            }
            .sidebar.active {
                margin-left: 0;
            }
            #content {
                margin-left: 0;
            }
            .header-actions {
                gap: 0.5rem;
            }
            .datetime-wrapper {
                display: none;
            }
        }
        
        /* Gradient Classes */
        .bg-gradient-primary {
            background: linear-gradient(135deg, var(--primary-color), #219150) !important;
        }
        
        .bg-gradient-success {
            background: linear-gradient(135deg, var(--success-color), #27ae60) !important;
        }
        
        .bg-gradient-info {
            background: linear-gradient(135deg, var(--info-color), #2980b9) !important;
        }
        
        .bg-gradient-warning {
            background: linear-gradient(135deg, var(--warning-color), #f39c12) !important;
        }
        
        .bg-gradient-danger {
            background: linear-gradient(135deg, var(--danger-color), #c0392b) !important;
        }
        
        /* Additional Modern Styles */
        .card {
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.07);
            transition: all 0.3s ease;
        }
        
        .card:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }
        
        .table {
            border-radius: 8px;
            overflow: hidden;
        }
        
        .table thead th {
            border: none;
            font-weight: 600;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 0.5px;
        }
        
        .btn {
            border-radius: 8px;
            font-weight: 500;
            transition: all 0.3s ease;
        }
        
        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        .nav-tabs {
            border-bottom: 2px solid #e9ecef;
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
        
        .modal-content {
            border-radius: 12px;
            border: none;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.1);
        }
        
        .modal-header {
            border-bottom: 1px solid #e9ecef;
            border-radius: 12px 12px 0 0;
        }
        
        .form-control, .form-select {
            border-radius: 8px;
            border: 1px solid #e9ecef;
            transition: all 0.3s ease;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(39, 174, 96, 0.25);
        }
        
        .badge {
            border-radius: 6px;
            font-weight: 500;
            padding: 0.5em 0.75em;
        }
        
        .alert {
            border-radius: 8px;
            border: none;
        }
        
        /* Overlay for mobile */
        .overlay {
            display: none;
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 998;
        }
        
        .overlay.active { 
            display: block; 
        }
    </style>
</head>
<body>
<div class="wrapper">
    @if(session('admin_logged_in'))
    <!-- Sidebar -->
    <nav id="sidebar" class="sidebar">
        <div class="position-sticky">
            <div class="sidebar-header">
                <h4 class="logo-text mb-1">SDIT Lukmanalhakim</h4>
                <p class="text-light opacity-75 small">Admin Panel</p>
            </div>
            <!-- Admin Profile -->
            <div class="nav-content">
                <div class="sidebar-divider"></div>
                <div class="sidebar-heading">Menu Utama</div>
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
                                    <a class="nav-link {{ request()->is('adminpanel/website/header') ? 'active' : '' }}" href="{{ route('admin.website.header') }}">
                                        <i class="fas fa-heading"></i> Header
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('adminpanel/website/footer') ? 'active' : '' }}" href="{{ route('admin.website.footer') }}">
                                        <i class="fas fa-shoe-prints"></i> Footer
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
                                    <a class="nav-link {{ request()->is('adminpanel/profil/sambutan-kepsek*') ? 'active' : '' }}" href="{{ route('admin.profil.sambutan-kepsek') }}">
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
                                <li class="nav-item">
                                    <a class="nav-link {{ request()->is('adminpanel/about/guru*') ? 'active' : '' }}" href="{{ route('admin.about.guru.index') }}">
                                        <i class="fas fa-chalkboard-teacher"></i> Guru
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
                    
                    <div class="sidebar-divider"></div>
                    <div class="sidebar-heading">System</div>
                    
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
                    
                    <div class="sidebar-divider"></div>
                    <div class="sidebar-heading">Pengaturan</div>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-cog"></i> Pengaturan
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-user-shield"></i> Profil Admin
                        </a>
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
            </div>
        </div>
    </nav>
    @endif
    <!-- Main Content -->
    <div id="content">
        @if(session('admin_logged_in'))
        <!-- Modern Header -->
        <nav class="navbar navbar-expand-lg modern-header">
            <div class="container-fluid px-4">
                <!-- Sidebar Toggle -->
                <button type="button" id="sidebarCollapse" class="btn btn-link sidebar-toggle d-md-none">
                    <i class="fas fa-bars"></i>
                </button>
                
                <!-- Page Title -->
                <div class="navbar-brand">
                    <div class="page-title-wrapper">
                        <div class="breadcrumb-wrapper">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                    <li class="breadcrumb-item"><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                                    @if(request()->is('adminpanel/website*'))
                                        <li class="breadcrumb-item"><a href="#">Website</a></li>
                                        @if(request()->is('adminpanel/website/home'))
                                            <li class="breadcrumb-item active">Home</li>
                                        @elseif(request()->is('adminpanel/website/header'))
                                            <li class="breadcrumb-item active">Header</li>
                                        @elseif(request()->is('adminpanel/website/footer'))
                                            <li class="breadcrumb-item active">Footer</li>
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
                    </div>
                </div>
                
                <!-- Header Actions -->
                <div class="navbar-nav ms-auto header-actions">
                    <!-- Date & Time -->
                    <div class="nav-item me-3">
                        <div class="datetime-wrapper">
                            <div class="datetime-display">
                                <i class="fas fa-calendar-alt me-2"></i>
                                <span class="date">{{ date('d M Y') }}</span>
                                <span class="time" id="current-time">{{ date('H:i:s') }}</span>
                            </div>
                        </div>
                    </div>
                    
                    <!-- User Profile -->
                    <div class="nav-item">
                        <div class="dropdown">
                            <button class="btn btn-link user-profile-btn" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <div class="user-avatar">
                                    <i class="fas fa-user-circle"></i>
                                </div>
                                <div class="user-info">
                                    <span class="user-name">{{ session('admin_name') ?? 'Admin' }}</span>
                                    <span class="user-role">Administrator</span>
                                </div>
                                <i class="fas fa-chevron-down ms-2"></i>
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end user-dropdown">
                                <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i>Profil Saya</a></li>
                                <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i>Pengaturan</a></li>
                                <li><hr class="dropdown-divider"></li>
                                <li>
                                    <form action="{{ route('admin.logout') }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="fas fa-sign-out-alt me-2"></i>Logout
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
<div class="overlay"></div>
<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const sidebar = document.getElementById('sidebar');
        const content = document.getElementById('content');
        const sidebarCollapse = document.getElementById('sidebarCollapse');
        const overlay = document.querySelector('.overlay');
        
        // Real-time clock
        function updateClock() {
            const now = new Date();
            const timeString = now.toLocaleTimeString('id-ID', {
                hour: '2-digit',
                minute: '2-digit',
                second: '2-digit'
            });
            const timeElement = document.getElementById('current-time');
            if (timeElement) {
                timeElement.textContent = timeString;
            }
        }
        
        // Update clock every second
        setInterval(updateClock, 1000);
        updateClock(); // Initial call
        
        function toggleSidebar() {
            sidebar.classList.toggle('active');
            content.classList.toggle('active');
            if (overlay) {
            overlay.classList.toggle('active');
            }
        }
        
        if (sidebarCollapse) {
            sidebarCollapse.addEventListener('click', toggleSidebar);
        }
        
        if (overlay) {
            overlay.addEventListener('click', toggleSidebar);
        }
        
        function handleResize() {
            if (window.innerWidth > 768) {
                sidebar.classList.remove('active');
                content.classList.remove('active');
                if (overlay) {
                overlay.classList.remove('active');
                }
            }
        }
        
        window.addEventListener('resize', handleResize);
        
        // User profile dropdown enhancement
        const userProfileBtn = document.querySelector('.user-profile-btn');
        if (userProfileBtn) {
            userProfileBtn.addEventListener('click', function() {
                // Add any user profile-specific functionality here
                console.log('User profile clicked');
            });
        }
        
        // Add smooth scrolling to breadcrumb links
        const breadcrumbLinks = document.querySelectorAll('.breadcrumb-item a');
        breadcrumbLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                const href = this.getAttribute('href');
                if (href && href !== '#') {
                    window.location.href = href;
                }
            });
        });
    });
</script>
@yield('scripts')
</body>
</html> 
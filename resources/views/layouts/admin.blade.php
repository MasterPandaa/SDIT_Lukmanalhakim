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
            font-weight: bold;
            margin-right: 12px;
            font-size: 1.3rem;
        }
        .sidebar-divider {
            height: 1px;
            background: rgba(255,255,255,0.1);
            margin: 1rem 15px;
        }
        .sidebar-heading {
            color: rgba(255,255,255,0.6);
            font-size: 0.8rem;
            text-transform: uppercase;
            letter-spacing: 1px;
            padding: 0.5rem 1.5rem;
            margin-top: 1rem;
        }
        .sidebar .nav-link {
            color: rgba(255, 255, 255, 0.85);
            padding: 0.85rem 1.5rem;
            font-size: 1.05rem;
            border-radius: 5px;
            margin: 3px 0;
            transition: all 0.3s ease;
            display: flex;
            align-items: center;
            width: 100%;
            box-sizing: border-box;
        }
        .sidebar .nav-link:hover {
            color: #fff;
            background-color: rgba(255, 255, 255, 0.15);
            transform: translateX(5px);
        }
        .sidebar .nav-link.active {
            color: #fff;
            background-color: var(--secondary-color);
            box-shadow: 0 2px 5px rgba(0,0,0,0.2);
            font-weight: bold;
        }
        .sidebar .nav-link i {
            margin-right: 12px;
            width: 24px;
            text-align: center;
            font-size: 1.1rem;
        }
        .sidebar .nav-item { margin: 0; }
        .nav-content { padding-bottom: 1rem; }
        .overlay {
            display: none;
            position: fixed;
            top: 0; left: 0; right: 0; bottom: 0;
            background: rgba(0,0,0,0.5);
            z-index: 998;
        }
        .overlay.active { display: block; }
        #content {
            width: calc(100% - 280px);
            min-height: 100vh;
            transition: all 0.3s;
            position: absolute;
            top: 0;
            right: 0;
            padding: 20px;
        }
        #content.active { width: 100%; }
        .navbar {
            background-color: #fff;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
            padding: 1rem;
            margin-bottom: 2rem;
            border-radius: 10px;
        }
        .content-wrapper { padding: 20px; }
        .page-title {
            font-size: 1.5rem;
            font-weight: 600;
            color: var(--dark-color);
            margin: 0;
        }
        @media (max-width: 900px) {
            .sidebar { min-width: 220px; max-width: 220px; }
            #content { width: calc(100% - 220px); }
        }
        @media (max-width: 768px) {
            .sidebar { margin-left: -280px; }
            .sidebar.active { margin-left: 0; }
            #content { width: 100%; }
            #content.active { width: calc(100% - 280px); }
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
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('adminpanel/sambutan-kepsek') ? 'active' : '' }}" href="{{ route('admin.sambutan-kepsek') }}">
                            <i class="fas fa-user-tie"></i> Sambutan Kepsek
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('adminpanel/kurikulum*') ? 'active' : '' }}" href="{{ route('admin.kurikulum') }}">
                            <i class="fas fa-book-open"></i> Kurikulum
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('adminpanel/artikel*') ? 'active' : '' }}" href="{{ route('admin.artikel.index') }}">
                            <i class="fas fa-newspaper"></i> Artikel
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-graduation-cap"></i> Program
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            <i class="fas fa-chalkboard-teacher"></i> Guru
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->is('adminpanel/alumni*') ? 'active' : '' }}" href="{{ route('admin.alumni.index') }}">
                            <i class="fas fa-user-graduate"></i> Alumni
                        </a>
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
        <nav class="navbar">
            <div class="container-fluid px-0">
                <button type="button" id="sidebarCollapse" class="d-md-none">
                    <i class="fas fa-bars"></i>
                </button>
                <div class="d-flex align-items-center">
                    <h1 class="page-title mb-0">@yield('title')</h1>
                </div>
                <div class="d-flex align-items-center">
                    <button type="button" class="btn btn-sm btn-outline-secondary">
                        <i class="fas fa-calendar-alt me-1"></i> {{ date('d M Y') }}
                    </button>
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
        function toggleSidebar() {
            sidebar.classList.toggle('active');
            content.classList.toggle('active');
            overlay.classList.toggle('active');
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
                overlay.classList.remove('active');
            }
        }
        window.addEventListener('resize', handleResize);
    });
</script>
@yield('scripts')
</body>
</html> 
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
        html {
            min-height: 100vh;
            min-height: 700px;
        }
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
            flex-shrink: 0;
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
            flex-shrink: 0;
        }
        .sidebar-heading {
            font-size: 0.75rem;
            font-weight: 600;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            color: rgba(255,255,255,0.7);
            margin: 1rem 15px 0.5rem 15px;
            flex-shrink: 0;
        }
        .sidebar .nav-item { 
            margin: 0; 
            flex-shrink: 0;
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
            flex-shrink: 0;
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
        
        .nav-content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        
        .nav-content .nav {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        
        .nav-content .nav .nav-item {
            flex-shrink: 0;
        }
        .sidebar .collapse.show .nav-link .ms-auto {
            transform: rotate(180deg);
        }
        .sidebar .collapse .nav-link {
            padding-left: 2.5rem;
            font-size: 0.9rem;
            flex-shrink: 0;
        }
        .sidebar .collapse .nav-link:hover {
            background: rgba(255,255,255,0.05);
        }
        
        .sidebar .collapse ul {
            flex-shrink: 0;
        }
        
        .sidebar .collapse ul li {
            flex-shrink: 0;
        }
        
        .sidebar .collapse ul li a {
            flex-shrink: 0;
        }
        
        .sidebar .collapse ul li a i {
            flex-shrink: 0;
        }
        
        .sidebar .collapse ul li a span {
            flex-shrink: 0;
        }
        
        .sidebar .collapse ul li a text {
            flex-shrink: 0;
        }
        
        .sidebar .collapse ul li a textContent {
            flex-shrink: 0;
        }
        
        .sidebar .collapse ul li a textContent {
            flex-shrink: 0;
        }
        
        /* Modern Header Styles */
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
        
        .modern-header .container-fluid {
            display: flex;
            align-items: center;
            width: 100%;
            padding-left: 1rem;
            padding-right: 1rem;
        }
        
        .sidebar-toggle {
            color: var(--dark-color);
            font-size: 1.1rem;
            padding: 0.5rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            border: none;
            background: transparent;
        }
        
        .sidebar-toggle:hover {
            background: rgba(39, 174, 96, 0.1);
            color: var(--primary-color);
        }
        
        .page-title-wrapper {
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            justify-content: center;
        }
        
        .page-title {
            font-size: 1.4rem;
            font-weight: 700;
            color: var(--dark-color);
            margin: 0;
            text-shadow: 0 1px 2px rgba(0,0,0,0.1);
        }
        
        .h3 {
            font-size: 1.75rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 1rem;
        }
        
        .h1 {
            font-size: 2rem;
            font-weight: 700;
            color: var(--dark-color);
            margin-bottom: 1rem;
        }
        
        .d-sm-flex {
            display: flex !important;
        }
        
        .align-items-center {
            align-items: center !important;
        }
        
        .justify-content-between {
            justify-content: space-between !important;
        }
        
        .text-gray-800 {
            color: var(--dark-color) !important;
        }
        
        .breadcrumb-wrapper {
            margin-top: 0.5rem;
            text-align: left;
            max-width: 100%;
            overflow: hidden;
            padding-left: 0;
        }
        
        .breadcrumb {
            background: transparent;
            padding: 0;
            margin: 0;
            justify-content: flex-start;
            flex-wrap: wrap;
            max-width: 100%;
        }
        
        .breadcrumb-item {
            max-width: 200px;
            overflow: hidden;
            text-overflow: ellipsis;
            white-space: nowrap;
            margin-right: 0.5rem;
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
            font-size: 0.95rem;
            font-weight: 500;
        }
        
        .breadcrumb-item.active {
            color: var(--primary-color);
            font-size: 0.95rem;
            font-weight: 600;
            text-decoration: none;
        }
        
        .breadcrumb-item.active::before {
            color: #6c757d;
            font-weight: normal;
            font-size: 0.95rem;
        }
        
        /* Ensure all breadcrumb separators have consistent styling */
        .breadcrumb-item + .breadcrumb-item::before {
            color: #6c757d;
            font-weight: normal;
            font-size: 0.95rem;
        }
        
        .header-actions {
            display: flex;
            align-items: center;
            gap: 0.5rem;
            margin-left: auto;
            margin-right: 3rem;
            flex-shrink: 0;
            max-width: 400px;
        }
        
        /* Date Time Display */
        .datetime-wrapper {
            background: linear-gradient(135deg, var(--primary-color), #219150);
            padding: 0.6rem 1.2rem;
            border-radius: 20px;
            color: white;
            font-size: 0.9rem;
            box-shadow: 0 2px 8px rgba(39, 174, 96, 0.3);
            min-width: 180px;
            max-width: 350px;
            flex-shrink: 0;
            display: flex;
            align-items: center;
        }
        
        .datetime-display {
            display: flex;
            align-items: center;
            font-size: 0.9rem;
            font-weight: 500;
            white-space: nowrap;
            overflow: hidden;
        }
        
        .datetime-display i {
            font-size: 0.8rem;
            margin-right: 0.3rem;
        }
        
        /* Ensure header elements don't get too large */
        .modern-header .navbar-brand {
            max-width: 100%;
            flex: 1;
            margin-right: 0;
            padding: 0;
        }
        
        .modern-header .header-actions {
            max-width: 40%;
            flex-shrink: 0;
        }
        
        /* Responsive header adjustments */
        @media (max-width: 1200px) {
            .modern-header .navbar-brand {
                max-width: 50%;
            }
            .modern-header .header-actions {
                max-width: 50%;
            }
        }
        
        @media (max-width: 992px) {
            .modern-header .navbar-brand {
                max-width: 45%;
            }
            .modern-header .header-actions {
                max-width: 55%;
            }
        }
        
        .datetime-display .date {
            margin-right: 0.5rem;
            white-space: nowrap;
        }
        
        .datetime-display .time {
            font-weight: 600;
            white-space: nowrap;
        }
        
        /* User Profile */
        .user-profile-btn {
            display: flex;
            align-items: center;
            color: var(--dark-color);
            text-decoration: none;
            padding: 0.6rem;
            border-radius: 8px;
            transition: all 0.3s ease;
            min-width: 180px;
            max-width: 220px;
            flex-shrink: 0;
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
            font-size: 1.1rem;
            box-shadow: 0 2px 8px rgba(39, 174, 96, 0.3);
            flex-shrink: 0;
        }
        
        .user-avatar i {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 100%;
            height: 100%;
            padding-left: 7px;
        }
        
        .user-info {
            display: flex;
            flex-direction: column;
            text-align: left;
            min-width: 0;
            flex: 1;
        }
        
        .user-name {
            font-weight: 600;
            font-size: 0.9rem;
            color: var(--dark-color);
            line-height: 1.2;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 100px;
        }
        
        .user-role {
            font-size: 0.8rem;
            color: #6c757d;
            line-height: 1.2;
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            max-width: 120px;
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
        
        /* Container improvements */
        .container-fluid {
            width: 100%;
            margin: 0;
            padding-left: 1rem;
            padding-right: 1rem;
            background-color: transparent;
            box-sizing: border-box;
        }
        
        /* Ensure content fills available space */
        .content-wrapper .container-fluid {
            width: 100%;
            max-width: none;
        }
        
        .content-wrapper .row {
            width: 100%;
            margin: 0;
        }
        
        .content-wrapper .col-12 {
            width: 100%;
            padding: 0;
        }
        
        /* Ensure full width content */
        .content-wrapper > * {
            width: 100%;
        }
        
        /* Fix for empty right side */
        #content {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        
        .content-wrapper {
            flex: 1;
            display: flex;
            flex-direction: column;
        }
        
        /* Ensure cards and forms take full width */
        .card {
            width: 100%;
        }
        
        form {
            width: 100%;
        }
        
        .table-responsive {
            width: 100%;
        }
        
        /* Fix for empty right side - ensure content fills entire width */
        html, body {
            width: 100%;
            overflow-x: hidden;
            margin: 0;
            padding: 0;
        }
        
        * {
            box-sizing: border-box;
        }
        
        .wrapper {
            width: 100%;
            max-width: 100%;
        }
        
        #content {
            width: calc(100% - 280px);
            max-width: calc(100% - 280px);
            position: relative;
        }
        
        #content.active {
            width: 100%;
            max-width: 100%;
        }
        
        /* Ensure all content elements take full width */
        .content-wrapper,
        .container-fluid,
        .row,
        .col-12,
        .card,
        form,
        .table-responsive {
            width: 100% !important;
            max-width: 100% !important;
            box-sizing: border-box;
        }
        
        /* Additional fixes for content width */
        .content-wrapper > *,
        .container-fluid > *,
        .row > * {
            width: 100% !important;
            max-width: 100% !important;
        }
        
        /* Ensure tables and forms don't overflow */
        .table {
            width: 100% !important;
            max-width: 100% !important;
        }
        
        .form-control,
        .form-select,
        .btn {
            max-width: 100% !important;
        }
        
        @media (max-width: 768px) {
            .container-fluid {
                padding-left: 0.5rem;
                padding-right: 0.5rem;
            }
        }
        
        .container-fluid {
            max-width: 1400px;
            margin: 0 auto;
        }
        
        /* Responsive */
        @media (max-width: 1024px) {
            .sidebar {
                margin-left: -280px;
            }
            .sidebar.active {
                margin-left: 0;
            }
            #content {
                margin-left: 0;
                width: 100% !important;
                max-width: 100% !important;
                left: 0;
                right: 0;
            }
            .content-wrapper {
                padding: 1rem;
                width: 100% !important;
                max-width: 100% !important;
            }
            .header-actions {
                gap: 0.5rem;
            }
            .datetime-wrapper {
                display: none;
            }
            .container-fluid {
                padding-left: 0.5rem;
                padding-right: 0.5rem;
                width: 100% !important;
                max-width: 100% !important;
            }
        }
        
        @media (max-width: 768px) {
            .content-wrapper {
                padding: 0.75rem;
                width: 100% !important;
            }
            .page-title {
                font-size: 1.1rem;
            }
            .breadcrumb {
                font-size: 0.8rem;
            }
            .card-body {
                padding: 1rem;
            }
            .d-sm-flex {
                flex-direction: column;
                align-items: flex-start !important;
            }
            .d-sm-flex .btn {
                margin-top: 1rem;
                margin-left: 0;
            }
            .container-fluid {
                padding-left: 0.25rem;
                padding-right: 0.25rem;
                width: 100% !important;
            }
            .header-actions {
                gap: 0.5rem;
            }
            .user-avatar {
                width: 32px;
                height: 32px;
                font-size: 0.9rem;
            }
            .user-name {
                font-size: 0.8rem;
            }
            .user-role {
                font-size: 0.7rem;
            }
            .datetime-wrapper {
                padding: 0.4rem 0.8rem;
                font-size: 0.8rem;
            }
            .datetime-display {
                font-size: 0.8rem;
            }
            .modern-header .navbar-brand {
                max-width: 40%;
            }
            .modern-header .header-actions {
                max-width: 60%;
            }
            .breadcrumb-item {
                max-width: 150px;
            }
            .modern-header {
                padding: 1rem 0;
                min-height: 70px;
            }
        }
        
        @media (max-width: 576px) {
            .content-wrapper {
                padding: 0.5rem;
                width: 100% !important;
            }
            .page-title {
                font-size: 1rem;
            }
            .breadcrumb {
                font-size: 0.75rem;
            }
            .card-body {
                padding: 0.75rem;
            }
            .container-fluid {
                padding-left: 0.25rem;
                padding-right: 0.25rem;
                width: 100% !important;
            }
            .header-actions {
                gap: 0.5rem;
            }
            .user-avatar {
                width: 28px;
                height: 28px;
                font-size: 0.8rem;
                margin-right: 0.5rem;
            }
            .user-name {
                font-size: 0.75rem;
            }
            .user-role {
                font-size: 0.65rem;
            }
            .datetime-wrapper {
                padding: 0.3rem 0.6rem;
                font-size: 0.7rem;
            }
            .datetime-display {
                font-size: 0.7rem;
            }
            .modern-header .navbar-brand {
                max-width: 35%;
            }
            .modern-header .header-actions {
                max-width: 65%;
            }
            .breadcrumb-item {
                max-width: 120px;
            }
            .modern-header {
                padding: 0.75rem 0;
                min-height: 60px;
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
            border: none;
            background: #ffffff;
            margin-bottom: 1.5rem;
        }
        
        .card:hover {
            box-shadow: 0 8px 25px rgba(0, 0, 0, 0.1);
            transform: translateY(-2px);
        }
        
        .card-header {
            background: linear-gradient(135deg, #f8f9fa 0%, #e9ecef 100%);
            border-bottom: 1px solid #dee2e6;
            border-radius: 12px 12px 0 0 !important;
            padding: 1rem 1.5rem;
        }
        
        .card-header h6 {
            margin: 0;
            font-weight: 600;
            color: var(--dark-color);
        }
        
        .card-body {
            padding: 2rem;
        }
        
        @media (max-width: 768px) {
            .card-body {
                padding: 1.5rem;
            }
        }
        
        @media (max-width: 576px) {
            .card-body {
                padding: 1rem;
            }
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
            padding: 0.75rem 1.5rem;
            font-size: 0.95rem;
            border: none;
        }
        
        .btn:hover {
            transform: translateY(-1px);
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
        }
        
        .btn-success {
            background: linear-gradient(135deg, var(--success-color), #27ae60);
            color: white;
        }
        
        .btn-success:hover {
            background: linear-gradient(135deg, #27ae60, #229954);
            color: white;
        }
        
        .btn-primary {
            background: linear-gradient(135deg, var(--primary-color), #219150);
            color: white;
        }
        
        .btn-primary:hover {
            background: linear-gradient(135deg, #219150, #1e8449);
            color: white;
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
            padding: 0.75rem 1rem;
            font-size: 0.95rem;
        }
        
        .form-control:focus, .form-select:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(39, 174, 96, 0.25);
            background-color: #fff;
        }
        
        .form-label, label {
            font-weight: 600;
            color: var(--dark-color);
            margin-bottom: 0.5rem;
            flex-shrink: 0;
        }
        
        .form-group {
            margin-bottom: 2rem;
        }
        
        .form-group:last-child {
            margin-bottom: 0;
        }
        
        textarea.form-control {
            min-height: 120px;
            resize: vertical;
        }
        
        .badge {
            border-radius: 6px;
            font-weight: 500;
            padding: 0.5em 0.75em;
        }
        
        .alert {
            border-radius: 8px;
            border: none;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
        }
        
        .alert-success {
            background: linear-gradient(135deg, #d4edda, #c3e6cb);
            color: #155724;
            border-left: 4px solid var(--success-color);
        }
        
        .alert-danger {
            background: linear-gradient(135deg, #f8d7da, #f5c6cb);
            color: #721c24;
            border-left: 4px solid var(--danger-color);
        }
        
        .alert-dismissible .close {
            padding: 0.75rem 1.25rem;
            margin: -0.75rem -1.25rem -0.75rem auto;
        }
        
        .alert-dismissible .close:hover {
            opacity: 0.75;
        }
        
        .alert .d-flex {
            align-items: flex-start;
        }
        
        .alert .d-flex i {
            margin-top: 0.125rem;
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
        
        /* Additional utility classes */
        .shadow-sm {
            box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075) !important;
        }
        
        .shadow {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        }
        
        .mb-4 {
            margin-bottom: 1.5rem !important;
        }
        
        .mb-0 {
            margin-bottom: 0 !important;
        }
        
        .mr-2 {
            margin-right: 0.5rem !important;
        }
        
        .mr-3 {
            margin-right: 1rem !important;
        }
        
        .fa-lg {
            font-size: 1.25rem !important;
        }
        
        .text-success {
            color: var(--success-color) !important;
        }
        
        .font-weight-bold {
            font-weight: 700 !important;
        }
        
        /* Additional improvements for better content display */
        .row {
            margin-left: 0;
            margin-right: 0;
        }
        
        .col-12 {
            padding-left: 0;
            padding-right: 0;
        }
        
        /* Ensure proper spacing in forms */
        .form-group:last-child {
            margin-bottom: 0;
        }
        
        /* Better card styling */
        .card.shadow {
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
        }
        
        /* Ensure textareas are properly sized */
        textarea.form-control {
            min-height: 150px;
            resize: vertical;
            font-family: inherit;
            line-height: 1.5;
        }
        
        /* Better form styling */
        .form-control:focus {
            border-color: var(--primary-color);
            box-shadow: 0 0 0 0.2rem rgba(39, 174, 96, 0.25);
        }
        
        form {
            width: 100%;
        }
        
        .invalid-feedback {
            display: block;
            width: 100%;
            margin-top: 0.25rem;
            font-size: 0.875rem;
            color: var(--danger-color);
        }
        
        /* Better button spacing */
        .btn {
            margin-right: 0.5rem;
        }
        
        .btn:last-child {
            margin-right: 0;
        }
        
        /* Better button styling */
        .btn i {
            margin-right: 0.5rem;
        }
        
        .btn:last-child i {
            margin-right: 0;
        }
        
        /* Ensure proper spacing in forms */
        .form-group:last-child .btn {
            margin-top: 1rem;
        }
        
        .form-group:last-child {
            margin-bottom: 0;
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
                <div class="d-flex align-items-center justify-content-between w-100">
                    <!-- Left Side: Sidebar Toggle + Breadcrumb -->
                    <div class="d-flex align-items-center">
                        <!-- Sidebar Toggle -->
                        <button type="button" id="sidebarCollapse" class="btn btn-link sidebar-toggle d-md-none me-3">
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
                            </div>
                        </div>
                    </div>
                    
                    <!-- Right Side: Header Actions -->
                    <div class="header-actions">
                        <!-- Date & Time -->
                        <div class="nav-item me-2">
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
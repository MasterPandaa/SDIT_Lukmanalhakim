@extends('layouts.app')

@section('title', 'Kontak Kami')

@push('styles')
<style>
    /* Using global page header; removed custom hero/breadcrumb styles for consistency */
    
    .contact-main-section {
        padding: 100px 0;
        background: #f8f9fa;
    }
    
    .contact-card {
        background: white;
        border-radius: 20px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.1);
        overflow: hidden;
        margin-bottom: 40px;
        transition: transform 0.3s ease, box-shadow 0.3s ease;
    }
    
    .contact-card:hover {
        transform: translateY(-10px);
        box-shadow: 0 30px 80px rgba(0,0,0,0.15);
    }
    
    .map-card {
        height: 500px;
        position: relative;
    }
    
    .map-overlay {
        position: absolute;
        top: 30px;
        left: 30px;
        right: 30px;
        background: rgba(255,255,255,0.95);
        backdrop-filter: blur(10px);
        padding: 25px;
        border-radius: 15px;
        z-index: 10;
        border: 1px solid rgba(0,0,0,0.1);
    }
    
    .map-overlay h4 {
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 8px;
        display: flex;
        align-items: center;
    }
    
    .map-overlay p {
        color: #6c757d;
        margin: 0;
        font-size: 0.95rem;
    }
    
    .map-iframe {
        width: 100%;
        height: 100%;
        border: none;
        border-radius: 20px;
    }
    
    .info-card {
        padding: 50px 40px;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .form-card {
        padding: 50px 40px;
        height: 100%;
    }
    
    .section-title {
        color: #2c3e50;
        font-size: 2rem;
        font-weight: 700;
        margin-bottom: 30px;
        display: flex;
        align-items: center;
        gap: 15px;
    }
    
    .section-title i {
        color: #198754; /* Bootstrap success */
        font-size: 2.2rem;
    }
    
    .contact-info-item {
        display: flex;
        align-items: flex-start;
        gap: 20px;
        padding: 25px 0;
        border-bottom: 1px solid #e9ecef;
        transition: all 0.3s ease;
    }
    
    .contact-info-item:last-child {
        border-bottom: none;
    }
    
    .contact-info-item:hover {
        background: #f8f9fa;
        margin: 0 -20px;
        padding: 25px 20px;
        border-radius: 10px;
    }
    
    .contact-icon {
        width: 50px;
        height: 50px;
        background: #198754; /* Bootstrap success */
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        font-size: 1.4rem;
        flex-shrink: 0;
    }
    
    .contact-info-content h6 {
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 8px;
        font-size: 1.1rem;
    }
    
    .contact-info-content p {
        color: #6c757d;
        margin: 0;
        line-height: 1.6;
    }
    
    .contact-info-content a {
        color: #667eea;
        text-decoration: none;
        transition: color 0.3s ease;
    }
    
    .contact-info-content a:hover {
        color: #764ba2;
    }
    
    .social-section {
        margin-top: 40px;
        padding-top: 30px;
        border-top: 1px solid #e9ecef;
    }
    
    .social-links {
        display: flex;
        gap: 15px;
        flex-wrap: wrap;
    }
    
    .social-link {
        width: 50px;
        height: 50px;
        border-radius: 12px;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-decoration: none;
        font-size: 1.3rem;
        transition: all 0.3s ease;
    }
    
    .social-link.facebook { background: #1877f2; }
    .social-link.instagram { background: linear-gradient(45deg, #f09433 0%,#e6683c 25%,#dc2743 50%,#cc2366 75%,#bc1888 100%); }
    .social-link.youtube { background: #ff0000; }
    
    .social-link:hover {
        transform: translateY(-3px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.2);
        color: white;
    }
    
    .modern-form-group {
        margin-bottom: 25px;
    }
    
    .modern-form-label {
        color: #2c3e50;
        font-weight: 600;
        margin-bottom: 10px;
        display: block;
        font-size: 0.95rem;
    }
    
    .modern-form-control {
        width: 100%;
        padding: 15px 20px;
        border: 2px solid #e9ecef;
        border-radius: 12px;
        font-size: 1rem;
        transition: all 0.3s ease;
        background: #fff;
    }
    
    .modern-form-control:focus {
        outline: none;
        border-color: #667eea;
        box-shadow: 0 0 0 3px rgba(102, 126, 234, 0.1);
        transform: translateY(-2px);
    }
    
    .modern-form-control.is-invalid {
        border-color: #dc3545;
    }
    
    .modern-btn-primary {
        background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
        border: none;
        padding: 18px 40px;
        border-radius: 12px;
        color: white;
        font-weight: 600;
        font-size: 1.1rem;
        width: 100%;
        transition: all 0.3s ease;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 10px;
    }
    
    .modern-btn-primary:hover {
        transform: translateY(-3px);
        box-shadow: 0 15px 35px rgba(102, 126, 234, 0.4);
        color: white;
    }
    
    .modern-alert {
        border: none;
        border-radius: 12px;
        padding: 20px;
        margin-bottom: 30px;
        border-left: 4px solid;
    }
    
    .modern-alert.alert-success {
        background: #d4edda;
        border-left-color: #28a745;
        color: #155724;
    }
    
    .modern-alert.alert-danger {
        background: #f8d7da;
        border-left-color: #dc3545;
        color: #721c24;
    }
    
    .office-hours {
        background: #f8f9fa;
        padding: 15px;
        border-radius: 8px;
        margin-top: 10px;
    }
    
    @media (max-width: 768px) {
        .hero-title {
            font-size: 2.5rem;
        }
        
        .contact-main-section {
            padding: 60px 0;
        }
        
        .info-card, .form-card {
            padding: 30px 25px;
        }
        
        .map-overlay {
            top: 20px;
            left: 20px;
            right: 20px;
            padding: 20px;
        }
        
        .contact-info-item:hover {
            margin: 0 -15px;
            padding: 25px 15px;
        }
    }
</style>
@endpush

@push('styles')
<!-- Leaflet CSS (OpenStreetMap) -->
<link
    rel="stylesheet"
    href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css"
    integrity="sha256-p4NxAoJBhIIN+hmNHrzRCf9tD/miZyoHS5obTRR9BMY="
    crossorigin=""
>
@endpush

@section('content')
<!-- Page Header Section Start -->
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Kontak Kami</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Kontak</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
    
</div>
<!-- Page Header Section Ending -->

<!-- Modern Contact Main Section -->
<div class="contact-main-section">
    <div class="container">
        <!-- Google Map Card -->
        <div class="row mb-5">
            <div class="col-12">
                <div class="contact-card map-card">
                    <div class="map-overlay">
                        <h4>
                            <i class="icofont-location-pin text-primary me-2"></i>
                            Lokasi SDIT Lukmanalhakim
                        </h4>
                        <p>Temukan lokasi sekolah kami dengan mudah melalui peta interaktif di bawah ini</p>
                    </div>
                    @php
                        // Prefer coordinates if available in settings; otherwise use provided coordinates for SDIT Luqman Al Hakim Sleman
                        $lat = $contactSettings->latitude ?? $contactSettings->lat ?? -7.741886660261045;
                        $lng = $contactSettings->longitude ?? $contactSettings->lng ?? 110.37448030397168;
                        $schoolName = 'SD Islam Terpadu Luqman Al Hakim Sleman';
                        $addressText = $contactSettings->address ?? 'Sleman, Daerah Istimewa Yogyakarta';
                    @endphp
                    <div id="osm-map" class="map-iframe" data-lat="{{ $lat }}" data-lng="{{ $lng }}" data-title="{{ $schoolName }}" data-address="{{ $addressText }}"></div>
                </div>
            </div>
        </div>

        <!-- Contact Information and Form -->
        <div class="row">
            <!-- Contact Information Card -->
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="contact-card">
                    <div class="info-card">
                        <h2 class="section-title">
                            <i class="icofont-info-circle text-success"></i>
                            Informasi Kontak
                        </h2>
                        
                        <div class="contact-info-list">
                            <!-- Address -->
                            <div class="contact-info-item">
                                <div class="contact-icon">
                                    <i class="icofont-google-map"></i>
                                </div>
                                <div class="contact-info-content">
                                    <h6>Alamat Sekolah</h6>
                                    <p>{{ $contactSettings->address ?? 'Jl. Raya Sleman No. 123, Sleman, Yogyakarta' }}</p>
                                </div>
                            </div>
                            
                            <!-- Phone -->
                            <div class="contact-info-item">
                                <div class="contact-icon">
                                    <i class="icofont-phone"></i>
                                </div>
                                <div class="contact-info-content">
                                    <h6>Nomor Telepon</h6>
                                    <p><a href="tel:{{ $contactSettings->phone ?? '+62 857-4725-5761' }}">{{ $contactSettings->phone ?? '+62 857-4725-5761' }}</a></p>
                                </div>
                            </div>
                            
                            <!-- Email -->
                            <div class="contact-info-item">
                                <div class="contact-icon">
                                    <i class="icofont-envelope"></i>
                                </div>
                                <div class="contact-info-content">
                                    <h6>Email Resmi</h6>
                                    <p><a href="mailto:{{ $contactSettings->email ?? 'info@sditlukmanalhakim.sch.id' }}">{{ $contactSettings->email ?? 'info@sditlukmanalhakim.sch.id' }}</a></p>
                                </div>
                            </div>
                            
                            <!-- WhatsApp -->
                            @if($contactSettings && $contactSettings->whatsapp)
                            <div class="contact-info-item">
                                <div class="contact-icon">
                                    <i class="icofont-whatsapp"></i>
                                </div>
                                <div class="contact-info-content">
                                    <h6>WhatsApp</h6>
                                    <p><a href="{{ $contactSettings->whatsapp_url }}" target="_blank">{{ $contactSettings->whatsapp }}</a></p>
                                </div>
                            </div>
                            @endif
                            
                            <!-- Office Hours -->
                            @if($contactSettings && $contactSettings->office_hours)
                            <div class="contact-info-item">
                                <div class="contact-icon">
                                    <i class="icofont-clock-time"></i>
                                </div>
                                <div class="contact-info-content">
                                    <h6>Jam Operasional</h6>
                                    <div class="office-hours">
                                        {!! $contactSettings->office_hours !!}
                                    </div>
                                </div>
                            </div>
                            @endif
                        </div>
                        
                        <!-- Social Media Links -->
                        @if($contactSettings && ($contactSettings->facebook || $contactSettings->instagram || $contactSettings->youtube))
                        <div class="social-section">
                            <h6 class="mb-3">
                                <i class="icofont-social-media me-2"></i>
                                Ikuti Media Sosial Kami
                            </h6>
                            <div class="social-links">
                                @if($contactSettings->facebook)
                                    <a href="{{ $contactSettings->facebook }}" target="_blank" class="social-link facebook" title="Facebook">
                                        <i class="icofont-facebook"></i>
                                    </a>
                                @endif
                                @if($contactSettings->instagram)
                                    <a href="{{ $contactSettings->instagram }}" target="_blank" class="social-link instagram" title="Instagram">
                                        <i class="icofont-instagram"></i>
                                    </a>
                                @endif
                                @if($contactSettings->youtube)
                                    <a href="{{ $contactSettings->youtube }}" target="_blank" class="social-link youtube" title="YouTube">
                                        <i class="icofont-youtube"></i>
                                    </a>
                                @endif
                            </div>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
            
            <!-- Contact Form Card -->
            <div class="col-lg-6 col-md-12 mb-4">
                <div class="contact-card">
                    <div class="form-card">
                        <h2 class="section-title">
                            <i class="icofont-ui-message text-success"></i>
                            Kirim Pesan
                        </h2>
                        
                        @if(session('success'))
                            <div class="modern-alert alert-success alert-dismissible fade show" role="alert">
                                <i class="icofont-check-circled me-2"></i>
                                {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        
                        @if($errors->any())
                            <div class="modern-alert alert-danger alert-dismissible fade show" role="alert">
                                <i class="icofont-exclamation-circle me-2"></i>
                                <ul class="mb-0">
                                    @foreach($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif
                        
                        <form action="{{ route('contact.send') }}" method="POST" class="contact-form">
                            @csrf
                            <div class="modern-form-group">
                                <label for="name" class="modern-form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                <input type="text" id="name" name="name" class="modern-form-control @error('name') is-invalid @enderror" placeholder="Masukkan nama lengkap Anda" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="modern-form-group">
                                <label for="email" class="modern-form-label">Alamat Email <span class="text-danger">*</span></label>
                                <input type="email" id="email" name="email" class="modern-form-control @error('email') is-invalid @enderror" placeholder="contoh@email.com" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="modern-form-group">
                                <label for="phone" class="modern-form-label">Nomor Telepon</label>
                                <input type="text" id="phone" name="phone" class="modern-form-control" placeholder="08xxxxxxxxxx" value="{{ old('phone') }}">
                            </div>
                            
                            <div class="modern-form-group">
                                <label for="subject" class="modern-form-label">Subjek Pesan <span class="text-danger">*</span></label>
                                <input type="text" id="subject" name="subject" class="modern-form-control @error('subject') is-invalid @enderror" placeholder="Masukkan subjek pesan" value="{{ old('subject') }}" required>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="modern-form-group">
                                <label for="message" class="modern-form-label">Pesan <span class="text-danger">*</span></label>
                                <textarea id="message" name="message" class="modern-form-control @error('message') is-invalid @enderror" placeholder="Tulis pesan Anda di sini..." rows="6" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            
                            <div class="modern-form-group">
                                <button type="submit" class="btn btn-primary btn-lg w-100">
                                    <i class="icofont-paper-plane me-2"></i>
                                    Kirim Pesan
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Contact Section Ending -->
@push('scripts')
<!-- Leaflet JS (OpenStreetMap) -->
<script
    src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"
    integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo="
    crossorigin="">
</script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        var el = document.getElementById('osm-map');
        if (!el) return;
        var lat = parseFloat(el.getAttribute('data-lat')) || -7.742062092276527;
        var lng = parseFloat(el.getAttribute('data-lng')) || 110.37191077500451;
        var title = el.getAttribute('data-title') || 'Lokasi';
        var address = el.getAttribute('data-address') || '';

        // Initialize map
        var map = L.map('osm-map', {
            zoomControl: true
        }).setView([lat, lng], 17);

        // OSM tiles
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            maxZoom: 19,
            attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
        }).addTo(map);

        // Marker with popup
        var marker = L.marker([lat, lng]).addTo(map);
        marker.bindPopup('<strong>' + title + '</strong><br>' + address).openPopup();

        // Ensure map renders correctly in hidden containers (if any animations)
        setTimeout(function(){ map.invalidateSize(); }, 300);
    });
</script>
@endpush

@endsection
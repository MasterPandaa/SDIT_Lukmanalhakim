@extends('layouts.app')

@section('title', 'Kontak Kami')

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

<!-- Google Map Section Start -->
<div class="map-section">
    <div class="container">
        <div class="map-container">
            <div class="map-header">
                <h4 class="map-title">
                    <i class="icofont-location-pin text-success me-2"></i>
                    Lokasi Kami
                </h4>
                <p class="map-description">Temukan lokasi SDIT Lukmanalhakim dengan mudah</p>
            </div>
            <div class="map-area">
                @if($contactSettings && $contactSettings->google_maps_embed)
                    <iframe src="{{ $contactSettings->google_maps_embed }}" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                @else
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.2675292549946!2d110.3823762!3d-7.7675913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59b2d4729729%3A0xac4d7b5fcf34f8e4!2sSDIT%20Lukmanalhakim%2C%20Sleman%2C%20Daerah%20Istimewa%20Yogyakarta!5e0!3m2!1sid!2sid!4v1627282901237!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- Google Map Section Ending -->

<!-- Contact Section Start -->
<div class="contact-section padding-tb">
    <div class="container">
        <div class="contact-container">
            <div class="section-header text-center mb-5">
                <span class="subtitle">Hubungi Kami</span>
                <h2 class="title">Silakan Kirim Pesan</h2>
                <p class="text-muted">Kami siap membantu Anda dengan pertanyaan atau informasi yang Anda butuhkan</p>
            </div>
            
            <div class="section-wrapper">
                <div class="row justify-content-center">
                    <!-- Contact Information -->
                    <div class="col-lg-6 col-md-6 col-12 mb-4">
                        <div class="contact-info-wrapper">
                            <h4 class="contact-section-title mb-4">
                                <i class="icofont-location-pin text-success me-2"></i>
                                Informasi Kontak
                            </h4>
                            
                            <div class="contact-info-list">
                                <!-- Address -->
                                <div class="contact-info-item">
                                    <div class="contact-info-icon">
                                        <i class="icofont-google-map"></i>
                                    </div>
                                    <div class="contact-info-content">
                                        <h6>Alamat Kami</h6>
                                        <p>{{ $contactSettings->address ?? 'Jl. Raya Sleman No. 123, Sleman, Yogyakarta' }}</p>
                                    </div>
                                </div>
                                
                                <!-- Phone -->
                                <div class="contact-info-item">
                                    <div class="contact-info-icon">
                                        <i class="icofont-phone"></i>
                                    </div>
                                    <div class="contact-info-content">
                                        <h6>Telepon</h6>
                                        <p><a href="tel:{{ $contactSettings->phone ?? '+62 857-4725-5761' }}" class="text-decoration-none">{{ $contactSettings->phone ?? '+62 857-4725-5761' }}</a></p>
                                    </div>
                                </div>
                                
                                <!-- Email -->
                                <div class="contact-info-item">
                                    <div class="contact-info-icon">
                                        <i class="icofont-envelope"></i>
                                    </div>
                                    <div class="contact-info-content">
                                        <h6>Email</h6>
                                        <p><a href="mailto:{{ $contactSettings->email ?? 'info@sditlukmanalhakim.sch.id' }}" class="text-decoration-none">{{ $contactSettings->email ?? 'info@sditlukmanalhakim.sch.id' }}</a></p>
                                    </div>
                                </div>
                                
                                <!-- WhatsApp -->
                                @if($contactSettings && $contactSettings->whatsapp)
                                <div class="contact-info-item">
                                    <div class="contact-info-icon">
                                        <i class="icofont-whatsapp"></i>
                                    </div>
                                    <div class="contact-info-content">
                                        <h6>WhatsApp</h6>
                                        <p><a href="{{ $contactSettings->whatsapp_url }}" target="_blank" class="text-decoration-none">{{ $contactSettings->whatsapp }}</a></p>
                                    </div>
                                </div>
                                @endif
                                
                                <!-- Office Hours -->
                                @if($contactSettings && $contactSettings->office_hours)
                                <div class="contact-info-item">
                                    <div class="contact-info-icon">
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
                            <div class="social-media-section mt-4">
                                <h6 class="mb-3">Ikuti Kami</h6>
                                <div class="social-links">
                                    @if($contactSettings->facebook)
                                        <a href="{{ $contactSettings->facebook }}" target="_blank" class="social-link facebook">
                                            <i class="icofont-facebook"></i>
                                        </a>
                                    @endif
                                    @if($contactSettings->instagram)
                                        <a href="{{ $contactSettings->instagram }}" target="_blank" class="social-link instagram">
                                            <i class="icofont-instagram"></i>
                                        </a>
                                    @endif
                                    @if($contactSettings->youtube)
                                        <a href="{{ $contactSettings->youtube }}" target="_blank" class="social-link youtube">
                                            <i class="icofont-youtube"></i>
                                        </a>
                                    @endif
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    
                    <!-- Contact Form -->
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="contact-form-wrapper">
                            <h4 class="contact-section-title mb-4">
                                <i class="icofont-ui-message text-success me-2"></i>
                                Kirim Pesan
                            </h4>
                            
                            @if(session('success'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    <i class="icofont-check-circled me-2"></i>
                                    {{ session('success') }}
                                    <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                                </div>
                            @endif
                            
                            @if($errors->any())
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
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
                                <div class="form-group mb-3">
                                    <label for="name" class="form-label">Nama Lengkap <span class="text-danger">*</span></label>
                                    <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Masukkan nama lengkap" value="{{ old('name') }}" required>
                                    @error('name')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                                    <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Masukkan email" value="{{ old('email') }}" required>
                                    @error('email')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="phone" class="form-label">Nomor Telepon</label>
                                    <input type="text" id="phone" name="phone" class="form-control" placeholder="Masukkan nomor telepon" value="{{ old('phone') }}">
                                </div>
                                
                                <div class="form-group mb-3">
                                    <label for="subject" class="form-label">Subjek <span class="text-danger">*</span></label>
                                    <input type="text" id="subject" name="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="Masukkan subjek pesan" value="{{ old('subject') }}" required>
                                    @error('subject')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group mb-4">
                                    <label for="message" class="form-label">Pesan <span class="text-danger">*</span></label>
                                    <textarea id="message" name="message" class="form-control @error('message') is-invalid @enderror" placeholder="Tulis pesan Anda di sini..." rows="6" required>{{ old('message') }}</textarea>
                                    @error('message')
                                        <div class="invalid-feedback">{{ $message }}</div>
                                    @enderror
                                </div>
                                
                                <div class="form-group">
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
</div>
<!-- Contact Section Ending -->
@endsection 
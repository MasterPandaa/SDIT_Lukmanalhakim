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

<!-- Contact Section Start -->
<div class="contact-section padding-tb">
    <div class="container">
        <div class="section-header text-center">
            <span class="subtitle">Hubungi Kami</span>
            <h2 class="title">Silakan Kirim Pesan</h2>
        </div>
        <div class="section-wrapper">
            <div class="row justify-content-center">
                <div class="col-lg-4 col-12">
                    <div class="contact-info">
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="icofont-google-map"></i>
                            </div>
                            <div class="contact-info-content">
                                <h5>Alamat Kami</h5>
                                <p>Sleman, Yogyakarta</p>
                            </div>
                        </div>
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="icofont-phone"></i>
                            </div>
                            <div class="contact-info-content">
                                <h5>Telepon</h5>
                                <p>+62 857-4725-5761</p>
                            </div>
                        </div>
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="icofont-envelope"></i>
                            </div>
                            <div class="contact-info-content">
                                <h5>Email</h5>
                                <p>contac@luqmanalhakim.sch.id</p>
                            </div>
                        </div>
                        <div class="contact-info-item">
                            <div class="contact-info-icon">
                                <i class="icofont-clock-time"></i>
                            </div>
                            <div class="contact-info-content">
                                <h5>Jam Operasional</h5>
                                <p>Senin - Jumat (07:00 - 15:00)</p>
                                <p>Sabtu (07:00 - 12:00)</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-8 col-12">
                    <div class="contact-form">
                        @if(session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <form action="{{ route('contact.send') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Nama Lengkap *" value="{{ old('name') }}" required>
                                @error('name')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email *" value="{{ old('email') }}" required>
                                @error('email')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <input type="text" name="phone" class="form-control" placeholder="Nomor Telepon" value="{{ old('phone') }}">
                            </div>
                            <div class="form-group">
                                <input type="text" name="subject" class="form-control @error('subject') is-invalid @enderror" placeholder="Subjek *" value="{{ old('subject') }}" required>
                                @error('subject')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <textarea name="message" class="form-control @error('message') is-invalid @enderror" placeholder="Pesan Anda *" required>{{ old('message') }}</textarea>
                                @error('message')
                                    <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="lab-btn">
                                    <span>Kirim Pesan</span>
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

<!-- Google Map Section Start -->
<div class="map-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <div class="map-area">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3953.2675292549946!2d110.3823762!3d-7.7675913!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e7a59b2d4729729%3A0xac4d7b5fcf34f8e4!2sSleman%2C%20Daerah%20Istimewa%20Yogyakarta!5e0!3m2!1sid!2sid!4v1627282901237!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Google Map Section Ending -->
@endsection 
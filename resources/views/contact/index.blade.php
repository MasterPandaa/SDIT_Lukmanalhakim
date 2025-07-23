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
            <span>Hubungi Kami</span>
            <h2>Silakan Kirim Pesan</h2>
        </div>
        <div class="section-wrapper">
            <div class="row">
                <div class="col-lg-4">
                    <div class="contact-info">
                        <h4>Informasi Kontak</h4>
                        <ul class="lab-ul">
                            <li>
                                <div class="icon-part">
                                    <i class="icofont-location-pin"></i>
                                </div>
                                <div class="content-part">
                                    <p>Jl. Contoh No. 123, Kota, Indonesia</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon-part">
                                    <i class="icofont-phone"></i>
                                </div>
                                <div class="content-part">
                                    <p>+62 123 456 789</p>
                                </div>
                            </li>
                            <li>
                                <div class="icon-part">
                                    <i class="icofont-envelope"></i>
                                </div>
                                <div class="content-part">
                                    <p>info@sditlukmanalhakim.sch.id</p>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-8">
                    <form class="contact-form" action="{{ route('contact.send') }}" method="POST">
                        @csrf
                        <div class="form-group">
                            <input type="text" name="name" class="form-control" placeholder="Nama Lengkap *" required>
                        </div>
                        <div class="form-group">
                            <input type="email" name="email" class="form-control" placeholder="Email *" required>
                        </div>
                        <div class="form-group">
                            <input type="text" name="subject" class="form-control" placeholder="Subjek *" required>
                        </div>
                        <div class="form-group">
                            <textarea name="message" class="form-control" placeholder="Pesan Anda *" required></textarea>
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
<!-- Contact Section Ending -->

<!-- Google Map Section Start -->
<div class="map-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 p-0">
                <div class="map-area">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3966.2834010468995!2d106.8269851!3d-6.2297465!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e69f3e945e34b9d%3A0x5371bf0fdad786a2!2sJakarta%2C%20Daerah%20Khusus%20Ibukota%20Jakarta!5e0!3m2!1sid!2sid!4v1627282901237!5m2!1sid!2sid" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Google Map Section Ending -->
@endsection 
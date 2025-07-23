@extends('layouts.app')

@section('title', 'Halaman Tidak Ditemukan')

@section('content')
<!-- 404 Section Start -->
<div class="fore-zero-page padding-tb section-bg">
    <div class="container">
        <div class="section-wrapper">
            <div class="zero-item">
                <div class="zero-thumb">
                    <img src="{{ asset('assets/images/404.png') }}" alt="404">
                </div>
                <div class="zero-content">
                    <h2>Oops! Halaman Tidak Ditemukan</h2>
                    <p>Maaf, halaman yang Anda cari tidak ditemukan atau telah dihapus.</p>
                    <a href="{{ route('home') }}" class="lab-btn"><span>Kembali ke Beranda</span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- 404 Section Ending -->
@endsection 
@extends('layouts.app')

@section('title', 'Indikator Kelulusan')

@section('content')
<!-- Page Header section start here --<div class="pageheader-section style-2">
    <div class="container">
        <div class="row justify-content-center justify-content-lg-between align-items-center flex-row-reverse">
            <div class="col-lg-7 col-12">
                <div class="pageheader-thumb">
                    <img src="{{ $indikatorKelulusan?->gambar_header_url ?? asset('assets/images/pageheader/02.jpg') }}" alt="Indikator Kelulusan" class="w-100">
                    @if($indikatorKelulusan?->video_url)
                        <a href="{{ $indikatorKelulusan->video_url }}" class="video-button" data-rel="lightcase"><i class="icofont-ui-play"></i></a>
                    @endif
                </div>
            </div>
            <div class="col-lg-5 col-12">
                <div class="pageheader-content">
                    @if($setting?->kategori_tags && count($setting->kategori_tags) > 0)
                        <div class="course-category">
                            @foreach($setting->kategori_tags as $tag)
                                <a href="#" class="course-cate">{{ $tag }}</a>
                            @endforeach
                        </div>
                    @endif
                    <h2 class="phs-title">{{ $setting?->judul_header ?? 'Target sekolah untuk menghafal 10 juz Al-Qur\'an menjadi motivasi bagi orang tua.' }}</h2>
                    @if($setting?->nama_pembicara)
                        <div class="phs-thumb">
                            <img src="{{ $setting?->foto_pembicara_url ?? asset('assets/images/pageheader/03.jpg') }}" alt="{{ $setting?->nama_pembicara ?? '' }}">
                            <span>{{ $setting?->nama_pembicara ?? '' }}</span>
                            <div class="course-reiew">
                                <span class="ratting">
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                </span>
                                <span class="ratting-count"></span>
                            </div>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header section ending here -->

<!-- course section start here -->
<div class="course-single-section padding-tb section-bg">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="main-part">
                    <div class="course-video">
                        <div class="course-video-title">
                            <h2>{{ $setting?->judul_utama ?? '100 indikator Kelulusan' }}</h2>
                        </div>
                        <!-- Daftar Indikator -->
                        <div class="course-video-content">
                            <div class="accordion" id="accordionExample">
                                @foreach($kategoris as $index => $kategori)
                                    <div class="accordion-item">
                                        <!-- ini sub judulnya -->
                                        <div class="accordion-header" id="accordion{{ $kategori->id }}">
                                            <button class="d-flex flex-wrap justify-content-between" data-bs-toggle="collapse" data-bs-target="#videolist{{ $kategori->id }}" aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" aria-controls="videolist{{ $kategori->id }}">
                                                <span>{{ strtoupper($kategori->nama) }}</span>
                                            </button>
                                        </div>
                                        <div id="videolist{{ $kategori->id }}" class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" aria-labelledby="accordion{{ $kategori->id }}" data-bs-parent="#accordionExample">
                                            <ul class="lab-ul video-item-list">
                                                @forelse($kategori->activeIndikators as $indikator)
                                                    <li class="d-flex flex-wrap justify-content-between">
                                                        <div class="video-item-title">
                                                            {{ $indikator->judul }}
                                                            @if($indikator->durasi)
                                                                <span class="text-muted">{{ $indikator->durasi }}</span>
                                                            @endif
                                                        </div>
                                                    </li>
                                                @empty
                                                    <li class="d-flex flex-wrap justify-content-between">
                                                        <div class="video-item-title text-muted">Belum ada indikator dalam kategori ini.</div>
                                                    </li>
                                                @endforelse
                                            </ul>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- course section ending here -->
@endsection 
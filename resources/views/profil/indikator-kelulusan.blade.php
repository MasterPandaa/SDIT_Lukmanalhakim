@extends('layouts.app')

@section('title', 'Indikator Kelulusan')

@section('content')
<!-- Page Header section start here -->
<div class="pageheader-section style-2">
    <div class="container">
        <div class="row justify-content-center justify-content-lg-between align-items-center flex-row-reverse">
            <div class="col-lg-7 col-12">
                <div class="pageheader-thumb">
                    <img src="{{ isset($setting) ? $setting->gambar_header_url : asset('assets/images/default/indikator-kelulusan-header.jpg') }}" alt="Indikator Kelulusan" class="w-100">
                    @if(isset($setting) && $setting->video_url)
                        <a href="{{ $setting->video_url }}" class="video-button" data-rel="lightcase">
                            <i class="icofont-ui-play"></i>
                        </a>
                    @endif
                </div>
            </div>
            <div class="col-lg-5 col-12">
                <div class="pageheader-content">
                    @if(isset($setting) && $setting->kategori_tags && count($setting->kategori_tags) > 0)
                        <div class="course-category">
                            @foreach($setting->kategori_tags as $tag)
                                <a href="#" class="course-cate">{{ $tag }}</a>
                            @endforeach
                        </div>
                    @endif
                    <h2 class="phs-title">{{ $setting->judul_header ?? 'Judul Indikator Kelulusan' }}</h2>
                    @if(isset($setting) && $setting->nama_pembicara)
                        <div class="phs-thumb">
                            <img src="{{ $setting->foto_pembicara_url }}" alt="{{ $setting->nama_pembicara }}">
                            <span>{{ $setting->nama_pembicara }}</span>
                            <div class="course-reiew">
                                <span class="ratting">
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                    <i class="icofont-ui-rating"></i>
                                </span>
                                <span class="ratting-count">
                                   
                                </span>
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
                            <h2>{{ $setting->judul_utama ?? 'Indikator Kelulusan' }}</h2>
                        </div>
                        
                        @if(isset($setting) && $setting->deskripsi_header)
                            <div class="course-description mb-4">
                                <p>{{ $setting->deskripsi_header }}</p>
                            </div>
                        @endif

                        <!-- Daftar Indikator -->
                        <div class="course-video-content">
                            @if(count($kategoris) > 0)
                                <div class="accordion" id="accordionExample">
                                    @foreach($kategoris as $index => $kategori)
                                        <div class="accordion-item">
                                            <!-- Kategori Header -->
                                            <div class="accordion-header" id="accordion{{ $kategori->id }}">
                                                <button class="d-flex flex-wrap justify-content-between" 
                                                        data-bs-toggle="collapse" 
                                                        data-bs-target="#videolist{{ $kategori->id }}" 
                                                        aria-expanded="{{ $index === 0 ? 'true' : 'false' }}" 
                                                        aria-controls="videolist{{ $kategori->id }}">
                                                    <span>{{ strtoupper($kategori->nama) }}</span>
                                                    @if($kategori->activeIndikators->count() > 0)
                                                        <span class="badge badge-primary">{{ $kategori->activeIndikators->count() }} item</span>
                                                    @endif
                                                </button>
                                            </div>
                                            
                                            <!-- Daftar Indikator dalam Kategori -->
                                            <div id="videolist{{ $kategori->id }}" 
                                                 class="accordion-collapse collapse {{ $index === 0 ? 'show' : '' }}" 
                                                 aria-labelledby="accordion{{ $kategori->id }}" 
                                                 data-bs-parent="#accordionExample">
                                                
                                                @if($kategori->deskripsi)
                                                    <div class="accordion-description px-3 pt-3">
                                                        <p class="text-muted">{{ $kategori->deskripsi }}</p>
                                                    </div>
                                                @endif
                                                
                                                @if($kategori->activeIndikators->count() > 0)
                                                    <ul class="lab-ul video-item-list">
                                                        @foreach($kategori->activeIndikators as $indikator)
                                                            <li class="d-flex flex-wrap justify-content-between">
                                                                <div class="video-item-title">
                                                                    {{ $indikator->judul }}
                                                                    @if($indikator->durasi)
                                                                        <span class="text-muted"> - {{ $indikator->durasi }}</span>
                                                                    @endif
                                                                </div>
                                                                @if($indikator->deskripsi)
                                                                    <div class="video-item-description">
                                                                        <small class="text-muted">{{ $indikator->deskripsi }}</small>
                                                                    </div>
                                                                @endif
                                                            </li>
                                                        @endforeach
                                                    </ul>
                                                @else
                                                    <div class="text-center py-4">
                                                        <p class="text-muted">Belum ada indikator dalam kategori ini.</p>
                                                    </div>
                                                @endif
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <div class="text-center py-5">
                                    <i class="icofont-ui-folder text-muted" style="font-size: 4rem;"></i>
                                    <h4 class="text-muted mt-3">Belum Ada Indikator Kelulusan</h4>
                                    <p class="text-muted">Indikator kelulusan sedang dalam proses penyusunan.</p>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Sidebar dengan informasi tambahan -->
            <div class="col-lg-4">
                <div class="course-side-detail">
                    <div class="csd-title">
                        <div class="csdt-left">
                            <h4 class="mb-0">Ringkasan</h4>
                        </div>
                    </div>
                    <div class="csd-content">
                        <div class="csdc-lists">
                            <ul class="lab-ul">
                                <li class="d-flex flex-wrap justify-content-between">
                                    <span class="pull-left">Total Kategori</span>
                                    <span class="pull-right">{{ count($kategoris) }}</span>
                                </li>
                                <li class="d-flex flex-wrap justify-content-between">
                                    <span class="pull-left">Total Indikator</span>
                                    <span class="pull-right">{{ $totalIndikators }}</span>
                                </li>
                                @if(isset($setting) && $setting->nama_pembicara)
                                    <li class="d-flex flex-wrap justify-content-between">
                                        <span class="pull-left">Pembicara</span>
                                        <span class="pull-right">{{ $setting->nama_pembicara }}</span>
                                    </li>
                                @endif
                                <li class="d-flex flex-wrap justify-content-between">
                                    <span class="pull-left">Status</span>
                                    <span class="pull-right">
                                        <span class="badge badge-success">Aktif</span>
                                    </span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                
                @if(count($kategoris) > 0)
                    <div class="course-side-detail mt-4">
                        <div class="csd-title">
                            <div class="csdt-left">
                                <h4 class="mb-0">Navigasi Cepat</h4>
                            </div>
                        </div>
                        <div class="csd-content">
                            <div class="csdc-lists">
                                <ul class="lab-ul">
                                    @foreach($kategoris as $kategori)
                                        <li>
                                            <a href="#videolist{{ $kategori->id }}" 
                                               onclick="document.querySelector('[data-bs-target=\'#videolist{{ $kategori->id }}\']').click()">
                                                {{ $kategori->nama }}
                                                <span class="badge badge-light ml-2">{{ $kategori->activeIndikators->count() }}</span>
                                            </a>
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- course section ending here -->

<style>
.video-item-description {
    width: 100%;
    margin-top: 5px;
}

.accordion-description {
    border-bottom: 1px solid #e9ecef;
    margin-bottom: 0;
}

.badge {
    font-size: 0.75em;
}

.course-side-detail .badge-light {
    background-color: #f8f9fa;
    color: #6c757d;
}
</style>
@endsection 
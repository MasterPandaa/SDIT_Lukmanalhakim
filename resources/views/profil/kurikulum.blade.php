@extends('layouts.app')

@section('title', 'Kurikulum')

@php
use Illuminate\Support\Facades\Storage;
@endphp

@section('content')
<!-- Page Header section start here -->
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>{{ $kurikulum->judul ?? 'Kurikulum' }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Pages</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Page Header section ending here -->

<!-- category section start here -->
<div class="category-section padding-tb section-bg style-3">
    <div class="container">
        <div class="section-header text-center">
            <span class="subtitle">{{ $kurikulum->subtitle ?? 'Teach on edulon' }}</span>
            <h2 class="title">{{ $kurikulum->deskripsi ?? '"SD Islam Terpadu Luqman Al Hakim Sleman menerapkan empat kurikulum terpadu"' }}</h2>
        </div>
        <div class="section-wrapper">
            <div class="row g-4 justify-content-center row-cols-lg-2 row-cols-sm-2 row-cols-1">
                @if($kurikulum && $kurikulum->items->count() > 0)
                    @foreach($kurikulum->items as $item)
                        <div class="col">
                            <div class="category-item text-center">
                                <div class="category-inner">
                                    <div class="category-thumb">
                                        <img src="{{ $item->gambar ? Storage::url($item->gambar) : asset('assets/images/category/icon/15.jpg') }}" alt="category">
                                    </div>
                                    <div class="category-content">
                                        <a href="#"><h4>{{ $item->judul }}</h4></a>
                                        <p>{{ $item->deskripsi }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @else
                    <div class="col">
                        <div class="category-item text-center">
                            <div class="category-inner">
                                <div class="category-thumb">
                                    <img src="{{ asset('assets/images/category/icon/15.jpg') }}" alt="category">
                                </div>
                                <div class="category-content">
                                    <a href="#"><h4>Kurikulum Merdeka</h4></a>
                                    <p>"Fokusnya pada pengembangan kompetensi, keterampilan berpikir kritis, kreativitas, serta pembelajaran yang inovatif dan aplikatif, selaras dengan kebutuhan dunia nyata."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="category-item text-center">
                            <div class="category-inner">
                                <div class="category-thumb">
                                    <img src="{{ asset('assets/images/category/icon/16.jpg') }}" alt="category">
                                </div>
                                <div class="category-content">
                                    <a href="#"><h4>Kurikulum JSIT</h4></a>
                                    <p>"Pendidikan holistik yang mencakup akademik, spiritual, emosional, dan sosial, dengan fokus pada akhlak mulia, hafalan Al-Qur'an, serta pembentukan kepribadian Islami dalam lingkungan kondusif."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="category-item text-center">
                            <div class="category-inner">
                                <div class="category-thumb">
                                    <img src="{{ asset('assets/images/category/icon/16.jpg') }}" alt="category">
                                </div>
                                <div class="category-content">
                                    <a href="#"><h4>Kurikulum Khas Yayasan</h4></a>
                                    <p>"Kurikulum ini dikembangkan secara mandiri oleh Konsorsium Yayasan Mulia untuk mencerminkan visi, misi, serta nilai-nilai khas yang ingin diterapkan dalam pendidikan."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="category-item text-center">
                            <div class="category-inner">
                                <div class="category-thumb">
                                    <img src="{{ asset('assets/images/category/icon/17.jpg') }}" alt="category">
                                </div>
                                <div class="category-content">
                                    <a href="#"><h4>Kurikulum Kepesantrenan</h4></a>
                                    <p>"Kurikulum ini berfokus pada pengajaran ilmu agama, seperti hadis, fiqh, akhlak, dan bahasa Arab, serta pendalaman Al-Qur'an melalui pemahaman mendalam dan hafalan yang terstruktur."</p>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>
</div>
<!-- category section start here -->
@endsection 
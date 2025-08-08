@extends('layouts.app')

@section('title', $kurikulum->judul ?? 'Kurikulum')

@section('content')
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>{{ $kurikulum->judul ?? 'Kurikulum' }}</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="#">Profil</a></li>
                            <li class="breadcrumb-item active" aria-current="page">{{ $kurikulum->judul ?? 'Kurikulum' }}</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="category-section padding-tb section-bg style-3">
    <div class="container">
        <div class="section-header text-center">
            <span class="subtitle">{{ $kurikulum->subtitle ?? 'Teach on edulon' }}</span>
            <h2 class="title">{{ $kurikulum && $kurikulum->deskripsi ? strip_tags($kurikulum->deskripsi) : '"SD Islam Terpadu Luqman Al Hakim Sleman menerapkan empat kurikulum terpadu"' }}</h2>
        </div>
        <div class="section-wrapper">
            <div class="row g-4 justify-content-center row-cols-lg-2 row-cols-sm-2 row-cols-1">
                @php
                    $items = ($kurikulum && $kurikulum->items) ? $kurikulum->items->sortBy('urutan') : collect();
                @endphp

                @forelse ($items as $item)
                    @if (($item->is_active ?? true) === true)
                    <div class="col d-flex">
                        <div class="category-item text-center w-100 h-100" style="display:flex;">
                            <div class="category-inner h-100 d-flex flex-column w-100">
                                <div class="category-thumb">
                                    <div style="height:140px; display:flex; align-items:center; justify-content:center; overflow:hidden;">
                                        <img src="{{ $item->gambar_url }}" alt="category" style="max-height:120px; max-width:100%; width:auto; height:auto; object-fit:contain; display:block;">
                                    </div>
                                </div>
                                <div class="category-content" style="flex:1 1 auto; display:flex; flex-direction:column; justify-content:flex-start;">
                                    <a href="#"><h4>{{ $item->judul }}</h4></a>
                                    <div>{!! $item->deskripsi !!}</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                @empty
                    
                @endforelse
            </div>
        </div>
    </div>
</div>
@endsection

<style>
.hover-effect {
    transition: all 0.3s ease;
    border: 1px solid #eee;
}

.hover-effect:hover {
    transform: translateY(-5px);
    box-shadow: 0 10px 25px rgba(0,0,0,0.1) !important;
}

.single-course-wrap {
    border-radius: 10px;
    overflow: hidden;
    background: white;
}

.single-course-image {
    position: relative;
    overflow: hidden;
}

.single-course-image img {
    transition: transform 0.3s ease;
    height: 200px;
    object-fit: cover;
    width: 100%;
}

.single-course-image:hover img {
    transform: scale(1.05);
}

.single-course-text-wrap {
    padding: 25px;
}

.single-course-heading a {
    text-decoration: none;
    font-weight: 600;
    transition: color 0.3s ease;
}

.single-course-heading a:hover {
    opacity: 0.8;
}

.single-course-content {
    margin: 15px 0;
    line-height: 1.6;
}

.single-course-content p {
    margin-bottom: 10px;
}

.single-course-content ul {
    padding-left: 20px;
}

.single-course-content li {
    margin-bottom: 5px;
}

.empty-state {
    padding: 50px 20px;
}

.image-wrap img {
    max-height: 300px;
    object-fit: cover;
}

.section-space--ptb_100 {
    padding: 100px 0;
}

.section-space--mb_60 {
    margin-bottom: 60px;
}

.breadcrumb-area {
    background-color: #f8f9fa;
    padding: 60px 0;
}

.breadcrumb-title {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 10px;
}

.breadcrumb {
    background: none;
    padding: 0;
    margin: 0;
}

.breadcrumb-item + .breadcrumb-item::before {
    content: ">";
    color: #6c757d;
}

.breadcrumb-item a {
    color: #007bff;
    text-decoration: none;
}

.breadcrumb-item.active {
    color: #6c757d;
}

.heading {
    font-size: 2.5rem;
    font-weight: 700;
    margin-bottom: 15px;
}

.section-sub-title {
    font-size: 1.1rem;
    font-weight: 500;
    margin-bottom: 20px;
}

.text-gray-700 {
    color: #374151;
}

.text-primary {
    color: #007bff !important;
}

.shadow {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.shadow-sm {
    box-shadow: 0 0.125rem 0.25rem rgba(0, 0, 0, 0.075);
}

.rounded {
    border-radius: 0.25rem;
}

@media (max-width: 768px) {
    .breadcrumb-title {
        font-size: 2rem;
    }
    
    .heading {
        font-size: 2rem;
    }
    
    .section-space--ptb_100 {
        padding: 60px 0;
    }
    
    .section-space--mb_60 {
        margin-bottom: 40px;
    }
    
    .single-course-image img {
        height: 180px;
    }
    
    .single-course-text-wrap {
        padding: 20px;
    }
    
    .breadcrumb-area {
        padding: 40px 0;
    }
}

@media (max-width: 576px) {
    .breadcrumb-title {
        font-size: 1.5rem;
    }
    
    .heading {
        font-size: 1.75rem;
    }
    
    .single-course-image img {
        height: 160px;
    }
    
    .single-course-text-wrap {
        padding: 15px;
    }
}
</style> 
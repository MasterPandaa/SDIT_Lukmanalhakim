@extends('layouts.app')

@section('title', 'Artikel')

@section('content')
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Artikel</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Artikel</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container py-5">
    <div class="row">
        <div class="col-12">
            <h3 class="mb-4 text-center">Artikel Sekolah</h3>
            
            @if($artikels->count() > 0)
                <div class="row">
                    @foreach($artikels as $artikel)
                    <div class="col-lg-4 col-md-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            @if($artikel->gambar)
                                <img src="{{ $artikel->gambar_url }}" 
                                     class="card-img-top" 
                                     alt="{{ $artikel->judul }}"
                                     style="height: 200px; object-fit: cover;">
                            @else
                                <div class="card-img-top bg-light d-flex align-items-center justify-content-center" 
                                     style="height: 200px;">
                                    <i class="fas fa-newspaper fa-3x text-muted"></i>
                                </div>
                            @endif
                            
                            <div class="card-body">
                                <div class="mb-2">
                                    @if($artikel->kategori)
                                        <span class="badge bg-primary">{{ $artikel->kategori }}</span>
                                    @endif
                                    <small class="text-muted float-end">
                                        <i class="fas fa-calendar-alt"></i> 
                                        {{ $artikel->formatted_published_at }}
                                    </small>
                                </div>
                                
                                <h5 class="card-title">{{ $artikel->judul }}</h5>
                                
                                @if($artikel->ringkasan)
                                    <p class="card-text text-muted">{{ Str::limit($artikel->ringkasan, 100) }}</p>
                                @else
                                    <p class="card-text text-muted">{{ Str::limit(strip_tags($artikel->konten), 100) }}</p>
                                @endif
                                
                                <div class="d-flex justify-content-between align-items-center">
                                    <small class="text-muted">
                                        <i class="fas fa-user"></i> 
                                        {{ $artikel->penulis ?? 'Admin' }}
                                    </small>
                                    <a href="{{ route('blog-single', $artikel->slug) }}" 
                                       class="btn btn-outline-primary btn-sm">
                                        Baca Selengkapnya
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
                
                <!-- Pagination -->
                <div class="d-flex justify-content-center mt-4">
                    {{ $artikels->links() }}
                </div>
            @else
                <div class="text-center py-5">
                    <i class="fas fa-newspaper fa-4x text-muted mb-3"></i>
                    <h5 class="text-muted">Belum ada artikel yang dipublikasi</h5>
                    <p class="text-muted">Artikel akan muncul di sini setelah dipublikasi oleh admin.</p>
                </div>
            @endif
        </div>
    </div>
</div>
@endsection 
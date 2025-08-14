@extends('layouts.app')

@section('title', 'Galeri')

@section('content')
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Galeri</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Galeri</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container py-5">
    <h3 class="mb-4">Galeri Kegiatan Sekolah</h3>
    <div class="row">
        @foreach($galeri as $item)
        <div class="col-12 col-sm-6 col-md-4 col-lg-3 mb-4">
            <div class="card h-100 text-center shadow-sm">
                @php
                    $img = $item->foto ? asset('storage/'.$item->foto) : asset('assets/images/galeri/01.jpg');
                @endphp
                <img src="{{ $img }}" class="card-img-top" alt="Galeri" style="height:200px;object-fit:cover;">
                <div class="card-body p-2">
                    <h6 class="card-title mb-0">{{ $item->judul }}</h6>
                </div>
            </div>
        </div>
        @endforeach
    </div>
    <div class="d-flex justify-content-end">{{ $galeri->links() }}</div>
</div>
@endsection
@extends('layouts.app')

@section('title', 'Fasilitas')

@section('content')
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Fasilitas</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Fasilitas</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container py-5">
    <h3 class="mb-4">Daftar Fasilitas Sekolah</h3>
    <div class="row">
        @foreach($fasilitas as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                <img src="{{ $item['foto'] }}" class="card-img-top" alt="Fasilitas" style="height:200px;object-fit:cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $item['nama'] }}</h5>
                    <p class="card-text">{{ $item['deskripsi'] }}</p>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection 
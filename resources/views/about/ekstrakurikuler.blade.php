@extends('layouts.app')

@section('title', 'Ekstrakurikuler')

@section('content')
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Ekstrakurikuler</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Ekstrakurikuler</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container py-5">
    <h3 class="mb-4">Daftar Ekstrakurikuler</h3>
    <div class="row">
        @foreach($ekstrakurikuler as $item)
        <div class="col-6 col-md-4 col-lg-3 mb-4">
            <div class="card h-100 text-center shadow-sm">
                <img src="{{ $item['foto'] }}" class="card-img-top mx-auto mt-3" alt="Ekstrakurikuler" style="width:80px;height:80px;object-fit:cover;">
                <div class="card-body p-2">
                    <h6 class="card-title mb-0">{{ $item['nama'] }}</h6>
                </div>
            </div>
        </div>
        @endforeach
    </div>
</div>
@endsection 
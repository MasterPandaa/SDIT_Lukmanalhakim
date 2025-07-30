@extends('layouts.app')

@section('title', 'Alumni')

@section('content')
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Alumni</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Alumni</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container py-5">
    <h3 class="mb-4">Data Alumni</h3>
    
    @if(count($alumni) > 0)
        <div class="row row-cols-1 row-cols-md-3 g-4">
            @foreach($alumni as $item)
                <div class="col">
                    <div class="card h-100">
                        @if($item->foto)
                            <img src="{{ asset('storage/' . $item->foto) }}" class="card-img-top" alt="{{ $item->nama }}">
                        @else
                            <img src="{{ asset('assets/images/instructor/01.jpg') }}" class="card-img-top" alt="Default Alumni">
                        @endif
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->nama }}</h5>
                            <p class="card-text"><strong>Tahun Lulus:</strong> {{ $item->tahun_lulus }}</p>
                            
                            @if($item->pendidikan_lanjutan)
                                <p class="card-text"><strong>Pendidikan Lanjutan:</strong> {{ $item->pendidikan_lanjutan }}</p>
                            @endif
                            
                            @if($item->pekerjaan)
                                <p class="card-text"><strong>Pekerjaan:</strong> {{ $item->pekerjaan }}</p>
                            @endif
                            
                            @if($item->prestasi)
                                <p class="card-text"><strong>Prestasi:</strong> {{ $item->prestasi }}</p>
                            @endif
                        </div>
                        @if($item->testimoni)
                            <div class="card-footer">
                                <p class="card-text"><em>"{{ $item->testimoni }}"</em></p>
                            </div>
                        @endif
                    </div>
                </div>
            @endforeach
        </div>
    @else
        <div class="alert alert-info">
            <p>Belum ada data alumni. Data akan ditampilkan di sini setelah diinput melalui admin panel.</p>
        </div>
    @endif
</div>
@endsection 
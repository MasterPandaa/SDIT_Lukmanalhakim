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
    <h3 class="mb-4">Artikel Sekolah</h3>
    <div>
        <!-- Konten artikel akan tampil di sini -->
        <p>Belum ada data artikel.</p>
    </div>
</div>
@endsection 
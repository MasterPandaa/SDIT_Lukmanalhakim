@extends('layouts.app')

@section('title', 'Prestasi')

@section('content')
<div class="pageheader-section">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="pageheader-content text-center">
                    <h2>Prestasi</h2>
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb justify-content-center">
                            <li class="breadcrumb-item"><a href="{{ route('home') }}">Beranda</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Prestasi</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container py-5">
    <h3 class="mb-4">Daftar Prestasi Sekolah</h3>
    <div class="row">
        @forelse($prestasi as $item)
        <div class="col-md-4 mb-4">
            <div class="card h-100 shadow-sm">
                @php $img = $item->gambar ? asset('storage/'.$item->gambar) : asset('assets/images/achive/01.png'); @endphp
                <img src="{{ $img }}" class="card-img-top" alt="Prestasi" style="height:200px;object-fit:cover;">
                <div class="card-body">
                    <h5 class="card-title">{{ $item->judul }}</h5>
                    <ul class="list-unstyled mb-2">
                        <li><strong>Tanggal:</strong> {{ optional($item->tanggal)->format('d M Y') ?? '-' }}</li>
                        <li><strong>Tingkat:</strong> {{ $item->tingkat ?? '-' }}</li>
                        <li><strong>Peraih:</strong> {{ $item->peraih ?? '-' }}</li>
                        <li><strong>Penyelenggara:</strong> {{ $item->penyelenggara ?? '-' }}</li>
                    </ul>
                </div>
            </div>
        </div>
        @empty
        <div class="col-12"><div class="alert alert-info">Belum ada data prestasi.</div></div>
        @endforelse
    </div>
    <div class="d-flex justify-content-center mt-4">
        {{ $prestasi->links() }}
    </div>
</div>
@endsection 
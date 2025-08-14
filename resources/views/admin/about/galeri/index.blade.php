@extends('layouts.admin')

@section('title', 'About - Galeri')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 fw-bold text-success">Kelola Galeri</h6>
                    <a href="{{ route('admin.galeri.create') }}" class="btn btn-sm btn-light">
                        <i class="fas fa-plus me-1"></i> Tambah Foto
                    </a>
                </div>
                <div class="card-body">
                    <div class="alert alert-info">
                        <i class="fas fa-info-circle me-2"></i>
                        Halaman pengelolaan galeri foto sekolah.
                    </div>
                    
                    <div class="row">
                        @forelse($items as $item)
                        <div class="col-md-3 mb-3">
                            <div class="card border-0 shadow-sm h-100">
                                @php $img = $item->foto ? asset('storage/'.$item->foto) : 'https://via.placeholder.com/300x200'; @endphp
                                <img src="{{ $img }}" class="card-img-top" alt="Galeri">
                                <div class="card-body d-flex flex-column">
                                    <h6 class="card-title">{{ $item->judul }}</h6>
                                    <p class="text-muted small mb-3">Urutan: {{ $item->urutan }}</p>
                                    <div class="mt-auto d-flex gap-1">
                                        <a href="{{ route('admin.galeri.edit', $item) }}" class="btn btn-sm btn-primary w-100"><i class="fas fa-edit"></i></a>
                                        <form action="{{ route('admin.galeri.destroy', $item) }}" method="POST" onsubmit="return confirm('Hapus foto ini?')" class="w-100">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-danger w-100"><i class="fas fa-trash"></i></button>
                                        </form>
                                        <form action="{{ route('admin.galeri.toggle', $item) }}" method="POST" class="w-100">
                                            @csrf
                                            <button class="btn btn-sm btn-warning w-100"><i class="fas fa-toggle-on"></i></button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @empty
                        <div class="col-12 text-center text-muted">Belum ada data.</div>
                        @endforelse
                    </div>
                    <div class="d-flex justify-content-end">{{ $items->links() }}</div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection 

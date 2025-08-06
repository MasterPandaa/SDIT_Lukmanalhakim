<div class="row">
    <div class="col-12">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h5 class="mb-0">
                <i class="fas fa-list me-2"></i>Daftar Item Kurikulum
            </h5>
            <a href="{{ route('admin.kurikulum.create-item') }}" class="btn btn-success btn-sm">
                <i class="fas fa-plus me-1"></i> Tambah Item Baru
            </a>
        </div>

        @if(isset($kurikulum) && $kurikulum->allItems->count() > 0)
            <div class="row">
                @foreach($kurikulum->allItems as $item)
                    <div class="col-lg-6 mb-3">
                        <div class="card border-left-{{ $item->is_active ? 'success' : 'secondary' }}">
                            <div class="card-body">
                                <div class="d-flex align-items-start">
                                    @if($item->gambar_url)
                                        <img src="{{ $item->gambar_url }}" 
                                             alt="{{ $item->judul }}" 
                                             class="rounded me-3" 
                                             style="width: 60px; height: 60px; object-fit: cover;">
                                    @else
                                        <div class="bg-light rounded me-3 d-flex align-items-center justify-content-center" 
                                             style="width: 60px; height: 60px;">
                                            <i class="fas fa-image text-muted"></i>
                                        </div>
                                    @endif
                                    
                                    <div class="flex-grow-1">
                                        <h6 class="mb-1 font-weight-bold">{{ $item->judul }}</h6>
                                        <div class="text-muted small mb-2">
                                            {!! Str::limit(strip_tags($item->deskripsi), 100) !!}
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between">
                                            <span class="badge badge-{{ $item->is_active ? 'success' : 'secondary' }}">
                                                {{ $item->is_active ? 'Aktif' : 'Non-Aktif' }}
                                            </span>
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('admin.kurikulum.edit-item', $item->id) }}" 
                                                   class="btn btn-warning btn-sm" 
                                                   title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('admin.kurikulum.toggle-item', $item->id) }}" 
                                                   class="btn btn-info btn-sm" 
                                                   title="Toggle Status">
                                                    <i class="fas fa-toggle-{{ $item->is_active ? 'on' : 'off' }}"></i>
                                                </a>
                                                <form action="{{ route('admin.kurikulum.destroy-item', $item->id) }}" 
                                                      method="POST" 
                                                      style="display:inline-block;"
                                                      onsubmit="return confirm('Yakin ingin menghapus item {{ $item->judul }}?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger btn-sm" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        @else
            <div class="text-center py-5">
                <div class="card border-left-warning">
                    <div class="card-body">
                        <i class="fas fa-inbox fa-3x text-gray-300 mb-3"></i>
                        <h5 class="text-gray-500">Belum ada item kurikulum</h5>
                        <p class="text-gray-400 mb-3">
                            Tambahkan item kurikulum untuk menampilkan konten di halaman publik.
                        </p>
                        <a href="{{ route('admin.kurikulum.create-item') }}" class="btn btn-primary">
                            <i class="fas fa-plus me-2"></i>Tambah Item Pertama
                        </a>
                    </div>
                </div>
            </div>
        @endif
    </div>
</div>

<style>
.border-left-success {
    border-left: 4px solid #1cc88a !important;
}

.border-left-secondary {
    border-left: 4px solid #858796 !important;
}

.border-left-warning {
    border-left: 4px solid #f6c23e !important;
}

.card:hover {
    transform: translateY(-2px);
    transition: all 0.2s ease-in-out;
    box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15) !important;
}
</style>
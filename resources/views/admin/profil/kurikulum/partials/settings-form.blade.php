<div class="row">
    <div class="col-md-8">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-info text-uppercase mb-3">
                    <i class="fas fa-info-circle me-2"></i>Informasi Kurikulum
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="text-sm font-weight-bold">Judul:</label>
                            <p class="mb-1">{{ $kurikulum->judul ?? 'Belum diatur' }}</p>
                        </div>
                        
                        <div class="mb-3">
                            <label class="text-sm font-weight-bold">Subtitle:</label>
                            <p class="mb-1">{{ $kurikulum->subtitle ?? 'Belum diatur' }}</p>
                        </div>
                        
                        <div class="mb-3">
                            <label class="text-sm font-weight-bold">Total Item:</label>
                            <p class="mb-1">{{ $kurikulum->allItems->count() }} item</p>
                        </div>
                    </div>
                    
                    <div class="col-md-6">
                        <div class="mb-3">
                            <label class="text-sm font-weight-bold">Item Aktif:</label>
                            <p class="mb-1">{{ $kurikulum->allItems->where('is_active', true)->count() }} item</p>
                        </div>
                        
                        <div class="mb-3">
                            <label class="text-sm font-weight-bold">Item Non-Aktif:</label>
                            <p class="mb-1">{{ $kurikulum->allItems->where('is_active', false)->count() }} item</p>
                        </div>
                        
                        <div class="mb-3">
                            <label class="text-sm font-weight-bold">Terakhir Diperbarui:</label>
                            <p class="mb-1">{{ $kurikulum->updated_at ? $kurikulum->updated_at->format('d M Y, H:i') : 'Belum pernah' }}</p>
                        </div>
                    </div>
                </div>
                
                <div class="mb-3">
                    <label class="text-sm font-weight-bold">Deskripsi:</label>
                    <p class="mb-1">{{ $kurikulum->deskripsi ?? 'Belum diatur' }}</p>
                </div>
            </div>
        </div>
    </div>
    
    <div class="col-md-4">
        <div class="card border-left-{{ $kurikulum->is_active ? 'success' : 'danger' }} shadow h-100 py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-{{ $kurikulum->is_active ? 'success' : 'danger' }} text-uppercase mb-3">
                    <i class="fas fa-{{ $kurikulum->is_active ? 'check-circle' : 'times-circle' }} me-2"></i>Status Kurikulum
                </div>
                
                <div class="text-center mb-4">
                    <div class="mb-3">
                        <span class="badge badge-{{ $kurikulum->is_active ? 'success' : 'danger' }} badge-lg">
                            {{ $kurikulum->is_active ? 'AKTIF' : 'NON-AKTIF' }}
                        </span>
                    </div>
                    
                    <p class="text-muted small">
                        @if($kurikulum->is_active)
                            Kurikulum sedang ditampilkan di halaman publik
                        @else
                            Kurikulum tidak ditampilkan di halaman publik
                        @endif
                    </p>
                </div>

                <form action="{{ route('admin.kurikulum.toggle-status') }}" method="POST">
                    @csrf
                    <div class="text-center">
                        <button type="submit" 
                                class="btn btn-{{ $kurikulum->is_active ? 'danger' : 'success' }} btn-sm"
                                onclick="return confirm('Yakin ingin {{ $kurikulum->is_active ? 'menonaktifkan' : 'mengaktifkan' }} kurikulum?')">
                            <i class="fas fa-{{ $kurikulum->is_active ? 'times' : 'check' }} me-2"></i>
                            {{ $kurikulum->is_active ? 'Nonaktifkan' : 'Aktifkan' }}
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<div class="row mt-4">
    <div class="col-12">
        <div class="card border-left-warning shadow py-2">
            <div class="card-body">
                <div class="text-xs font-weight-bold text-warning text-uppercase mb-3">
                    <i class="fas fa-exclamation-triangle me-2"></i>Catatan Penting
                </div>
                
                <div class="row">
                    <div class="col-md-6">
                        <h6 class="font-weight-bold">Tentang Layout:</h6>
                        <ul class="text-muted small mb-3">
                            <li>Layout halaman akan tetap terjaga saat menambah/edit item</li>
                            <li>Item akan ditampilkan dalam grid 2 kolom secara otomatis</li>
                            <li>Urutan item mengikuti urutan saat dibuat</li>
                        </ul>
                    </div>
                    
                    <div class="col-md-6">
                        <h6 class="font-weight-bold">Tips Penggunaan:</h6>
                        <ul class="text-muted small mb-3">
                            <li>Gunakan gambar dengan rasio 1:1 untuk hasil terbaik</li>
                            <li>Maksimal ukuran file gambar adalah 2MB</li>
                            <li>Deskripsi item mendukung format HTML sederhana</li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
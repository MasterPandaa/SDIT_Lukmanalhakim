@extends('layouts.admin')

@section('title', 'Profil - Guru & Karyawan')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <!-- Header -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-chalkboard-teacher fa-lg text-success me-2"></i>
                    Kelola Guru & Karyawan
                </h1>
                <div class="d-flex gap-2">
                    <a href="{{ route('guru-karyawan') }}" target="_blank" class="btn btn-primary shadow-sm">
                        <i class="fas fa-eye me-2"></i>
                        Lihat Halaman Publik
                    </a>
                    <a href="{{ route('admin.guru.create') }}" class="btn btn-success shadow-sm">
                        <i class="fas fa-plus me-2"></i>
                        Tambah Guru/Karyawan
                    </a>
                </div>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle fa-lg me-3"></i>
                        <div>
                            <strong>Berhasil!</strong> {{ session('success') }}
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show mb-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-circle fa-lg me-3"></i>
                        <div>
                            <strong>Error!</strong> {{ session('error') }}
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            @if(!isset($setting) || !$setting)
                <div class="alert alert-warning alert-dismissible fade show mb-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-exclamation-triangle fa-lg me-3"></i>
                        <div>
                            <strong>Perhatian!</strong> Data pengaturan halaman belum tersedia. 
                            Silakan buat pengaturan header untuk halaman ini.
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            <!-- Header Settings Section -->
            <div class="card border-0 shadow mb-4">
                <div class="card-header py-3">
                    <h6 class="m-0 fw-bold text-success">
                        <i class="fas fa-cog me-2"></i>
                        Pengaturan Header Halaman
                    </h6>
                </div>
                <div class="card-body">
                    <form action="{{ route('admin.profil.guru-karyawan.update') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="judul_header" class="form-label fw-bold">Judul Header</label>
                                    <input type="text" class="form-control" id="judul_header" name="judul_header" 
                                           value="{{ $setting->judul_header ?? 'Guru & Karyawan' }}" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group mb-3">
                                    <label for="gambar_header" class="form-label fw-bold">Gambar Header</label>
                                    <input type="file" class="form-control" id="gambar_header" name="gambar_header" 
                                           accept="image/*">
                                    @if(isset($setting) && $setting->gambar_header)
                                        <small class="text-muted">
                                            <i class="fas fa-image me-1"></i>
                                            File saat ini: {{ $setting->gambar_header }}
                                        </small>
                                    @endif
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-group mb-3">
                            <label for="deskripsi_header" class="form-label fw-bold">Deskripsi Header</label>
                            <textarea class="form-control" id="deskripsi_header" name="deskripsi_header" 
                                      rows="3" required>{{ $setting->deskripsi_header ?? 'Tim pengajar dan karyawan SDIT Luqman Al Hakim yang berpengalaman dan berdedikasi tinggi dalam dunia pendidikan.' }}</textarea>
                        </div>
                        
                        <div class="row">
                            <div class="col-md-6">
                                <button type="submit" class="btn btn-success">
                                    <i class="fas fa-save me-2"></i>
                                    Simpan Pengaturan Header
                                </button>
                            </div>
                            <div class="col-md-6 text-end">
                                <form action="{{ route('admin.profil.guru-karyawan.toggle') }}" method="GET" class="d-inline">
                                    <button type="submit" class="btn {{ ($setting && $setting->is_active) ? 'btn-warning' : 'btn-success' }}">
                                        <i class="fas fa-toggle-{{ ($setting && $setting->is_active) ? 'on' : 'off' }} me-2"></i>
                                        {{ ($setting && $setting->is_active) ? 'Nonaktifkan' : 'Aktifkan' }} Halaman
                                    </button>
                                </form>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <div class="card border-0 shadow">
                <div class="card-header py-3">
                    <h6 class="m-0 fw-bold text-success">Data Guru & Karyawan</h6>
                </div>
                <div class="card-body">
                    
                    <!-- Stats Cards -->
                    <div class="row g-3 mb-4">
                        <div class="col-md-3">
                            <div class="card border-0 bg-gradient-primary text-white">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <i class="fas fa-users fa-lg"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">{{ $totalGurus }}</h4>
                                            <small>Total Guru & Karyawan</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-0 bg-gradient-success text-white">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <i class="fas fa-user-check fa-lg"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">{{ $totalAktif }}</h4>
                                            <small>Aktif</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-0 bg-gradient-warning text-white">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <i class="fas fa-user-times fa-lg"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">{{ $totalNonAktif }}</h4>
                                            <small>Non-Aktif</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="card border-0 bg-gradient-info text-white">
                                <div class="card-body">
                                    <div class="d-flex align-items-center">
                                        <div class="me-3">
                                            <i class="fas fa-star fa-lg"></i>
                                        </div>
                                        <div>
                                            <h4 class="mb-0">{{ number_format($gurus->avg('rating'), 1) }}</h4>
                                            <small>Rating Rata-rata</small>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- Data Table -->
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead class="table-dark">
                                <tr>
                                    <th>No</th>
                                    <th>Foto</th>
                                    <th>Nama</th>
                                    <th>Jabatan</th>
                                    <th>Email</th>
                                    <th>Pengalaman</th>
                                    <th>Rating</th>
                                    <th>Status</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse($gurus as $index => $guru)
                                    <tr>
                                        <td>{{ $gurus->firstItem() + $index }}</td>
                                        <td>
                                            <img src="{{ $guru->foto_url }}" class="rounded-circle" alt="Foto" style="width: 40px; height: 40px; object-fit: cover;">
                                        </td>
                                        <td>
                                            <div>
                                                <strong>{{ $guru->nama_lengkap }}</strong>
                                                @if($guru->gelar)
                                                    <br><small class="text-muted">{{ $guru->gelar }}</small>
                                                @endif
                                            </div>
                                        </td>
                                        <td>{{ $guru->jabatan }}</td>
                                        <td>
                                            @if($guru->email)
                                                <small>{{ $guru->email }}</small>
                                            @else
                                                <small class="text-muted">-</small>
                                            @endif
                                        </td>
                                        <td>{{ $guru->pengalaman_mengajar }} tahun</td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <span class="me-2">{{ $guru->rating }}</span>
                                                @for($i = 1; $i <= 5; $i++)
                                                    <i class="fas fa-star {{ $i <= $guru->rating ? 'text-warning' : 'text-muted' }}" style="font-size: 0.8em;"></i>
                                                @endfor
                                            </div>
                                        </td>
                                        <td>
                                            @if($guru->is_active)
                                                <span class="badge bg-success">Aktif</span>
                                            @else
                                                <span class="badge bg-danger">Non-Aktif</span>
                                            @endif
                                        </td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('admin.guru.edit', $guru->id) }}" class="btn btn-primary" title="Edit">
                                                    <i class="fas fa-edit"></i>
                                                </a>
                                                <a href="{{ route('guru.detail', $guru->id) }}" target="_blank" class="btn btn-info" title="Lihat Detail">
                                                    <i class="fas fa-eye"></i>
                                                </a>
                                                <a href="{{ route('admin.guru.toggle', $guru->id) }}" class="btn btn-warning" title="Toggle Status">
                                                    <i class="fas fa-toggle-{{ $guru->is_active ? 'on' : 'off' }}"></i>
                                                </a>
                                                <form action="{{ route('admin.guru.destroy', $guru->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus guru ini?')">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit" class="btn btn-danger" title="Hapus">
                                                        <i class="fas fa-trash"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="9" class="text-center py-4">
                                            <div class="text-muted">
                                                <i class="fas fa-users fa-3x mb-3"></i>
                                                <p>Belum ada data guru atau karyawan</p>
                                                <a href="{{ route('admin.guru.create') }}" class="btn btn-primary">
                                                    <i class="fas fa-plus me-2"></i>
                                                    Tambah Guru/Karyawan Pertama
                                                </a>
                                            </div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>

                    <!-- Pagination -->
                    @if($gurus->hasPages())
                        <div class="d-flex justify-content-center mt-4">
                            {{ $gurus->links() }}
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    // Tab functionality
    document.addEventListener('DOMContentLoaded', function() {
        const tabs = document.querySelectorAll('[data-bs-toggle="tab"]');
        tabs.forEach(tab => {
            tab.addEventListener('click', function(e) {
                e.preventDefault();
                const target = this.getAttribute('data-bs-target');
                const tabContent = document.querySelector(target);
                
                // Hide all tab contents
                document.querySelectorAll('.tab-pane').forEach(pane => {
                    pane.classList.remove('show', 'active');
                });
                
                // Remove active class from all tabs
                tabs.forEach(t => t.classList.remove('active'));
                
                // Show target tab content
                tabContent.classList.add('show', 'active');
                this.classList.add('active');
            });
        });
    });
</script>
@endsection 

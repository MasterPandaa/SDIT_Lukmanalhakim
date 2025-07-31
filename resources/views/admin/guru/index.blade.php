@extends('layouts.admin')

@section('title', 'Kelola Guru')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <!-- Header -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-chalkboard-teacher fa-2x text-primary mr-2"></i>
                    Kelola Guru
                </h1>
                <a href="{{ route('guru') }}" target="_blank" class="btn btn-primary shadow-sm">
                    <i class="fas fa-eye mr-2"></i>
                    Lihat Halaman Publik
                </a>
            </div>

            @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show mb-4">
                    <div class="d-flex align-items-center">
                        <i class="fas fa-check-circle fa-2x mr-3"></i>
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
                        <i class="fas fa-exclamation-circle fa-2x mr-3"></i>
                        <div>
                            <strong>Error!</strong> {{ session('error') }}
                        </div>
                    </div>
                    <button type="button" class="close" data-dismiss="alert">
                        <span>&times;</span>
                    </button>
                </div>
            @endif

            <!-- Daftar Guru -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-primary">
                        <i class="fas fa-list mr-2"></i>
                        Daftar Guru
                    </h6>
                    <a href="{{ route('admin.guru.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus mr-1"></i> Tambah Guru Baru
                    </a>
                </div>
                <div class="card-body">
                    @if(isset($gurus) && $gurus->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="guruTable" width="100%" cellspacing="0">
                                <thead class="bg-light">
                                    <tr>
                                        <th width="70">Foto</th>
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        <th>Pengalaman</th>
                                        <th>Jumlah Siswa</th>
                                        <th>Rating</th>
                                        <th width="80">Status</th>
                                        <th width="120">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($gurus as $item)
                                        <tr>
                                            <td class="text-center">
                                                @if($item->foto)
                                                    <img src="{{ asset('storage/' . $item->foto) }}" alt="{{ $item->nama }}" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                                                @else
                                                    <div class="bg-secondary rounded d-flex align-items-center justify-content-center text-white" style="width: 50px; height: 50px;">
                                                        <i class="fas fa-user"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>{{ $item->nama_lengkap }}</td>
                                            <td>{{ $item->jabatan }}</td>
                                            <td>{{ $item->pengalaman_mengajar }} Tahun</td>
                                            <td>{{ $item->jumlah_siswa }} Siswa</td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    @for($i = 1; $i <= 5; $i++)
                                                        <i class="fas fa-star{{ $i <= $item->rating ? ' text-warning' : ' text-muted' }}"></i>
                                                    @endfor
                                                    <span class="ml-1">({{ $item->rating }})</span>
                                                </div>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge badge-{{ $item->is_active ? 'success' : 'secondary' }} px-3 py-2">
                                                    {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.guru.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('admin.guru.toggle', $item->id) }}" class="btn btn-sm btn-{{ $item->is_active ? 'secondary' : 'success' }}">
                                                        <i class="fas fa-{{ $item->is_active ? 'eye-slash' : 'eye' }}"></i>
                                                    </a>
                                                    <form action="{{ route('admin.guru.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus guru ini?')">
                                                            <i class="fas fa-trash"></i>
                                                        </button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    @else
                        <div class="text-center py-5">
                            <i class="fas fa-chalkboard-teacher fa-3x text-gray-300 mb-3"></i>
                            <h5 class="text-gray-500">Belum ada data guru</h5>
                            <p class="text-gray-400">Klik tombol "Tambah Guru Baru" untuk menambahkan guru pertama.</p>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
.badge {
    font-weight: 500;
}
.table td, .table th {
    vertical-align: middle;
}
</style>
@endpush

@push('scripts')
<script>
$(document).ready(function() {
    $('#guruTable').DataTable({
        "language": {
            "lengthMenu": "Tampilkan _MENU_ data per halaman",
            "zeroRecords": "Tidak ada data yang ditemukan",
            "info": "Menampilkan halaman _PAGE_ dari _PAGES_",
            "infoEmpty": "Tidak ada data yang tersedia",
            "infoFiltered": "(difilter dari _MAX_ total data)",
            "search": "Cari:",
            "paginate": {
                "first": "Pertama",
                "last": "Terakhir",
                "next": "Selanjutnya",
                "previous": "Sebelumnya"
            }
        },
        "order": [[ 2, "asc" ]]
    });
});
</script>
@endpush 
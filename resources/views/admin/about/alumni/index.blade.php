@extends('layouts.admin')

@section('title', 'Kelola Alumni')

@section('content')
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class="col-12">
            <!-- Header -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">
                    <i class="fas fa-user-graduate fa-2x text-success mr-2"></i>
                    Kelola Alumni
                </h1>
                <a href="{{ route('about.alumni') }}" target="_blank" class="btn btn-primary shadow-sm">
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

            <!-- Daftar Alumni -->
            <div class="card shadow mb-4">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 font-weight-bold text-success">
                        <i class="fas fa-list mr-2"></i>
                        Daftar Alumni
                    </h6>
                    <a href="{{ route('admin.alumni.create') }}" class="btn btn-primary btn-sm">
                        <i class="fas fa-plus mr-1"></i> Tambah Alumni Baru
                    </a>
                </div>
                <div class="card-body">
                    @if(isset($alumni) && $alumni->count() > 0)
                        <div class="table-responsive">
                            <table class="table table-bordered table-hover" id="alumniTable" width="100%" cellspacing="0">
                                <thead class="bg-light">
                                    <tr>
                                        <th width="70">Foto</th>
                                        <th>Nama</th>
                                        <th>Tahun Lulus</th>
                                        <th>Pendidikan Lanjutan</th>
                                        <th>Pekerjaan</th>
                                        <th width="80">Status</th>
                                        <th width="120">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($alumni as $item)
                                        <tr>
                                            <td class="text-center">
                                                @if($item->foto)
                                                    <img src="{{ $item->foto_url }}" alt="{{ $item->nama }}" class="rounded" style="width: 50px; height: 50px; object-fit: cover;">
                                                @else
                                                    <div class="bg-secondary rounded d-flex align-items-center justify-content-center text-white" style="width: 50px; height: 50px;">
                                                        <i class="fas fa-user"></i>
                                                    </div>
                                                @endif
                                            </td>
                                            <td>{{ $item->nama }}</td>
                                            <td>{{ $item->tahun_lulus }}</td>
                                            <td>{{ $item->pendidikan_lanjutan ?? '-' }}</td>
                                            <td>{{ $item->pekerjaan ?? '-' }}</td>
                                            <td class="text-center">
                                                <span class="badge badge-{{ $item->is_active ? 'success' : 'secondary' }} px-3 py-2">
                                                    {{ $item->is_active ? 'Aktif' : 'Nonaktif' }}
                                                </span>
                                            </td>
                                            <td>
                                                <div class="btn-group">
                                                    <a href="{{ route('admin.alumni.edit', $item->id) }}" class="btn btn-sm btn-warning">
                                                        <i class="fas fa-edit"></i>
                                                    </a>
                                                    <a href="{{ route('admin.alumni.toggle', $item->id) }}" class="btn btn-sm btn-{{ $item->is_active ? 'secondary' : 'success' }}">
                                                        <i class="fas fa-{{ $item->is_active ? 'eye-slash' : 'eye' }}"></i>
                                                    </a>
                                                    <form action="{{ route('admin.alumni.destroy', $item->id) }}" method="POST" style="display:inline-block;">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Yakin ingin menghapus alumni ini?')">
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
                            <i class="fas fa-user-graduate fa-3x text-gray-300 mb-3"></i>
                            <h5 class="text-gray-500">Belum ada data alumni</h5>
                            <p class="text-gray-400">Klik tombol "Tambah Alumni Baru" untuk menambahkan alumni pertama.</p>
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
    $('#alumniTable').DataTable({
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
        "order": [[ 2, "desc" ]]
    });
});
</script>
@endpush
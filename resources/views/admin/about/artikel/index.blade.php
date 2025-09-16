@extends('layouts.admin')

@section('title', 'About - Artikel')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 fw-bold text-success">Kelola Artikel</h6>
                    <a href="{{ route('admin.artikel.create') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-plus me-1"></i> Tambah Artikel
                    </a>
                </div>
                <div class="card-body">
                    @if(session('success'))
                        <div class="alert alert-success">{{ session('success') }}</div>
                    @endif
                    @if(session('error'))
                        <div class="alert alert-danger">{{ session('error') }}</div>
                    @endif

                    <form method="GET" action="{{ route('admin.artikel.index') }}" class="row g-2 align-items-center mb-3">
                        <div class="col-12 col-md-6">
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                                <input type="text" name="q" value="{{ $q ?? request('q') }}" class="form-control" placeholder="Cari judul, kategori, penulis, atau konten...">
                            </div>
                        </div>
                        <div class="col-8 col-md-3">
                            <select name="status" class="form-select" onchange="this.form.submit()">
                                <option value="">Semua Status</option>
                                <option value="active" {{ ($status ?? request('status'))==='active' ? 'selected' : '' }}>Aktif</option>
                                <option value="inactive" {{ ($status ?? request('status'))==='inactive' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                        </div>
                        <div class="col-4 col-md-3 text-end">
                            <button class="btn btn-outline-secondary me-1" type="submit"><i class="fas fa-filter me-1"></i>Filter</button>
                            <a href="{{ route('admin.artikel.index') }}" class="btn btn-light"><i class="fas fa-undo me-1"></i>Reset</a>
                        </div>
                    </form>

                    @include('admin.about.artikel.partials.table')
                </div>
            </div>
        </div>
    </div>
    </div>
@endsection

@push('scripts')
<script>
$(document).ready(function() {
    // Delete button click handler
    $(document).on('click', '.btn-delete', function(e) {
        e.preventDefault();
        
        const url = $(this).data('url');
        const button = $(this);
        
        Swal.fire({
            title: 'Hapus Artikel?',
            text: 'Data yang dihapus tidak dapat dikembalikan!',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, Hapus!',
            cancelButtonText: 'Batal',
            reverseButtons: true
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: url,
                    type: 'DELETE',
                    dataType: 'json',
                    success: function(response) {
                        Swal.fire({
                            icon: 'success',
                            title: 'Berhasil!',
                            text: response.message || 'Artikel berhasil dihapus',
                            timer: 1500,
                            showConfirmButton: false
                        }).then(() => {
                            window.location.reload();
                        });
                    },
                    error: function(xhr) {
                        let errorMessage = 'Terjadi kesalahan saat menghapus artikel';
                        if (xhr.responseJSON && xhr.responseJSON.message) {
                            errorMessage = xhr.responseJSON.message;
                        }
                        Swal.fire({
                            icon: 'error',
                            title: 'Gagal!',
                            text: errorMessage,
                            timer: 2500
                        });
                    }
                });
            }
        });
    });

    // Toggle status handler
    $(document).on('change', '.toggle-status', function() {
        const input = $(this);
        const url = input.data('url');
        const prevState = input.prop('checked');
        
        $.ajax({
            url: url,
            type: 'POST',
            dataType: 'json',
            success: function(response) {
                // Update the UI based on the response
                input.prop('checked', response.is_active);
                
                // Show success message
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil!',
                    text: response.message || 'Status artikel berhasil diubah',
                    timer: 1500,
                    showConfirmButton: false
                });
            },
            error: function(xhr) {
                // Revert the toggle state
                input.prop('checked', !prevState);
                
                // Show error message
                let errorMessage = 'Terjadi kesalahan saat mengubah status';
                if (xhr.responseJSON && xhr.responseJSON.message) {
                    errorMessage = xhr.responseJSON.message;
                }
                
                Swal.fire({
                    icon: 'error',
                    title: 'Gagal!',
                    text: errorMessage,
                    timer: 2500
                });
            }
        });
    });
});
</script>
@endpush

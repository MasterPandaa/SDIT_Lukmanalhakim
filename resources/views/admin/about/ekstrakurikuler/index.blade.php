@extends('layouts.admin')

@section('title', 'About - Ekstrakurikuler')

@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="card border-0 shadow">
                <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                    <h6 class="m-0 fw-bold text-success">Kelola Ekstrakurikuler</h6>
                    <a href="{{ route('admin.ekstrakurikuler.create') }}" class="btn btn-sm btn-success">
                        <i class="fas fa-plus me-1"></i> Tambah Ekstrakurikuler
                    </a>
                </div>
                <div class="card-body">
                    {{-- Notifications handled globally via SweetAlert2 --}}
                    <form method="GET" action="{{ route('admin.ekstrakurikuler.index') }}" class="row g-2 align-items-center mb-3">
                        <div class="col-12 col-md-6">
                            <div class="input-group">
                                <span class="input-group-text bg-white"><i class="fas fa-search"></i></span>
                                <input type="text" name="q" value="{{ request('q') }}" class="form-control" placeholder="Cari nama atau deskripsi...">
                            </div>
                        </div>
                        <div class="col-8 col-md-3">
                            <select name="status" class="form-select" onchange="this.form.submit()">
                                <option value="">Semua Status</option>
                                <option value="active" {{ request('status')==='active' ? 'selected' : '' }}>Aktif</option>
                                <option value="inactive" {{ request('status')==='inactive' ? 'selected' : '' }}>Nonaktif</option>
                            </select>
                        </div>
                        <div class="col-4 col-md-3 text-end">
                            <button class="btn btn-outline-secondary me-1" type="submit"><i class="fas fa-filter me-1"></i>Filter</button>
                            <a href="{{ route('admin.ekstrakurikuler.index') }}" class="btn btn-light"><i class="fas fa-undo me-1"></i>Reset</a>
                        </div>
                    </form>
                    @include('admin.about.ekstrakurikuler.partials.table')
                </div>
            </div>
        </div>
    </div>
</div>
<script>
  document.addEventListener('click', async function(e){
    const btn = e.target.closest('.btn-delete');
    if(!btn) return;
    const url = btn.getAttribute('data-url');
    const csrf = (document.querySelector('meta[name="csrf-token"]')?.getAttribute('content')) || '{{ csrf_token() }}';
    if (typeof Swal !== 'undefined' && Swal.fire) {
      const res = await Swal.fire({
        title: 'Hapus data ini?',
        text: 'Tindakan ini tidak dapat dibatalkan',
        icon: 'warning',
        showCancelButton: true,
        confirmButtonText: 'Ya, hapus',
        cancelButtonText: 'Batal'
      });
      if (!res.isConfirmed) return;
    } else {
      if (!confirm('Hapus data ini?')) return;
    }
    try {
      const resp = await fetch(url, {
        method: 'DELETE',
        headers: {
          'X-CSRF-TOKEN': csrf,
          'Accept': 'application/json',
          'X-Requested-With': 'XMLHttpRequest'
        }
      });
      if (!resp.ok) throw new Error('Gagal menghapus');
      const data = await resp.json().catch(()=>({message:'Berhasil dihapus'}));
      if (typeof Swal !== 'undefined' && Swal.fire) {
        await Swal.fire({ icon: 'success', title: 'Berhasil', text: data.message || 'Ekstrakurikuler berhasil dihapus' });
        window.location.reload();
      } else {
        alert(data.message || 'Ekstrakurikuler berhasil dihapus');
        window.location.reload();
      }
    } catch (err) {
      if (typeof Swal !== 'undefined' && Swal.fire) {
        Swal.fire({ icon: 'error', title: 'Gagal', text: err.message || 'Terjadi kesalahan' });
      } else {
        alert(err.message || 'Terjadi kesalahan');
      }
    }
  });
</script>
@endsection 

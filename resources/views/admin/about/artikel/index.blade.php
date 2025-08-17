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
  (function() {
    const csrf = document.querySelector('meta[name="csrf-token"]')?.getAttribute('content');

    // Delete with SweetAlert2 if available
    document.addEventListener('click', async function(e) {
      const btn = e.target.closest('.btn-delete');
      if (!btn) return;
      e.preventDefault();
      const url = btn.getAttribute('data-url');
      const proceed = await (async () => {
        if (window.Swal) {
          const res = await Swal.fire({
            title: 'Hapus data? ',
            text: 'Tindakan ini tidak dapat dibatalkan.',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#6c757d',
            confirmButtonText: 'Ya, hapus',
            cancelButtonText: 'Batal'
          });
          return res.isConfirmed;
        }
        return confirm('Hapus data ini?');
      })();
      if (!proceed) return;
      try {
        const res = await fetch(url, {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': csrf,
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json',
            'Content-Type': 'application/json'
          },
          body: JSON.stringify({ _method: 'DELETE' })
        });
        if (!res.ok) throw new Error('Request failed');
        const data = await res.json().catch(() => ({}));
        if (window.Swal) {
          await Swal.fire({ icon: 'success', title: 'Berhasil', text: (data.message || 'Data dihapus'), timer: 1200, showConfirmButton: false });
        }
        location.reload();
      } catch (err) {
        if (window.Swal) {
          Swal.fire({ icon: 'error', title: 'Gagal', text: 'Tidak dapat menghapus data.' });
        } else {
          alert('Gagal menghapus data');
        }
      }
    });

    // Toggle status
    document.addEventListener('change', async function(e) {
      const input = e.target.closest('.toggle-status');
      if (!input) return;
      const url = input.getAttribute('data-url');
      const prev = !input.checked; // store previous state
      try {
        const res = await fetch(url, {
          method: 'POST',
          headers: {
            'X-CSRF-TOKEN': csrf,
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
          }
        });
        if (!res.ok) throw new Error('Request failed');
        const data = await res.json().catch(() => ({}));
        if (data && data.status !== undefined) {
          // optionally show toast
        }
      } catch (err) {
        input.checked = prev; // revert
        if (window.Swal) {
          Swal.fire({ icon: 'error', title: 'Gagal', text: 'Tidak dapat mengubah status.' });
        } else {
          alert('Gagal mengubah status');
        }
      }
    });
  })();
</script>
@endpush

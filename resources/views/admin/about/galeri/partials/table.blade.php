<div class="table-responsive">
  <table class="table table-hover align-middle">
    <thead class="table-dark">
      <tr>
        <th style="width:60px">No</th>
        <th style="width:100px">Foto</th>
        <th>Judul</th>
        <th>Status</th>
        <th style="width:140px">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($items as $idx => $row)
      <tr>
        <td>{{ $items->firstItem() + $idx }}</td>
        <td>
          @php $img = $row->foto ? asset('storage/'.$row->foto) : asset('assets/images/feature/01.png'); @endphp
          <img src="{{ $img }}" alt="{{ $row->judul }}" class="rounded" style="width:72px;height:56px;object-fit:cover;box-shadow:none;">
        </td>
        <td class="fw-semibold text-truncate" style="max-width:360px" title="{{ $row->judul }}">{{ $row->judul }}</td>
        <td>
          <div class="form-check form-switch">
            <input class="form-check-input toggle-status" type="checkbox" role="switch" data-url="{{ route('admin.galeri.toggle', $row) }}" {{ $row->is_active ? 'checked' : '' }}>
          </div>
        </td>
        <td class="d-flex gap-1">
          <a href="{{ route('admin.galeri.edit', $row) }}" class="btn btn-sm btn-primary" title="Edit"><i class="fas fa-edit"></i></a>
          <button type="button" class="btn btn-sm btn-danger btn-delete" data-url="{{ route('admin.galeri.destroy', $row) }}" title="Hapus"><i class="fas fa-trash"></i></button>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="5" class="text-center text-muted">Belum ada data.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
<div class="d-flex justify-content-end">{{ $items->links() }}</div>

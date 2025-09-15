<div class="table-responsive">
  <table class="table table-hover align-middle">
    <thead class="table-dark">
      <tr>
        <th style="width:56px">No</th>
        <th style="width:80px">Sampul</th>
        <th>Judul</th>
        <th style="width:140px">Kategori</th>
        <th style="width:170px">Dipublikasikan</th>
        <th style="width:90px">Status</th>
        <th style="width:140px">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($items as $idx => $row)
      <tr>
        <td>{{ $items->firstItem() + $idx }}</td>
        <td>
          @if($row->gambar)
            <img src="{{ $row->gambar_url }}" alt="{{ $row->judul }}" class="rounded" style="width:56px;height:56px;object-fit:cover;box-shadow:none;">
          @else
            <div class="bg-light d-flex align-items-center justify-content-center rounded" style="width:56px;height:56px;"><i class="fas fa-image text-muted"></i></div>
          @endif
        </td>
        <td class="fw-semibold text-truncate" style="max-width:280px" title="{{ $row->judul }}">{{ $row->judul }}</td>
        <td>{{ $row->kategori ?? '-' }}</td>
        <td>{{ $row->formatted_published_at ?? '-' }}</td>
        <td>
          <div class="form-check form-switch">
            <input class="form-check-input toggle-status" type="checkbox" role="switch" data-url="{{ route('admin.about.artikel.toggle', $row->id) }}" {{ $row->is_active ? 'checked' : '' }}>
          </div>
        </td>
        <td class="d-flex gap-1">
          <a href="{{ route('admin.about.artikel.edit', $row->id) }}" class="btn btn-sm btn-primary" title="Edit"><i class="fas fa-edit"></i></a>
          <button type="button" class="btn btn-sm btn-danger btn-delete" data-url="{{ route('admin.about.artikel.destroy', $row->id) }}" title="Hapus"><i class="fas fa-trash"></i></button>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="7" class="text-center text-muted">Belum ada data.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
<div class="d-flex justify-content-end">{{ $items->links() }}</div>

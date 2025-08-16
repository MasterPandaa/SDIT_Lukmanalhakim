<div class="table-responsive">
  <table class="table table-hover">
    <thead class="table-dark">
      <tr>
        <th>No</th>
        <th>Judul</th>
        <th>Tingkat</th>
        <th>Tanggal</th>
        <th>Status</th>
        <th>Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($items as $i => $item)
      <tr>
        <td>{{ $items->firstItem() + $i }}</td>
        <td>
          <div class="d-flex align-items-center">
            @php $thumb = $item->gambar ? asset('storage/'.$item->gambar) : asset('assets/images/achive/01.png'); @endphp
            <img src="{{ $thumb }}" alt="thumb" class="rounded me-2" style="width:60px;height:40px;object-fit:cover;">
            <div class="min-w-0">
              <div class="fw-semibold text-truncate" style="max-width:220px" title="{{ $item->judul }}">{{ $item->judul }}</div>
              <div class="text-muted small">{{ $item->peraih ? $item->peraih : ($item->tingkat ?? '-') }}</div>
            </div>
          </div>
        </td>
        <td>{{ $item->tingkat ?? '-' }}</td>
        <td>{{ optional($item->tanggal)->format('d M Y') ?? '-' }}</td>
        <td>
          <form action="{{ route('admin.prestasi.toggle', $item) }}" method="POST" class="m-0">
            @csrf
            <div class="form-check form-switch m-0">
              <input class="form-check-input" type="checkbox" onchange="this.form.submit()" {{ $item->is_active ? 'checked' : '' }}>
              <label class="form-check-label small">{{ $item->is_active ? 'Aktif' : 'Nonaktif' }}</label>
            </div>
          </form>
        </td>
        <td class="text-nowrap">
          <div class="btn-group" role="group">
            <a href="{{ route('admin.prestasi.edit', $item) }}" class="btn btn-sm btn-primary" title="Edit">
              <i class="fas fa-edit"></i>
            </a>
            <button type="button" class="btn btn-sm btn-danger btn-delete" title="Hapus" data-url="{{ route('admin.prestasi.destroy', $item) }}">
              <i class="fas fa-trash"></i>
            </button>
          </div>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="6" class="text-center">Belum ada data</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
<div>
  {{ $items->links() }}
</div>

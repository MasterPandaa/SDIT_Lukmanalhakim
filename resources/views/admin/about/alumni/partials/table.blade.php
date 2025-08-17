<div class="table-responsive">
  <table class="table table-hover align-middle">
    <thead class="table-dark">
      <tr>
        <th style="width:60px">No</th>
        <th style="width:80px">Foto</th>
        <th>Nama</th>
        <th style="width:120px">Tahun</th>
        <th>Pendidikan</th>
        <th>Pekerjaan</th>
        <th style="width:100px">Status</th>
        <th style="width:140px">Aksi</th>
      </tr>
    </thead>
    <tbody>
      @forelse($items as $idx => $row)
      <tr>
        <td>{{ $items->firstItem() + $idx }}</td>
        <td>
          <img src="{{ $row->foto_url }}" alt="{{ $row->nama }}" class="rounded" style="width:56px;height:56px;object-fit:cover;box-shadow:none;">
        </td>
        <td class="fw-semibold text-truncate" style="max-width:240px" title="{{ $row->nama }}">{{ $row->nama }}</td>
        <td>{{ $row->tahun_lulus }}</td>
        <td class="text-truncate" style="max-width:220px" title="{{ $row->pendidikan_lanjutan }}">{{ $row->pendidikan_lanjutan ?? '-' }}</td>
        <td class="text-truncate" style="max-width:220px" title="{{ $row->pekerjaan }}">{{ $row->pekerjaan ?? '-' }}</td>
        <td>
          <div class="form-check form-switch">
            <input class="form-check-input toggle-status" type="checkbox" role="switch" data-url="{{ route('admin.alumni.toggle', $row->id) }}" {{ $row->is_active ? 'checked' : '' }}>
          </div>
        </td>
        <td class="d-flex gap-1">
          <a href="{{ route('admin.alumni.edit', $row->id) }}" class="btn btn-sm btn-primary" title="Edit"><i class="fas fa-edit"></i></a>
          <button type="button" class="btn btn-sm btn-danger btn-delete" data-url="{{ route('admin.alumni.destroy', $row->id) }}" title="Hapus"><i class="fas fa-trash"></i></button>
        </td>
      </tr>
      @empty
      <tr>
        <td colspan="8" class="text-center text-muted">Belum ada data.</td>
      </tr>
      @endforelse
    </tbody>
  </table>
</div>
<div class="d-flex justify-content-end">{{ $items->links() }}</div>

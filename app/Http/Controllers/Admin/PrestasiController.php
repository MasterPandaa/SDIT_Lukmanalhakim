<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Prestasi;

class PrestasiController extends Controller
{
    public function index()
    {
        $items = Prestasi::ordered()->paginate(15);
        return view('admin.about.prestasi.index', compact('items'));
    }

    public function create()
    {
        return view('admin.about.prestasi.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:4096',
            'tanggal' => 'nullable|date',
            'tingkat' => 'nullable|string|max:100',
            'peraih' => 'nullable|string|max:255',
            'penyelenggara' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
            'urutan' => 'nullable|integer',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('about/prestasi', 'public');
        }

        $data['is_active'] = $request->boolean('is_active', true);
        $data['urutan'] = $data['urutan'] ?? 0;

        Prestasi::create($data);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil ditambahkan');
    }

    public function edit(Prestasi $prestasi)
    {
        return view('admin.about.prestasi.edit', compact('prestasi'));
    }

    public function update(Request $request, Prestasi $prestasi)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:4096',
            'tanggal' => 'nullable|date',
            'tingkat' => 'nullable|string|max:100',
            'peraih' => 'nullable|string|max:255',
            'penyelenggara' => 'nullable|string|max:255',
            'is_active' => 'nullable|boolean',
            'urutan' => 'nullable|integer',
        ]);

        if ($request->hasFile('gambar')) {
            if ($prestasi->gambar) {
                Storage::disk('public')->delete($prestasi->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('about/prestasi', 'public');
        }

        $data['is_active'] = $request->boolean('is_active', true);
        $data['urutan'] = $data['urutan'] ?? 0;

        $prestasi->update($data);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil diperbarui');
    }

    public function destroy(Prestasi $prestasi)
    {
        if ($prestasi->gambar) {
            Storage::disk('public')->delete($prestasi->gambar);
        }
        $prestasi->delete();
        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil dihapus');
    }

    public function toggleStatus(Prestasi $prestasi)
    {
        $prestasi->is_active = !$prestasi->is_active;
        $prestasi->save();
        return redirect()->route('admin.prestasi.index')->with('success', 'Status prestasi diperbarui');
    }
}

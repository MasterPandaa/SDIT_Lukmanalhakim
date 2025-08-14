<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index()
    {
        $items = Galeri::ordered()->paginate(24);
        return view('admin.about.galeri.index', compact('items'));
    }

    public function create()
    {
        return view('admin.about.galeri.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|max:4096',
            'is_active' => 'nullable|boolean',
            'urutan' => 'nullable|integer',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('about/galeri', 'public');
        }

        $data['is_active'] = $request->boolean('is_active', true);
        $data['urutan'] = $data['urutan'] ?? 0;

        Galeri::create($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil ditambahkan');
    }

    public function edit(Galeri $galeri)
    {
        return view('admin.about.galeri.edit', compact('galeri'));
    }

    public function update(Request $request, Galeri $galeri)
    {
        $data = $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'foto' => 'nullable|image|max:4096',
            'is_active' => 'nullable|boolean',
            'urutan' => 'nullable|integer',
        ]);

        if ($request->hasFile('foto')) {
            if ($galeri->foto) {
                Storage::disk('public')->delete($galeri->foto);
            }
            $data['foto'] = $request->file('foto')->store('about/galeri', 'public');
        }

        $data['is_active'] = $request->boolean('is_active', true);
        $data['urutan'] = $data['urutan'] ?? 0;

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil diperbarui');
    }

    public function destroy(Galeri $galeri)
    {
        if ($galeri->foto) {
            Storage::disk('public')->delete($galeri->foto);
        }
        $galeri->delete();
        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil dihapus');
    }

    public function toggleStatus(Galeri $galeri)
    {
        $galeri->is_active = !$galeri->is_active;
        $galeri->save();
        return redirect()->route('admin.galeri.index')->with('success', 'Status galeri diperbarui');
    }
}

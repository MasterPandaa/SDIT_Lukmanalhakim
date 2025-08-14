<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Fasilitas;

class FasilitasController extends Controller
{
    public function index()
    {
        $items = Fasilitas::ordered()->paginate(15);
        return view('admin.about.fasilitas.index', compact('items'));
    }

    public function create()
    {
        return view('admin.about.fasilitas.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori' => 'nullable|string|max:100',
            'foto' => 'nullable|image|max:2048',
            'is_active' => 'nullable|boolean',
            'urutan' => 'nullable|integer',
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('about/fasilitas', 'public');
        }

        $data['is_active'] = $request->boolean('is_active', true);
        $data['urutan'] = $data['urutan'] ?? 0;

        Fasilitas::create($data);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil ditambahkan');
    }

    public function edit(Fasilitas $fasilitas)
    {
        return view('admin.about.fasilitas.edit', ['fasilitas' => $fasilitas]);
    }

    public function update(Request $request, Fasilitas $fasilitas)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'kategori' => 'nullable|string|max:100',
            'foto' => 'nullable|image|max:2048',
            'is_active' => 'nullable|boolean',
            'urutan' => 'nullable|integer',
        ]);

        if ($request->hasFile('foto')) {
            if ($fasilitas->foto) {
                Storage::disk('public')->delete($fasilitas->foto);
            }
            $data['foto'] = $request->file('foto')->store('about/fasilitas', 'public');
        }

        $data['is_active'] = $request->boolean('is_active', true);
        $data['urutan'] = $data['urutan'] ?? 0;

        $fasilitas->update($data);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil diperbarui');
    }

    public function destroy(Fasilitas $fasilitas)
    {
        if ($fasilitas->foto) {
            Storage::disk('public')->delete($fasilitas->foto);
        }
        $fasilitas->delete();
        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil dihapus');
    }

    public function toggleStatus(Fasilitas $fasilitas)
    {
        $fasilitas->is_active = !$fasilitas->is_active;
        $fasilitas->save();
        return redirect()->route('admin.fasilitas.index')->with('success', 'Status fasilitas diperbarui');
    }
}

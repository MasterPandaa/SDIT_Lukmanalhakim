<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index()
    {
        $artikels = Artikel::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.about.artikel.index', compact('artikels'));
    }

    public function create()
    {
        return view('admin.about.artikel.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ringkasan' => 'nullable|string|max:500',
            'penulis' => 'nullable|string|max:100',
            'kategori' => 'nullable|string|max:100',
            'is_active' => 'boolean',
            'published_at' => 'nullable|date'
        ]);

        $data = $request->all();
        // Normalize is_active default to true when checkbox checked/unchecked
        $data['is_active'] = $request->boolean('is_active', true);
        
        // Handle image upload
        if ($request->hasFile('gambar')) {
            // Ensure directory exists
            $dest = public_path('assets/images/artikel');
            if (!is_dir($dest)) {
                @mkdir($dest, 0777, true);
            }
            $image = $request->file('gambar');
            $imageName = time() . '_' . Str::slug($request->judul) . '.' . $image->getClientOriginalExtension();
            $image->move($dest, $imageName);
            $data['gambar'] = $imageName;
        }

        // Set published_at if not provided but article is active
        if ((empty($data['published_at']) || $data['published_at'] === null) && ($data['is_active'] ?? false)) {
            $data['published_at'] = now();
        }

        Artikel::create($data);

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $artikel = Artikel::findOrFail($id);
        return view('admin.about.artikel.edit', compact('artikel'));
    }

    public function update(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        $request->validate([
            'judul' => 'required|string|max:255',
            'konten' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ringkasan' => 'nullable|string|max:500',
            'penulis' => 'nullable|string|max:100',
            'kategori' => 'nullable|string|max:100',
            'is_active' => 'boolean',
            'published_at' => 'nullable|date'
        ]);

        $data = $request->all();

        // Handle image upload
        if ($request->hasFile('gambar')) {
            // Delete old image if exists
            if ($artikel->gambar && file_exists(public_path('assets/images/artikel/' . $artikel->gambar))) {
                unlink(public_path('assets/images/artikel/' . $artikel->gambar));
            }

            $image = $request->file('gambar');
            $imageName = time() . '_' . Str::slug($request->judul) . '.' . $image->getClientOriginalExtension();
            $dest = public_path('assets/images/artikel');
            if (!is_dir($dest)) {
                @mkdir($dest, 0777, true);
            }
            $image->move($dest, $imageName);
            $data['gambar'] = $imageName;
        }

        // Set published_at if not provided but article is active
        if ((empty($data['published_at']) || $data['published_at'] === null) && ($data['is_active'] ?? false) && !$artikel->published_at) {
            $data['published_at'] = now();
        }

        $artikel->update($data);

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $artikel = Artikel::findOrFail($id);

        // Delete image if exists
        if ($artikel->gambar && file_exists(public_path('assets/images/artikel/' . $artikel->gambar))) {
            unlink(public_path('assets/images/artikel/' . $artikel->gambar));
        }

        $artikel->delete();

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil dihapus!');
    }

    public function toggleStatus($id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->is_active = !$artikel->is_active;
        
        // Set published_at if activating and not already set
        if ($artikel->is_active && !$artikel->published_at) {
            $artikel->published_at = now();
        }
        
        $artikel->save();

        $status = $artikel->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return redirect()->route('admin.artikel.index')
            ->with('success', "Artikel berhasil {$status}!");
    }
}
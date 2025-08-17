<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Artikel;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ArtikelController extends Controller
{
    public function index(Request $request)
    {
        $q = trim($request->get('q', ''));
        $status = $request->get('status');

        $query = Artikel::orderBy('created_at', 'desc');

        if ($q) {
            $query->where(function($sub) use ($q) {
                $sub->where('judul', 'like', "%{$q}%")
                    ->orWhere('ringkasan', 'like', "%{$q}%")
                    ->orWhere('konten', 'like', "%{$q}%")
                    ->orWhere('penulis', 'like', "%{$q}%")
                    ->orWhere('kategori', 'like', "%{$q}%");
            });
        }

        if ($status === 'active') {
            $query->where('is_active', true);
        } elseif ($status === 'inactive') {
            $query->where('is_active', false);
        }

        $items = $query->paginate(10)->appends($request->query());

        return view('admin.about.artikel.index', compact('items', 'q', 'status'));
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

    public function destroy(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);

        // Delete image if exists
        if ($artikel->gambar && file_exists(public_path('assets/images/artikel/' . $artikel->gambar))) {
            @unlink(public_path('assets/images/artikel/' . $artikel->gambar));
        }

        $artikel->delete();

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'message' => 'Artikel berhasil dihapus']);
        }

        return redirect()->route('admin.artikel.index')
            ->with('success', 'Artikel berhasil dihapus!');
    }

    public function toggleStatus(Request $request, $id)
    {
        $artikel = Artikel::findOrFail($id);
        $artikel->is_active = !$artikel->is_active;
        
        // Set published_at if activating and not already set
        if ($artikel->is_active && !$artikel->published_at) {
            $artikel->published_at = now();
        }
        
        $artikel->save();

        if ($request->expectsJson() || $request->ajax()) {
            return response()->json(['success' => true, 'is_active' => $artikel->is_active]);
        }

        $status = $artikel->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return redirect()->route('admin.artikel.index')
            ->with('success', "Artikel berhasil {$status}!");
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Galeri;

class GaleriController extends Controller
{
    public function index(Request $request)
    {
        $q = trim($request->get('q', ''));
        $status = $request->get('status');

        $query = Galeri::query()->ordered();

        if ($q) {
            $query->where(function($sub) use ($q) {
                $sub->where('judul', 'like', "%{$q}%")
                    ->orWhere('deskripsi', 'like', "%{$q}%");
            });
        }

        if ($status === 'active') {
            $query->where('is_active', true);
        } elseif ($status === 'inactive') {
            $query->where('is_active', false);
        }

        $items = $query->paginate(15)->appends($request->query());

        if ($request->ajax()) {
            $html = view('admin.about.galeri.partials.table', compact('items'))->render();
            return response()->json([
                'html' => $html,
                'total' => $items->total(),
            ]);
        }

        return view('admin.about.galeri.index', compact('items', 'q', 'status'));
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
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('about/galeri', 'public');
        }

        $data['is_active'] = $request->boolean('is_active');

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
        ]);

        if ($request->hasFile('foto')) {
            if ($galeri->foto) {
                Storage::disk('public')->delete($galeri->foto);
            }
            $data['foto'] = $request->file('foto')->store('about/galeri', 'public');
        }

        $data['is_active'] = $request->boolean('is_active');

        $galeri->update($data);

        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil diperbarui');
    }

    public function destroy(Request $request, Galeri $galeri)
    {
        if ($galeri->foto) {
            Storage::disk('public')->delete($galeri->foto);
        }
        $galeri->delete();
        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }
        return redirect()->route('admin.galeri.index')->with('success', 'Foto galeri berhasil dihapus');
    }

    public function toggleStatus(Request $request, Galeri $galeri)
    {
        $galeri->is_active = !$galeri->is_active;
        $galeri->save();
        if ($request->ajax()) {
            return response()->json(['success' => true, 'is_active' => $galeri->is_active]);
        }
        return redirect()->route('admin.galeri.index')->with('success', 'Status galeri diperbarui');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Prestasi;

class PrestasiController extends Controller
{
    public function index(Request $request)
    {
        $query = Prestasi::query()->ordered();

        if ($request->filled('q')) {
            $q = $request->input('q');
            $query->where(function ($sub) use ($q) {
                $sub->where('judul', 'like', "%{$q}%")
                    ->orWhere('deskripsi', 'like', "%{$q}%")
                    ->orWhere('peraih', 'like', "%{$q}%")
                    ->orWhere('penyelenggara', 'like', "%{$q}%");
            });
        }

        if ($request->filled('status')) {
            if ($request->status === 'active') {
                $query->where('is_active', true);
            } elseif ($request->status === 'inactive') {
                $query->where('is_active', false);
            }
        }

        $items = $query->paginate(15)->appends($request->query());
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
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('about/prestasi', 'public');
        }

        $data['is_active'] = $request->boolean('is_active', true);

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
        ]);

        if ($request->hasFile('gambar')) {
            if ($prestasi->gambar) {
                Storage::disk('public')->delete($prestasi->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('about/prestasi', 'public');
        }

        $data['is_active'] = $request->boolean('is_active', true);

        $prestasi->update($data);

        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil diperbarui');
    }

    public function destroy(Request $request, Prestasi $prestasi)
    {
        if ($prestasi->gambar) {
            Storage::disk('public')->delete($prestasi->gambar);
        }
        $prestasi->delete();
        if ($request->wantsJson() || $request->expectsJson()) {
            return response()->json(['message' => 'Prestasi berhasil dihapus']);
        }
        return redirect()->route('admin.prestasi.index')->with('success', 'Prestasi berhasil dihapus');
    }

    public function toggleStatus(Prestasi $prestasi)
    {
        $prestasi->is_active = !$prestasi->is_active;
        $prestasi->save();
        return redirect()->route('admin.prestasi.index')->with('success', 'Status prestasi diperbarui');
    }
}

<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Fasilitas;

class FasilitasController extends Controller
{
    public function index(Request $request)
    {
        $q = trim($request->get('q', ''));
        $status = $request->get('status');

        $query = Fasilitas::query()->ordered();

        if ($q) {
            $query->where(function($sub) use ($q) {
                $sub->where('nama', 'like', "%{$q}%")
                    ->orWhere('deskripsi', 'like', "%{$q}%")
                    ->orWhere('kategori', 'like', "%{$q}%");
            });
        }

        if ($status === 'active') {
            $query->where('is_active', true);
        } elseif ($status === 'inactive') {
            $query->where('is_active', false);
        }

        $items = $query->paginate(15)->appends($request->query());

        if ($request->ajax()) {
            $html = view('admin.about.fasilitas.partials.table', compact('items'))->render();
            return response()->json([
                'html' => $html,
                'total' => $items->total(),
            ]);
        }

        return view('admin.about.fasilitas.index', compact('items', 'q', 'status'));
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
        ]);

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('about/fasilitas', 'public');
        }

        $data['is_active'] = $request->boolean('is_active');

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
        ]);

        if ($request->hasFile('foto')) {
            if ($fasilitas->foto) {
                Storage::disk('public')->delete($fasilitas->foto);
            }
            $data['foto'] = $request->file('foto')->store('about/fasilitas', 'public');
        }

        $data['is_active'] = $request->boolean('is_active');

        $fasilitas->update($data);

        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil diperbarui');
    }

    public function destroy(Request $request, Fasilitas $fasilitas)
    {
        if ($fasilitas->foto) {
            Storage::disk('public')->delete($fasilitas->foto);
        }
        $fasilitas->delete();
        if ($request->ajax()) {
            return response()->json(['success' => true]);
        }
        return redirect()->route('admin.fasilitas.index')->with('success', 'Fasilitas berhasil dihapus');
    }

    public function toggleStatus(Request $request, Fasilitas $fasilitas)
    {
        $fasilitas->is_active = !$fasilitas->is_active;
        $fasilitas->save();
        if ($request->ajax()) {
            return response()->json(['success' => true, 'is_active' => $fasilitas->is_active]);
        }
        return redirect()->route('admin.fasilitas.index')->with('success', 'Status fasilitas diperbarui');
    }
}

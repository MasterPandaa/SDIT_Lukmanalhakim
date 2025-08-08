<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Ekstrakurikuler;

class EkstrakurikulerController extends Controller
{
    public function index()
    {
        $items = Ekstrakurikuler::ordered()->paginate(15);
        return view('admin.about.ekstrakurikuler.index', compact('items'));
    }

    public function create()
    {
        return view('admin.about.ekstrakurikuler.create');
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
            'is_active' => 'nullable|boolean',
            'urutan' => 'nullable|integer',
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('about/ekstrakurikuler', 'public');
        }

        $data['is_active'] = $request->boolean('is_active', true);
        $data['urutan'] = $data['urutan'] ?? 0;

        Ekstrakurikuler::create($data);

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil ditambahkan');
    }

    public function edit(Ekstrakurikuler $ekstrakurikuler)
    {
        return view('admin.about.ekstrakurikuler.edit', compact('ekstrakurikuler'));
    }

    public function update(Request $request, Ekstrakurikuler $ekstrakurikuler)
    {
        $data = $request->validate([
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar' => 'nullable|image|max:2048',
            'is_active' => 'nullable|boolean',
            'urutan' => 'nullable|integer',
        ]);

        if ($request->hasFile('gambar')) {
            if ($ekstrakurikuler->gambar) {
                Storage::disk('public')->delete($ekstrakurikuler->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('about/ekstrakurikuler', 'public');
        }

        $data['is_active'] = $request->boolean('is_active', true);
        $data['urutan'] = $data['urutan'] ?? 0;

        $ekstrakurikuler->update($data);

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil diperbarui');
    }

    public function destroy(Ekstrakurikuler $ekstrakurikuler)
    {
        if ($ekstrakurikuler->gambar) {
            Storage::disk('public')->delete($ekstrakurikuler->gambar);
        }
        $ekstrakurikuler->delete();
        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil dihapus');
    }

    public function toggleStatus(Ekstrakurikuler $ekstrakurikuler)
    {
        $ekstrakurikuler->is_active = !$ekstrakurikuler->is_active;
        $ekstrakurikuler->save();
        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Status ekstrakurikuler diperbarui');
    }
}

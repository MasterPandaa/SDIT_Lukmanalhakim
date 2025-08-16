<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Models\Ekstrakurikuler;

class EkstrakurikulerController extends Controller
{
    public function index(Request $request)
    {
        $query = Ekstrakurikuler::query()->ordered();

        if ($request->filled('q')) {
            $q = $request->input('q');
            $query->where(function ($sub) use ($q) {
                $sub->where('nama', 'like', "%{$q}%")
                    ->orWhere('deskripsi', 'like', "%{$q}%");
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
        ]);

        if ($request->hasFile('gambar')) {
            $data['gambar'] = $request->file('gambar')->store('about/ekstrakurikuler', 'public');
        }

        $data['is_active'] = $request->boolean('is_active', true);

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
        ]);

        if ($request->hasFile('gambar')) {
            if ($ekstrakurikuler->gambar) {
                Storage::disk('public')->delete($ekstrakurikuler->gambar);
            }
            $data['gambar'] = $request->file('gambar')->store('about/ekstrakurikuler', 'public');
        }

        $data['is_active'] = $request->boolean('is_active', true);

        $ekstrakurikuler->update($data);

        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil diperbarui');
    }

    public function destroy(Request $request, Ekstrakurikuler $ekstrakurikuler)
    {
        if ($ekstrakurikuler->gambar) {
            Storage::disk('public')->delete($ekstrakurikuler->gambar);
        }
        $ekstrakurikuler->delete();
        if ($request->wantsJson() || $request->expectsJson()) {
            return response()->json(['message' => 'Ekstrakurikuler berhasil dihapus']);
        }
        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Ekstrakurikuler berhasil dihapus');
    }

    public function toggleStatus(Ekstrakurikuler $ekstrakurikuler)
    {
        $ekstrakurikuler->is_active = !$ekstrakurikuler->is_active;
        $ekstrakurikuler->save();
        return redirect()->route('admin.ekstrakurikuler.index')->with('success', 'Status ekstrakurikuler diperbarui');
    }
}

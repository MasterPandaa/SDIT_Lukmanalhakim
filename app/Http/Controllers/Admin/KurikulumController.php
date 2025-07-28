<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum;
use App\Models\KurikulumItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;

class KurikulumController extends Controller
{
    /**
     * Display the kurikulum management page
     */
    public function index()
    {
        $kurikulum = Kurikulum::with('allItems')->first();
        
        return view('admin.kurikulum', compact('kurikulum'));
    }

    /**
     * Update kurikulum utama
     */
    public function update(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'deskripsi' => 'nullable|string',
            'gambar_header' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $data = $request->only(['judul', 'subtitle', 'deskripsi']);
            $data['is_active'] = $request->has('is_active');

            // Handle gambar header upload
            if ($request->hasFile('gambar_header')) {
                // Hapus gambar lama jika ada
                $kurikulum = Kurikulum::first();
                if ($kurikulum && $kurikulum->gambar_header && Storage::disk('public')->exists($kurikulum->gambar_header)) {
                    Storage::disk('public')->delete($kurikulum->gambar_header);
                }

                // Upload gambar baru
                $file = $request->file('gambar_header');
                $filename = 'kurikulum-header-' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('kurikulum/header', $filename, 'public');
                $data['gambar_header'] = $path;
            }

            $kurikulum = Kurikulum::updateOrCreateData($data);

            return redirect()->route('admin.kurikulum')
                ->with('success', 'Data kurikulum berhasil diperbarui!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Store new kurikulum item
     */
    public function storeItem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'icon_class' => 'nullable|string|max:100',
            'color' => 'nullable|string|max:7',
            'urutan' => 'required|integer|min:1',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            // Pastikan ada kurikulum utama
            $kurikulum = Kurikulum::first();
            if (!$kurikulum) {
                $kurikulum = Kurikulum::create([
                    'judul' => 'Kurikulum',
                    'subtitle' => 'Pendidikan Berkualitas',
                    'deskripsi' => 'Deskripsi kurikulum akan diisi di sini.'
                ]);
            }

            $data = $request->only(['judul', 'deskripsi', 'icon_class', 'color', 'urutan']);
            $data['kurikulum_id'] = $kurikulum->id;
            $data['is_active'] = $request->has('is_active') ? true : true; // default active
            $data['color'] = $data['color'] ?? '#4e73df';

            // Handle gambar upload
            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $filename = 'kurikulum-item-' . Str::slug($request->judul) . '-' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('kurikulum/items', $filename, 'public');
                $data['gambar'] = $path;
            }

            // Adjust urutan jika diperlukan
            $this->adjustUrutanForNewItem($kurikulum->id, $data['urutan']);

            $item = KurikulumItem::create($data);

            return redirect()->route('admin.kurikulum')
                ->with('success', 'Item kurikulum berhasil ditambahkan!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Update kurikulum item
     */
    public function updateItem(Request $request, $id)
    {
        $item = KurikulumItem::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'icon_class' => 'nullable|string|max:100',
            'color' => 'nullable|string|max:7',
            'urutan' => 'required|integer|min:1',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $data = $request->only(['judul', 'deskripsi', 'icon_class', 'color', 'urutan']);
            $data['is_active'] = $request->has('is_active') ? true : true;
            $data['color'] = $data['color'] ?? '#4e73df';

            // Handle gambar upload
            if ($request->hasFile('gambar')) {
                // Hapus gambar lama jika ada
                if ($item->gambar && Storage::disk('public')->exists($item->gambar)) {
                    Storage::disk('public')->delete($item->gambar);
                }

                // Upload gambar baru
                $file = $request->file('gambar');
                $filename = 'kurikulum-item-' . Str::slug($request->judul) . '-' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('kurikulum/items', $filename, 'public');
                $data['gambar'] = $path;
            }

            // Handle perubahan urutan
            if ($item->urutan != $data['urutan']) {
                $this->adjustUrutanForUpdatedItem($item->kurikulum_id, $item->urutan, $data['urutan'], $item->id);
            }

            $item->update($data);

            return redirect()->route('admin.kurikulum')
                ->with('success', 'Item kurikulum berhasil diperbarui!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Delete kurikulum item
     */
    public function destroyItem($id)
    {
        try {
            $item = KurikulumItem::findOrFail($id);
            $kurikulumId = $item->kurikulum_id;
            $urutan = $item->urutan;

            // Hapus gambar jika ada
            if ($item->gambar && Storage::disk('public')->exists($item->gambar)) {
                Storage::disk('public')->delete($item->gambar);
            }

            $item->delete();

            // Reorder items setelah delete
            KurikulumItem::reorderAfterDelete($kurikulumId, $urutan);

            return redirect()->route('admin.kurikulum')
                ->with('success', 'Item kurikulum berhasil dihapus!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Adjust urutan untuk item baru
     */
    private function adjustUrutanForNewItem($kurikulumId, $newUrutan)
    {
        KurikulumItem::where('kurikulum_id', $kurikulumId)
            ->where('urutan', '>=', $newUrutan)
            ->increment('urutan');
    }

    /**
     * Adjust urutan untuk item yang diupdate
     */
    private function adjustUrutanForUpdatedItem($kurikulumId, $oldUrutan, $newUrutan, $itemId)
    {
        if ($oldUrutan < $newUrutan) {
            // Pindah ke bawah
            KurikulumItem::where('kurikulum_id', $kurikulumId)
                ->where('id', '!=', $itemId)
                ->whereBetween('urutan', [$oldUrutan + 1, $newUrutan])
                ->decrement('urutan');
        } elseif ($oldUrutan > $newUrutan) {
            // Pindah ke atas
            KurikulumItem::where('kurikulum_id', $kurikulumId)
                ->where('id', '!=', $itemId)
                ->whereBetween('urutan', [$newUrutan, $oldUrutan - 1])
                ->increment('urutan');
        }
    }

    /**
     * Toggle status aktif item
     */
    public function toggleItemStatus($id)
    {
        try {
            $item = KurikulumItem::findOrFail($id);
            $item->update(['is_active' => !$item->is_active]);

            $status = $item->is_active ? 'diaktifkan' : 'dinonaktifkan';
            return redirect()->route('admin.kurikulum')
                ->with('success', "Item kurikulum berhasil {$status}!");

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
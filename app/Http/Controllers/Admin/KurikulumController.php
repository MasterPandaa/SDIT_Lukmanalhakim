<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum;
use App\Models\KurikulumItem;
use Illuminate\Http\Request;
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
        
        // Create default kurikulum if none exists
        if (!$kurikulum) {
            $kurikulum = Kurikulum::create([
                'judul' => 'Kurikulum SDIT Luqman Al Hakim',
                'subtitle' => 'Pendidikan Berkualitas',
                'deskripsi' => 'SD Islam Terpadu Luqman Al Hakim Sleman menerapkan empat kurikulum terpadu untuk memberikan pendidikan yang komprehensif dan berkualitas.',
                'is_active' => true
            ]);
        }
        
        return view('admin.profil.kurikulum.index', compact('kurikulum'));
    }

    /**
     * Update kurikulum header
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
                // Create directory if not exists
                if (!file_exists(public_path('assets/images/kurikulum/header'))) {
                    mkdir(public_path('assets/images/kurikulum/header'), 0755, true);
                }

                // Hapus gambar lama jika ada
                $kurikulum = Kurikulum::first();
                if ($kurikulum && $kurikulum->gambar_header && file_exists(public_path('assets/images/kurikulum/header/' . $kurikulum->gambar_header))) {
                    unlink(public_path('assets/images/kurikulum/header/' . $kurikulum->gambar_header));
                }

                // Upload gambar baru
                $file = $request->file('gambar_header');
                $filename = 'kurikulum-header-' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/kurikulum/header'), $filename);
                $data['gambar_header'] = $filename;
            }

            $kurikulum = Kurikulum::updateOrCreateData($data);

            return redirect()->route('admin.kurikulum.index')
                ->with('success', 'Header kurikulum berhasil diperbarui!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Toggle kurikulum status
     */
    public function toggleStatus()
    {
        try {
            $kurikulum = Kurikulum::first();
            
            if (!$kurikulum) {
                return redirect()->route('admin.kurikulum.index')
                    ->with('error', 'Data kurikulum tidak ditemukan!');
            }

            $kurikulum->is_active = !$kurikulum->is_active;
            $kurikulum->save();

            $status = $kurikulum->is_active ? 'diaktifkan' : 'dinonaktifkan';
            return redirect()->route('admin.kurikulum.index')
                ->with('success', "Kurikulum berhasil {$status}!");

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }



    public function createItem()
    {
        $kurikulum = Kurikulum::first();
        return view('admin.profil.kurikulum.item-form', [
            'kurikulum' => $kurikulum,
            'item' => null,
            'action' => route('admin.kurikulum.store-item'),
            'method' => 'POST',
            'title' => 'Tambah Item Kurikulum'
        ]);
    }

    public function editItem($id)
    {
        $kurikulum = Kurikulum::first();
        $item = KurikulumItem::findOrFail($id);
        return view('admin.profil.kurikulum.item-form', [
            'kurikulum' => $kurikulum,
            'item' => $item,
            'action' => route('admin.kurikulum.update-item', $item->id),
            'method' => 'PUT',
            'title' => 'Edit Item Kurikulum'
        ]);
    }

    public function storeItem(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $kurikulum = Kurikulum::first();
            if (!$kurikulum) {
                $kurikulum = Kurikulum::create([
                    'judul' => 'Kurikulum',
                    'subtitle' => 'Pendidikan Berkualitas',
                    'deskripsi' => 'Deskripsi kurikulum akan diisi di sini.'
                ]);
            }

            $data = $request->only(['judul', 'deskripsi']);
            $data['kurikulum_id'] = $kurikulum->id;

            if ($request->hasFile('gambar')) {
                $file = $request->file('gambar');
                $filename = 'kurikulum-item-' . Str::slug($request->judul) . '-' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/kurikulum/items'), $filename);
                $data['gambar'] = $filename;
            }

            KurikulumItem::create($data);

            return redirect()->route('admin.kurikulum.index')
                ->with('success', 'Item kurikulum berhasil ditambahkan!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    public function updateItem(Request $request, $id)
    {
        $item = KurikulumItem::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $data = $request->only(['judul', 'deskripsi']);

            if ($request->hasFile('gambar')) {
                if ($item->gambar && file_exists(public_path('assets/images/kurikulum/items/' . $item->gambar))) {
                    unlink(public_path('assets/images/kurikulum/items/' . $item->gambar));
                }
                $file = $request->file('gambar');
                $filename = 'kurikulum-item-' . Str::slug($request->judul) . '-' . time() . '.' . $file->getClientOriginalExtension();
                $file->move(public_path('assets/images/kurikulum/items'), $filename);
                $data['gambar'] = $filename;
            }

            $item->update($data);

            return redirect()->route('admin.kurikulum.index')
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
            if ($item->gambar && file_exists(public_path('assets/images/kurikulum/items/' . $item->gambar))) {
                unlink(public_path('assets/images/kurikulum/items/' . $item->gambar));
            }

            $item->delete();

            // Reorder items setelah delete
            KurikulumItem::reorderAfterDelete($kurikulumId, $urutan);

            return redirect()->route('admin.kurikulum.index')
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
            return redirect()->route('admin.kurikulum.index')
                ->with('success', "Item kurikulum berhasil {$status}!");

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Kurikulum;
use App\Models\KurikulumItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class KurikulumController extends Controller
{
    /**
     * Menampilkan halaman admin kurikulum
     */
    public function index()
    {
        try {
            $kurikulum = Kurikulum::with('items')->first();
            \Log::debug('Admin/KurikulumController@index - Kurikulum data:', ['kurikulum' => $kurikulum]);
            return view('admin.kurikulum', compact('kurikulum'));
        } catch (\Exception $e) {
            \Log::error('Admin/KurikulumController@index - Error:', ['message' => $e->getMessage()]);
            // Jika terjadi error (misalnya tabel belum ada)
            return view('admin.kurikulum', ['kurikulum' => null])
                ->with('error', 'Tabel kurikulum belum tersedia. Silakan jalankan migrasi database terlebih dahulu.');
        }
    }

    /**
     * Menyimpan perubahan data kurikulum
     */
    public function update(Request $request)
    {
        \Log::debug('Admin/KurikulumController@update - Request data:', $request->all());
        
        $request->validate([
            'judul' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'deskripsi' => 'required|string',
        ]);

        $kurikulum = Kurikulum::first();
        if (!$kurikulum) {
            $kurikulum = new Kurikulum();
            \Log::info('Admin/KurikulumController@update - Creating new Kurikulum record');
        } else {
            \Log::info('Admin/KurikulumController@update - Updating existing Kurikulum record', ['id' => $kurikulum->id]);
        }

        $kurikulum->judul = $request->judul;
        $kurikulum->subtitle = $request->subtitle;
        $kurikulum->deskripsi = $request->deskripsi;
        $kurikulum->save();

        return redirect()->back()->with('success', 'Data kurikulum berhasil diperbarui');
    }

    /**
     * Menambah item kurikulum baru
     */
    public function storeItem(Request $request)
    {
        \Log::debug('Admin/KurikulumController@storeItem - Request data:', $request->all());
        
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'urutan' => 'required|integer|min:0',
        ]);

        $kurikulum = Kurikulum::first();
        if (!$kurikulum) {
            \Log::error('Admin/KurikulumController@storeItem - No Kurikulum record found');
            return redirect()->back()->with('error', 'Data kurikulum utama belum dibuat');
        }

        $item = new KurikulumItem();
        $item->kurikulum_id = $kurikulum->id;
        $item->judul = $request->judul;
        $item->deskripsi = $request->deskripsi;
        $item->urutan = $request->urutan;

        if ($request->hasFile('gambar')) {
            \Log::info('Admin/KurikulumController@storeItem - Processing image upload');
            $gambar = $request->file('gambar');
            $path = $gambar->store('public/kurikulum');
            $item->gambar = str_replace('public/', 'storage/', $path);
            \Log::debug('Admin/KurikulumController@storeItem - Image path:', ['original' => $path, 'stored' => $item->gambar]);
        }

        $item->save();
        \Log::info('Admin/KurikulumController@storeItem - Item created successfully', ['id' => $item->id]);

        return redirect()->back()->with('success', 'Item kurikulum berhasil ditambahkan');
    }

    /**
     * Mengupdate item kurikulum
     */
    public function updateItem(Request $request, $id)
    {
        \Log::debug('Admin/KurikulumController@updateItem - Request data:', array_merge($request->all(), ['id' => $id]));
        
        $request->validate([
            'judul' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'urutan' => 'required|integer|min:0',
        ]);

        try {
            $item = KurikulumItem::findOrFail($id);
            \Log::info('Admin/KurikulumController@updateItem - Item found', ['id' => $id]);
            
            $item->judul = $request->judul;
            $item->deskripsi = $request->deskripsi;
            $item->urutan = $request->urutan;

            if ($request->hasFile('gambar')) {
                \Log::info('Admin/KurikulumController@updateItem - Processing image update');
                // Hapus gambar lama jika ada
                if ($item->gambar && Storage::exists(str_replace('storage/', 'public/', $item->gambar))) {
                    \Log::debug('Admin/KurikulumController@updateItem - Deleting old image', ['path' => $item->gambar]);
                    Storage::delete(str_replace('storage/', 'public/', $item->gambar));
                }

                $gambar = $request->file('gambar');
                $path = $gambar->store('public/kurikulum');
                $item->gambar = str_replace('public/', 'storage/', $path);
                \Log::debug('Admin/KurikulumController@updateItem - New image path:', ['original' => $path, 'stored' => $item->gambar]);
            }

            $item->save();
            \Log::info('Admin/KurikulumController@updateItem - Item updated successfully', ['id' => $item->id]);

            return redirect()->back()->with('success', 'Item kurikulum berhasil diperbarui');
        } catch (\Exception $e) {
            \Log::error('Admin/KurikulumController@updateItem - Error:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Gagal memperbarui item: ' . $e->getMessage());
        }
    }

    /**
     * Menghapus item kurikulum
     */
    public function destroyItem($id)
    {
        \Log::debug('Admin/KurikulumController@destroyItem - Deleting item', ['id' => $id]);
        
        try {
            $item = KurikulumItem::findOrFail($id);
            \Log::info('Admin/KurikulumController@destroyItem - Item found', ['id' => $id]);
            
            // Hapus gambar jika ada
            if ($item->gambar && Storage::exists(str_replace('storage/', 'public/', $item->gambar))) {
                \Log::debug('Admin/KurikulumController@destroyItem - Deleting image', ['path' => $item->gambar]);
                Storage::delete(str_replace('storage/', 'public/', $item->gambar));
            }
            
            $item->delete();
            \Log::info('Admin/KurikulumController@destroyItem - Item deleted successfully', ['id' => $id]);

            return redirect()->back()->with('success', 'Item kurikulum berhasil dihapus');
        } catch (\Exception $e) {
            \Log::error('Admin/KurikulumController@destroyItem - Error:', ['message' => $e->getMessage()]);
            return redirect()->back()->with('error', 'Gagal menghapus item: ' . $e->getMessage());
        }
    }
}
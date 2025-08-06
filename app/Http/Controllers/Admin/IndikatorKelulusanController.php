<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\IndikatorKelulusan;
use App\Models\IndikatorKelulusanKategori;
use App\Models\IndikatorKelulusanSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class IndikatorKelulusanController extends Controller
{
    /**
     * Display the graduation indicator management page
     */
    public function index()
    {
        $kategoris = IndikatorKelulusanKategori::with('allIndikators')->ordered()->get();
        $setting = IndikatorKelulusanSetting::getActive();

        // Create default setting if none exists to ensure the page loads with data
        if (!$setting) {
            $setting = IndikatorKelulusanSetting::create([
                'judul_utama'      => 'Indikator Kelulusan SDIT Luqman Al Hakim',
                'judul_header'     => 'Indikator Kelulusan',
                'deskripsi_header' => 'SD Islam Terpadu Luqman Al Hakim Sleman menerapkan indikator kelulusan sebagai tolak ukur keberhasilan pendidikan.',
                'is_active'        => true,
            ]);
        }

        return view('admin.profil.indikator-kelulusan.index', compact('kategoris', 'setting'));
    }

    /**
     * Update page settings
     */
    public function updateSettings(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'judul_utama' => 'required|string|max:255',
            'judul_header' => 'required|string|max:255',
            'gambar_header' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'video_url' => 'nullable|url',
            'nama_pembicara' => 'nullable|string|max:255',
            'foto_pembicara' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:2048',
            'deskripsi_header' => 'nullable|string',
            'kategori_tags' => 'nullable|string',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $data = $request->only(['judul_utama', 'judul_header', 'video_url', 'nama_pembicara', 'deskripsi_header']);
            $data['is_active'] = $request->has('is_active');
            
            // Process kategori tags
            if ($request->kategori_tags) {
                $tags = explode(',', $request->kategori_tags);
                $data['kategori_tags'] = array_map('trim', $tags);
            }

            // Handle gambar header upload
            if ($request->hasFile('gambar_header')) {
                $setting = IndikatorKelulusanSetting::first();
                if ($setting && $setting->gambar_header && file_exists(public_path('assets/images/indikator-kelulusan/' . $setting->gambar_header))) {
                    unlink(public_path('assets/images/indikator-kelulusan/' . $setting->gambar_header));
                }

                $file = $request->file('gambar_header');
                $filename = time() . '_header_' . $file->getClientOriginalName();
                $file->move(public_path('assets/images/indikator-kelulusan'), $filename);
                $data['gambar_header'] = $filename;
            }

            // Handle foto pembicara upload
            if ($request->hasFile('foto_pembicara')) {
                $setting = IndikatorKelulusanSetting::first();
                if ($setting && $setting->foto_pembicara && file_exists(public_path('assets/images/indikator-kelulusan/' . $setting->foto_pembicara))) {
                    unlink(public_path('assets/images/indikator-kelulusan/' . $setting->foto_pembicara));
                }

                $file = $request->file('foto_pembicara');
                $filename = time() . '_pembicara_' . $file->getClientOriginalName();
                $file->move(public_path('assets/images/indikator-kelulusan'), $filename);
                $data['foto_pembicara'] = $filename;
            }

            IndikatorKelulusanSetting::updateOrCreateData($data);

            return redirect()->route('admin.indikator-kelulusan.index')
                ->with('success', 'Pengaturan halaman berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show form for creating new category
     */
    public function createKategori()
    {
        return view('admin.profil.indikator-kelulusan.create-kategori');
    }

    /**
     * Store new category
     */
    public function storeKategori(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'urutan' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $data = $request->only(['nama', 'deskripsi', 'urutan']);
            $data['is_active'] = $request->has('is_active');

            IndikatorKelulusanKategori::create($data);

            return redirect()->route('admin.indikator-kelulusan.index')
                ->with('success', 'Kategori berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show form for editing category
     */
    public function editKategori($id)
    {
        $kategori = IndikatorKelulusanKategori::findOrFail($id);
        return view('admin.profil.indikator-kelulusan.edit-kategori', compact('kategori'));
    }

    /**
     * Update category
     */
    public function updateKategori(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'urutan' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $kategori = IndikatorKelulusanKategori::findOrFail($id);
            
            $data = $request->only(['nama', 'deskripsi', 'urutan']);
            $data['is_active'] = $request->has('is_active');

            $kategori->update($data);

            return redirect()->route('admin.indikator-kelulusan.index')
                ->with('success', 'Kategori berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Delete category
     */
    public function destroyKategori($id)
    {
        try {
            $kategori = IndikatorKelulusanKategori::findOrFail($id);
            $kategori->delete();

            return redirect()->route('admin.indikator-kelulusan.index')
                ->with('success', 'Kategori berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Toggle category status
     */
    public function toggleKategoriStatus($id)
    {
        try {
            $kategori = IndikatorKelulusanKategori::findOrFail($id);
            $kategori->update(['is_active' => !$kategori->is_active]);

            $status = $kategori->is_active ? 'diaktifkan' : 'dinonaktifkan';
            return redirect()->route('admin.indikator-kelulusan.index')
                ->with('success', "Kategori berhasil {$status}!");
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Show form for creating new indicator
     */
    public function createIndikator()
    {
        $kategoris = IndikatorKelulusanKategori::active()->ordered()->get();
        return view('admin.profil.indikator-kelulusan.create-indikator', compact('kategoris'));
    }

    /**
     * Store new indicator
     */
    public function storeIndikator(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'kategori_id' => 'required|exists:indikator_kelulusan_kategoris,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'durasi' => 'nullable|string|max:50',
            'urutan' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $data = $request->only(['kategori_id', 'judul', 'deskripsi', 'durasi', 'urutan']);
            $data['is_active'] = $request->has('is_active');

            IndikatorKelulusan::create($data);

            return redirect()->route('admin.indikator-kelulusan.index')
                ->with('success', 'Indikator berhasil ditambahkan!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show form for editing indicator
     */
    public function editIndikator($id)
    {
        $indikator = IndikatorKelulusan::with('kategori')->findOrFail($id);
        $kategoris = IndikatorKelulusanKategori::active()->ordered()->get();
        return view('admin.profil.indikator-kelulusan.edit-indikator', compact('indikator', 'kategoris'));
    }

    /**
     * Update indicator
     */
    public function updateIndikator(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'kategori_id' => 'required|exists:indikator_kelulusan_kategoris,id',
            'judul' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'durasi' => 'nullable|string|max:50',
            'urutan' => 'required|integer|min:0',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $indikator = IndikatorKelulusan::findOrFail($id);
            
            $data = $request->only(['kategori_id', 'judul', 'deskripsi', 'durasi', 'urutan']);
            $data['is_active'] = $request->has('is_active');

            $indikator->update($data);

            return redirect()->route('admin.indikator-kelulusan.index')
                ->with('success', 'Indikator berhasil diperbarui!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Delete indicator
     */
    public function destroyIndikator($id)
    {
        try {
            $indikator = IndikatorKelulusan::findOrFail($id);
            $indikator->delete();

            return redirect()->route('admin.indikator-kelulusan.index')
                ->with('success', 'Indikator berhasil dihapus!');
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Toggle indicator status
     */
    public function toggleIndikatorStatus($id)
    {
        try {
            $indikator = IndikatorKelulusan::findOrFail($id);
            $indikator->update(['is_active' => !$indikator->is_active]);

            $status = $indikator->is_active ? 'diaktifkan' : 'dinonaktifkan';
            return redirect()->route('admin.indikator-kelulusan.index')
                ->with('success', "Indikator berhasil {$status}!");
        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
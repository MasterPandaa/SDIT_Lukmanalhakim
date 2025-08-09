<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\GuruKaryawanSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class GuruKaryawanController extends Controller
{
    public function index()
    {
        $setting = GuruKaryawanSetting::first();
        
        if (!$setting) {
            // Create default content if none exists
            $setting = GuruKaryawanSetting::create([
                'judul_header' => 'Guru & Karyawan',
                'deskripsi_header' => 'Tim pengajar dan karyawan SDIT Luqman Al Hakim yang berpengalaman dan berdedikasi tinggi dalam dunia pendidikan.',
                'is_active' => true
            ]);
        }

        $gurus = Guru::orderBy('jabatan', 'asc')->paginate(10);
        $totalGurus = Guru::count();
        $totalAktif = Guru::where('is_active', true)->count();
        $totalNonAktif = Guru::where('is_active', false)->count();
        
        return view('admin.profil.guru-karyawan.index', compact(
            'setting', 
            'gurus', 
            'totalGurus', 
            'totalAktif', 
            'totalNonAktif'
        ));
    }

    public function update(Request $request)
    {
        $setting = GuruKaryawanSetting::first();
        
        if (!$setting) {
            $setting = new GuruKaryawanSetting();
        }

        // Determine which section is being updated based on the request
        $updateData = [];
        
        // Check if header section is being updated
        if ($request->has('judul_header') || $request->has('deskripsi_header') || $request->hasFile('gambar_header')) {
            $request->validate([
                'judul_header' => 'required|string|max:255',
                'deskripsi_header' => 'required|string',
                'gambar_header' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            
            $updateData['judul_header'] = $request->judul_header;
            $updateData['deskripsi_header'] = $request->deskripsi_header;
            
            // Handle image upload
            if ($request->hasFile('gambar_header')) {
                // Delete old image if exists
                if ($setting->gambar_header && file_exists(public_path('assets/images/guru-karyawan/' . $setting->gambar_header))) {
                    unlink(public_path('assets/images/guru-karyawan/' . $setting->gambar_header));
                }

                $image = $request->file('gambar_header');
                $imageName = time() . '_guru_karyawan_header.' . $image->getClientOriginalExtension();
                
                // Create directory if not exists
                if (!file_exists(public_path('assets/images/guru-karyawan'))) {
                    mkdir(public_path('assets/images/guru-karyawan'), 0755, true);
                }
                
                $image->move(public_path('assets/images/guru-karyawan'), $imageName);
                $updateData['gambar_header'] = $imageName;
            }
        }
        
        // Check if status is being updated
        if ($request->has('is_active')) {
            $request->validate([
                'is_active' => 'boolean'
            ]);
            
            $updateData['is_active'] = $request->is_active;
        }

        // Only update if there's data to update
        if (!empty($updateData)) {
            $setting->fill($updateData);
            $setting->save();
            
            return redirect()->route('admin.profil.guru-karyawan.index')
                ->with('success', 'Konten Guru & Karyawan berhasil diperbarui!');
        }

        return redirect()->route('admin.profil.guru-karyawan.index')
            ->with('info', 'Tidak ada perubahan yang dilakukan.');
    }

    public function toggleStatus()
    {
        $setting = GuruKaryawanSetting::first();
        
        if (!$setting) {
            return redirect()->route('admin.profil.guru-karyawan.index')
                ->with('error', 'Konten Guru & Karyawan tidak ditemukan!');
        }

        $setting->is_active = !$setting->is_active;
        $setting->save();

        $status = $setting->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return redirect()->route('admin.profil.guru-karyawan.index')
            ->with('success', "Konten Guru & Karyawan berhasil {$status}!");
    }

    // =============================================================
    // GURU CRUD OPERATIONS (Merged from Admin/GuruController)
    // =============================================================

    /**
     * Show the form for creating a new guru.
     */
    public function create()
    {
        return view('admin.profil.guru-karyawan.form', [
            'guru' => null,
            'action' => route('admin.profil.guru-karyawan.store'),
            'method' => 'POST',
            'title' => 'Tambah Guru/Karyawan Baru'
        ]);
    }

    /**
     * Store a newly created guru in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'pernyataan_pribadi' => 'nullable|string',
            'alamat' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'telepon' => 'nullable|string|max:20',
            'website' => 'nullable|url|max:255',
            'whatsapp' => 'nullable|string|max:20',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'pengalaman_mengajar' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $data = $request->except(['_token', 'foto']);
            $data['is_active'] = $request->has('is_active');

            // Handle foto upload
            if ($request->hasFile('foto')) {
                $file = $request->file('foto');
                $filename = 'guru-' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('guru', $filename, 'public');
                $data['foto'] = $path;
            }

            Guru::create($data);

            return redirect()->route('admin.profil.guru-karyawan.index')
                ->with('success', 'Guru/Karyawan berhasil ditambahkan!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Show the form for editing the specified guru.
     */
    public function edit($id)
    {
        $guru = Guru::findOrFail($id);
        return view('admin.profil.guru-karyawan.form', [
            'guru' => $guru,
            'action' => route('admin.profil.guru-karyawan.update', $guru->id),
            'method' => 'PUT',
            'title' => 'Edit Guru/Karyawan'
        ]);
    }

    /**
     * Update the specified guru in storage.
     */
    public function updateGuru(Request $request, $id)
    {
        $guru = Guru::findOrFail($id);

        $validator = Validator::make($request->all(), [
            'nama' => 'required|string|max:255',
            'jabatan' => 'required|string|max:255',
            'deskripsi' => 'nullable|string',
            'pernyataan_pribadi' => 'nullable|string',
            'alamat' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'telepon' => 'nullable|string|max:20',
            'website' => 'nullable|url|max:255',
            'whatsapp' => 'nullable|string|max:20',
            'instagram' => 'nullable|string|max:255',
            'facebook' => 'nullable|string|max:255',
            'pengalaman_mengajar' => 'required|integer|min:0',
            'foto' => 'nullable|image|mimes:jpeg,jpg,png|max:2048',
            'is_active' => 'boolean'
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        try {
            $data = $request->except(['_token', '_method', 'foto']);
            $data['is_active'] = $request->has('is_active');

            // Handle foto upload
            if ($request->hasFile('foto')) {
                // Delete old foto if exists
                if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                    Storage::disk('public')->delete($guru->foto);
                }

                $file = $request->file('foto');
                $filename = 'guru-' . time() . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('guru', $filename, 'public');
                $data['foto'] = $path;
            }

            $guru->update($data);

            return redirect()->route('admin.profil.guru-karyawan.index')
                ->with('success', 'Guru/Karyawan berhasil diperbarui!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage())
                ->withInput();
        }
    }

    /**
     * Remove the specified guru from storage.
     */
    public function destroy($id)
    {
        try {
            $guru = Guru::findOrFail($id);

            // Delete foto if exists
            if ($guru->foto && Storage::disk('public')->exists($guru->foto)) {
                Storage::disk('public')->delete($guru->foto);
            }

            $guru->delete();

            return redirect()->route('admin.profil.guru-karyawan.index')
                ->with('success', 'Guru/Karyawan berhasil dihapus!');

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    /**
     * Toggle active status of the specified guru.
     */
    public function toggleGuruStatus($id)
    {
        try {
            $guru = Guru::findOrFail($id);
            $guru->update(['is_active' => !$guru->is_active]);

            $status = $guru->is_active ? 'diaktifkan' : 'dinonaktifkan';
            return redirect()->route('admin.profil.guru-karyawan.index')
                ->with('success', "Guru/Karyawan berhasil {$status}!");

        } catch (\Exception $e) {
            return redirect()->back()
                ->with('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }
}
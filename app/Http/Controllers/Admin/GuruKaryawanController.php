<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Guru;
use App\Models\GuruKaryawanSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

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
            
            return redirect()->route('admin.guru-karyawan.index')
                ->with('success', 'Konten Guru & Karyawan berhasil diperbarui!');
        }

        return redirect()->route('admin.guru-karyawan.index')
            ->with('info', 'Tidak ada perubahan yang dilakukan.');
    }

    public function toggleStatus()
    {
        $setting = GuruKaryawanSetting::first();
        
        if (!$setting) {
            return redirect()->route('admin.guru-karyawan.index')
                ->with('error', 'Konten Guru & Karyawan tidak ditemukan!');
        }

        $setting->is_active = !$setting->is_active;
        $setting->save();

        $status = $setting->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return redirect()->route('admin.guru-karyawan.index')
            ->with('success', "Konten Guru & Karyawan berhasil {$status}!");
    }
}
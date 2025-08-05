<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\VisiMisi;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class VisiMisiController extends Controller
{
    public function index()
    {
        $visiMisi = VisiMisi::first();
        
        if (!$visiMisi) {
            // Create default content if none exists
            $visiMisi = VisiMisi::create([
                'judul_header' => 'Faith is the Light of Life',
                'deskripsi_header' => 'Yuk, jadikan pendidikan agama sebagai panduan hidup untuk masa depan yang lebih bermakna!',
                'visi' => 'Terwujudnya Generasi Unggul yang Qur\'ani, Berakhlaq Mulia, Berprestasi, Peduli, Berbudaya Lingkungan, dan Berwawasan Global.​',
                'misi_items' => VisiMisi::getDefaultMisiItems(),
                'is_active' => true
            ]);
        }
        
        return view('admin.visi-misi.index', compact('visiMisi'));
    }

    public function update(Request $request)
    {
        $visiMisi = VisiMisi::first();
        
        if (!$visiMisi) {
            $visiMisi = new VisiMisi();
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
                if ($visiMisi->gambar_header && file_exists(public_path('assets/images/visi-misi/' . $visiMisi->gambar_header))) {
                    unlink(public_path('assets/images/visi-misi/' . $visiMisi->gambar_header));
                }

                $image = $request->file('gambar_header');
                $imageName = time() . '_visi_misi_header.' . $image->getClientOriginalExtension();
                
                // Create directory if not exists
                if (!file_exists(public_path('assets/images/visi-misi'))) {
                    mkdir(public_path('assets/images/visi-misi'), 0755, true);
                }
                
                $image->move(public_path('assets/images/visi-misi'), $imageName);
                $updateData['gambar_header'] = $imageName;
            }
        }
        
        // Check if visi section is being updated
        if ($request->has('visi')) {
            $request->validate([
                'visi' => 'required|string',
            ]);
            
            $updateData['visi'] = $request->visi;
        }
        
        // Check if misi section is being updated
        if ($request->has('misi_items')) {
            $request->validate([
                'misi_items' => 'required|array',
                'misi_items.*.judul' => 'required|string|max:255',
                'misi_items.*.deskripsi' => 'required|string',
                'misi_items.*.icon' => 'required|string|max:100',
            ]);
            
            // Clean misi_items array (remove empty items)
            $misiItems = [];
            foreach ($request->misi_items as $item) {
                if (!empty($item['judul']) && !empty($item['deskripsi'])) {
                    $misiItems[] = [
                        'judul' => $item['judul'],
                        'deskripsi' => $item['deskripsi'],
                        'icon' => $item['icon']
                    ];
                }
            }
            $updateData['misi_items'] = $misiItems;
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
            $visiMisi->fill($updateData);
            $visiMisi->save();
            
            return redirect()->route('admin.visi-misi.index')
                ->with('success', 'Konten Visi Misi berhasil diperbarui!');
        }

        return redirect()->route('admin.visi-misi.index')
            ->with('info', 'Tidak ada perubahan yang dilakukan.');
    }

    public function toggleStatus()
    {
        $visiMisi = VisiMisi::first();
        
        if (!$visiMisi) {
            return redirect()->route('admin.visi-misi.index')
                ->with('error', 'Konten Visi Misi tidak ditemukan!');
        }

        $visiMisi->is_active = !$visiMisi->is_active;
        $visiMisi->save();

        $status = $visiMisi->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return redirect()->route('admin.visi-misi.index')
            ->with('success', "Konten Visi Misi berhasil {$status}!");
    }
} 
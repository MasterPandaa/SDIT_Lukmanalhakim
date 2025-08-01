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
        $request->validate([
            'judul_header' => 'required|string|max:255',
            'deskripsi_header' => 'required|string',
            'visi' => 'required|string',
            'misi_items' => 'required|array',
            'misi_items.*.judul' => 'required|string|max:255',
            'misi_items.*.deskripsi' => 'required|string',
            'misi_items.*.icon' => 'required|string|max:100',
            'gambar_header' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean'
        ]);

        $visiMisi = VisiMisi::first();
        
        if (!$visiMisi) {
            $visiMisi = new VisiMisi();
        }

        $data = $request->all();

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
            $data['gambar_header'] = $imageName;
        }

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
        $data['misi_items'] = $misiItems;

        $visiMisi->fill($data);
        $visiMisi->save();

        return redirect()->route('admin.visi-misi.index')
            ->with('success', 'Konten Visi Misi berhasil diperbarui!');
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
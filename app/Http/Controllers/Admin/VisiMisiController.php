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
        
        return view('admin.profil.visi-misi.index', compact('visiMisi'));
    }

    public function update(Request $request)
    {
        $visiMisi = VisiMisi::first();
        
        if (!$visiMisi) {
            $visiMisi = new VisiMisi();
        }

        // Determine which section is being updated based on the request data
        $updateType = $this->determineUpdateType($request);
        
        // Validate based on update type
        $this->validateByUpdateType($request, $updateType);

        $data = [];

        // Handle different update types
        switch ($updateType) {
            case 'header':
                $data = $this->handleHeaderUpdate($request, $visiMisi);
                break;
            case 'visi':
                $data = $this->handleVisiUpdate($request);
                break;
            case 'misi':
                $data = $this->handleMisiUpdate($request);
                break;
            case 'all':
                $data = $this->handleAllUpdate($request, $visiMisi);
                break;
        }

        $visiMisi->fill($data);
        $visiMisi->save();

        $sectionName = $this->getSectionName($updateType);
        return redirect()->route('admin.profil.visi-misi.index')
            ->with('success', "Konten {$sectionName} berhasil diperbarui!");
    }

    private function determineUpdateType(Request $request)
    {
        if ($request->has('judul_header') && $request->has('deskripsi_header')) {
            return 'header';
        } elseif ($request->has('visi')) {
            return 'visi';
        } elseif ($request->has('misi_items')) {
            return 'misi';
        } else {
            return 'all';
        }
    }

    private function validateByUpdateType(Request $request, $updateType)
    {
        switch ($updateType) {
            case 'header':
                $request->validate([
                    'judul_header' => 'required|string|max:255',
                    'deskripsi_header' => 'required|string',
                    'gambar_header' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);
                break;
            case 'visi':
                $request->validate([
                    'visi' => 'required|string',
                ]);
                break;
            case 'misi':
                $request->validate([
                    'misi_items' => 'required|array|min:3|max:6',
                    'misi_items.*.judul' => 'required|string|max:255',
                    'misi_items.*.deskripsi' => 'required|string',
                    'misi_items.*.icon' => 'required|string|max:100',
                ]);
                break;
            case 'all':
        $request->validate([
            'judul_header' => 'required|string|max:255',
            'deskripsi_header' => 'required|string',
            'visi' => 'required|string',
                    'misi_items' => 'required|array|min:3|max:6',
            'misi_items.*.judul' => 'required|string|max:255',
            'misi_items.*.deskripsi' => 'required|string',
            'misi_items.*.icon' => 'required|string|max:100',
            'gambar_header' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'is_active' => 'boolean'
        ]);
                break;
        }
    }

    private function handleHeaderUpdate(Request $request, $visiMisi)
    {
        $data = [
            'judul_header' => $request->judul_header,
            'deskripsi_header' => $request->deskripsi_header,
        ];

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

        return $data;
    }

    private function handleVisiUpdate(Request $request)
    {
        return [
            'visi' => $request->visi,
        ];
    }

    private function handleMisiUpdate(Request $request)
    {
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

        return [
            'misi_items' => $misiItems,
        ];
    }

    private function handleAllUpdate(Request $request, $visiMisi)
    {
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

        return $data;
    }

    private function getSectionName($updateType)
    {
        switch ($updateType) {
            case 'header':
                return 'Header';
            case 'visi':
                return 'Visi';
            case 'misi':
                return 'Misi';
            case 'all':
                return 'Visi Misi';
            default:
                return 'Konten';
        }
    }

    public function toggleStatus()
    {
        $visiMisi = VisiMisi::first();
        
        if (!$visiMisi) {
            return redirect()->route('admin.profil.visi-misi.index')
                ->with('error', 'Konten Visi Misi tidak ditemukan!');
        }

        $visiMisi->is_active = !$visiMisi->is_active;
        $visiMisi->save();

        $status = $visiMisi->is_active ? 'diaktifkan' : 'dinonaktifkan';
        
        return redirect()->route('admin.profil.visi-misi.index')
            ->with('success', "Konten Visi Misi berhasil {$status}!");
    }
} 
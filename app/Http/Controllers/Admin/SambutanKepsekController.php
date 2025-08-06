<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SambutanKepsek;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class SambutanKepsekController extends Controller
{
    public function index()
    {
        $sambutanKepsek = SambutanKepsek::first();
        
        if (!$sambutanKepsek) {
            // Create default content if none exists
            $sambutanKepsek = SambutanKepsek::create([
                'judul_header' => 'Sambutan Kepala Sekolah',
                'deskripsi_header' => 'Selamat datang di website resmi sekolah kami. Mari bersama membangun masa depan pendidikan yang berkualitas.',
                'sambutan' => 'Assalamu\'alaikum Warahmatullahi Wabarakatuh. Puji syukur kehadirat Allah SWT atas segala rahmat dan karunia-Nya. Selamat datang di website resmi sekolah kami.',
                'video_url' => 'https://www.youtube.com/embed/example',
                'tahun_berdiri' => date('Y'),
                'is_active' => true
            ]);
        }
        
        return view('admin.sambutan-kepsek.index', compact('sambutanKepsek'));
    }

    public function update(Request $request)
    {
        $sambutanKepsek = SambutanKepsek::first();
        
        if (!$sambutanKepsek) {
            $sambutanKepsek = new SambutanKepsek();
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
                if ($sambutanKepsek->gambar_header && file_exists(public_path('assets/images/sambutan-kepsek/' . $sambutanKepsek->gambar_header))) {
                    unlink(public_path('assets/images/sambutan-kepsek/' . $sambutanKepsek->gambar_header));
                }

                $image = $request->file('gambar_header');
                $imageName = time() . '_sambutan_kepsek_header.' . $image->getClientOriginalExtension();
                
                // Create directory if not exists
                if (!file_exists(public_path('assets/images/sambutan-kepsek'))) {
                    mkdir(public_path('assets/images/sambutan-kepsek'), 0755, true);
                }
                
                $image->move(public_path('assets/images/sambutan-kepsek'), $imageName);
                $updateData['gambar_header'] = $imageName;
            }
        }
        
        // Check if sambutan section is being updated
        if ($request->has('sambutan') || $request->has('video_url') || $request->has('tahun_berdiri') || $request->hasFile('foto_kepsek')) {
            $request->validate([
                'sambutan' => 'required|string',
                'video_url' => 'nullable|url',
                'tahun_berdiri' => 'required|integer|min:1900|max:' . (date('Y') + 10),
                'foto_kepsek' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);
            
            $updateData['sambutan'] = $request->sambutan;
            $updateData['video_url'] = $request->video_url;
            $updateData['tahun_berdiri'] = $request->tahun_berdiri;
            
            // Handle foto kepsek upload
            if ($request->hasFile('foto_kepsek')) {
                // Delete old image if exists
                if ($sambutanKepsek->foto_kepsek && file_exists(public_path('assets/images/sambutan-kepsek/' . $sambutanKepsek->foto_kepsek))) {
                    unlink(public_path('assets/images/sambutan-kepsek/' . $sambutanKepsek->foto_kepsek));
                }

                $image = $request->file('foto_kepsek');
                $imageName = time() . '_foto_kepsek.' . $image->getClientOriginalExtension();
                
                // Create directory if not exists
                if (!file_exists(public_path('assets/images/sambutan-kepsek'))) {
                    mkdir(public_path('assets/images/sambutan-kepsek'), 0755, true);
                }
                
                $image->move(public_path('assets/images/sambutan-kepsek'), $imageName);
                $updateData['foto_kepsek'] = $imageName;
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
            $sambutanKepsek->fill($updateData);
            $sambutanKepsek->save();
            
            return redirect()->route('admin.sambutan-kepsek.index')
                ->with('success', 'Konten Sambutan Kepala Sekolah berhasil diperbarui!');
        }

        return redirect()->route('admin.sambutan-kepsek.index')
            ->with('info', 'Tidak ada perubahan yang dilakukan.');
    }

    public function toggleStatus()
    {
        $sambutanKepsek = SambutanKepsek::first();
        
        if (!$sambutanKepsek) {
            return redirect()->route('admin.sambutan-kepsek.index')
                ->with('error', 'Konten Sambutan Kepala Sekolah tidak ditemukan!');
        }

        $sambutanKepsek->is_active = !$sambutanKepsek->is_active;
        $sambutanKepsek->save();

        $status = $sambutanKepsek->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return redirect()->route('admin.sambutan-kepsek.index')
            ->with('success', "Konten Sambutan Kepala Sekolah berhasil {$status}!");
    }
}
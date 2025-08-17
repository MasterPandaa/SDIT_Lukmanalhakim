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
        
        return view('admin.profil.sambutan-kepsek.index', compact('sambutanKepsek'));
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
        if ($request->has('judul_header') || $request->has('deskripsi_header')) {
            $request->validate([
                'judul_header' => 'required|string|max:255',
                'deskripsi_header' => 'required|string|max:1000',
            ]);
            
            $updateData['judul_header'] = $request->judul_header;
            $updateData['deskripsi_header'] = $request->deskripsi_header;
        }
        
        // Check if sambutan section is being updated
        if ($request->has('sambutan') || $request->has('video_url') || $request->has('tahun_berdiri') || $request->hasFile('foto_kepsek') || $request->hasFile('foto_kedua')) {
            $request->validate([
                'sambutan' => 'required|string',
                'video_url' => 'nullable|url',
                'tahun_berdiri' => 'required|integer|min:1|max:100',
                'foto_kepsek' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
                'foto_kedua' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
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
            
            // Handle foto kedua upload
            if ($request->hasFile('foto_kedua')) {
                // Delete old image if exists
                if ($sambutanKepsek->foto_kedua && file_exists(public_path('assets/images/sambutan-kepsek/' . $sambutanKepsek->foto_kedua))) {
                    unlink(public_path('assets/images/sambutan-kepsek/' . $sambutanKepsek->foto_kedua));
                }

                $image = $request->file('foto_kedua');
                $imageName = time() . '_foto_kedua.' . $image->getClientOriginalExtension();
                
                // Create directory if not exists
                if (!file_exists(public_path('assets/images/sambutan-kepsek'))) {
                    mkdir(public_path('assets/images/sambutan-kepsek'), 0755, true);
                }
                
                $image->move(public_path('assets/images/sambutan-kepsek'), $imageName);
                $updateData['foto_kedua'] = $imageName;
            }
        }
        
        // Check if status is being updated
        if ($request->has('is_active')) {
            $request->validate([
                'is_active' => 'boolean'
            ]);
            
            $updateData['is_active'] = $request->is_active;
        }

        // Handle Testimonials repeater (dynamic)
        if ($request->has('testimonials')) {
            $request->validate([
                'testimonials' => 'array',
                'testimonials.*.name' => 'required|string|max:100',
                'testimonials.*.role' => 'nullable|string|max:150',
                'testimonials.*.text' => 'required|string',
                'testimonials.*.rating' => 'nullable|integer|min:1|max:5',
                'testimonial_photos.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ]);

            $items = $request->input('testimonials', []);
            $photos = $request->file('testimonial_photos', []);

            $processedTestimonials = [];
            foreach ($items as $idx => $item) {
                $photoPath = $item['photo_path'] ?? null;
                if (isset($photos[$idx]) && $photos[$idx] && $photos[$idx]->isValid()) {
                    $dir = public_path('assets/images/sambutan-kepsek/testimonials');
                    if (!file_exists($dir)) {
                        mkdir($dir, 0755, true);
                    }
                    $image = $photos[$idx];
                    $imageName = time() . '_' . $idx . '_testimonial.' . $image->getClientOriginalExtension();
                    $image->move($dir, $imageName);
                    $photoPath = 'assets/images/sambutan-kepsek/testimonials/' . $imageName;
                }

                $processedTestimonials[] = [
                    'name' => $item['name'] ?? '',
                    'role' => $item['role'] ?? '',
                    'text' => $item['text'] ?? '',
                    'rating' => (int)($item['rating'] ?? 5),
                    'photo_path' => $photoPath ?? 'assets/images/feedback/student/01.jpg',
                ];
            }

            $updateData['testimonials'] = $processedTestimonials;
        }

        // Handle Skills repeater
        if ($request->has('skills')) {
            $request->validate([
                'skills' => 'array',
                'skills.*.title' => 'required|string|max:100',
                'skills.*.tagline' => 'nullable|string|max:200',
                'skill_icons.*' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',
            ]);

            $items = $request->input('skills', []);
            $icons = $request->file('skill_icons', []);

            $processedSkills = [];
            foreach ($items as $idx => $item) {
                $iconPath = $item['icon_path'] ?? null;
                if (isset($icons[$idx]) && $icons[$idx] && $icons[$idx]->isValid()) {
                    $dir = public_path('assets/images/sambutan-kepsek/skills');
                    if (!file_exists($dir)) {
                        mkdir($dir, 0755, true);
                    }
                    $image = $icons[$idx];
                    $imageName = time() . '_' . $idx . '_skill.' . $image->getClientOriginalExtension();
                    $image->move($dir, $imageName);
                    $iconPath = 'assets/images/sambutan-kepsek/skills/' . $imageName;
                }

                $processedSkills[] = [
                    'title' => $item['title'] ?? '',
                    'tagline' => $item['tagline'] ?? '',
                    'icon_path' => $iconPath ?? 'assets/images/skill/icon/01.jpg',
                ];
            }

            $updateData['skills'] = $processedSkills;
        }

        // Only update if there's data to update
        if (!empty($updateData)) {
            $sambutanKepsek->fill($updateData);
            $sambutanKepsek->save();
            
            return redirect()->route('admin.profil.sambutan-kepsek.index')
                ->with('success', 'Konten Sambutan Kepala Sekolah berhasil diperbarui!');
        }

        return redirect()->route('admin.profil.sambutan-kepsek.index')
            ->with('info', 'Tidak ada perubahan yang dilakukan.');
    }

    public function toggleStatus()
    {
        $sambutanKepsek = SambutanKepsek::first();
        
        if (!$sambutanKepsek) {
            return redirect()->route('admin.profil.sambutan-kepsek.index')
                ->with('error', 'Konten Sambutan Kepala Sekolah tidak ditemukan!');
        }

        $sambutanKepsek->is_active = !$sambutanKepsek->is_active;
        $sambutanKepsek->save();

        $status = $sambutanKepsek->is_active ? 'diaktifkan' : 'dinonaktifkan';
        return redirect()->route('admin.profil.sambutan-kepsek.index')
            ->with('success', "Konten Sambutan Kepala Sekolah berhasil {$status}!");
    }
}
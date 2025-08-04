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
        $sambutan = SambutanKepsek::first();
        
        if (!$sambutan) {
            // Create default content if none exists
            $sambutan = SambutanKepsek::create([
                'judul' => 'Mewujudkan Generasi Unggul Berakhlak Mulia',
                'subtitle' => 'Cerdas, Berakhlak, Menginspirasi',
                'sambutan' => 'Assalamu\'alaikum Warrahmatullahi Wabarakatuh.<br><br>Puji syukur kehadirat Allah SWT yang telah memberikan rahmat dan karunia-Nya kepada kita semua. Shalawat dan salam semoga selalu tercurah kepada Nabi Muhammad SAW, keluarga, sahabat, dan seluruh umatnya.<br><br>SDIT Luqman Al Hakim Sleman hadir sebagai lembaga pendidikan yang berkomitmen untuk mengembangkan potensi peserta didik secara holistik, mengintegrasikan pendidikan akademik dengan nilai-nilai Islam, dan membentuk karakter yang unggul.<br><br>Kami percaya bahwa setiap anak memiliki potensi unik yang perlu dikembangkan dengan pendekatan yang tepat. Melalui kurikulum yang terintegrasi, metode pembelajaran yang inovatif, dan lingkungan yang kondusif, kami berusaha menciptakan generasi yang tidak hanya cerdas secara akademik, tetapi juga berakhlak mulia dan siap menghadapi tantangan masa depan.<br><br>Kepada seluruh orang tua, guru, dan stakeholder yang telah mendukung perjalanan kami, kami ucapkan terima kasih. Mari kita bersama-sama mewujudkan visi besar untuk menciptakan generasi unggul yang membanggakan bangsa dan agama.<br><br>Wassalamu\'alaikum Warrahmatullahi Wabarakatuh.',
                'video_url' => 'https://www.youtube-nocookie.com/embed/jP649ZHA8Tg',
                'tahun_berdiri' => 11, // Lama sekolah berdiri (11 tahun)
                'foto_kepsek' => null,
                'foto_kepsek2' => null
            ]);
        }
        
        return view('admin.profil.sambutan-kepsek.index', compact('sambutan'));
    }

    public function update(Request $request)
    {
        $sambutan = SambutanKepsek::first();
        
        if (!$sambutan) {
            $sambutan = new SambutanKepsek();
        }

        // Determine which section is being updated based on the request data
        $updateType = $this->determineUpdateType($request);
        
        // Validate based on update type
        $this->validateByUpdateType($request, $updateType);

        $data = [];

        // Handle different update types
        switch ($updateType) {
            case 'header':
                $data = $this->handleHeaderUpdate($request, $sambutan);
                break;
            case 'content':
                $data = $this->handleContentUpdate($request);
                break;
            case 'media':
                $data = $this->handleMediaUpdate($request, $sambutan);
                break;
            case 'all':
                $data = $this->handleAllUpdate($request, $sambutan);
                break;
        }

        $sambutan->fill($data);
        $sambutan->save();

        $sectionName = $this->getSectionName($updateType);
        return redirect()->route('admin.profil.sambutan-kepsek')
            ->with('success', "Konten {$sectionName} berhasil diperbarui!");
    }

    private function determineUpdateType(Request $request)
    {
        if ($request->has('judul') && $request->has('subtitle')) {
            return 'header';
        } elseif ($request->has('sambutan')) {
            return 'content';
        } elseif ($request->hasFile('foto_kepsek') || $request->hasFile('foto_kepsek2') || $request->has('video_url')) {
            return 'media';
        } else {
            return 'all';
        }
    }

    private function validateByUpdateType(Request $request, $updateType)
    {
        switch ($updateType) {
            case 'header':
                $request->validate([
                    'judul' => 'required|string|max:255',
                    'subtitle' => 'required|string|max:255',
                    'tahun_berdiri' => 'required|integer|min:1|max:100', // Lama sekolah berdiri (1-100 tahun)
                ]);
                break;
            case 'content':
                $request->validate([
                    'sambutan' => 'required|string',
                ]);
                break;
            case 'media':
                $request->validate([
                    'video_url' => 'nullable|url',
                    'foto_kepsek' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                    'foto_kepsek2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);
                break;
            case 'all':
                $request->validate([
                    'judul' => 'required|string|max:255',
                    'subtitle' => 'required|string|max:255',
                    'sambutan' => 'required|string',
                    'video_url' => 'nullable|url',
                    'tahun_berdiri' => 'required|integer|min:1|max:100', // Lama sekolah berdiri (1-100 tahun)
                    'foto_kepsek' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                    'foto_kepsek2' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
                ]);
                break;
        }
    }

    private function handleHeaderUpdate(Request $request, $sambutan)
    {
        return [
            'judul' => $request->judul,
            'subtitle' => $request->subtitle,
            'tahun_berdiri' => $request->tahun_berdiri,
        ];
    }

    private function handleContentUpdate(Request $request)
    {
        return [
            'sambutan' => $request->sambutan,
        ];
    }

    private function handleMediaUpdate(Request $request, $sambutan)
    {
        $data = [];

        // Handle video URL
        if ($request->has('video_url')) {
            $data['video_url'] = $request->video_url;
        }

        // Handle foto_kepsek upload
        if ($request->hasFile('foto_kepsek')) {
            // Delete old image if exists
            if ($sambutan->foto_kepsek && file_exists(public_path('assets/images/sambutan-kepsek/' . $sambutan->foto_kepsek))) {
                unlink(public_path('assets/images/sambutan-kepsek/' . $sambutan->foto_kepsek));
            }

            $image = $request->file('foto_kepsek');
            $imageName = time() . '_foto_kepsek.' . $image->getClientOriginalExtension();
            
            // Create directory if not exists
            if (!file_exists(public_path('assets/images/sambutan-kepsek'))) {
                mkdir(public_path('assets/images/sambutan-kepsek'), 0755, true);
            }
            
            $image->move(public_path('assets/images/sambutan-kepsek'), $imageName);
            $data['foto_kepsek'] = $imageName;
        }

        // Handle foto_kepsek2 upload
        if ($request->hasFile('foto_kepsek2')) {
            // Delete old image if exists
            if ($sambutan->foto_kepsek2 && file_exists(public_path('assets/images/sambutan-kepsek/' . $sambutan->foto_kepsek2))) {
                unlink(public_path('assets/images/sambutan-kepsek/' . $sambutan->foto_kepsek2));
            }

            $image2 = $request->file('foto_kepsek2');
            $imageName2 = time() . '_foto_kepsek2.' . $image2->getClientOriginalExtension();
            
            // Create directory if not exists
            if (!file_exists(public_path('assets/images/sambutan-kepsek'))) {
                mkdir(public_path('assets/images/sambutan-kepsek'), 0755, true);
            }
            
            $image2->move(public_path('assets/images/sambutan-kepsek'), $imageName2);
            $data['foto_kepsek2'] = $imageName2;
        }

        return $data;
    }

    private function handleAllUpdate(Request $request, $sambutan)
    {
        $data = [
            'judul' => $request->judul,
            'subtitle' => $request->subtitle,
            'sambutan' => $request->sambutan,
            'video_url' => $request->video_url,
            'tahun_berdiri' => $request->tahun_berdiri,
        ];

        // Handle foto_kepsek upload
        if ($request->hasFile('foto_kepsek')) {
            // Delete old image if exists
            if ($sambutan->foto_kepsek && file_exists(public_path('assets/images/sambutan-kepsek/' . $sambutan->foto_kepsek))) {
                unlink(public_path('assets/images/sambutan-kepsek/' . $sambutan->foto_kepsek));
            }

            $image = $request->file('foto_kepsek');
            $imageName = time() . '_foto_kepsek.' . $image->getClientOriginalExtension();
            
            // Create directory if not exists
            if (!file_exists(public_path('assets/images/sambutan-kepsek'))) {
                mkdir(public_path('assets/images/sambutan-kepsek'), 0755, true);
            }
            
            $image->move(public_path('assets/images/sambutan-kepsek'), $imageName);
            $data['foto_kepsek'] = $imageName;
        }

        // Handle foto_kepsek2 upload
        if ($request->hasFile('foto_kepsek2')) {
            // Delete old image if exists
            if ($sambutan->foto_kepsek2 && file_exists(public_path('assets/images/sambutan-kepsek/' . $sambutan->foto_kepsek2))) {
                unlink(public_path('assets/images/sambutan-kepsek/' . $sambutan->foto_kepsek2));
            }

            $image2 = $request->file('foto_kepsek2');
            $imageName2 = time() . '_foto_kepsek2.' . $image2->getClientOriginalExtension();
            
            // Create directory if not exists
            if (!file_exists(public_path('assets/images/sambutan-kepsek'))) {
                mkdir(public_path('assets/images/sambutan-kepsek'), 0755, true);
            }
            
            $image2->move(public_path('assets/images/sambutan-kepsek'), $imageName2);
            $data['foto_kepsek2'] = $imageName2;
        }

        return $data;
    }

    private function getSectionName($updateType)
    {
        switch ($updateType) {
            case 'header':
                return 'Header';
            case 'content':
                return 'Sambutan';
            case 'media':
                return 'Media';
            case 'all':
                return 'Sambutan Kepala Sekolah';
            default:
                return 'Konten';
        }
    }
} 
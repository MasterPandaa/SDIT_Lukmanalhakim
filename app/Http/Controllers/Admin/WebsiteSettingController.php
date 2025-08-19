<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class WebsiteSettingController extends Controller
{
    /**
     * Display the website home management page
     */
    public function home()
    {
        $settings = WebsiteSetting::getSettings();
        return view('admin.website.home.index', ['home' => $settings]);
    }

    /**
     * Display the website settings form
     */
    public function index()
    {
        try {
            $settings = WebsiteSetting::getSettings();
            
            // Check if settings exist, if not create default
            if (!$settings->exists) {
                $settings = WebsiteSetting::create([
                    'header_phone' => '+62 857-4725-5761',
                    'header_address' => 'Sleman, Yogyakarta',
                    'footer_description' => 'SDIT Luqman Al Hakim Sleman is a leading Islamic elementary school...',
                    'footer_copyright_text' => 'SDIT Luqman Al Hakim',
                    'footer_designer_text' => 'TIM IT SDIT Luqman Al Hakim',
                ]);
            }
            
            return view('admin.website.settings.index', compact('settings'));
        } catch (\Exception $e) {
            Log::error('Error loading website settings: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memuat pengaturan website.');
        }
    }

    /**
     * Update Home (Hero, Program Unggulan, Statistik)
     */
    public function updateHome(Request $request)
    {
        try {
            $validated = $request->validate([
                // Hero/Title
                'judul_hero' => 'required|string|max:255',
                'subtitle_hero' => 'nullable|string|max:255',
                'deskripsi_hero' => 'nullable|string',
                'teks_tombol' => 'nullable|string|max:255',
                'link_tombol' => 'nullable|string|max:255', // allow relative URLs
                'gambar_hero' => 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048',

                // Program Unggulan section
                'program_section_title' => 'nullable|string|max:255',
                'program_section_subtitle' => 'nullable|string|max:255',
            ] + $this->programValidationRules() + [
                // Statistik
                'stat_peserta_didik' => 'nullable|integer|min:0',
                'stat_guru' => 'nullable|integer|min:0',
                'stat_kelas' => 'nullable|integer|min:0',
                'stat_ekstrakurikuler' => 'nullable|integer|min:0',
            ]);

            $settings = WebsiteSetting::getSettings();

            // Handle hero image
            if ($request->hasFile('gambar_hero')) {
                try {
                    $file = $request->file('gambar_hero');
                    if ($settings->gambar_hero && \Storage::disk('public')->exists($settings->gambar_hero)) {
                        \Storage::disk('public')->delete($settings->gambar_hero);
                    }
                    $path = $file->store('website/home', 'public');
                    $settings->gambar_hero = $path;
                } catch (\Exception $e) {
                    Log::error('Error uploading hero image: ' . $e->getMessage());
                    return redirect()->back()->with('error', 'Gagal mengunggah gambar hero: ' . $e->getMessage());
                }
            }

            // Handle program images upload (program_1_image ... program_6_image)
            for ($i = 1; $i <= 6; $i++) {
                $inputName = "program_{$i}_image";
                if ($request->hasFile($inputName)) {
                    try {
                        $file = $request->file($inputName);
                        $current = $settings->{"program_{$i}_image"};
                        if ($current && \Storage::disk('public')->exists($current)) {
                            \Storage::disk('public')->delete($current);
                        }
                        $path = $file->store('website/home/programs', 'public');
                        $settings->{"program_{$i}_image"} = $path;
                    } catch (\Exception $e) {
                        Log::error("Error uploading {$inputName}: " . $e->getMessage());
                        return redirect()->back()->with('error', 'Gagal mengunggah gambar program: ' . $e->getMessage());
                    }
                }
            }

            // Update text/url/number fields
            $fields = [
                'judul_hero','subtitle_hero','deskripsi_hero','teks_tombol','link_tombol',
                'program_section_title','program_section_subtitle',
                'stat_peserta_didik','stat_guru','stat_kelas','stat_ekstrakurikuler',
            ];
            for ($i = 1; $i <= 6; $i++) {
                $fields[] = "program_{$i}_text";
                $fields[] = "program_{$i}_url";
            }
            $settings->update($request->only($fields));

            // Clear cache
            try { \Cache::forget('website_settings'); } catch (\Exception $e) { Log::warning('Could not clear cache: ' . $e->getMessage()); }

            return redirect()->route('admin.website.home')->with('success', 'Pengaturan halaman utama berhasil diperbarui!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error in home settings: ' . json_encode($e->errors()));
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error updating home settings: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat menyimpan pengaturan halaman utama.');
        }
    }

    private function programValidationRules(): array
    {
        $rules = [];
        for ($i = 1; $i <= 6; $i++) {
            $rules["program_{$i}_text"] = 'nullable|string|max:255';
            $rules["program_{$i}_url"] = 'nullable|string|max:255';
            $rules["program_{$i}_image"] = 'nullable|image|mimes:jpeg,png,jpg,gif,webp|max:2048';
        }
        return $rules;
    }

    /**
     * Update header settings
     */
    public function updateHeader(Request $request)
    {
        try {
            $validated = $request->validate([
                'header_phone' => 'nullable|string|max:255',
                'header_address' => 'nullable|string|max:255',
                'header_facebook' => 'nullable|url|max:255',
                'header_instagram' => 'nullable|url|max:255',
                'header_youtube' => 'nullable|url|max:255',
                'header_google_map' => 'nullable|url|max:255',
                'header_psb_link' => 'nullable|url|max:255',
                'header_logo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            ]);

            $settings = WebsiteSetting::getSettings();

            // Handle logo upload
            if ($request->hasFile('header_logo')) {
                try {
                    // Validate file
                    $file = $request->file('header_logo');
                    if (!$file->isValid()) {
                        throw new \Exception('File upload tidak valid');
                    }
                    
                    // Check file size
                    if ($file->getSize() > 2048 * 1024) { // 2MB
                        throw new \Exception('Ukuran file terlalu besar (maksimal 2MB)');
                    }
                    
                    // Check file type
                    $allowedTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/gif'];
                    if (!in_array($file->getMimeType(), $allowedTypes)) {
                        throw new \Exception('Tipe file tidak didukung');
                    }
                    
                    // Delete old logo if exists
                    if ($settings->header_logo && Storage::disk('public')->exists($settings->header_logo)) {
                        Storage::disk('public')->delete($settings->header_logo);
                    }
                    
                    $logoPath = $request->file('header_logo')->store('website/logos', 'public');
                    $settings->header_logo = $logoPath;
                } catch (\Exception $e) {
                    Log::error('Error uploading logo: ' . $e->getMessage());
                    return redirect()->back()->with('error', 'Terjadi kesalahan saat upload logo: ' . $e->getMessage());
                }
            }

            $settings->update($request->only([
                'header_phone',
                'header_address',
                'header_facebook',
                'header_instagram',
                'header_youtube',
                'header_google_map',
                'header_psb_link',
            ]));

            // Clear cache after update
            try {
                \Cache::forget('website_settings');
            } catch (\Exception $e) {
                Log::warning('Could not clear cache: ' . $e->getMessage());
            }

            return redirect()->back()->with('success', 'Pengaturan header berhasil diperbarui!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error in header settings: ' . json_encode($e->errors()));
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error updating header settings: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui pengaturan header.');
        }
    }

    /**
     * Update footer settings
     */
    public function updateFooter(Request $request)
    {
        try {
            $validated = $request->validate([
                'footer_description' => 'nullable|string',
                'footer_address' => 'nullable|string|max:255',
                'footer_phone' => 'nullable|string|max:255',
                'footer_email' => 'nullable|email|max:255',
                'footer_facebook' => 'nullable|url|max:255',
                'footer_twitter' => 'nullable|url|max:255',
                'footer_linkedin' => 'nullable|url|max:255',
                'footer_instagram' => 'nullable|url|max:255',
                'footer_pinterest' => 'nullable|url|max:255',
                'footer_copyright_text' => 'nullable|string|max:255',
                'footer_designer_text' => 'nullable|string|max:255',
                'footer_designer_link' => 'nullable|url|max:255',
                
                // Quick Links
                'footer_quick_link_1_text' => 'nullable|string|max:255',
                'footer_quick_link_1_url' => 'nullable|string|max:255',
                'footer_quick_link_2_text' => 'nullable|string|max:255',
                'footer_quick_link_2_url' => 'nullable|string|max:255',
                'footer_quick_link_3_text' => 'nullable|string|max:255',
                'footer_quick_link_3_url' => 'nullable|string|max:255',
                'footer_quick_link_4_text' => 'nullable|string|max:255',
                'footer_quick_link_4_url' => 'nullable|string|max:255',
                'footer_quick_link_5_text' => 'nullable|string|max:255',
                'footer_quick_link_5_url' => 'nullable|string|max:255',
                'footer_quick_link_6_text' => 'nullable|string|max:255',
                'footer_quick_link_6_url' => 'nullable|string|max:255',
                
                // Programs
                'footer_program_1_text' => 'nullable|string|max:255',
                'footer_program_1_url' => 'nullable|string|max:255',
                'footer_program_2_text' => 'nullable|string|max:255',
                'footer_program_2_url' => 'nullable|string|max:255',
                'footer_program_3_text' => 'nullable|string|max:255',
                'footer_program_3_url' => 'nullable|string|max:255',
                'footer_program_4_text' => 'nullable|string|max:255',
                'footer_program_4_url' => 'nullable|string|max:255',
                'footer_program_5_text' => 'nullable|string|max:255',
                'footer_program_5_url' => 'nullable|string|max:255',
                'footer_program_6_text' => 'nullable|string|max:255',
                'footer_program_6_url' => 'nullable|string|max:255',
                
                // News
                'footer_news_1' => 'nullable|string',
                'footer_news_2' => 'nullable|string',
                
                // Bottom Links
                'footer_bottom_link_1_text' => 'nullable|string|max:255',
                'footer_bottom_link_1_url' => 'nullable|string|max:255',
                'footer_bottom_link_2_text' => 'nullable|string|max:255',
                'footer_bottom_link_2_url' => 'nullable|string|max:255',
                'footer_bottom_link_3_text' => 'nullable|string|max:255',
                'footer_bottom_link_3_url' => 'nullable|string|max:255',
                'footer_bottom_link_4_text' => 'nullable|string|max:255',
                'footer_bottom_link_4_url' => 'nullable|string|max:255',
            ]);

            $settings = WebsiteSetting::getSettings();
            $settings->update($request->all());

            // Clear cache after update
            try {
                \Cache::forget('website_settings');
            } catch (\Exception $e) {
                Log::warning('Could not clear cache: ' . $e->getMessage());
            }

            return redirect()->back()->with('success', 'Pengaturan footer berhasil diperbarui!');
        } catch (\Illuminate\Validation\ValidationException $e) {
            Log::error('Validation error in footer settings: ' . json_encode($e->errors()));
            return redirect()->back()->withErrors($e->errors())->withInput();
        } catch (\Exception $e) {
            Log::error('Error updating footer settings: ' . $e->getMessage());
            return redirect()->back()->with('error', 'Terjadi kesalahan saat memperbarui pengaturan footer.');
        }
    }

    /**
     * Get website settings for frontend
     */
    public static function getWebsiteSettings()
    {
        try {
            // Try to get from cache first
            $cacheKey = 'website_settings';
            $settings = \Cache::remember($cacheKey, 3600, function () {
                return WebsiteSetting::getSettings();
            });
            
            return $settings;
        } catch (\Exception $e) {
            Log::error('Error getting website settings: ' . $e->getMessage());
            // Return default settings if database error
            return new WebsiteSetting();
        }
    }
}

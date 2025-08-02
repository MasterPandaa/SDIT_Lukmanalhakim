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

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Log;

class WebsiteSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        // Header Settings
        'header_phone',
        'header_address',
        'header_facebook',
        'header_instagram',
        'header_youtube',
        'header_google_map',
        'header_logo',
        'header_psb_link',
        
        // Footer Settings
        'footer_description',
        'footer_address',
        'footer_phone',
        'footer_email',
        'footer_facebook',
        'footer_tiktok',
        'footer_instagram',
        'footer_copyright_text',
        'footer_designer_text',
        'footer_designer_link',
        
        // Footer Quick Links
        'footer_quick_link_1_text',
        'footer_quick_link_1_url',
        'footer_quick_link_2_text',
        'footer_quick_link_2_url',
        'footer_quick_link_3_text',
        'footer_quick_link_3_url',
        'footer_quick_link_4_text',
        'footer_quick_link_4_url',
        'footer_quick_link_5_text',
        'footer_quick_link_5_url',
        'footer_quick_link_6_text',
        'footer_quick_link_6_url',
        
        // Footer Programs
        'footer_program_1_text',
        'footer_program_1_url',
        'footer_program_2_text',
        'footer_program_2_url',
        'footer_program_3_text',
        'footer_program_3_url',
        'footer_program_4_text',
        'footer_program_4_url',
        'footer_program_5_text',
        'footer_program_5_url',
        'footer_program_6_text',
        'footer_program_6_url',
        
        // Footer News
        'footer_news_1',
        'footer_news_2',
        
        // Footer Bottom Links
        'footer_bottom_link_1_text',
        'footer_bottom_link_1_url',
        'footer_bottom_link_2_text',
        'footer_bottom_link_2_url',
        'footer_bottom_link_3_text',
        'footer_bottom_link_3_url',
        'footer_bottom_link_4_text',
        'footer_bottom_link_4_url',

        // Home: Hero/Title Section
        'judul_hero',
        'subtitle_hero',
        'deskripsi_hero',
        'teks_tombol',
        'link_tombol',
        'gambar_hero',

        // Home: Program Unggulan Section
        'program_section_title',
        'program_section_subtitle',
        'program_1_text', 'program_1_url', 'program_1_image',
        'program_2_text', 'program_2_url', 'program_2_image',
        'program_3_text', 'program_3_url', 'program_3_image',
        'program_4_text', 'program_4_url', 'program_4_image',
        'program_5_text', 'program_5_url', 'program_5_image',
        'program_6_text', 'program_6_url', 'program_6_image',

        // Home: Statistik Section
        'stat_peserta_didik',
        'stat_guru',
        'stat_kelas',
        'stat_ekstrakurikuler',
    ];

    /**
     * Get the first website setting or create one if it doesn't exist
     */
    public static function getSettings()
    {
        try {
            return static::firstOrCreate(['id' => 1]);
        } catch (\Illuminate\Database\QueryException $e) {
            // Database connection error
            Log::error('Database error in WebsiteSetting::getSettings: ' . $e->getMessage());
            return new static();
        } catch (\Exception $e) {
            // Other errors
            Log::error('Error in WebsiteSetting::getSettings: ' . $e->getMessage());
            return new static();
        }
    }

    /**
     * Get header settings
     */
    public function getHeaderSettings()
    {
        return [
            'phone' => $this->header_phone,
            'address' => $this->header_address,
            'facebook' => $this->header_facebook,
            'instagram' => $this->header_instagram,
            'youtube' => $this->header_youtube,
            'google_map' => $this->header_google_map,
            'logo' => $this->header_logo,
            'psb_link' => $this->header_psb_link,
        ];
    }

    /**
     * Get footer settings
     */
    public function getFooterSettings()
    {
        return [
            'description' => $this->footer_description,
            'address' => $this->footer_address,
            'phone' => $this->footer_phone,
            'email' => $this->footer_email,
            'facebook' => $this->footer_facebook,
            'tiktok' => $this->footer_tiktok,
            'instagram' => $this->footer_instagram,
            'copyright_text' => $this->footer_copyright_text,
            'designer_text' => $this->footer_designer_text,
            'designer_link' => $this->footer_designer_link,
        ];
    }

    /**
     * Get footer quick links
     */
    public function getFooterQuickLinks()
    {
        try {
            $links = [];
            for ($i = 1; $i <= 6; $i++) {
                $text = $this->{"footer_quick_link_{$i}_text"};
                $url = $this->{"footer_quick_link_{$i}_url"};
                if ($text && $url) {
                    $links[] = ['text' => $text, 'url' => $url];
                }
            }
            return $links;
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * Get footer programs
     */
    public function getFooterPrograms()
    {
        try {
            $programs = [];
            for ($i = 1; $i <= 6; $i++) {
                $text = $this->{"footer_program_{$i}_text"};
                $url = $this->{"footer_program_{$i}_url"};
                if ($text && $url) {
                    $programs[] = ['text' => $text, 'url' => $url];
                }
            }
            return $programs;
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * Get footer news
     */
    public function getFooterNews()
    {
        try {
            $news = [];
            if ($this->footer_news_1) {
                $news[] = $this->footer_news_1;
            }
            if ($this->footer_news_2) {
                $news[] = $this->footer_news_2;
            }
            return $news;
        } catch (\Exception $e) {
            return [];
        }
    }

    /**
     * Get footer bottom links
     */
    public function getFooterBottomLinks()
    {
        try {
            $links = [];
            for ($i = 1; $i <= 4; $i++) {
                $text = $this->{"footer_bottom_link_{$i}_text"};
                $url = $this->{"footer_bottom_link_{$i}_url"};
                if ($text && $url) {
                    $links[] = ['text' => $text, 'url' => $url];
                }
            }
            return $links;
        } catch (\Exception $e) {
            return [];
        }
    }
}

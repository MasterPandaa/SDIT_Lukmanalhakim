<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SambutanKepsek extends Model
{
    protected $table = 'sambutan_kepsek';
    
    protected $fillable = [
        'judul',
        'subtitle',
        'sambutan',
        'video_url',
        'tahun_berdiri',
        'foto_kepsek',
        'foto_kepsek2'
    ];

    /**
     * Get foto kepsek URL
     */
    public function getFotoKepsekUrlAttribute()
    {
        if (!$this->foto_kepsek) {
            return asset('assets/images/default/kepsek-default.jpg');
        }

        // Jika file ada di public/assets/images, return URL
        if (file_exists(public_path('assets/images/sambutan-kepsek/' . $this->foto_kepsek))) {
            return asset('assets/images/sambutan-kepsek/' . $this->foto_kepsek);
        }

        return asset('assets/images/default/kepsek-default.jpg');
    }

    /**
     * Get foto kepsek2 URL
     */
    public function getFotoKepsek2UrlAttribute()
    {
        if (!$this->foto_kepsek2) {
            return asset('assets/images/default/kepsek-default2.jpg');
        }

        // Jika file ada di public/assets/images, return URL
        if (file_exists(public_path('assets/images/sambutan-kepsek/' . $this->foto_kepsek2))) {
            return asset('assets/images/sambutan-kepsek/' . $this->foto_kepsek2);
        }

        return asset('assets/images/default/kepsek-default2.jpg');
    }
} 
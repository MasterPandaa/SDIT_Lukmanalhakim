<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SambutanKepsek extends Model
{
    protected $table = 'sambutan_kepsek';
    
    protected $fillable = [
        'judul_header',
        'deskripsi_header',
        'sambutan',
        'video_url',
        'tahun_berdiri',
        'foto_kepsek',
        'gambar_header',
        'is_active'
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
     * Get gambar header URL
     */
    public function getGambarHeaderUrlAttribute()
    {
        if (!$this->gambar_header) {
            return asset('assets/images/default/header-default.jpg');
        }

        // Jika file ada di public/assets/images, return URL
        if (file_exists(public_path('assets/images/sambutan-kepsek/' . $this->gambar_header))) {
            return asset('assets/images/sambutan-kepsek/' . $this->gambar_header);
        }

        return asset('assets/images/default/header-default.jpg');
    }
} 
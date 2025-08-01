<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndikatorKelulusanSetting extends Model
{
    use HasFactory;

    protected $table = 'indikator_kelulusan_settings';

    protected $fillable = [
        'judul_utama',
        'judul_header',
        'gambar_header',
        'video_url',
        'nama_pembicara',
        'foto_pembicara',
        'deskripsi_header',
        'kategori_tags',
        'is_active'
    ];

    protected $casts = [
        'kategori_tags' => 'array',
        'is_active' => 'boolean'
    ];

    /**
     * Get active setting
     */
    public static function getActive()
    {
        return self::where('is_active', true)->first();
    }

    /**
     * Update or create data
     */
    public static function updateOrCreateData($data)
    {
        $setting = self::first();
        
        if ($setting) {
            $setting->update($data);
        } else {
            $setting = self::create($data);
        }
        
        return $setting;
    }

    /**
     * Get gambar header URL
     */
    public function getGambarHeaderUrlAttribute()
    {
        if (!$this->gambar_header) {
            return asset('assets/images/default/indikator-kelulusan-header.jpg');
        }

        // Jika file ada di public/assets/images, return URL
        if (file_exists(public_path('assets/images/indikator-kelulusan/' . $this->gambar_header))) {
            return asset('assets/images/indikator-kelulusan/' . $this->gambar_header);
        }

        return asset('assets/images/default/indikator-kelulusan-header.jpg');
    }

    /**
     * Get foto pembicara URL
     */
    public function getFotoPembicaraUrlAttribute()
    {
        if (!$this->foto_pembicara) {
            return asset('assets/images/default/pembicara-default.jpg');
        }

        // Jika file ada di public/assets/images, return URL
        if (file_exists(public_path('assets/images/indikator-kelulusan/' . $this->foto_pembicara))) {
            return asset('assets/images/indikator-kelulusan/' . $this->foto_pembicara);
        }

        return asset('assets/images/default/pembicara-default.jpg');
    }
}
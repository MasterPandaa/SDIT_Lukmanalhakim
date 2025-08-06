<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GuruKaryawanSetting extends Model
{
    use HasFactory;

    protected $table = 'guru_karyawan_settings';

    protected $fillable = [
        'judul_header',
        'deskripsi_header',
        'gambar_header',
        'is_active'
    ];

    protected $casts = [
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
            return asset('assets/images/default/guru-karyawan-header.jpg');
        }

        // Jika file ada di public/assets/images, return URL
        if (file_exists(public_path('assets/images/guru-karyawan/' . $this->gambar_header))) {
            return asset('assets/images/guru-karyawan/' . $this->gambar_header);
        }

        return asset('assets/images/default/guru-karyawan-header.jpg');
    }
}
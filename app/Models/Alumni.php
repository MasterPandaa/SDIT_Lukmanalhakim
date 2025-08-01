<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alumni extends Model
{
    protected $fillable = [
        'nama',
        'foto',
        'tahun_lulus',
        'pendidikan_lanjutan',
        'pekerjaan',
        'prestasi',
        'testimoni',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * Get foto URL
     */
    public function getFotoUrlAttribute()
    {
        if (!$this->foto) {
            return asset('assets/images/default/alumni-default.jpg');
        }

        // Jika file ada di public/assets/images, return URL
        if (file_exists(public_path('assets/images/alumni/' . $this->foto))) {
            return asset('assets/images/alumni/' . $this->foto);
        }

        return asset('assets/images/default/alumni-default.jpg');
    }
}

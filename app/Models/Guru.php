<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = [
        'nama',
        'jabatan',
        'foto',
        'pengalaman_mengajar',
        'pernyataan_pribadi',
        'is_active',
        'urutan'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'pengalaman_mengajar' => 'integer',
        'urutan' => 'integer'
    ];

    // Scope for active content
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Keep backward compatibility: some views may still reference nama_lengkap
    public function getNamaLengkapAttribute()
    {
        return $this->nama;
    }

    public function getFotoUrlAttribute()
    {
        if (!$this->foto) {
            return asset('assets/images/instructor/01.jpg');
        }

        // Jika file ada di storage/app/public, return URL
        if (file_exists(storage_path('app/public/' . $this->foto))) {
            return asset('storage/' . $this->foto);
        }

        // Jika file ada di public/assets/images/guru, return URL
        if (file_exists(public_path('assets/images/guru/' . $this->foto))) {
            return asset('assets/images/guru/' . $this->foto);
        }

        return asset('assets/images/instructor/01.jpg');
    }
}

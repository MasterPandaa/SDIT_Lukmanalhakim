<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Guru extends Model
{
    protected $fillable = [
        'nama',
        'jabatan',
        'gelar',
        'foto',
        'deskripsi',
        'pernyataan_pribadi',
        'alamat',
        'email',
        'telepon',
        'website',
        'whatsapp',
        'instagram',
        'facebook',
        'pengalaman_mengajar',
        'jumlah_siswa',
        'rating',
        'kemampuan_bahasa',
        'penghargaan',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'pengalaman_mengajar' => 'integer',
        'jumlah_siswa' => 'integer',
        'rating' => 'integer',
        'kemampuan_bahasa' => 'array',
        'penghargaan' => 'array'
    ];

    // Scope for active content
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function getNamaLengkapAttribute()
    {
        return $this->nama . ($this->gelar ? ', ' . $this->gelar : '');
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

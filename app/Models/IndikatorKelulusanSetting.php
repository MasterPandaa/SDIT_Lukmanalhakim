<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

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
     * Accessor untuk URL gambar header
     */
    public function getGambarHeaderUrlAttribute()
    {
        if ($this->gambar_header) {
            // Jika path dimulai dengan http/https, return as is
            if (str_starts_with($this->gambar_header, 'http')) {
                return $this->gambar_header;
            }
            
            // Jika file ada di storage, return storage URL
            if (Storage::disk('public')->exists($this->gambar_header)) {
                return Storage::disk('public')->url($this->gambar_header);
            }
            
            // Fallback ke asset
            return asset($this->gambar_header);
        }
        
        // Default image
        return asset('assets/images/pageheader/02.jpg');
    }

    /**
     * Accessor untuk URL foto pembicara
     */
    public function getFotoPembicaraUrlAttribute()
    {
        if ($this->foto_pembicara) {
            // Jika path dimulai dengan http/https, return as is
            if (str_starts_with($this->foto_pembicara, 'http')) {
                return $this->foto_pembicara;
            }
            
            // Jika file ada di storage, return storage URL
            if (Storage::disk('public')->exists($this->foto_pembicara)) {
                return Storage::disk('public')->url($this->foto_pembicara);
            }
            
            // Fallback ke asset
            return asset($this->foto_pembicara);
        }
        
        // Default image
        return asset('assets/images/pageheader/03.jpg');
    }

    /**
     * Method untuk mendapatkan instance setting aktif
     */
    public static function getActive()
    {
        return self::where('is_active', true)->first() ?? new self();
    }

    /**
     * Method untuk update atau create data setting
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
}
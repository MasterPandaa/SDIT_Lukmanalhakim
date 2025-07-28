<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Kurikulum extends Model
{
    use HasFactory;

    protected $table = 'kurikulum';

    protected $fillable = [
        'judul',
        'subtitle',
        'deskripsi',
        'gambar_header',
        'meta_data',
        'is_active'
    ];

    protected $casts = [
        'meta_data' => 'array',
        'is_active' => 'boolean'
    ];

    /**
     * Relasi dengan KurikulumItem
     */
    public function items()
    {
        return $this->hasMany(KurikulumItem::class)->where('is_active', true)->orderBy('urutan');
    }

    /**
     * Semua items termasuk yang tidak aktif
     */
    public function allItems()
    {
        return $this->hasMany(KurikulumItem::class)->orderBy('urutan');
    }

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
        return asset('assets/images/default/kurikulum-header.jpg');
    }

    /**
     * Scope untuk kurikulum aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Method untuk mendapatkan instance kurikulum aktif
     */
    public static function getActive()
    {
        return self::active()->first() ?? new self();
    }

    /**
     * Method untuk update atau create data kurikulum
     */
    public static function updateOrCreateData($data)
    {
        $kurikulum = self::first();
        
        if ($kurikulum) {
            $kurikulum->update($data);
        } else {
            $kurikulum = self::create($data);
        }
        
        return $kurikulum;
    }
}

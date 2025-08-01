<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    use HasFactory;

    protected $table = 'kurikulum';

    protected $fillable = [
        'judul',
        'subtitle',
        'deskripsi',
        'gambar_header',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * Relationship dengan KurikulumItem
     */
    public function items()
    {
        return $this->hasMany(KurikulumItem::class)->ordered();
    }

    /**
     * Relationship dengan semua KurikulumItem (termasuk yang tidak aktif)
     */
    public function allItems()
    {
        return $this->hasMany(KurikulumItem::class)->ordered();
    }

    /**
     * Scope untuk kurikulum aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Get active kurikulum
     */
    public static function getActive()
    {
        return self::active()->first();
    }

    /**
     * Update or create data
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

    /**
     * Get gambar header URL
     */
    public function getGambarHeaderUrlAttribute()
    {
        if (!$this->gambar_header) {
            return asset('assets/images/default/kurikulum-header-default.jpg');
        }

        // Jika file ada di public/assets/images, return URL
        if (file_exists(public_path('assets/images/kurikulum/header/' . $this->gambar_header))) {
            return asset('assets/images/kurikulum/header/' . $this->gambar_header);
        }

        return asset('assets/images/default/kurikulum-header-default.jpg');
    }
}

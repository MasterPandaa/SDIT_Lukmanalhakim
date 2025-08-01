<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KurikulumItem extends Model
{
    use HasFactory;

    protected $table = 'kurikulum_items';

    protected $fillable = [
        'kurikulum_id',
        'judul',
        'deskripsi',
        'gambar',
        'urutan',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * Relationship dengan Kurikulum
     */
    public function kurikulum()
    {
        return $this->belongsTo(Kurikulum::class);
    }

    /**
     * Scope untuk item aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope untuk ordering berdasarkan urutan
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan', 'asc');
    }

    /**
     * Get gambar URL
     */
    public function getGambarUrlAttribute()
    {
        if (!$this->gambar) {
            return asset('assets/images/default/kurikulum-item-default.jpg');
        }

        // Jika file ada di public/assets/images, return URL
        if (file_exists(public_path('assets/images/kurikulum/items/' . $this->gambar))) {
            return asset('assets/images/kurikulum/items/' . $this->gambar);
        }

        return asset('assets/images/default/kurikulum-item-default.jpg');
    }

    /**
     * Reorder items setelah delete
     */
    public static function reorderAfterDelete($kurikulumId, $deletedUrutan)
    {
        self::where('kurikulum_id', $kurikulumId)
            ->where('urutan', '>', $deletedUrutan)
            ->decrement('urutan');
    }
}
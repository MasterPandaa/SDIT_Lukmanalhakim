<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class KurikulumItem extends Model
{
    use HasFactory;

    protected $table = 'kurikulum_items';

    protected $fillable = [
        'kurikulum_id',
        'judul',
        'deskripsi',
        'gambar'
    ];

    protected $casts = [
        'extra_data' => 'array',
        'is_active' => 'boolean',
        'urutan' => 'integer'
    ];

    /**
     * Relasi dengan Kurikulum
     */
    public function kurikulum()
    {
        return $this->belongsTo(Kurikulum::class);
    }

    /**
     * Accessor untuk URL gambar
     */
    public function getGambarUrlAttribute()
    {
        if ($this->gambar) {
            if (str_starts_with($this->gambar, 'http')) {
                return $this->gambar;
            }
            if (\Illuminate\Support\Facades\Storage::disk('public')->exists($this->gambar)) {
                return \Illuminate\Support\Facades\Storage::disk('public')->url($this->gambar);
            }
            return asset($this->gambar);
        }
        // Gambar default jika kosong
        return asset('assets/images/category/icon/15.jpg');
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
        return $query->orderBy('urutan');
    }

    /**
     * Method untuk mendapatkan urutan selanjutnya
     */
    public static function getNextUrutan($kurikulumId = null)
    {
        $query = self::query();
        
        if ($kurikulumId) {
            $query->where('kurikulum_id', $kurikulumId);
        }
        
        $maxUrutan = $query->max('urutan');
        return $maxUrutan ? $maxUrutan + 1 : 1;
    }

    /**
     * Method untuk reorder items setelah delete
     */
    public static function reorderAfterDelete($kurikulumId, $deletedUrutan)
    {
        self::where('kurikulum_id', $kurikulumId)
            ->where('urutan', '>', $deletedUrutan)
            ->decrement('urutan');
    }
}
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
        'gambar',
        'icon_class',
        'color',
        'urutan',
        'is_active',
        'extra_data'
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
            // Jika path dimulai dengan http/https, return as is
            if (str_starts_with($this->gambar, 'http')) {
                return $this->gambar;
            }
            
            // Jika file ada di storage, return storage URL
            if (Storage::disk('public')->exists($this->gambar)) {
                return Storage::disk('public')->url($this->gambar);
            }
            
            // Fallback ke asset
            return asset($this->gambar);
        }
        
        // Default image berdasarkan urutan
        $defaultImages = [
            'assets/images/default/kurikulum-1.jpg',
            'assets/images/default/kurikulum-2.jpg',
            'assets/images/default/kurikulum-3.jpg',
            'assets/images/default/kurikulum-4.jpg',
        ];
        
        $index = ($this->urutan - 1) % count($defaultImages);
        return asset($defaultImages[$index]);
    }

    /**
     * Accessor untuk icon
     */
    public function getIconAttribute()
    {
        if ($this->icon_class) {
            return $this->icon_class;
        }
        
        // Default icons berdasarkan urutan
        $defaultIcons = [
            'fas fa-graduation-cap',
            'fas fa-book-open',
            'fas fa-users',
            'fas fa-star'
        ];
        
        $index = ($this->urutan - 1) % count($defaultIcons);
        return $defaultIcons[$index];
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
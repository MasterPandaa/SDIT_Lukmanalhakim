<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Str;

class Artikel extends Model
{
    use HasFactory;

    protected $table = 'artikels';

    protected $fillable = [
        'judul',
        'slug',
        'konten',
        'gambar',
        'ringkasan',
        'penulis',
        'kategori',
        'is_active',
        'published_at'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'published_at' => 'datetime'
    ];

    // Boot method to automatically generate slug
    protected static function boot()
    {
        parent::boot();

        static::creating(function ($artikel) {
            if (empty($artikel->slug)) {
                $artikel->slug = Str::slug($artikel->judul);
            }
        });

        static::updating(function ($artikel) {
            if ($artikel->isDirty('judul') && empty($artikel->slug)) {
                $artikel->slug = Str::slug($artikel->judul);
            }
        });
    }

    // Scope for active articles
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope for published articles
    public function scopePublished($query)
    {
        return $query->where('is_active', true)
                    ->whereNotNull('published_at')
                    ->where('published_at', '<=', now());
    }

    // Get formatted published date
    public function getFormattedPublishedAtAttribute()
    {
        return $this->published_at ? $this->published_at->format('d F Y') : null;
    }

    // Get excerpt from content
    public function getExcerptAttribute()
    {
        return Str::limit(strip_tags($this->konten), 150);
    }

    /**
     * Get gambar URL
     */
    public function getGambarUrlAttribute()
    {
        if (!$this->gambar) {
            return asset('assets/images/default/artikel-default.jpg');
        }

        // Jika file ada di public/assets/images, return URL
        if (file_exists(public_path('assets/images/artikel/' . $this->gambar))) {
            return asset('assets/images/artikel/' . $this->gambar);
        }

        return asset('assets/images/default/artikel-default.jpg');
    }
}
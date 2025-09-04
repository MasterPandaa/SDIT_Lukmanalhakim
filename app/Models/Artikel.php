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
        'youtube_url',
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
     * Optional: render iframe from explicit youtube_url field
     */
    public function getYoutubeIframeAttribute(): ?string
    {
        $url = trim((string) ($this->youtube_url ?? ''));
        if ($url === '') { return null; }
        $id = $this->extractYouTubeId($url);
        if (!$id) { return null; }
        return $this->renderYouTubeIframe($id);
    }

    /**
     * Rendered content with rich embeds (e.g., YouTube links -> iframe)
     */
    public function getKontenRenderedAttribute()
    {
        $content = (string) ($this->konten ?? '');

        // Replace YouTube anchors first: <a href="...youtube...">...</a>
        $content = preg_replace_callback(
            '/<a[^>]+href=["\']([^"\']+)["\'][^>]*>.*?<\/a>/i',
            function ($matches) {
                $url = $matches[1] ?? '';
                $id = $this->extractYouTubeId($url);
                if ($id) {
                    return $this->renderYouTubeIframe($id);
                }
                return $matches[0];
            },
            $content
        );

        // Replace bare YouTube URLs appearing in text
        $content = preg_replace_callback(
            '/(?<!["\'">])(https?:\/\/[^\s<]+)/i',
            function ($matches) {
                $url = $matches[1] ?? '';
                $id = $this->extractYouTubeId($url);
                if ($id) {
                    return $this->renderYouTubeIframe($id);
                }
                return $matches[0];
            },
            $content
        );

        // Shortcode support: [youtube=URL] or [youtube:id]
        $content = preg_replace_callback(
            '/\[youtube(?:=|:)([^\]\s]+)\]/i',
            function ($matches) {
                $val = trim($matches[1] ?? '');
                $id = $this->extractYouTubeId($val) ?: $val;
                if ($id && preg_match('/^[A-Za-z0-9_-]{11}$/', $id)) {
                    return $this->renderYouTubeIframe($id);
                }
                return $matches[0];
            },
            $content
        );

        return $content;
    }

    /**
     * Try to extract YouTube video ID from a URL or raw ID
     */
    protected function extractYouTubeId(string $url): ?string
    {
        // If already looks like an ID
        if (preg_match('/^[A-Za-z0-9_-]{11}$/', $url)) {
            return $url;
        }

        $parts = parse_url($url);
        if (!$parts || empty($parts['host'])) {
            return null;
        }

        $host = strtolower($parts['host']);
        $path = $parts['path'] ?? '';

        // youtu.be/<id>
        if (strpos($host, 'youtu.be') !== false) {
            $segments = array_values(array_filter(explode('/', $path)));
            return $segments[0] ?? null;
        }

        // youtube.com/watch?v=<id> or /shorts/<id> or /embed/<id>
        if (strpos($host, 'youtube.com') !== false || strpos($host, 'www.youtube.com') !== false) {
            // shorts or embed
            if (preg_match('#/(shorts|embed)/([A-Za-z0-9_-]{11})#', $path, $m)) {
                return $m[2];
            }
            // watch?v=
            if (!empty($parts['query'])) {
                parse_str($parts['query'], $q);
                if (!empty($q['v']) && preg_match('/^[A-Za-z0-9_-]{11}$/', $q['v'])) {
                    return $q['v'];
                }
            }
        }

        return null;
    }

    /**
     * Render a Bootstrap responsive iframe for YouTube
     */
    protected function renderYouTubeIframe(string $videoId): string
    {
        $src = "https://www.youtube.com/embed/{$videoId}";
        return '<div class="ratio ratio-16x9 my-3"><iframe src="' . e($src) . '" title="YouTube video" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen loading="lazy" referrerpolicy="strict-origin-when-cross-origin"></iframe></div>';
    }

    /**
     * Get gambar URL
     */
    public function getGambarUrlAttribute()
    {
        if (!$this->gambar) {
            return asset('assets/images/default/artikel-default.jpg');
        }

        // Check if the image exists in storage
        if (file_exists(storage_path('app/public/' . $this->gambar))) {
            return asset('storage/' . $this->gambar);
        }

        // Check if the image exists in public directory (for backward compatibility)
        if (file_exists(public_path('assets/images/artikel/' . $this->gambar))) {
            return asset('assets/images/artikel/' . $this->gambar);
        }

        // Default image if no image is found
        return asset('assets/images/default/artikel-default.jpg');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Alumni extends Model
{
    protected $fillable = [
        'nama',
        'foto',
        'tahun_lulus',
        'pendidikan_lanjutan',
        'pekerjaan',
        'prestasi',
        'testimoni',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * Get foto URL
     */
    public function getFotoUrlAttribute()
    {
        // 1) Storage (public disk), typical for uploads: storage/app/public/alumni/<file>
        if (!empty($this->foto) && Storage::disk('public')->exists('alumni/' . $this->foto)) {
            return asset('storage/alumni/' . $this->foto);
        }

        // 2) Legacy/public path: public/assets/images/alumni/<file>
        if (!empty($this->foto) && file_exists(public_path('assets/images/alumni/' . $this->foto))) {
            return asset('assets/images/alumni/' . $this->foto);
        }

        // 3) Guaranteed inline SVG placeholder as a safe default (no external request)
        $svg = rawurlencode('<svg xmlns="http://www.w3.org/2000/svg" width="256" height="256" viewBox="0 0 256 256"><defs><linearGradient id="g" x1="0" y1="0" x2="1" y2="1"><stop offset="0%" stop-color="#ff7a18"/><stop offset="100%" stop-color="#af002d"/></linearGradient></defs><rect width="256" height="256" fill="white"/><circle cx="128" cy="96" r="48" fill="url(#g)" fill-opacity="0.15"/><rect x="40" y="154" width="176" height="62" rx="31" fill="url(#g)" fill-opacity="0.15"/><circle cx="128" cy="96" r="52" stroke="#ff6a00" stroke-width="4" fill="none"/></svg>');
        return 'data:image/svg+xml;utf8,' . $svg;
    }

    /**
     * Cleaned/plain testimonial without HTML tags or entities
     */
    public function getTestimoniPlainAttribute(): string
    {
        $t = (string) ($this->attributes['testimoni'] ?? '');
        return self::cleanText($t);
    }

    /**
     * Mutator: sanitize testimonial to plain text when setting
     */
    public function setTestimoniAttribute($value): void
    {
        $this->attributes['testimoni'] = self::cleanText((string)$value);
    }

    /**
     * Mutator: sanitize prestasi to plain text when setting
     */
    public function setPrestasiAttribute($value): void
    {
        $this->attributes['prestasi'] = self::cleanText((string)$value);
    }

    /**
     * Helper to decode entities repeatedly and strip tags
     */
    protected static function cleanText(string $text): string
    {
        $prev = null;
        $curr = $text;
        // Decode until stable (max 3 iterations to avoid loops)
        for ($i = 0; $i < 3; $i++) {
            $prev = $curr;
            $curr = html_entity_decode($curr, ENT_QUOTES | ENT_HTML5, 'UTF-8');
            if ($curr === $prev) break;
        }
        $curr = strip_tags($curr);
        // Normalize whitespace
        $curr = preg_replace("/\s+/u", ' ', $curr);
        return trim($curr ?? '');
    }
}

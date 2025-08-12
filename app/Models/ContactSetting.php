<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContactSetting extends Model
{
    use HasFactory;

    protected $fillable = [
        'address',
        'phone',
        'email',
        'whatsapp',
        'facebook',
        'instagram',
        'youtube',
        // map coordinates for Leaflet/OSM
        'latitude',
        'longitude',
        'office_hours',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'latitude' => 'float',
        'longitude' => 'float',
    ];

    public static function getSettings()
    {
        return static::where('is_active', true)->first();
    }

    public function getFormattedPhoneAttribute()
    {
        return $this->phone ? '+62 ' . ltrim($this->phone, '0') : null;
    }

    public function getWhatsappUrlAttribute()
    {
        if (!$this->whatsapp) return null;
        $phone = ltrim($this->whatsapp, '0');
        return "https://wa.me/62{$phone}";
    }
}

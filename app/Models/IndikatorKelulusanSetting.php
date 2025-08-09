<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndikatorKelulusanSetting extends Model
{
    use HasFactory;

    protected $table = 'indikator_kelulusan_settings';

    protected $fillable = [
        'judul_utama',
        'judul_header',
        'deskripsi_header',
        'nama_pembicara',
        'video_url',
        'kategori_tags',
        'gambar_header',
        'foto_pembicara',
        'meta_title',
        'meta_keywords',
        'meta_description',
        'is_active',
    ];

    protected $casts = [
        'kategori_tags' => 'array',
        'is_active' => 'boolean',
    ];

    public static function getActive()
    {
        return static::query()->first();
    }

    public static function updateOrCreateData(array $data)
    {
        $record = static::query()->first();
        if (!$record) {
            return static::create($data);
        }
        $record->fill($data);
        $record->save();
        return $record;
    }

    // Accessors for image URLs
    public function getGambarHeaderUrlAttribute()
    {
        if (!empty($this->gambar_header)) {
            return asset('assets/images/indikator-kelulusan/' . $this->gambar_header);
        }
        return asset('assets/images/pageheader/02.jpg');
    }

    public function getFotoPembicaraUrlAttribute()
    {
        if (!empty($this->foto_pembicara)) {
            return asset('assets/images/indikator-kelulusan/' . $this->foto_pembicara);
        }
        return asset('assets/images/pageheader/03.jpg');
    }
}

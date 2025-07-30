<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndikatorKelulusan extends Model
{
    use HasFactory;

    protected $table = 'indikator_kelulusans';

    protected $fillable = [
        'kategori_id',
        'judul',
        'deskripsi',
        'durasi',
        'urutan',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * Relasi dengan IndikatorKelulusanKategori
     */
    public function kategori()
    {
        return $this->belongsTo(IndikatorKelulusanKategori::class, 'kategori_id');
    }

    /**
     * Scope untuk indikator aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    /**
     * Scope untuk urutan
     */
    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan');
    }

    /**
     * Accessor untuk format durasi
     */
    public function getFormattedDurasiAttribute()
    {
        if ($this->durasi) {
            return $this->durasi;
        }
        return '';
    }
}
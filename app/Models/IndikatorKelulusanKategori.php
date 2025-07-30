<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IndikatorKelulusanKategori extends Model
{
    use HasFactory;

    protected $table = 'indikator_kelulusan_kategoris';

    protected $fillable = [
        'nama',
        'deskripsi',
        'urutan',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    /**
     * Relasi dengan IndikatorKelulusan
     */
    public function indikators()
    {
        return $this->hasMany(IndikatorKelulusan::class, 'kategori_id');
    }

    /**
     * Indikators aktif saja
     */
    public function activeIndikators()
    {
        return $this->hasMany(IndikatorKelulusan::class, 'kategori_id')
                    ->where('is_active', true)
                    ->orderBy('urutan');
    }

    /**
     * Semua indikators termasuk yang tidak aktif
     */
    public function allIndikators()
    {
        return $this->hasMany(IndikatorKelulusan::class, 'kategori_id')
                    ->orderBy('urutan');
    }

    /**
     * Scope untuk kategori aktif
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
}
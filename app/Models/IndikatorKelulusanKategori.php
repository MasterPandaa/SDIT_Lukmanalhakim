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
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    // Relationships
    public function indikators()
    {
        return $this->hasMany(IndikatorKelulusan::class, 'kategori_id')->orderBy('urutan');
    }

    public function allIndikators()
    {
        return $this->indikators();
    }

    public function activeIndikators()
    {
        return $this->hasMany(IndikatorKelulusan::class, 'kategori_id')
            ->where('is_active', true)
            ->orderBy('urutan');
    }

    // Scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderBy('urutan')->orderBy('id');
    }
}

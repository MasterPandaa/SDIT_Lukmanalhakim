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
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
    ];

    public function kategori()
    {
        return $this->belongsTo(IndikatorKelulusanKategori::class, 'kategori_id');
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

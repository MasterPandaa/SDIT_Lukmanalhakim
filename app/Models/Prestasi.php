<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Prestasi extends Model
{
    // Fillable fields for mass assignment
    protected $fillable = [
        'judul',
        'deskripsi',
        'gambar',
        'tanggal',
        'tingkat',
        'peraih',
        'penyelenggara',
        'is_active',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'tanggal' => 'date',
    ];

    // Common scopes
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    public function scopeOrdered($query)
    {
        return $query->orderByDesc('tanggal')->orderByDesc('created_at');
    }
}

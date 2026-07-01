<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    // Pastikan properti ini ada dan lengkap
    protected $fillable = [
        'title',
        'category',
        'duration',
        'video_url',
        'description',
        'thumbnail_path',
        'production_year', // <-- WAJIB TAMBAHKAN BARIS INI
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasAutoTranslation;

class Blog extends Model
{
    use HasFactory, HasAutoTranslation; // 2. Pasang Trait di dalam class

    protected $fillable = [
        'title',
        'title_en', // 3. Tambahkan kolom _en di $fillable
        'slug',
        'category',
        'tag',
        'content',
        'content_en', // 3. Tambahkan kolom _en di $fillable
        'image',
        'published_at',
    ];

    // Mengonversi string date SQLite menjadi objek Carbon secara otomatis
    protected $casts = [
        'published_at' => 'date',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'tag',
        'content',
        'image',
        'published_at',
    ];

    // Mengonversi string date SQLite menjadi objek Carbon secara otomatis
    protected $casts = [
        'published_at' => 'date',
    ];
}
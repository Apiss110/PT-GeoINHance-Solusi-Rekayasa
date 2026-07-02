<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    // Menegaskan nama tabel (opsional, secara default Laravel akan mencari tabel bernama 'articles')
    protected $table = 'articles';

    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'author',
        'category', // 🟢 Tambahan: Izinkan kolom category untuk mass assignment
        'tag',      // 🟢 Tambahan: Izinkan kolom tag untuk mass assignment
    ];
}
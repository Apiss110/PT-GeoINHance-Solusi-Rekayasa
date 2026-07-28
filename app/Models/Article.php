<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasAutoTranslation;

class Article extends Model
{
    // Menegaskan nama tabel (opsional, secara default Laravel akan mencari tabel bernama 'articles')
    protected $table = 'articles';

    use HasAutoTranslation; // 2. Pasang Trait di dalam class

    protected $fillable = [
        'title',
        'title_en', // 3. Tambahkan kolom _en di $fillable
        'slug',
        'content',
        'content_en', // 3. Tambahkan kolom _en di $fillable
        'image',
        'author',
        'category', // 🟢 Tambahan: Izinkan kolom category untuk mass assignment
        'tag',      // 🟢 Tambahan: Izinkan kolom tag untuk mass assignment
    ];
}
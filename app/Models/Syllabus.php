<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Syllabus extends Model
{
    // Menentukan nama tabel secara eksplisit karena plural dari Syllabus dalam bahasa Inggris adalah syllabi
    protected $table = 'syllabi';

    protected $fillable = [
        'title',
        'slug',
        'description',
        'software_category',
        'level',
        'modules_count',
        'icon',
    ];

    protected $casts = [
    'modul_materi' => 'array',
    'faq_list' => 'array',
    ];
    
    // Otomatis membuat slug saat title diisi atau diubah
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($syllabus) {
            $syllabus->slug = Str::slug($syllabus->title);
        });
        static::updating(function ($syllabus) {
            $syllabus->slug = Str::slug($syllabus->title);
        });
    }
}
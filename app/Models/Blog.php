<?php

namespace App\Models; // PERBAIKAN: Ubah dari namesapace menjadi namespace

use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    protected $fillable = [
        'title', 
        'slug', 
        'category', 
        'tag', 
        'content', 
        'image', 
        'published_at'
    ];
}
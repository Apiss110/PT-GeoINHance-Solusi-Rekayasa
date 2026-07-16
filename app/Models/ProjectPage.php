<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectPage extends Model
{
    use HasFactory;

    // FIX UTAMA: Tambahkan 'banner_image' ke dalam array agar diizinkan masuk database
    protected $fillable = [
        'name', 
        'slug', 
        'description', 
        'banner_image', // <--- Ini kuncinya!
        'is_active'
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasAutoTranslation;

class ProjectPage extends Model
{
    use HasFactory, HasAutoTranslation; // 2. Pasang Trait di dalam class

    // FIX UTAMA: Tambahkan 'banner_image' ke dalam array agar diizinkan masuk database
    protected $fillable = [
        'name',
        'name_en', // 3. Tambahkan kolom _en di $fillable
        'slug', 
        'description',
        'description_en', // 3. Tambahkan kolom _en di $fillable
        'banner_image', // <--- Ini kuncinya!
        'is_active'
    ];
}
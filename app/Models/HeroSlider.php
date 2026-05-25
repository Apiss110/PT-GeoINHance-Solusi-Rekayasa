<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HeroSlider extends Model
{
    use HasFactory;

    // Tentukan nama tabel jika berbeda dengan jamak model (opsional)
    protected $table = 'hero_sliders';

    /**
     * PERBAIKAN: Izinkan field-field ini untuk menerima input massal (Mass Assignment)
     */
    protected $fillable = [
    'title',
    'subtitle',
    'image_path',
    'link_url', // Tambahkan ini
    ];
}
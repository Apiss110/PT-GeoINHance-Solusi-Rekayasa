<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasAutoTranslation;

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
    'title_en', // 3. Tambahkan kolom _en di $fillable
    'subtitle',
    'subtitle_en', // 3. Tambahkan kolom _en di $fillable
    'image_path',
    'link_url', // Tambahkan ini
    ];
}
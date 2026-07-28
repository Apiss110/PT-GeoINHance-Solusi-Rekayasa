<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasAutoTranslation;

class Branch extends Model
{
    use HasFactory, HasAutoTranslation; // 2. Pasang Trait di dalam class

    /**
     * Nama tabel yang terhubung dengan model ini.
     * (Laravel otomatis mendeteksi jamak, tapi mendefinisikannya secara eksplisit itu lebih aman)
     */
    protected $table = 'branches';

    /**
     * Kolom-kolom yang diizinkan untuk diisi secara massal oleh Admin.
     */
    protected $fillable = [
    'daerah', 'title', 'title_en', 'desc', 'desc_en', 'lat', 'lng', 'link', 'img', 'project_id'
];

    /**
     * Casting tipe data koordinat agar selalu dibaca sebagai float/angka desimal 
     * saat dikirim ke Leaflet.js di front-end.
     */
    protected $casts = [
        'lat' => 'float',
        'lng' => 'float',
    ];

    protected function getImgAttribute($value)
    {
        // Jika isinya link eksternal (http), biarkan. Jika upload, tambahkan url storage.
        if (filter_var($value, FILTER_VALIDATE_URL)) {
            return $value;
        }
        
        return $value ? asset('storage/' . $value) : asset('images/default-placeholder.jpg');
    }
}
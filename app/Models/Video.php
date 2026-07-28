<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasAutoTranslation;

class Video extends Model
{
    use HasFactory, HasAutoTranslation; // 2. Pasang Trait di dalam class

    /**
     * Nama tabel yang terkait dengan model.
     * (Opsional: Laravel otomatis mendeteksi sebagai 'videos', 
     * namun ditulis eksplisit agar lebih aman).
     *
     * @var string
     */
    protected $table = 'videos';

    /**
     * Atribut yang dapat diisi secara massal (Mass Assignment).
     * Semua kolom yang Anda masukkan melalui Video::create() wajib didaftarkan di sini.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'title_en', // 3. Tambahkan kolom _en di $fillable
        'category',
        'video_url',
        'duration',
        'production_year',
        'description',
        'description_en', // 3. Tambahkan kolom _en di $fillable
        'thumbnail_path',
        'published_at',
    ];

    /**
     * Mengonversi tipe data kolom tertentu secara otomatis (Casting).
     * Mengubah 'published_at' menjadi objek datetime (Carbon) agar 
     * bisa menggunakan fungsi seperti ->format('d M Y') di view.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'published_at' => 'datetime',
        'production_year' => 'integer',
    ];
}
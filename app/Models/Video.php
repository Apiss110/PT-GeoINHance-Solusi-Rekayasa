<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model
{
    use HasFactory;

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
        'category',
        'video_url',
        'duration',
        'production_year',
        'description',
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
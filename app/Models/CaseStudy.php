<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseStudy extends Model
{
    // Pastikan publication_year ada di dalam fillable
    protected $fillable = [
        'title',
        'sector',
        'publication_year', // <--- Pastikan ini terdaftar
        'file_path',
        'file',
        'file_size',
        'description'
    ];

    /**
     * ACCESSOR JALUR PINTAS:
     * Membuat properti '$study->year' otomatis mengambil nilai dari kolom 'publication_year'
     * sehingga tampilan di sisi front-end/view tidak kosong dan tidak error.
     */
    public function getYearAttribute()
    {
        return $this->publication_year;
    }
}
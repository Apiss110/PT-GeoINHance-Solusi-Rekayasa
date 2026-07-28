<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Traits\HasAutoTranslation;

class CaseStudy extends Model
{
    use HasAutoTranslation; // 2. Pasang Trait di dalam class
    // Pastikan publication_year ada di dalam fillable
    protected $fillable = [
        'title',
        'title_en', // 3. Tambahkan kolom _en di $fillable
        'sector',
        'publication_year', // <--- Pastikan ini terdaftar
        'file_path',
        'file',
        'file_size',
        'description',
        'description_en'
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
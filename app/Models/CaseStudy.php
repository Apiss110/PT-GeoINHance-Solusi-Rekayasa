<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CaseStudy extends Model
{
    protected $table = 'case_studies'; // Menegaskan nama tabel jika diperlukan

    protected $fillable = [
        'title',
        'sector',
        'publication_year', // <--- Pastikan ini yang didaftarkan, bukan 'year'
        'file_path',
        'file_size',
        'description',
    ];
}
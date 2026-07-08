<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Syllabus extends Model
{
    // Menentukan nama tabel secara eksplisit karena plural dari Syllabus dalam bahasa Inggris adalah syllabi
    protected $table = 'syllabi';

    protected $fillable = [
    'title',
    'description',
    'software_category',
    'level',
    'modules_count',
    'icon',
    'slug',
    
    // PASTIKAN SEMUA FIELD DI BAWAH INI SUDAH MASUK:
    'durasi',
    'jadwal_terdekat',
    'format_kelas',
    'poin_cpd',
    'manfaat_kursus',
    'minimal_ram',
    'lisensi_software',
    'prasyarat_peserta',
    'target_peserta',
    'nama_instruktur',
    'foto_instruktur',
    'proyek_instruktur',
    'harga_mahasiswa',
    'harga_profesional',
    'modul_materi',
    'faq_list',
    ];

    // Merapikan indentasi casts agar terbaca dengan baik
    protected $casts = [
        'modul_materi' => 'array',
        'faq_list' => 'array',
    ];
    
    // Otomatis membuat slug saat title diisi atau diubah
    protected static function boot()
    {
        parent::boot();
        static::creating(function ($syllabus) {
            $syllabus->slug = Str::slug($syllabus->title);
        });
        static::updating(function ($syllabus) {
            $syllabus->slug = Str::slug($syllabus->title);
        });
    }
}
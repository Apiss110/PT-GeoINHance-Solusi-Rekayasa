<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Traits\HasAutoTranslation; // 1. Import Trait

class Syllabus extends Model
{
    use HasFactory, HasAutoTranslation; // 2. Pasang Trait di dalam class

    // Menentukan nama tabel secara eksplisit
    protected $table = 'syllabi';

    protected $fillable = [
        'title',
        'title_en',
        'description',
        'description_en',
        'software_category',
        'level',
        'level_en',
        'modules_count',
        'icon',
        'slug',
        
        // Field Silabus & Detail Training
        'durasi',
        'durasi_en',
        'jadwal_terdekat',
        'jadwal_terdekat_en',
        'format_kelas',
        'format_kelas_en',
        'poin_cpd',
        'manfaat_kursus',
        'manfaat_kursus_en',
        'minimal_ram',
        'minimal_ram_en',
        'lisensi_software',
        'lisensi_software_en',
        'prasyarat_peserta',
        'prasyarat_peserta_en',
        'target_peserta',
        'target_peserta_en',
        'nama_instruktur',
        'foto_instruktur',
        'proyek_instruktur',
        'proyek_instruktur_en',
        'harga_mahasiswa',
        'harga_profesional',
        'modul_materi',
        'modul_materi_en',
        'faq_list',
        'faq_list_en',
    ];

    // Merapikan casts untuk field berformat JSON / Array
    protected $casts = [
        'modul_materi' => 'array',
        'modul_materi_en' => 'array',
        'faq_list' => 'array',
        'faq_list_en' => 'array',
    ];
    
    /**
     * Standard Booted Laravel untuk Slug
     */
    protected static function booted(): void
    {
        static::creating(function ($syllabus) {
            if (empty($syllabus->slug) && !empty($syllabus->title)) {
                $syllabus->slug = Str::slug($syllabus->title);
            }
        });

        static::updating(function ($syllabus) {
            if ($syllabus->isDirty('title')) {
                $syllabus->slug = Str::slug($syllabus->title);
            }
        });
    }
}
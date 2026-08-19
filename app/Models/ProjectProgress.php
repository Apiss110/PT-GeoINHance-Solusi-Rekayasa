<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectProgress extends Model
{
    use HasFactory;

    protected $table = 'project_progresses';

    protected $fillable = [
        'user_id',
        'title',
        'description',
        'percentage',
        'status',
        'image',
        'attachments', // 👈 Ditambahkan untuk menampung array foto (JSON)
        'start_date',
        'target_date',
    ];

    /**
     * Casting tipe data otomatis
     */
    protected $casts = [
        'percentage'  => 'integer',
        'start_date'  => 'date',
        'target_date' => 'date',
        'attachments' => 'array', // 👈 Mengonversi JSON database ke Array PHP secara otomatis
    ];

    /**
     * Relasi balik ke User (Klien)
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relasi ke Tahapan Proyek (ProjectStage)
     * Digunakan untuk menyimpan daftar tahap & poin kegiatan dinamis
     */
    public function stages()
    {
        return $this->hasMany(ProjectStage::class);
    }
}
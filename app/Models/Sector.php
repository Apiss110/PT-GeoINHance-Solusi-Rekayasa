<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'banner_image',
        'description',
    ];

    /**
     * RELASI: Satu Sektor memiliki banyak Proyek Strategis
     */
    public function projects()
    {
        // DIUBAH: Menggunakan StrategicProject::class agar sesuai dengan 
        // nama model dari tabel "strategic_projects" Anda
        return $this->hasMany(StrategicProject::class, 'sector_id');
    }
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasAutoTranslation;

class Sector extends Model
{
    use HasFactory, HasAutoTranslation; // 2. Pasang Trait di dalam class

    protected $fillable = [
        'name',
        'name_en', // 3. Tambahkan kolom _en di $fillable
        'slug',
        'banner_image',
        'description',
        'description_en', // 3. Tambahkan kolom _en di $fillable
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
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Traits\HasAutoTranslation;

class ProjectCategory extends Model
{
    use HasAutoTranslation;
     // 2. Pasang Trait di dalam class
    protected $fillable = ['name', 'name_en', 'slug'];

    // Relasi ke tabel isi proyek
    public function strategicProjects(): HasMany
    {
        return $this->hasMany(StrategicProject::class, 'project_category_id');
    }

    // Tambahkan fungsi ini di dalam class Model Proyek Anda
    public function sector()
    {
        return $this->belongsTo(Sector::class, 'sector_id');
    }
}
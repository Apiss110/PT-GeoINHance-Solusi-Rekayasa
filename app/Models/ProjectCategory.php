<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class ProjectCategory extends Model
{
    protected $fillable = ['name', 'slug'];

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
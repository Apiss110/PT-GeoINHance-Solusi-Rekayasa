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
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrategicProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_category_id', // Menghubungkan ke Kategori Proyek (Slider Portofolio)
        'sector_id',           // ADDED: Menghubungkan ke Kategori Sektor (Dropdown Sektor)
        'title',
        'description',
        'location',
        'year',
        'image_path'
    ];

    /**
     * Relasi ke Model ProjectCategory (Many to One)
     */
    public function category()
    {
        return $this->belongsTo(ProjectCategory::class, 'project_category_id');
    }

    /**
     * Relasi ke Model Sector (Many to One)
     */
    public function sector() 
    {
        return $this->belongsTo(Sector::class, 'sector_id');
    }
}
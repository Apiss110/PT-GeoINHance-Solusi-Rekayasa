<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StrategicProject extends Model
{
    use HasFactory;

    protected $fillable = [
        'project_category_id', // Pastikan ini tertulis, bukan 'category'
        'title',
        'description',
        'location',
        'year',
        'image_path'
    ];

    public function category()
    {
        return $this->belongsTo(ProjectCategory::class, 'project_category_id');
    }
}
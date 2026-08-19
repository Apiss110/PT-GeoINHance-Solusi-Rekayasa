<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectStage extends Model
{
    use HasFactory;

    protected $fillable = ['project_progress_id', 'title'];

    public function projectProgress()
    {
        return $this->belongsTo(ProjectProgress::class);
    }

    public function items()
    {
        return $this->hasMany(ProjectStageItem::class);
    }
}
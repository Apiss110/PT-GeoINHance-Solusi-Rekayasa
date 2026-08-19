<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectStageItem extends Model
{
    use HasFactory;

    protected $fillable = ['project_stage_id', 'title', 'description', 'is_completed'];

    public function stage()
    {
        return $this->belongsTo(ProjectStage::class);
    }
}
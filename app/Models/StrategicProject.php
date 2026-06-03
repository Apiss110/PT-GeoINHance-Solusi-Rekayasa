<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StrategicProject extends Model
{
    protected $fillable = ['category', 'title', 'description', 'location', 'year', 'image_path'];
}

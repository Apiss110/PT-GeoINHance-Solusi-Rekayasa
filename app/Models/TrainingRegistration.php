<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TrainingRegistration extends Model
{
    protected $fillable = [
        'name',
        'email',
        'whatsapp_number',
        'company_or_institution',
        'training_program',
        'additional_message'
    ];
}
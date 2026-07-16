<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Syllabus;

class TrainingRegistration extends Model
{
    protected $fillable = [
        'name',
        'email',
        'whatsapp_number',
        'is_read',
        'company_or_institution',
        'training_program',
        'additional_message',
    ];

    public function syllabus()
    {
        // Parameter kedua adalah kolom di tabel pendaftaran yang menyimpan ID silabus tersebut (yaitu 'training_program')
       return $this->belongsTo(Syllabus::class, 'training_program', 'id');
}
}
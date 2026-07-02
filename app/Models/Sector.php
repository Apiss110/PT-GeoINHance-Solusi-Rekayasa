<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    use HasFactory;

    // Menentukan nama tabel (opsional, jika mengikuti aturan plural Laravel)
    protected $table = 'sectors';

    // Daftarkan field yang boleh diisi secara massal (Mass Assignment)
    protected $fillable = [
        'name',
        'slug',
    ];

    /**
     * Relasi ke StrategicProject (Satu sektor memiliki banyak proyek)
     */
    public function projects()
    {
        return $this->hasMany(StrategicProject::class, 'sector_id');
    }
}
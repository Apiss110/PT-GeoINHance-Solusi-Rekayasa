<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasAutoTranslation; // 1. Import Trait Auto Translation

class StrategicProject extends Model
{
    use HasFactory, HasAutoTranslation; // 2. Pasang Trait di dalam class

    protected $fillable = [
        'project_category_id', // Menyimpan ID dari halaman dinamis (ProjectPage)
        'sector_id',           // Menghubungkan ke Kategori Sektor (Dropdown Sektor)
        'title',
        'title_en',            // 3. Tambahkan kolom _en di $fillable
        'description',
        'description_en',      // 3. Tambahkan kolom _en di $fillable
        'location',
        'location_en',         // 3. Tambahkan kolom _en di $fillable
        'year',
        'image_path'
    ];

    /**
     * Relasi ke Model ProjectPage (Halaman Dinamis)
     * Menggunakan foreign key 'project_category_id' agar tidak perlu mengubah struktur database yang ada.
     */
    public function projectPage()
    {
        return $this->belongsTo(ProjectPage::class, 'project_category_id');
    }

    /**
     * Fallback / Alias Relasi Lama (Opsional)
     * Tetap mempertahankan fungsi category() agar jika ada script lama yang memanggil 
     * $project->category->name tidak langsung menyebabkan error crash.
     */
    public function category()
    {
        return $this->belongsTo(ProjectPage::class, 'project_category_id');
    }

    /**
     * Relasi ke Model Sector (Many to One)
     */
    public function sector() 
    {
        return $this->belongsTo(Sector::class, 'sector_id');
    }
}
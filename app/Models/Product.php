<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Traits\HasAutoTranslation;

class Product extends Model
{
    use HasFactory;

    // Menentukan kolom mana saja yang boleh diisi secara massal (Mass Assignment)
    protected $fillable = [
        'name',
        'name_en', // 3. Tambahkan kolom _en di $fillable
        'slug',
        'description',
        'description_en', // 3. Tambahkan kolom _en di $fillable
        'image_path',
        'is_active',
    ];

    /**
     * Otomatis membuat slug dari nama produk saat data disimpan/diupdate.
     */
    protected static function boot()
    {
        parent::boot();

        static::saving(function ($product) {
            if (empty($product->slug)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }
}
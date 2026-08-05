<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;
use App\Traits\HasAutoTranslation; // 1. Import Trait

class Product extends Model
{
    // 2. Wajib panggil HasAutoTranslation di dalam class!
    use HasFactory, HasAutoTranslation;

    protected $fillable = [
        'name',
        'name_en',
        'slug',
        'description',
        'description_en',
        'image_path',
        'is_active',
    ];

    /**
     * Otomatis membuat slug dari nama produk saat data disimpan/diupdate.
     */
    protected static function booted(): void
    {
        static::saving(function ($product) {
            if (empty($product->slug) && !empty($product->name)) {
                $product->slug = Str::slug($product->name);
            }
        });
    }
}
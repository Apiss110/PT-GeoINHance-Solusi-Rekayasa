<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\HasAutoTranslation;

class ProjectPage extends Model
{
    use HasFactory, HasAutoTranslation;

    // 1. Beritahu Trait kolom mana saja yang terjemahkan otomatis
    protected $translatable = ['name', 'description'];

    protected $fillable = [
        'name',
        'name_en',
        'slug',
        'description',
        'description_en',
        'banner_image',
        'is_active'
    ];

    /**
     * Accessor Nama Halaman (Otomatis ID / EN)
     */
    public function getNameAttribute($value)
    {
        if (app()->getLocale() === 'en' && !empty($this->attributes['name_en'])) {
            return $this->attributes['name_en'];
        }

        return $value;
    }

    /**
     * Accessor Deskripsi Halaman (Otomatis ID / EN)
     */
    public function getDescriptionAttribute($value)
    {
        if (app()->getLocale() === 'en' && !empty($this->attributes['description_en'])) {
            return $this->attributes['description_en'];
        }

        return $value;
    }
}
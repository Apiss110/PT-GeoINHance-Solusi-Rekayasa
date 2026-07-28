<?php

namespace App\Traits;

use Stichoza\GoogleTranslate\GoogleTranslate;

trait HasAutoTranslation
{
    /**
     * Dijalankan otomatis saat Model memanggil event 'saving'
     */
    public static function bootHasAutoTranslation()
    {
        static::saving(function ($model) {
            try {
                $tr = new GoogleTranslate('en');
                $tr->setOptions([
                    'timeout' => 3.0,
                    'connect_timeout' => 2.0,
                ]);

                // Seluruh daftar kolom teks yang ada di database Anda
                $fieldsToTranslate = [
                    'title', 'name', 'subtitle', 'location', 
                    'address', 'description', 'excerpt', 'content'
                ];

        // Buka file app/Traits/HasAutoTranslation.php

        foreach ($fieldsToTranslate as $field) {
            $fieldEn = $field . '_en';

            // ✅ UBAH BARIS IF INI:
            // Terjemahkan jika kolom teks ada isinya DAN (data baru diubah ATAU kolom _en nya masih KOSONG)
            if (
                array_key_exists($field, $model->attributes) && 
                !empty($model->{$field}) && 
                ($model->isDirty($field) || empty($model->{$fieldEn}))
            ) {
                $model->{$fieldEn} = $tr->translate(strip_tags($model->{$field}));
            }
        }
            } catch (\Throwable $e) {
                // Jika API error/timeout, proses simpan data tetap berjalan normal
            }
        });
    }

    /**
     * Otomatis mengembalikan nilai kolom _en jika bahasa aktif aplikasi adalah 'en'
     */
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        if (app()->getLocale() === 'en') {
            $keyEn = $key . '_en';
            if (isset($this->attributes[$keyEn]) && !empty($this->attributes[$keyEn])) {
                return $this->attributes[$keyEn];
            }
        }

        return $value;
    }
}
<?php

namespace App\Traits;

use Stichoza\GoogleTranslate\GoogleTranslate;

trait HasAutoTranslation
{
    public static function bootHasAutoTranslation()
    {
        static::saving(function ($model) {
            try {
                $fieldsToTranslate = [
                    // Kolom Teks Umum
                    'title', 'name', 'subtitle', 'location', 
                    'address', 'description', 'excerpt', 'content',
                    
                    // Kolom Spesifik Silabus / Training
                    'level', 'durasi', 'jadwal_terdekat', 'format_kelas', 'manfaat_kursus', 'minimal_ram',
                    'lisensi_software', 'prasyarat_peserta', 'target_peserta',
                    'proyek_instruktur', 'modul_materi', 'faq_list'
                ];

                foreach ($fieldsToTranslate as $field) {
                    $fieldEn = $field . '_en';

                    if (
                        array_key_exists($field, $model->attributes) && 
                        !empty($model->{$field}) && 
                        ($model->isDirty($field) || empty($model->{$fieldEn}))
                    ) {
                        $rawData = $model->{$field};

                        // 1. JIKA DATA SUDAH DI-CAST MENJADI ARRAY ($casts = ['array'])
                        if (is_array($rawData)) {
                            $sampleText = self::getFirstStringFromArray($rawData);
                            $detectedLang = self::detectLanguage($sampleText);

                            if ($detectedLang === 'en') {
                                // Input Bahasa Inggris: Simpan ke _en, lalu terjemahkan kolom utama ke Bahasa Indonesia
                                $model->{$fieldEn} = $rawData;
                                $model->{$field} = self::translateJsonArray($rawData, 'id');
                            } else {
                                // Input Bahasa Indonesia / Lainnya: Terjemahkan ke Bahasa Inggris untuk _en
                                $model->{$fieldEn} = self::translateJsonArray($rawData, 'en');
                            }
                            continue;
                        }

                        // 2. JIKA DATA BERUPA STRING JSON UN-CAST
                        if (is_string($rawData) && (str_starts_with(trim($rawData), '{') || str_starts_with(trim($rawData), '['))) {
                            $decoded = json_decode($rawData, true);
                            if (json_last_error() === JSON_ERROR_NONE && is_array($decoded)) {
                                $sampleText = self::getFirstStringFromArray($decoded);
                                $detectedLang = self::detectLanguage($sampleText);

                                if ($detectedLang === 'en') {
                                    $model->{$fieldEn} = $rawData;
                                    $model->{$field} = json_encode(self::translateJsonArray($decoded, 'id'), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                                } else {
                                    $model->{$fieldEn} = json_encode(self::translateJsonArray($decoded, 'en'), JSON_UNESCAPED_UNICODE | JSON_UNESCAPED_SLASHES);
                                }
                                continue;
                            }
                        }

                        // 3. JIKA DATA BERUPA STRING BIASA
                        if (is_string($rawData)) {
                            $cleanText = strip_tags($rawData);
                            $detectedLang = self::detectLanguage($cleanText);

                            if ($detectedLang === 'en') {
                                // Input Bahasa Inggris -> terjemahkan kolom utama ke Indonesia & _en dapat teks asli
                                $trId = new GoogleTranslate('id');
                                $trId->setOptions(['timeout' => 5.0, 'connect_timeout' => 3.0]);

                                $model->{$fieldEn} = $rawData;
                                $model->{$field} = $trId->translate($cleanText);
                            } else {
                                // Input Bahasa Indonesia -> terjemahkan ke Bahasa Inggris untuk _en
                                $trEn = new GoogleTranslate('en');
                                $trEn->setOptions(['timeout' => 5.0, 'connect_timeout' => 3.0]);

                                $model->{$fieldEn} = $trEn->translate($cleanText);
                            }
                        }
                    }
                }
            } catch (\Throwable $e) {
                // Abaikan jika terjadi kendala koneksi API
            }
        });
    }

    /**
     * Helper mendeteksi bahasa dari string
     */
    private static function detectLanguage(string $text): string
    {
        if (empty(trim($text))) return 'id';
        try {
            $tr = new GoogleTranslate();
            $tr->setOptions(['timeout' => 5.0, 'connect_timeout' => 3.0]);
            $tr->translate(strip_tags($text));
            return $tr->getLastDetectedSource() ?? 'id';
        } catch (\Throwable $e) {
            return 'id';
        }
    }

    /**
     * Helper mengambil sampel string pertama dari array untuk deteksi bahasa
     */
    private static function getFirstStringFromArray(array $array): string
    {
        foreach ($array as $val) {
            if (is_string($val) && !empty(trim($val))) return $val;
            if (is_array($val)) {
                $res = self::getFirstStringFromArray($val);
                if (!empty($res)) return $res;
            }
        }
        return '';
    }

    /**
     * Helper rekursif untuk menerjemahkan value di dalam array / JSON ke bahasa tujuan ('en' atau 'id')
     */
    private static function translateJsonArray(array $array, string $targetLang): array
    {
        $tr = new GoogleTranslate($targetLang);
        $tr->setOptions(['timeout' => 5.0, 'connect_timeout' => 3.0]);

        foreach ($array as $key => $val) {
            if (is_array($val)) {
                $array[$key] = self::translateJsonArray($val, $targetLang);
            } elseif (is_string($val) && !empty(trim($val)) && !filter_var($val, FILTER_VALIDATE_URL) && !is_numeric($val)) {
                try {
                    $array[$key] = $tr->translate(strip_tags($val));
                } catch (\Throwable $e) {
                    // Jika item gagal diterjemahkan, pertahankan teks asli
                }
            }
        }
        return $array;
    }

    /**
     * Otomatis mengembalikan nilai kolom _en jika locale aplikasi saat ini 'en'
     */
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        // Hanya jalankan jika bahasa 'en' dan nama kolom tidak berakhiran '_en'
        if (app()->getLocale() === 'en' && !str_ends_with($key, '_en')) {
            $keyEn = $key . '_en';
            
            // ✅ Gunakan parent::getAttribute agar Laravel mengeksekusi $casts (JSON -> Array)
            $valueEn = parent::getAttribute($keyEn);

            if (!empty($valueEn)) {
                return $valueEn;
            }
        }

        return $value;
    }
}
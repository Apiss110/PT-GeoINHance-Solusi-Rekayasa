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

                    // Hanya jalankan jika kolom ada, tidak kosong, dan sedang diubah/ditambah
                    if (
                        array_key_exists($field, $model->attributes) && 
                        !empty($model->{$field}) && 
                        ($model->isDirty($field) || empty($model->{$fieldEn}))
                    ) {
                        $rawData = $model->{$field};

                        // 1. JIKA DATA BERUPA ARRAY / JSON CAST ($casts = ['array'])
                        if (is_array($rawData)) {
                            $sampleText = self::getFirstStringFromArray($rawData);
                            $detectedLang = self::detectLanguage($sampleText);

                            if ($detectedLang === 'en') {
                                // Input English -> Simpan ke _en, terjemahkan ke ID untuk kolom utama
                                $model->{$fieldEn} = $rawData;
                                $model->{$field} = self::translateJsonArray($rawData, 'id');
                            } else {
                                // Input Indonesia -> Simpan ke kolom utama, terjemahkan ke EN untuk _en
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

                        // 3. JIKA DATA BERUPA STRING BIASA / HTML
                        if (is_string($rawData)) {
                            $detectedLang = self::detectLanguage($rawData);

                            if ($detectedLang === 'en') {
                                // Admin Input Bahasa Inggris
                                $trId = new GoogleTranslate('id');
                                $trId->setOptions(['timeout' => 5.0, 'connect_timeout' => 3.0]);

                                $model->{$fieldEn} = $rawData; // Simpan teks Inggris ke _en
                                $model->{$field} = $trId->translate($rawData); // Terjemahkan ke Indonesia untuk kolom utama
                            } else {
                                // Admin Input Bahasa Indonesia
                                $trEn = new GoogleTranslate('en');
                                $trEn->setOptions(['timeout' => 5.0, 'connect_timeout' => 3.0]);

                                $model->{$fieldEn} = $trEn->translate($rawData); // Terjemahkan ke Inggris untuk _en
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
     * Helper Pintar mendeteksi bahasa dari string (dilengkapi safeguard kata dasar Indonesia)
     */
    private static function detectLanguage(string $text): string
    {
        $cleanText = trim(strip_tags($text));
        if (empty($cleanText)) return 'id';

        // Safeguard kata-kata umum Indonesia agar tidak salah terdeteksi sebagai 'en' oleh Google Translate
        $idKeywords = ['yang', 'dan', 'di', 'ke', 'dari', 'ini', 'itu', 'untuk', 'dengan', 'atau', 'pada', 'adalah', 'sebagai', 'proyek', 'sektor', 'layanan', 'pelatihan', 'pembangunan', 'solusi'];
        $words = preg_split('/\s+/', strtolower($cleanText));
        foreach ($words as $word) {
            if (in_array($word, $idKeywords)) {
                return 'id';
            }
        }

        try {
            $tr = new GoogleTranslate();
            $tr->setOptions(['timeout' => 5.0, 'connect_timeout' => 3.0]);
            $tr->translate($cleanText);
            
            return ($tr->getLastDetectedSource() === 'en') ? 'en' : 'id';
        } catch (\Throwable $e) {
            return 'id';
        }
    }

    /**
     * Helper mengambil sampel string pertama dari array
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
     * Helper rekursif untuk menerjemahkan isi array / JSON
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
                    $array[$key] = $tr->translate($val);
                } catch (\Throwable $e) {
                    // Jika gagal, gunakan teks asli
                }
            }
        }
        return $array;
    }

    /**
     * Otomatis mengembalikan nilai kolom _en jika locale frontend 'en'
     * Diproteksi agar TIDAK mengganggu tampilan Form di Admin/Dashboard
     */
    public function getAttribute($key)
    {
        $value = parent::getAttribute($key);

        // Jangan ubah nilai atribut jika sedang dipanggil di halaman Admin/Dashboard
        if (request()->is('admin*') || request()->is('dashboard*') || request()->is('*/edit')) {
            return $value;
        }

        // Jalankan mutasi hanya di Frontend ketika switcher bahasa terset ke 'en'
        if (app()->getLocale() === 'en' && !str_ends_with($key, '_en')) {
            $keyEn = $key . '_en';
            $valueEn = parent::getAttribute($keyEn);

            if (!empty($valueEn)) {
                return $valueEn;
            }
        }

        return $value;
    }
}
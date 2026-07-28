<?php

use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\Cache;

if (!function_exists('auto_translate')) {
    /**
     * Menerjemahkan teks secara otomatis berdasarkan locale aktif saat ini dengan sistem Smart Cache.
     *
     * @param string|null $text Teks asli (Bahasa Indonesia)
     * @return string
     */
    function auto_translate($text)
    {
        if (empty($text)) {
            return '';
        }

        // Ambil bahasa aktif saat ini dari session/laravel ('id' atau 'en')
        $locale = app()->getLocale();

        // Jika bahasa aktif adalah Inggris ('en'), lakukan translasi otomatis
        if ($locale === 'en') {
            // 1. Buat key cache yang aman & unik berdasarkan isi teks (menggunakan md5)
            $cacheKey = 'translate_' . md5($text) . '_en';

            // 2. Jika hasil terjemahan sudah ada di cache, langsung kembalikan (Sangat cepat, ~0.001 detik!)
            if (Cache::has($cacheKey)) {
                return Cache::get($cacheKey);
            }

            // 3. Jika belum di-cache, panggil API Google Translate
            try {
                // Set target bahasa ke 'en' (English), deteksi otomatis bahasa asal
                $tr = new GoogleTranslate('en');
                $translatedText = $tr->translate($text);

                // Jika proses translate berhasil, simpan di cache selamanya
                if (!empty($translatedText)) {
                    Cache::forever($cacheKey, $translatedText);
                    return $translatedText;
                }
            } catch (\Exception $e) {
                // Jika API limit/error, kembalikan teks asli (tanpa disimpan di cache)
                // agar sistem bisa mencoba menerjemahkan ulang lagi di kemudian hari
                return $text;
            }
        }

        // Jika bahasa aktif adalah Indonesia ('id'), kembalikan teks asli langsung
        return $text;
    }
}
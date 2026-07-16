<?php

use Stichoza\GoogleTranslate\GoogleTranslate;

if (!function_exists('auto_translate')) {
    /**
     * Menerjemahkan teks secara otomatis berdasarkan locale aktif saat ini.
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
            try {
                // Set target bahasa ke 'en' (English), deteksi otomatis bahasa asal
                $tr = new GoogleTranslate('en');
                return $tr->translate($text);
            } catch (\Exception $e) {
                // Jika terjadi limit atau server Google sibuk, kembalikan teks asli Indonesia agar web tidak rusak/error
                return $text;
            }
        }

        // Jika bahasa aktif adalah Indonesia ('id'), kembalikan teks asli langsung
        return $text;
    }
}
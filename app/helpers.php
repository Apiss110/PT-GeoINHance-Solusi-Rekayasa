<?php

use Stichoza\GoogleTranslate\GoogleTranslate;
use Illuminate\Support\Facades\Cache;

if (!function_exists('auto_translate')) {
    /**
     * Menerjemahkan teks secara otomatis berdasarkan locale aktif saat ini
     * dengan sistem Smart Cache, Strict Timeout, dan Circuit Breaker.
     *
     * @param string|null $text Teks asli (Bahasa Indonesia)
     * @return string
     */
    function auto_translate($text)
    {
        // 1. Validasi input
        if (empty($text) || !is_string($text)) {
            return '';
        }

        $text = trim($text);
        if ($text === '') {
            return '';
        }

        // Ambil bahasa aktif dari Laravel ('id' atau 'en')
        $locale = app()->getLocale();

        // Jika bahasa aktif adalah Indonesia ('id'), langsung kembalikan teks asli tanpa panggil Cache/API
        if ($locale === 'id') {
            return $text;
        }

        // Key cache utama untuk hasil terjemahan sukses
        $cacheKey = 'trans_' . md5($text . '_' . $locale);

        // 2. Jika hasil terjemahan yang sukses sudah ada di Cache, langsung kembalikan (~0.0005 detik)
        if (Cache::has($cacheKey)) {
            return Cache::get($cacheKey);
        }

        // Key cache sementara untuk menandai jika API pernah error/timeout (Circuit Breaker)
        $errorCacheKey = 'trans_err_' . md5($text . '_' . $locale);

        // 3. Jika API Google baru saja error/timeout/rate-limit dalam 10 menit terakhir,
        //    langsung kembalikan teks asli agar website TIDAK LEMOT/HANGING!
        if (Cache::has($errorCacheKey)) {
            return $text;
        }

        // 4. Panggil API Google Translate dengan Strict Timeout Guard
        try {
            $tr = new GoogleTranslate();
            $tr->setTarget($locale);

            // SET TIMEOUT KETAT:
            // Maksimal tunggu respon 1.5 detik & koneksi 1.0 detik.
            // Ini mencegah website hanging berpuluh-puluh detik jika Google memblokir IP/rate-limit.
            $tr->setOptions([
                'timeout' => 1.5,
                'connect_timeout' => 1.0,
            ]);

            $translatedText = $tr->translate($text);

            if (!empty($translatedText)) {
                // Simpan hasil terjemahan di cache SELAMANYA
                Cache::forever($cacheKey, $translatedText);
                return $translatedText;
            }
        } catch (\Throwable $e) {
            // Jika terjadi error / timeout / IP diblokir Google:
            // Simpan penanda error selama 10 menit agar request berikutnya
            // TIDAK PERLU menunggu timeout API lagi.
            Cache::put($errorCacheKey, true, now()->addMinutes(10));
        }

        return $text;
    }
}
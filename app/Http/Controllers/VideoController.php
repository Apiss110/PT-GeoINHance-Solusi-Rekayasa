<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    // Menampilkan daftar video di halaman utama /resources/video
    public function index()
    {
        // Mengambil semua video terbaru dari database
        $videos = Video::latest()->get();

        // JIKA file blade Anda berada di resources/views/resources/video.blade.php gunakan ini:
        return view('resources.video', compact('videos'));

        // JIKA file blade Anda berada di resources/views/pages/video.blade.php, ganti menjadi:
        // return view('pages.video', compact('videos'));
    }

    // Menampilkan halaman detail pemutar video ketika klik video card
    public function show($id)
    {
        $video = Video::findOrFail($id);
        
        // Mengambil 3 video terbaru lainnya untuk rekomendasi di bagian bawah (kecuali video yang sedang aktif)
        // Menggunakan 'created_at' karena kolom 'published_at' tidak ada di database Anda
        $otherVideos = Video::where('id', '!=', $id)
                            ->latest() 
                            ->take(3)
                            ->get();

        return view('resources.video_show', compact('video', 'otherVideos'));
    }
}
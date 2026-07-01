<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    // Menampilkan daftar video di halaman utama /resources/video
    public function index()
    {
        $videos = Video::orderBy('published_at', 'desc')->get();
        return view('resources.video', compact('videos'));
    }

    // Menampilkan halaman detail pemutar video ketika klik "Learn More"
    public function show($id)
    {
        $video = Video::findOrFail($id);
        
        // Mengambil 3 video terbaru lainnya untuk rekomendasi di bagian bawah (kecuali video yang sedang aktif)
        $otherVideos = Video::where('id', '!=', $id)
                            ->orderBy('published_at', 'desc')
                            ->take(3)
                            ->get();

        return view('resources.video_show', compact('video', 'otherVideos'));
    }
}
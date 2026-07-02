<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    // Menampilkan daftar video di halaman utama /resources/video
    public function index()
    {
        $videos = Video::latest()->get();

        // Mengarah langsung ke resources/views/resources/video.blade.php
        return view('resources.video', compact('videos'));
    }

    // Menampilkan halaman detail pemutar video publik (Multibangun style)
    public function show($id)
    {
        $video = Video::findOrFail($id);
        
        $otherVideos = Video::where('id', '!=', $id)
                            ->latest()
                            ->take(3)
                            ->get();

        // Mengarah ke resources/views/resources/video-detail.blade.php
        return view('resources.video-detail', compact('video', 'otherVideos'));
    }
}
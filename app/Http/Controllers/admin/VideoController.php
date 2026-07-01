<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    // Menampilkan halaman form tambah dan tabel daftar video di admin
    public function index()
    {
    $videos = Video::orderBy('published_at', 'desc')->get();
    // KODE BARU YANG BENAR:
    return view('pages.admin.video.index', compact('videos'));
    }

    // Menyimpan video baru ke database
    public function store(Request $request)
{
    $validated = $request->validate([
        'title' => 'required|string|max:255',
        'category' => 'required|string',
        'video_url' => 'required|url',
        'duration' => 'nullable|string',
        'production_year' => 'required|integer|min:2000|max:2030', // Validasi input
        'thumbnail' => 'required|image|max:2048',
        'description' => 'nullable|string',
    ]);

    $thumbnailPath = $request->file('thumbnail')->store('videos/thumbnails', 'public');

    // Proses insert data ke database
    Video::create([
        'title' => $validated['title'],
        'category' => $validated['category'],
        'video_url' => $validated['video_url'],
        'duration' => $validated['duration'],
        'video_url' => $validated['video_url'],
        'description' => $validated['description'],
        'thumbnail_path' => $thumbnailPath,
        'production_year' => $validated['production_year'], // <-- PASTIKAN INI ADA
    ]);

    return redirect()->back()->with('success', 'Video dokumentasi berhasil ditambahkan!');
}

    // Memperbarui data video (proses edit)
    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'published_at' => 'required|date',
            'duration' => 'nullable|string',
            'video_url' => 'required|url',
            'thumbnail' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'description' => 'nullable|string',
        ]);

        $data = $request->only(['title', 'category', 'published_at', 'duration', 'video_url', 'description']);

        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada
            if ($video->thumbnail_path) {
                Storage::disk('public')->delete($video->thumbnail_path);
            }
            $data['thumbnail_path'] = $request->file('thumbnail')->store('videos/thumbnails', 'public');
        }

        $video->update($data);

        return redirect()->route('admin.video.index')->with('success', 'Data video berhasil diperbarui!');
    }

    // Menghapus video dari database
    public function destroy($id)
    {
        $video = Video::findOrFail($id);

        if ($video->thumbnail_path) {
            Storage::disk('public')->delete($video->thumbnail_path);
        }
        
        $video->delete();

        return redirect()->route('admin.video.index')->with('success', 'Video berhasil dihapus dari sistem!');
    }
}
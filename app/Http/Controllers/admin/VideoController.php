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
        return view('pages.admin.video.index', compact('videos'));
    }

    // Menyimpan video baru ke database
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'           => 'required|string|max:255',
            'category'        => 'required|string',
            'video_url'       => 'required|url',
            'production_year' => 'required|integer|min:2000|max:' . (date('Y') + 5),
            'thumbnail'       => 'required|image|mimes:jpeg,png,jpg,webp|max:2048',
            'description'     => 'nullable|string',
        ]);

        // Proses upload file thumbnail
        $thumbnailPath = $request->file('thumbnail')->store('videos/thumbnails', 'public');

        // Proses insert data ke database
        Video::create([
            'title'           => $validated['title'],
            'category'        => $validated['category'],
            'video_url'       => $validated['video_url'],
            'production_year' => $validated['production_year'],
            'description'     => $validated['description'] ?? null, // Proteksi jika deskripsi kosong
            'thumbnail_path'  => $thumbnailPath,
            'published_at'    => now(),
        ]);

        return redirect()->back()->with('success', 'Video dokumentasi berhasil ditambahkan!');
    }

    // Memperbarui data video (proses edit)
    public function update(Request $request, $id)
    {
        $video = Video::findOrFail($id);

        $validated = $request->validate([
            'title'           => 'required|string|max:255',
            'category'        => 'required|string',
            'video_url'       => 'required|url',
            'production_year' => 'required|integer|min:2000|max:' . (date('Y') + 5),
            'thumbnail'       => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'description'     => 'nullable|string',
            'published_at'    => 'required|date',
        ]);

        // 🟢 Menggunakan data yang sudah tervalidasi saja agar lebih aman
        $data = $validated;

        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama jika ada di storage
            if ($video->thumbnail_path && Storage::disk('public')->exists($video->thumbnail_path)) {
                Storage::disk('public')->delete($video->thumbnail_path);
            }
            // Simpan thumbnail baru
            $data['thumbnail_path'] = $request->file('thumbnail')->store('videos/thumbnails', 'public');
        }

        // 🟢 Wajib di-unset agar Eloquent tidak mencari kolom bernama 'thumbnail' di DB
        unset($data['thumbnail']);

        $video->update($data);

        return redirect()->route('admin.video.index')->with('success', 'Data video berhasil diperbarui!');
    }

    // Menghapus video dari database
    public function destroy($id)
    {
        $video = Video::findOrFail($id);

        // Hapus file dari storage sebelum menghapus record di DB
        if ($video->thumbnail_path && Storage::disk('public')->exists($video->thumbnail_path)) {
            Storage::disk('public')->delete($video->thumbnail_path);
        }
        
        $video->delete();

        return redirect()->route('admin.video.index')->with('success', 'Video berhasil dihapus dari sistem!');
    }

    // Menampilkan halaman form edit video
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('pages.admin.video.edit', compact('video'));
    }

    // Menghapus video secara massal
    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);

        if (empty($ids)) {
            return redirect()->route('admin.video.index')->with('error', 'Tidak ada data video yang dipilih untuk dihapus.');
        }

        $videos = Video::whereIn('id', $ids)->get();

        foreach ($videos as $video) {
            if ($video->thumbnail_path && Storage::disk('public')->exists($video->thumbnail_path)) {
                Storage::disk('public')->delete($video->thumbnail_path);
            }
        }

        Video::whereIn('id', $ids)->delete();

        return redirect()->route('admin.video.index')->with('success', count($ids) . ' data video berhasil dihapus massal!');
    }
}
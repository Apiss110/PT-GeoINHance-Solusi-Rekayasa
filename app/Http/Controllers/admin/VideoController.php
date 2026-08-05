<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Video;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class VideoController extends Controller
{
    /**
     * Menampilkan daftar koleksi video aktif (Halaman Index)
     */
    public function index()
    {
        $videos = Video::orderBy('published_at', 'desc')->get();
        return view('pages.admin.video.index', compact('videos'));
    }

    /**
     * Menampilkan halaman form tambah video baru (Halaman Create)
     */
    public function create()
    {
        return view('pages.admin.video.create');
    }

    /**
     * Menyimpan data video baru ke database
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'           => 'required|string|max:255',
            'category'        => 'required|string',
            'video_url'       => 'required|url',
            'production_year' => 'required|integer|min:2000|max:' . (date('Y') + 5),
            'thumbnail'       => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
            'description'     => 'nullable|string',
        ]);

        // Proses upload file thumbnail ke storage disk public
        $thumbnailPath = $request->file('thumbnail')->store('videos/thumbnails', 'public');

        // Proses simpan data ke database
        Video::create([
            'title'           => $validated['title'],
            'category'        => $validated['category'],
            'video_url'       => $validated['video_url'],
            'production_year' => $validated['production_year'],
            'description'     => $validated['description'] ?? null,
            'thumbnail_path'  => $thumbnailPath,
            'published_at'    => now(),
        ]);

        // Redirect kembali ke halaman index tabel video
        return redirect()->route('admin.video.index')->with('success', 'Video dokumentasi baru berhasil ditambahkan!');
    }

    /**
     * Menampilkan halaman form edit data video
     */
    public function edit($id)
    {
        $video = Video::findOrFail($id);
        return view('pages.admin.video.edit', compact('video'));
    }

    /**
     * Memperbarui data video yang sudah ada di database
     */
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

        $data = $validated;

        if ($request->hasFile('thumbnail')) {
            // Hapus thumbnail lama dari storage jika file-nya ada
            if ($video->thumbnail_path && Storage::disk('public')->exists($video->thumbnail_path)) {
                Storage::disk('public')->delete($video->thumbnail_path);
            }
            // Simpan file thumbnail baru
            $data['thumbnail_path'] = $request->file('thumbnail')->store('videos/thumbnails', 'public');
        }

        // Unset key 'thumbnail' agar tidak mengganggu query Eloquent
        unset($data['thumbnail']);

        $video->update($data);

        return redirect()->route('admin.video.index')->with('success', 'Data video berhasil diperbarui!');
    }

    /**
     * Menghapus 1 data video tunggal
     */
    public function destroy($id)
    {
        $video = Video::findOrFail($id);

        // Hapus file thumbnail fisik dari storage
        if ($video->thumbnail_path && Storage::disk('public')->exists($video->thumbnail_path)) {
            Storage::disk('public')->delete($video->thumbnail_path);
        }
        
        $video->delete();

        return redirect()->route('admin.video.index')->with('success', 'Video berhasil dihapus dari sistem!');
    }

    /**
     * Menghapus beberapa video sekaligus (Massal/Bulk Delete)
     */
    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);

        if (empty($ids)) {
            return redirect()->route('admin.video.index')->with('error', 'Tidak ada data video yang dipilih untuk dihapus.');
        }

        $videos = Video::whereIn('id', $ids)->get();

        // Hapus seluruh gambar thumbnail dari storage
        foreach ($videos as $video) {
            if ($video->thumbnail_path && Storage::disk('public')->exists($video->thumbnail_path)) {
                Storage::disk('public')->delete($video->thumbnail_path);
            }
        }

        // Hapus baris record dari database
        Video::whereIn('id', $ids)->delete();

        return redirect()->route('admin.video.index')->with('success', count($ids) . ' data video berhasil dihapus massal!');
    }
}
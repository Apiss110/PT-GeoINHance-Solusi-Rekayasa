<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog; 
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Menampilkan daftar PANEL ADMIN (Hanya Berita / News & Event)
     */
    public function index()
    {
        // 🟢 KUNCI DI SINI: Menyaring secara ketat agar Kategori Artikel TIDAK IKUT MASUK
        $blogs = Blog::whereNotIn('category', ['ARTIKEL', 'GEOTECHNIK', 'GEOTEKNIK'])
                     ->latest()
                     ->get();
        
        return view('pages.admin.news.index', compact('blogs'));
    }

    public function create()
    {
        return view('pages.admin.blog.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'tag'      => 'required|string|max:255',
            'image'    => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
            'content'  => 'required',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public');
        }

        Blog::create([
            'title'        => $request->title,
            'slug'         => Str::slug($request->title) . '-' . Str::random(5),
            'category'     => strtoupper($request->category), // Mengubah ke UPPERCASE
            'tag'          => $request->tag,
            'image'        => $imagePath, 
            'content'      => $request->content,
            'published_at' => now(),
        ]);

        // 🟢 Pastikan diredirect kembali ke halaman index berita panel admin
        return redirect()->route('admin.blog.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('pages.admin.news.edit', compact('blog'));
    }

    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title'    => 'required|string|max:255',
            'category' => 'required|string|max:255',
            'tag'      => 'required|string|max:255',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'content'  => 'required',
        ]);

        if ($request->hasFile('image')) {
            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }
            $blog->image = $request->file('image')->store('blogs', 'public');
        }

        if ($blog->title !== $request->title) {
            $blog->slug = Str::slug($request->title) . '-' . Str::random(5);
        }

        $blog->title    = $request->title;
        $blog->category = strtoupper($request->category);
        $blog->tag      = $request->tag;                       
        $blog->content  = $request->content;
        $blog->save();

        return redirect()->route('admin.blog.index')->with('success', 'Berita berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->image && Storage::disk('public')->exists($blog->image)) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect()->route('admin.blog.index')->with('success', 'Berita berhasil dihapus!');
    }

    public function uploadImage(Request $request)
    {
        if ($request->hasFile('upload')) {
            $file = $request->file('upload');
            $path = $file->store('blog_images', 'public');
            
            return response()->json(['url' => asset('storage/' . $path)]);
        }
        return response()->json(['error' => 'Gagal mengunggah gambar.'], 400);
    }

    public function bulkDelete(Request $request)
{
    // 1. Validasi masukan array ID data berita
    $request->validate([
        'ids' => 'required|array',
        'ids.*' => 'exists:blogs,id', // Sesuaikan dengan nama tabel database berita Anda
    ]);

    // 2. Tarik semua objek record yang dicentang
    $blogs = Blog::whereIn('id', $request->ids)->get();

    // 3. Hapus berkas gambar terkait di storage lokal, lalu hapus datanya
    foreach ($blogs as $blog) {
        if ($blog->image) {
            Storage::disk('public')->delete($blog->image);
        }
        $blog->delete();
    }

    // 4. Alihkan kembali dengan notifikasi sukses
    return redirect()->back()->with('success', count($request->ids) . ' artikel berita berhasil dihapus massal.');
}
}
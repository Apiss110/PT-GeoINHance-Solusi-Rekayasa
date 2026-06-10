<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog; // Memastikan model Blog ter-import
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    /**
     * Menampilkan semua daftar berita dari database
     */
    public function index()
    {
        $blogs = Blog::latest()->get();
        return view('pages.admin.blog.index', compact('blogs'));
    }

    public function create()
    {
        return view('pages.admin.blog.create');
    }

    /**
     * Memproses penyimpanan berita baru ke database beserta upload foto
     */
    public function store(Request $request)
    {
    $request->validate([
        'title' => 'required|string|max:255',
        'category' => 'required|string|max:255',
        'tag' => 'required|string|max:255',
        'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
        'content' => 'required',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('blogs', 'public');
    }

    Blog::create([
        'title' => $request->title,
        'slug' => Str::slug($request->title),
        'category' => $request->category, // Menangkap input dari form komponen kiri
        'tag' => $request->tag,           // Menangkap input dari form komponen kiri
        'image' => $imagePath, 
        'content' => $request->content,
        'published_at' => now(),
    ]);

    return redirect()->route('admin.blog.index')->with('success', 'Berita berhasil ditambahkan!');
    }

    /**
     * Menampilkan Form Edit berdasarkan ID data asli
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('pages.admin.blog.edit', compact('blog'));
    }

    /**
     * Memproses pembaruan data berita dan foto di database
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'content' => 'required',
        ]);

        if ($request->hasFile('image')) {
            if ($blog->image && Storage::disk('public')->exists($blog->image)) {
                Storage::disk('public')->delete($blog->image);
            }
            $blog->image = $request->file('image')->store('blogs', 'public');
        }

        // PERBAIKAN: Pastikan kolom pendukung tetap aman saat update
        $blog->title = $request->title;
        $blog->slug = Str::slug($request->title);
        $blog->category = $blog->category ?? 'Berita';
        $blog->tag = $blog->tag ?? 'Umum';
        $blog->content = $request->content;
        $blog->save();

        return redirect()->route('admin.blog.index')->with('success', 'Berita berhasil diperbarui!');
    }

    /**
     * Menghapus berkas foto dan record baris dari database
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->image && Storage::disk('public')->exists($blog->image)) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect()->route('admin.blog.index')->with('with_toast', 'Berita berhasil deleted!');
    }
}
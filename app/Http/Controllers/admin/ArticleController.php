<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Blog; 
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Menampilkan halaman index Artikel & Insight (Halaman Publik / Depan)
     * Ditambahkan untuk memperbaiki error "Call to undefined method ... publicIndex()"
     */
    public function publicIndex()
    {
        // Mengambil semua blog terbaru untuk ditampilkan di halaman resources utama
        $blogs = Blog::latest()->get();

        // Mengarahkan ke file view blade halaman depan kamu (sesuaikan path jika berbeda)
        return view('resources.articles', compact('blogs'));
    }

    /**
     * Menampilkan halaman index Artikel di Dashboard Admin
     */
    public function index()
    {
        // 🟢 PERBAIKAN: Karena kategori sekarang berupa input teks bebas, 
        // kita ambil SEMUA blog tanpa membatasi ejaannya agar tidak ada data yang tersembunyi.
        $blogs = Blog::latest()->get();

        return view('pages.admin.articles.index', compact('blogs'));
    }

    /**
     * Menyimpan data artikel baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required|string|max:255',
            'content'  => 'required',
            'category' => 'required|string|max:255', // Ditambahkan max string validation
            'tag'      => 'required|string',
            'image'    => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('blogs', 'public');
        }

        Blog::create([
            'title'        => $request->title,
            'slug'         => Str::slug($request->title) . '-' . Str::random(5), 
            'category'     => strtoupper($request->category), // Tetap disimpan huruf kapital semua agar seragam
            'tag'          => $request->tag,
            'image'        => $imagePath,
            'content'      => $request->content,
            'published_at' => now(),
        ]);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil ditambahkan!');
    }

    /**
     * Mengarahkan ke halaman edit artikel
     */
    public function edit($id)
    {
        $blog = Blog::findOrFail($id);
        return view('pages.admin.articles.edit', compact('blog'));
    }

    /**
     * Memperbarui data artikel di database
     */
    public function update(Request $request, $id)
    {
        $blog = Blog::findOrFail($id);

        $request->validate([
            'title'    => 'required|string|max:255',
            'content'  => 'required',
            'category' => 'required|string|max:255',
            'tag'      => 'required|string',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
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
        $blog->category = strtoupper($request->category); // Disimpan sebagai huruf besar
        $blog->tag      = $request->tag;
        $blog->content  = $request->content;
        $blog->save();

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    /**
     * Menghapus artikel dari database
     */
    public function destroy($id)
    {
        $blog = Blog::findOrFail($id);

        if ($blog->image && Storage::disk('public')->exists($blog->image)) {
            Storage::disk('public')->delete($blog->image);
        }

        $blog->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dihapus!');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article; // 🟢 PERBAIKAN: Menggunakan model Article yang baru, bukan Blog lagi
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ArticleController extends Controller
{
    /**
     * Menampilkan halaman index Artikel & Insight (Halaman Publik / Depan)
     */
    public function publicIndex()
{
    // Mengambil semua data artikel dari model Article
    $blogs = \App\Models\Article::latest()->get();

    // Pastikan melemparnya menggunakan nama 'blogs' agar cocok dengan file blade
    return view('resources.articles', compact('blogs'));
}

    /**
     * Menampilkan halaman index Artikel di Dashboard Admin
     */
    public function index()
    {
        // 🟢 PERBAIKAN: Mengambil data dari model Article
        $articles = Article::latest()->get();

        return view('pages.admin.articles.index', compact('articles'));
    }

    /**
     * Menyimpan data artikel baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'title'    => 'required|string|max:255',
            'content'  => 'required|string',
            'category' => 'required|string|max:255', 
            'tag'      => 'required|string',
            'image'    => 'required|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $imagePath = null;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('articles', 'public'); // 🟢 Folder disesuaikan ke 'articles'
        }

        // 🟢 PERBAIKAN: Menggunakan Article::create
        Article::create([
            'title'    => $request->title,
            'slug'     => Str::slug($request->title) . '-' . Str::random(5), 
            'category' => strtoupper($request->category), 
            'tag'      => $request->tag,
            'image'    => $imagePath,
            'content'  => $request->content,
        ]);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil ditambahkan!');
    }

    /**
     * Mengarahkan ke halaman edit artikel
     */
    public function edit($id)
    {
        // 🟢 PERBAIKAN: Menggunakan model Article
        $article = Article::findOrFail($id);
        return view('pages.admin.articles.edit', compact('article'));
    }

    /**
     * Memperbarui data artikel di database
     */
    public function update(Request $request, $id)
    {
        // 🟢 PERBAIKAN: Menggunakan model Article
        $article = Article::findOrFail($id);

        $request->validate([
            'title'    => 'required|string|max:255',
            'content'  => 'required|string',
            'category' => 'required|string|max:255',
            'tag'      => 'required|string',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        // 🟢 PERBAIKAN: Menggunakan pola array data seperti ProjectController (Langkah 4)
        $data = [
            'title'    => $request->title,
            'category' => strtoupper($request->category),
            'tag'      => $request->tag,
            'content'  => $request->content,
        ];

        // Kondisi jika judul berubah, slug diperbarui
        if ($article->title !== $request->title) {
            $data['slug'] = Str::slug($request->title) . '-' . Str::random(5);
        }

        if ($request->hasFile('image')) {
            if ($article->image && Storage::disk('public')->exists($article->image)) {
                Storage::disk('public')->delete($article->image);
            }
            $data['image'] = $request->file('image')->store('articles', 'public');
        }

        $article->update($data);

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil diperbarui!');
    }

    /**
     * Menghapus artikel dari database
     */
    public function destroy($id)
    {
        // 🟢 PERBAIKAN: Menggunakan model Article
        $article = Article::findOrFail($id);

        if ($article->image && Storage::disk('public')->exists($article->image)) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dihapus!');
    }
}
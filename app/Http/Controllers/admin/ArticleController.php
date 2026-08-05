<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Article;
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
        $blogs = Article::latest()->get();

        return view('resources.articles', compact('blogs'));
    }

    /**
     * Menampilkan halaman index Artikel di Dashboard Admin
     */
    public function index()
    {
        $articles = Article::latest()->get();

        return view('pages.admin.articles.index', compact('articles'));
    }

    public function create()
    {
        return view('pages.admin.articles.create');
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
            $imagePath = $request->file('image')->store('articles', 'public');
        }

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
     * Menampilkan halaman detail satu Artikel berdasarkan ID atau Slug (Halaman Publik)
     */
    public function show($identifier)
    {
        // 🟢 FIX: Menggunakan variabel $blog agar sesuai dengan article-detail.blade.php
        $blog = Article::where(function ($q) use ($identifier) {
            if (is_numeric($identifier)) {
                $q->where('id', $identifier);
            }
            $q->orWhere('slug', $identifier);
        })->firstOrFail();

        return view('resources.article-detail', compact('blog'));
    }

    /**
     * Menampilkan halaman detail satu Artikel berdasarkan slug (Alias untuk show jika diperlukan)
     */
    public function publicShow($slug)
    {
        return $this->show($slug);
    }

    /**
     * Mengarahkan ke halaman edit artikel
     */
    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('pages.admin.articles.edit', compact('article'));
    }

    /**
     * Memperbarui data artikel di database
     */
    public function update(Request $request, $id)
    {
        $article = Article::findOrFail($id);

        $request->validate([
            'title'    => 'required|string|max:255',
            'content'  => 'required|string',
            'category' => 'required|string|max:255',
            'tag'      => 'required|string',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $data = [
            'title'    => $request->title,
            'category' => strtoupper($request->category),
            'tag'      => $request->tag,
            'content'  => $request->content,
        ];

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
        $article = Article::findOrFail($id);

        if ($article->image && Storage::disk('public')->exists($article->image)) {
            Storage::disk('public')->delete($article->image);
        }

        $article->delete();

        return redirect()->route('admin.articles.index')->with('success', 'Artikel berhasil dihapus!');
    }

    public function bulkDelete(Request $request)
    {
        $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'exists:articles,id',
        ]);

        $articles = Article::whereIn('id', $request->ids)->get();

        foreach ($articles as $article) {
            if ($article->image && Storage::disk('public')->exists($article->image)) {
                Storage::disk('public')->delete($article->image);
            }
            $article->delete();
        }

        return redirect()->back()->with('success', count($request->ids) . ' data artikel berhasil dihapus massal.');
    }
}
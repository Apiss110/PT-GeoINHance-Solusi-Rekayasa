<?php

namespace App\Http\Controllers;

use App\Models\Blog;    // Model untuk Berita / News
use App\Models\Article; // Model untuk Artikel
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // 1. Ambil maksimal 6 data terbaru dari masing-masing tabel
        $news = Blog::latest()->take(6)->get();
        $articles = Article::latest()->take(6)->get();

        // 2. Suntikkan URL Detail & Tipe secara dinamis agar tidak bentrok di file Blade
        foreach ($news as $item) {
            $item->tipe_konten = 'berita';
            $item->url_detail = route('blog.show', $item->slug); // Route detail berita kamu
        }

        foreach ($articles as $item) {
            $item->tipe_konten = 'artikel';
            // 🟢 Diubah dari blog.show menjadi article.show
            $item->url_detail = route('article.show', $item->slug); 
        }

        // 3. Gabungkan keduanya, urutkan berdasarkan tanggal terbaru (created_at), lalu potong jadi 6 saja
        $blogs = $news->concat($articles)
                      ->sortByDesc('created_at')
                      ->take(6);

        // 4. Lempar variabel $blogs yang sudah bercampur dan terurut ke view welcome
        return view('welcome', compact('blogs'));
    }
}
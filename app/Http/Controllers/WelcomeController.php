<?php

namespace App\Http\Controllers;

use App\Models\Blog; // Model untuk Berita / News
use App\Models\Article; // Model untuk Artikel
use App\Models\Branch; // <-- 1. TAMBAHKAN INI (Model untuk Peta Cabang)
use Illuminate\Http\Request;

class WelcomeController extends Controller
{
    public function index()
    {
        // 1. Ambil maksimal 6 data terbaru dari masing-masing tabel
        $news = Blog::latest()->take(6)->get();
        $articles = Article::latest()->take(6)->get();
        
        // <-- 2. TAMBAHKAN INI: Ambil semua data cabang dari database
        $branches = Branch::all(); 

        // 2. Suntikkan URL Detail & Tipe secara dinamis agar tidak bentrok di file Blade
        foreach ($news as $item) {
            $item->tipe_konten = 'berita';
            $item->url_detail = route('blog.show', $item->slug); // Route detail berita kamu
        }

        foreach ($articles as $item) {
            $item->tipe_konten = 'artikel';
            $item->url_detail = route('article.show', $item->slug); 
        }

        // 3. Gabungkan keduanya, urutkan berdasarkan tanggal terbaru (created_at), lalu potong jadi 6 saja
        $blogs = $news->concat($articles)
                       ->sortByDesc('created_at')
                       ->take(6);

        // 4. Lempar variabel ke view welcome 
        // <-- 3. UBAH DI SINI: Tambahkan 'branches' ke dalam compact
        return view('welcome', compact('blogs', 'branches'));
    }
}
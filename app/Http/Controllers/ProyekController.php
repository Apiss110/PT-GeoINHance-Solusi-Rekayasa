<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\StrategicProject; 
use App\Models\ProjectCategory; // Tambahan: Panggil model kategori baru
use App\Models\Proyek;
use Illuminate\Http\Request;


class ProyekController extends Controller
{
    /**
     * Halaman menampilkan semua proyek (Publik)
     */
    public function semuaProyek()
    {
        $projects = StrategicProject::latest()->paginate(6);
        // Diselaraskan dengan folder aslinya di: resources/views/pages/proyek/semua-proyek.blade.php
        return view('proyek.semua-proyek', compact('projects'));
    }

    /**
     * Halaman detail satu proyek (Publik)
     */
    public function publicShow($id)
{
    $proyek = \App\Models\StrategicProject::findOrFail($id);
    // Kirim data ke file view (misalnya: resources/views/proyek/show.blade.php)
    return view('proyek.show', compact('proyek'));
}

    /**
     * Halaman menampilkan daftar proyek berdasarkan Jenis / Kategori lewat Slug (Publik)
     */
    public function showByCategory($slug)
    {
        // 1. Cari data kategori berdasarkan slug di URL (e.g., 'geotechnical-analysis')
        $category = ProjectCategory::where('slug', $slug)->firstOrFail();
        
        // 2. Ambil isi proyek yang berelasi dengan kategori ini (Eager loading data kategori)
        $projects = $category->strategicProjects()->latest()->get();
        
        // 3. Ambil semua kategori untuk kebutuhan link menu samping/dropdown navbar jika diperlukan
        $categories = ProjectCategory::all();

        // Diarahkan ke file template dinamis baru yang kita buat di folder proyek
        return view('proyek.index-category', compact('category', 'projects', 'categories'));
    }

    /**
     * Halaman menampilkan daftar seluruh Articles (Publik)
     */
    public function articles()
    {
        $blogs = Blog::latest()->get();
        // folder: resources/views/resources/articles.blade.php
        return view('resources.articles', compact('blogs'));
    }

    /**
     * Halaman menampilkan daftar seluruh News & Events (Publik)
     */
    public function newsEvents()
    {
        $blogs = Blog::latest()->get();
        // folder: resources/views/resources/news_events.blade.php
        return view('resources.news_events', compact('blogs'));
    }

    /**
     * Halaman detail artikel/blog berdasarkan Slug (Publik)
     */
    public function showBlog($slug)
    {
        $blog = Blog::where('slug', $slug)->firstOrFail();
        // folder: resources/views/resources/article-detail.blade.php
        return view('resources.article-detail', compact('blog'));
    }
}
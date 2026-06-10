<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\StrategicProject; 
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
        return view('pages.proyek.semua-proyek', compact('projects'));
    }

    /**
     * Halaman detail satu proyek (Publik)
     */
    public function publicShow($id)
    {
        // Mencari data proyek strategis berdasarkan id
        $project = StrategicProject::findOrFail($id);
        
        // Mengarah ke file: resources/views/pages/proyek/detail-proyek.blade.php
        return view('pages.proyek.detail-proyek', compact('project'));
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
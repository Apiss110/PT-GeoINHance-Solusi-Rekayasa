<?php

namespace App\Http\Controllers\Admin; // Sesuaikan namespace jika letak controllernya berbeda

use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\ProjectPage;
use App\Models\Sector;
use App\Models\ContactMessage;
use App\Models\TrainingRegistration;
// Impor model lainnya jika Anda ingin menambah statistik (misal: Blog, Video, dll.)

class DashboardController extends Controller
{
    public function index()
    {
        // 1. Ambil data hitungan total dari database
        $totalProducts = Product::count();
        $totalProjects = ProjectPage::count();
        $totalSectors = Sector::count();
        
        // Cek apakah model Blog/News & Event ada sebelum menghitungnya
        $totalBlogs = class_exists(\App\Models\Blog::class) 
            ? \App\Models\Blog::count() 
            : 0;

        // 2. Kirim data ke view dashboard
        return view('dashboard', compact(
            'totalProducts',
            'totalProjects',
            'totalSectors',
            'totalBlogs'
            // Variabel $unreadMessagesCount dan $pendingTrainingsCount 
            // tidak perlu dikirim dari sini karena sudah dibagikan secara global di AppServiceProvider!
        ));
    }
}
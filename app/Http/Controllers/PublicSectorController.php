<?php

namespace App\Http\Controllers;

use App\Models\Sector;
use Illuminate\Http\Request;

class PublicSectorController extends Controller
{
    /**
     * Halaman Detail Sektor Layanan Publik
     * Hanya boleh ada SATU fungsi show() di dalam kelas ini
     */
    public function show($slug)
    {
        // 1. Ambil data sektor beserta proyek strategis yang berelasi
        $sector = Sector::with('projects')->where('slug', $slug)->firstOrFail();
        
        // 2. Ambil data sektor-sektor lainnya untuk slider bawah (kecuali sektor yang sedang dibuka saat ini)
        $otherSectors = Sector::where('id', '!=', $sector->id)->get();
        
        // 3. Kirimkan kedua data tersebut ke file view detail sektor
        return view('sektor.detail', compact('sector', 'otherSectors'));
    }
}
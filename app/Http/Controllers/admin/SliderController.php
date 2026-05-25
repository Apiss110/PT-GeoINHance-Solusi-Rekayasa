<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\HeroSlider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    /**
     * Menampilkan halaman dashboard manajemen slider (Form & Tabel)
     */
    public function index()
    {
        // Ambil semua data slider dari database
        $sliders = HeroSlider::all();
        
        // Mengarah ke file resources/views/pages/admin/slider/index.blade.php
        return view('pages.admin.slider.index', compact('sliders'));
    }

    /**
     * Memproses upload foto baru dan menyimpannya ke database
     */
    public function store(Request $request)
    {
        // Validasi inputan admin
        $request->validate([
            'title' => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'image' => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', // Maksimal 2MB
        ]);

        if ($request->hasFile('image')) {
            // Menyimpan file foto fisik ke dalam folder: storage/app/public/sliders
            $path = $request->file('image')->store('sliders', 'public');

            // Simpan informasi path dan teks ke database
            HeroSlider::create([
                'title' => $request->title,
                'subtitle' => $request->subtitle,
                'image_path' => $path,
                'link_url' => $request->link_url, // Tambahkan baris ini
            ]);
        }

        return redirect()->back()->with('success', 'Foto banner baru berhasil ditambahkan!');
    }

    /**
     * Menghapus foto dari database dan file fisiknya di storage
     */
    public function destroy($id)
    {
        $slider = HeroSlider::findOrFail($id);

        // Hapus file foto fisik dari folder storage agar tidak memenuhi penyimpanan
        if (Storage::disk('public')->exists($slider->image_path)) {
            Storage::disk('public')->delete($slider->image_path);
        }

        // Hapus data dari tabel database
        $slider->delete();

        return redirect()->back()->with('success', 'Foto banner berhasil dihapus!');
    }
}
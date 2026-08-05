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
        // Ambil semua data slider dari database (urutkan dari yang terbaru)
        $sliders = HeroSlider::latest()->get();
        
        return view('pages.admin.slider.index', compact('sliders'));
    }

    /**
     * Menampilkan form tambah slider baru
     */
    public function create()
    {
        return view('pages.admin.slider.create');
    }

    /**
     * Memproses upload foto baru dan menyimpannya ke database
     */
    public function store(Request $request)
    {
        // 1. Validasi inputan admin
        $request->validate([
            'title'    => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'link_url' => 'nullable|string|max:255',
            'image'    => 'required|image|mimes:jpeg,png,jpg,webp|max:5120', // Maksimal 5MB
        ]);

        if ($request->hasFile('image')) {
            // Menyimpan file foto fisik ke dalam folder: storage/app/public/sliders
            $path = $request->file('image')->store('sliders', 'public');

            // Simpan informasi path dan teks ke database
            HeroSlider::create([
                'title'      => $request->title,
                'subtitle'   => $request->subtitle,
                'image_path' => $path,
                'link_url'   => $request->link_url,
            ]);
        }

        // 2. Redirect KEMBALI KE INDEX setelah berhasil menambahkan
        return redirect()->route('admin.slider.index')
                        ->with('success', 'Foto banner baru berhasil ditambahkan!');
    }

    /**
     * Menampilkan form edit slider
     */
    public function edit($id)
    {
        $slider = HeroSlider::findOrFail($id);
        return view('pages.admin.slider.edit', compact('slider'));
    }

    /**
     * Memperbarui data slider yang sudah ada
     */
    public function update(Request $request, $id)
    {
        // 1. Validasi inputan admin
        $request->validate([
            'title'    => 'nullable|string|max:255',
            'subtitle' => 'nullable|string|max:255',
            'link_url' => 'nullable|string|max:255',
            'image'    => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        ]);

        $slider = HeroSlider::findOrFail($id);

        // 2. Jika mengupload gambar baru
        if ($request->hasFile('image')) {
            // Hapus gambar lama jika ada di storage
            if ($slider->image_path && Storage::disk('public')->exists($slider->image_path)) {
                Storage::disk('public')->delete($slider->image_path);
            }

            $slider->image_path = $request->file('image')->store('sliders', 'public');
        }

        // 3. Update data teks dan link
        $slider->title    = $request->title;
        $slider->subtitle = $request->subtitle;
        $slider->link_url = $request->link_url;
        $slider->save();

        // 4. Redirect kembali ke Halaman Index / Utama Slider
        return redirect()->route('admin.slider.index')
                        ->with('success', 'Foto banner berhasil diperbarui!');
    }

    /**
     * Menghapus foto dari database dan file fisiknya di storage
     */
    public function destroy($id)
    {
        $slider = HeroSlider::findOrFail($id);

        // Hapus file foto fisik dari folder storage agar tidak memenuhi penyimpanan
        if ($slider->image_path && Storage::disk('public')->exists($slider->image_path)) {
            Storage::disk('public')->delete($slider->image_path);
        }

        // Hapus data dari tabel database
        $slider->delete();

        return redirect()->route('admin.slider.index')
                        ->with('success', 'Foto banner berhasil dihapus!');
    }

    /**
     * Menghapus beberapa foto sekaligus (Bulk Delete)
     */
    public function bulkDestroy(Request $request)
    {
        $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'exists:hero_sliders,id',
        ]);

        try {
            // Ambil data untuk membaca path gambar sebelum dihapus
            $sliders = HeroSlider::whereIn('id', $request->ids)->get();

            foreach ($sliders as $slider) {
                if ($slider->image_path && Storage::disk('public')->exists($slider->image_path)) {
                    Storage::disk('public')->delete($slider->image_path);
                }
                $slider->delete();
            }

            return redirect()->route('admin.slider.index')
                            ->with('success', count($request->ids) . ' foto banner utama berhasil dihapus sekaligus!');
                
        } catch (\Exception $e) {
            return redirect()->route('admin.slider.index')
                            ->with('error', 'Gagal menghapus banner massal: ' . $e->getMessage());
        }
    }
}
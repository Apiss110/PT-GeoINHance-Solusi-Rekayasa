<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class SectorController extends Controller
{
    // 1. Menampilkan Halaman Daftar Sektor di Admin
    public function index()
    {
        $sectors = Sector::latest()->get();
        return view('pages.admin.sector.index', compact('sectors'));
    }

    // 2. Menampilkan Form Tambah Sektor
    public function create()
    {
        return view('pages.admin.sector.create');
    }

    // 3. Menyimpan Sektor Baru ke Database
    public function store(Request $request)
    {
        $request->validate([
            'name'         => 'required|string|max:255|unique:sectors,name',
            'description'  => 'required|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120', // PERBAIKAN: Max 5MB
        ], [
            'name.unique'  => 'Nama sektor ini sudah ada.',
        ]);

        $bannerPath = null;
        if ($request->hasFile('banner_image')) {
            $bannerPath = $request->file('banner_image')->store('sector-banners', 'public');
        }

        Sector::create([
            'name'         => $request->name,
            'slug'         => Str::slug($request->name),
            'description'  => $request->description,
            'banner_image' => $bannerPath, // Konsisten menggunakan banner_image
        ]);

        // Dialihkan ke index agar pengguna bisa langsung melihat kartu sektor baru yang dibuat
        return redirect()->route('admin.sector.index')->with('success', 'Sektor berhasil ditambahkan!');
    }

    // 4. Menampilkan Form Edit Sektor
    public function edit($id)
    {
        $sector = Sector::findOrFail($id);
        return view('pages.admin.sector.edit', compact('sector'));
    }

    // 5. Memperbarui Data Sektor
    public function update(Request $request, $id)
    {
        $sector = Sector::findOrFail($id);

        $request->validate([
            'name'         => 'required|string|max:255|unique:sectors,name,' . $id,
            'description'  => 'nullable|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120', // PERBAIKAN: Max 5MB
        ]);

        // PERBAIKAN KONSISTENSI: Menggunakan banner_image (bukan image_path)
        $bannerPath = $sector->banner_image; 

        if ($request->hasFile('banner_image')) {
            // Hapus foto lama di storage jika sebelumnya ada foto lama
            if ($sector->banner_image) {
                Storage::disk('public')->delete($sector->banner_image);
            }
            // Disamakan foldernya dengan store yaitu 'sector-banners'
            $bannerPath = $request->file('banner_image')->store('sector-banners', 'public');
        }

        $sector->update([
            'name'         => $request->name,
            'slug'         => Str::slug($request->name),
            'banner_image' => $bannerPath, // PERBAIKAN KONSISTENSI: Simpan ke banner_image
            'description'  => $request->description,
        ]);

        return redirect()->route('admin.sector.index')->with('success', 'Data sektor berhasil diperbarui!');
    }

    // 6. Menghapus Sektor
    public function destroy($id)
    {
        $sector = Sector::findOrFail($id);
        
        // PERBAIKAN KONSISTENSI: Hapus file dari kolom banner_image sebelum data dihapus
        if ($sector->banner_image) {
            Storage::disk('public')->delete($sector->banner_image);
        }

        $sector->delete();

        return redirect()->route('admin.sector.index')->with('success', 'Sektor berhasil dihapus!');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectPage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProjectPageController extends Controller
{
    /**
     * Menampilkan halaman utama admin project-pages (Form + Tabel)
     */
    public function index()
    {
        // Ambil semua data halaman proyek terbaru
        $projectPages = ProjectPage::latest()->get();
        
        return view('pages.admin.project-pages.index', compact('projectPages'));
    }

    /**
     * Menyimpan halaman proyek baru ke database
     */
    public function store(Request $request)
    {
        // PERBAIKAN UTAMA: Inject slug ke dalam request SEBELUM validasi berjalan
        $request->merge([
            'slug' => Str::slug($request->name)
        ]);

        $request->validate([
            'name'         => 'required|string|max:255|unique:project_pages,name',
            'slug'         => 'required|string|unique:project_pages,slug', // Ikut divalidasi agar tidak jebol di database
            'description'  => 'required|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', 
        ], [
            // Pesan error kustom biar informatif di halaman admin
            'name.unique'  => 'Nama halaman kategori ini sudah digunakan.',
            'slug.unique'  => 'Kombinasi nama menghasilkan slug yang duplikat dengan data lama. Silakan gunakan variasi nama lain.',
        ]);

        // Handle upload banner_image jika ada
        $bannerPath = null;
        if ($request->hasFile('banner_image')) {
            $path = $request->file('banner_image')->store('project-banners', 'public');
            // Normalisasi: pastikan tidak ada imbuhan public/ atau storage/ di awal data DB
            $bannerPath = str_replace(['public/', 'storage/'], '', $path);
        }

        ProjectPage::create([
            'name'         => $request->name,
            'slug'         => $request->slug, // Menggunakan slug yang sudah tervalidasi aman
            'description'  => $request->description,
            'banner_image' => $bannerPath,
            'is_active'    => $request->has('is_active') ? $request->is_active : true, 
        ]);

        return redirect()->route('admin.project-pages.index')->with('success', 'Halaman proyek baru berhasil dibuat dan masuk dropdown!');
    }

    /**
     * Menampilkan halaman form edit (Terpisah)
     */
    public function edit($id)
    {
        $projectPage = ProjectPage::findOrFail($id);

        return view('pages.admin.project-pages.edit', compact('projectPage'));
    }

    /**
     * Memperbarui data halaman proyek di database
     */
/**
     * Memperbarui data halaman proyek di database
     */
    public function update(Request $request, $id)
    {
        $page = ProjectPage::findOrFail($id);

        // Inject slug baru ke request berdasarkan input name yang diubah
        $request->merge([
            'slug' => Str::slug($request->name)
        ]);

        // FIX: Menggunakan \Illuminate\Validation\Rule agar penulisan ignore ID 100% aman di SQLite/MySQL
        $request->validate([
            'name'         => [
                'required', 
                'string', 
                'max:255', 
                \Illuminate\Validation\Rule::unique('project_pages', 'name')->ignore($id)
            ],
            'slug'         => [
                'required', 
                'string', 
                \Illuminate\Validation\Rule::unique('project_pages', 'slug')->ignore($id)
            ], 
            'description'  => 'required|string',
            'banner_image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', 
        ], [
            'name.unique'  => 'Nama halaman kategori ini sudah digunakan.',
            'slug.unique'  => 'Kombinasi nama menghasilkan slug yang duplikat dengan data lama.',
        ]);

        // Saring data teks yang akan diupdate
        $data = [
            'name'        => $request->name,
            'slug'        => $request->slug,
            'description' => $request->description,
            'is_active'   => $request->has('is_active') ? $request->is_active : $page->is_active,
        ];

        // Jika user mengunggah berkas banner baru
        if ($request->hasFile('banner_image')) {
            // Hapus banner lama dari berkas storage jika sebelumnya ada
            if ($page->banner_image) {
                $cleanOldPath = str_replace(['public/', 'storage/'], '', $page->banner_image);
                Storage::disk('public')->delete($cleanOldPath);
            }
            
            // Simpan berkas banner baru
            $path = $request->file('banner_image')->store('project-banners', 'public');
            $data['banner_image'] = str_replace(['public/', 'storage/'], '', $path);
        }

        $page->update($data);

        return redirect()->route('admin.project-pages.index')->with('success', 'Halaman proyek berhasil diperbarui!');
    }

    /**
     * Menghapus halaman proyek beserta file bannernya
     */
    public function destroy($id)
    {
        $page = ProjectPage::findOrFail($id);
        
        // Hapus file gambar dari storage jika ada sebelum data dihapus
        if ($page->banner_image) {
            $cleanPath = str_replace(['public/', 'storage/'], '', $page->banner_image);
            Storage::disk('public')->delete($cleanPath);
        }

        $page->delete();

        return redirect()->route('admin.project-pages.index')->with('success', 'Halaman proyek berhasil dihapus!');
    }

    public function bulkDelete(Request $request)
{
    // 1. Validasi request data ID yang dikirim
    $request->validate([
        'ids' => 'required|array',
        'ids.*' => 'exists:project_pages,id', // Sesuaikan nama tabel database Anda jika berbeda
    ]);

    // 2. Eksekusi hapus massal
    ProjectPage::destroy($request->ids);

    // 3. Kembali ke halaman sebelumnya dengan feedback sukses
    return redirect()->back()->with('success', count($request->ids) . ' halaman kategori berhasil dihapus massal.');
}
}
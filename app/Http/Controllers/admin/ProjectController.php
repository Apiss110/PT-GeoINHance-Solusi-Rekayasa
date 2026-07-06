<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StrategicProject;
use App\Models\ProjectCategory;
use App\Models\Sector; // Import model Sector
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * 1. Menampilkan halaman daftar proyek di dashboard admin
     */
    public function index()
    {
        // Memuat relasi category dan sector sekaligus
        $projects = StrategicProject::with(['category', 'sector'])->latest()->get();
        $categories = ProjectCategory::all(); 
        $sectors = Sector::all(); // Mengambil semua data sektor untuk form input dropdown

        return view('pages.admin.project.index', compact('projects', 'categories', 'sectors'));
    }

    /**
     * 2. Menyimpan data proyek baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_category_id' => 'required|exists:project_categories,id',
            'sector_id'           => 'required|exists:sectors,id', // Validasi input sector_id
            'title'               => 'required|string|max:255',
            'description'         => 'required|string',
            'location'            => 'required|string|max:255',
            'year'                => 'required|string|max:4',
            'image'               => 'required|image|mimes:jpeg,jpg,png,webp|max:5120',
        ]);

        $path = $request->file('image')->store('projects', 'public');

        StrategicProject::create([
            'project_category_id' => $request->project_category_id,
            'sector_id'           => $request->sector_id, // Simpan input sector_id
            'title'               => $request->title,
            'description'         => $request->description,
            'location'            => $request->location,
            'year'                => $request->year,
            'image_path'          => $path,
        ]);

        return redirect()->route('admin.project.index')->with('success', 'Proyek strategis baru berhasil ditambahkan!');
    }

    /**
     * 3. Memperbarui data proyek
     */
    public function update(Request $request, $id)
    {
        $project = StrategicProject::findOrFail($id);

        $request->validate([
            'project_category_id' => 'required|exists:project_categories,id',
            'sector_id'           => 'required|exists:sectors,id', // Validasi input sector_id saat update
            'title'               => 'required|string|max:255',
            'description'         => 'required|string',
            'location'            => 'required|string|max:255',
            'year'                => 'required|string|max:4',
            'image'               => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
        ]);

        $data = [
            'project_category_id' => $request->project_category_id,
            'sector_id'           => $request->sector_id, // Masukkan sector_id ke dalam array pembaruan
            'title'               => $request->title,
            'description'         => $request->description,
            'location'            => $request->location,
            'year'                => $request->year,
        ];

        if ($request->hasFile('image')) {
            if (Storage::disk('public')->exists($project->image_path)) {
                Storage::disk('public')->delete($project->image_path);
            }
            $data['image_path'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($data);

        return redirect()->route('admin.project.index')->with('success', 'Proyek strategis berhasil diperbarui!');
    }

    /**
     * 4. Menghapus data proyek tunggal
     */
    public function destroy($id)
    {
        $project = StrategicProject::findOrFail($id);

        if (Storage::disk('public')->exists($project->image_path)) {
            Storage::disk('public')->delete($project->image_path);
        }

        $project->delete();

        return redirect()->route('admin.project.index')->with('success', 'Proyek strategis berhasil dihapus!');
    }

    /**
     * TAMBAHAN: Menghapus banyak data proyek sekaligus (Bulk Delete)
     */
    public function bulkDestroy(Request $request)
    {
        $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'exists:strategic_projects,id', // Memastikan ID yang dikirim ada di tabel strategic_projects
        ]);

        try {
            $projects = StrategicProject::whereIn('id', $request->ids)->get();

            // Loop untuk menghapus file gambar fisik dari storage
            foreach ($projects as $project) {
                if (Storage::disk('public')->exists($project->image_path)) {
                    Storage::disk('public')->delete($project->image_path);
                }
                $project->delete();
            }

            return redirect()->route('admin.project.index')
                ->with('success', 'Semua proyek yang dipilih berhasil dihapus!');
                
        } catch (\Exception $e) {
            return redirect()->route('admin.project.index')
                ->with('error', 'Gagal menghapus proyek massal: ' . $e->getMessage());
        }
    }

    /**
     * 5. Menampilkan daftar proyek berdasarkan kategori di halaman user (Dinamis)
     */
    public function showPublicByCategory($slug)
    {
        // 1. Cari kategori berdasarkan slug asli dari URL
        $category = ProjectCategory::where('slug', $slug)->first();

        // Fallback 1: Jika di URL 'detailed-engineering-design' tapi di DB barangkali disingkat 'ded'
        if (!$category && $slug === 'detailed-engineering-design') {
            $category = ProjectCategory::where('slug', 'ded')->first();
        }

        // Fallback 2: Jika di URL 'review-design-analysis' tapi di DB kolom slug-nya 'review-design'
        if (!$category && $slug === 'review-design-analysis') {
            $category = ProjectCategory::where('slug', 'review-design')->first();
        }

        // Jika benar-benar tidak ada di database
        if (!$category) {
            return response("Peringatan: Data kategori dengan slug '{$slug}' tidak ditemukan di database Anda. Silakan periksa kembali tabel project_categories.", 200);
        }

        // 2. Ambil data proyek
        $projects = StrategicProject::with(['category', 'sector'])
                                    ->where('project_category_id', $category->id)
                                    ->latest()
                                    ->get();

        // 3. Peta pencocokan file Blade (Mapping nama file view)
        $viewMapping = [
            'geotechnical'              => 'proyek.geotechnical-analysis',
            'geotechnical-analysis'     => 'proyek.geotechnical-analysis',
            'ded'                       => 'proyek.detailed-engineering-designed',
            'detailed-engineering-design'   => 'proyek.detailed-engineering-designed',
            'review-design'                 => 'proyek.review-design',
            'review-design-analysis'        => 'proyek.review-design',
            '3d-fem'                        => 'proyek.3d-fem',
            '3d-fem-analysis'               => 'proyek.3d-fem',
            'numerical-analysis'            => 'proyek.numerical-analysis',
            'numerical-modeling'            => 'proyek.numerical-modeling',
        ];

        $chosenView = $viewMapping[$slug] ?? 'proyek.' . $slug;

        if (!view()->exists($chosenView)) {
            abort(404, "File view [{$chosenView}.blade.php] belum Anda buat.");
        }

        return view($chosenView, compact('category', 'projects'));
    }

    /**
     * 6. Menampilkan daftar proyek berdasarkan SEKTOR di halaman user (Dinamis untuk Sektor)
     */
    public function showPublicBySector($slug)
    {
        // 1. Cari data sektor di DB berdasarkan slug dari URL (contoh: 'mitigasi-geobencana')
        $sector = Sector::where('slug', $slug)->first();

        if (!$sector) {
            abort(404, "Sektor dengan slug [{$slug}] tidak ditemukan di database.");
        }

        // 2. Tarik semua proyek yang didaftarkan pada sektor ini oleh admin
        $projects = StrategicProject::with(['category', 'sector'])
                                    ->where('sector_id', $sector->id)
                                    ->latest()
                                    ->get();

        // 3. Cari file Bladenya di folder resources/views/sektor/ nama-slug.blade.php
        $chosenView = 'sektor.' . $slug;

        if (!view()->exists($chosenView)) {
            abort(404, "File view [resources/views/sektor/{$slug}.blade.php] belum dibuat.");
        }

        // 4. Return view dan lempar variabel $projects agar terbaca oleh Blade
        return view($chosenView, compact('sector', 'projects'));
    }

    /**
     * 7. Menampilkan gabungan SELURUH proyek dari semua sektor di halaman public
     * Ditambahkan untuk menyelesaikan error 'Undefined variable $projects' pada view semua-sektor
     */
    public function showAllSectorsPublic()
    {
        // Mengambil semua data proyek strategis tanpa filter sektor spesifik
        $projects = StrategicProject::with(['category', 'sector'])->latest()->get();

        // Memanggil file view resources/views/sektor/semua-sektor.blade.php
        return view('sektor.semua-sektor', compact('projects'));
    }
}
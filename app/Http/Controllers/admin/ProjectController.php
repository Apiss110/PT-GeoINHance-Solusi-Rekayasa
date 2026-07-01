<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StrategicProject;
use App\Models\ProjectCategory;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * 1. Menampilkan halaman daftar proyek di dashboard admin
     */
    public function index()
    {
        $projects = StrategicProject::with('category')->latest()->get();
        $categories = ProjectCategory::all(); 

        return view('pages.admin.project.index', compact('projects', 'categories'));
    }

    /**
     * 2. Menyimpan data proyek baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_category_id' => 'required|exists:project_categories,id',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'year' => 'required|string|max:4',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:5120',
        ]);

        $path = $request->file('image')->store('projects', 'public');

        StrategicProject::create([
            'project_category_id' => $request->project_category_id,
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'year' => $request->year,
            'image_path' => $path,
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
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'year' => 'required|string|max:4',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
        ]);

        $data = [
            'project_category_id' => $request->project_category_id,
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'year' => $request->year,
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
     * 4. Menghapus data proyek
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
     * 5. Menampilkan daftar proyek berdasarkan kategori di halaman user (Dinamis)
     */
/**
     * 5. Menampilkan daftar proyek berdasarkan kategori di halaman user (Dinamis)
     */
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
        $projects = StrategicProject::with('category')
                                    ->where('project_category_id', $category->id)
                                    ->latest()
                                    ->get();

        // 3. Peta pencocokan file Blade (Mapping nama file view)
        $viewMapping = [
            'geotechnical'                  => 'proyek.geotechnical-analysis',
            'geotechnical-analysis'         => 'proyek.geotechnical-analysis',
            'ded'                           => 'proyek.detailed-engineering-designed',
            'detailed-engineering-design'   => 'proyek.detailed-engineering-designed',
            'review-design'                 => 'proyek.review-design',
            'review-design-analysis'        => 'proyek.review-design',
            '3d-fem'                        => 'proyek.3d-fem',
            '3d-fem-analysis'               => 'proyek.3d-fem',

            'numerical-analysis'            => 'proyek.numerical-analysis',
            'numerical-modeling'   => 'proyek.numerical-modeling',
        ];

        $chosenView = $viewMapping[$slug] ?? 'proyek.' . $slug;

        if (!view()->exists($chosenView)) {
            abort(404, "File view [{$chosenView}.blade.php] belum Anda buat.");
        }

        return view($chosenView, compact('category', 'projects'));
    }
}
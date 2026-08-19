<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StrategicProject;
use App\Models\ProjectPage; 
use App\Models\Sector; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Schema;

class ProjectController extends Controller
{
    /**
     * 1. Menampilkan halaman daftar proyek di dashboard admin
     */
    public function index()
    {
        $projects = StrategicProject::with(['projectPage', 'sector'])->latest()->get();
        $categories = ProjectPage::all(); 
        $sectors = Sector::all(); 

        return view('pages.admin.project-card.index', compact('projects', 'categories', 'sectors'));
    }

    /**
     * 🌟 2. Menampilkan halaman form tambah proyek baru (create.blade.php)
     */
    public function create()
    {
        $sectors = Sector::orderBy('name', 'asc')->get();
        
        $projectPages = Schema::hasColumn('project_pages', 'name')
            ? ProjectPage::orderBy('name', 'asc')->get()
            : ProjectPage::orderBy('title', 'asc')->get();

        $categories = $projectPages;

        return view('pages.admin.project-card.create', compact('sectors', 'projectPages', 'categories'));
    }

    /**
     * 3. Menyimpan data proyek baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'project_category_id' => 'required|exists:project_pages,id', 
            'sector_id'           => 'required|exists:sectors,id', 
            'title'               => 'required|string|max:255',
            'description'         => 'required|string',
            'location'            => 'required|string|max:255',
            'year'                => 'required|string|max:4',
            'image'               => 'required|image|mimes:jpeg,jpg,png,webp|max:5120',
        ]);

        $path = $request->file('image')->store('projects', 'public');

        StrategicProject::create([
            'project_category_id' => $request->project_category_id,
            'sector_id'           => $request->sector_id, 
            'title'               => $request->title,
            'description'         => $request->description,
            'location'            => $request->location,
            'year'                => $request->year,
            'image_path'          => $path,
        ]);

        return redirect()->route('admin.project.index')->with('success', 'Proyek strategis baru berhasil ditambahkan!');
    }

    /**
     * 🌟 4. Menampilkan halaman edit proyek (edit.blade.php)
     */
    public function edit($id)
    {
        // 1. Ambil data proyek spesifik
        $project = StrategicProject::findOrFail($id);
        
        // 2. Ambil data sektor & halaman proyek untuk dropdown
        $sectors = Sector::orderBy('name', 'asc')->get();
        
        // Cek secara aman kolom nama di project_pages
        $projectPages = Schema::hasColumn('project_pages', 'name')
            ? ProjectPage::orderBy('name', 'asc')->get()
            : ProjectPage::orderBy('title', 'asc')->get();

        // 3. Alias $categories
        $categories = $projectPages;

        // 4. Kirim data ke view di folder project-card
        return view('pages.admin.project-card.edit', compact('project', 'sectors', 'projectPages', 'categories'));
    }

    /**
     * 5. Memperbarui data proyek
     */
    public function update(Request $request, $id)
    {
        $project = StrategicProject::findOrFail($id);

        $request->validate([
            'project_category_id' => 'required|exists:project_pages,id', 
            'sector_id'           => 'required|exists:sectors,id', 
            'title'               => 'required|string|max:255',
            'description'         => 'required|string',
            'location'            => 'required|string|max:255',
            'year'                => 'required|string|max:4',
            'image'               => 'nullable|image|mimes:jpeg,jpg,png,webp|max:5120',
        ]);

        $data = [
            'project_category_id' => $request->project_category_id,
            'sector_id'           => $request->sector_id, 
            'title'               => $request->title,
            'description'         => $request->description,
            'location'            => $request->location,
            'year'                => $request->year,
        ];

        if ($request->hasFile('image')) {
            if ($project->image_path && Storage::disk('public')->exists($project->image_path)) {
                Storage::disk('public')->delete($project->image_path);
            }
            $data['image_path'] = $request->file('image')->store('projects', 'public');
        }

        $project->update($data);

        return redirect()->route('admin.project.index')->with('success', 'Proyek strategis berhasil diperbarui!');
    }

    /**
     * 6. Menghapus data proyek tunggal
     */
    public function destroy($id)
    {
        $project = StrategicProject::findOrFail($id);

        if ($project->image_path && Storage::disk('public')->exists($project->image_path)) {
            Storage::disk('public')->delete($project->image_path);
        }

        $project->delete();

        return redirect()->route('admin.project.index')->with('success', 'Proyek strategis berhasil dihapus!');
    }

    /**
     * Bulk Delete
     */
    public function bulkDestroy(Request $request)
    {
        $request->validate([
            'ids'   => 'required|array',
            'ids.*' => 'exists:strategic_projects,id', 
        ]);

        try {
            $projects = StrategicProject::whereIn('id', $request->ids)->get();

            foreach ($projects as $project) {
                if ($project->image_path && Storage::disk('public')->exists($project->image_path)) {
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
     * 7. Menampilkan daftar proyek berdasarkan kategori
     */
    public function showPublicByCategory($slug)
    {
        $category = ProjectPage::where('slug', $slug)->first();

        if (!$category) {
            if ($slug === 'detailed-engineering-design') {
                $category = ProjectPage::where('slug', 'ded')->first();
            }
            if ($slug === 'review-design-analysis') {
                $category = ProjectPage::where('slug', 'review-design')->first();
            }
        }

        if (!$category) {
            return response()->json([
                'error' => 'Slug tidak ditemukan',
                'pesan' => "Data dengan slug '{$slug}' tidak ada di tabel database Anda.",
                'slug_dicari' => $slug
            ], 404);
        }

        if (isset($category->is_active) && $category->is_active == 0) {
            return response()->json([
                'error' => 'Halaman tidak aktif',
                'pesan' => "Kategori '{$category->name}' ditemukan, tetapi status 'is_active' bernilai 0 (nonaktif)."
            ], 403);
        }

        $projects = StrategicProject::with(['projectPage', 'sector'])
                                    ->where('project_category_id', $category->id)
                                    ->latest()
                                    ->paginate(9);

        $chosenView = 'proyek.category'; 

        if (!view()->exists($chosenView)) {
            return response()->json([
                'error' => 'View tidak ditemukan',
                'pesan' => "File blade tidak ditemukan."
            ], 500);
        }

        return view($chosenView, compact('category', 'projects'));
    }

    /**
     * 8. Menampilkan daftar proyek berdasarkan SEKTOR di halaman user (Detail Sektor)
     */
    public function showPublicBySector($slug)
    {
        $sector = Sector::where('slug', $slug)->first();

        if (!$sector) {
            abort(404, "Sektor dengan slug [{$slug}] tidak ditemukan di database.");
        }

        $projects = StrategicProject::with(['projectPage', 'sector'])
                                    ->where('sector_id', $sector->id)
                                    ->latest()
                                    ->get();

        $chosenView = 'pages.public.sector-detail';

        if (!view()->exists($chosenView)) {
            $chosenView = 'sector.detail';
        }

        if (!view()->exists($chosenView)) {
            abort(404, "File template sektor publik belum dibuat.");
        }

        return view($chosenView, compact('sector', 'projects'));
    }

    /**
     * 9. Menampilkan katalog data seluruh Sektor Layanan di halaman depan
     */
    public function showAllSectorsPublic()
    {
        $sectors = Sector::with('projects')->get();
        return view('sektor.semua-sektor', compact('sectors'));
    }
}
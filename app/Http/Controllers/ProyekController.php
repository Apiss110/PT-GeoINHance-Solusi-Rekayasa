<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\StrategicProject; 
use App\Models\ProjectCategory; 
use App\Models\Proyek;
use App\Models\Article;    
use App\Models\Video;      
use App\Models\CaseStudy;  
use App\Models\Branch; // ✅ TAMBAHAN: Import model Branch
use App\Models\Sector; // ✅ TAMBAHAN: Import model Sector
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; 
use Illuminate\Support\Facades\DB; 

class ProyekController extends Controller
{
    /**
     * Halaman menampilkan semua komponen sumber daya terpadu (All Resources Publik)
     */
    public function allResources()
    {
        $newsEvents  = Blog::latest()->take(3)->get() ?? collect();
        $articles    = Article::latest()->take(3)->get() ?? collect();
        $videos      = Video::latest()->take(3)->get() ?? collect();
        $caseStudies = CaseStudy::latest()->get() ?? collect(); 

        return view('resources.semua-resources', compact('newsEvents', 'articles', 'videos', 'caseStudies'));
    }

    /**
     * Halaman menampilkan semua proyek (Publik)
     */
    public function semuaProyek()
    {
        $projects = StrategicProject::latest()->get();
        return view('proyek.semua-proyek', compact('projects'));
    }

    /**
     * Halaman detail satu proyek (Publik)
     */
    public function publicShow($id)
    {
        // 1. Ambil data proyek yang sedang dibuka
        $proyek = StrategicProject::findOrFail($id);

        // 2. Ambil proyek lain yang memiliki sector_id yang sama, 
        //    tapi kecualikan ID proyek yang sedang aktif agar tidak double.
        $otherProjects = StrategicProject::where('project_category_id', $proyek->project_category_id)
                            ->where('id', '!=', $proyek->id)
                            ->latest()
                            ->take(3)
                            ->get();

        // 3. Lempar variabel $otherProjects ke view
        return view('proyek.detail', compact('proyek', 'otherProjects'));
    }

public function show($slug)
{
    // ------------------------------------------------------------------
    // 1. CARI DI TABEL project_pages (Halaman Kategori Proyek)
    // ------------------------------------------------------------------
    if (\Illuminate\Support\Facades\Schema::hasTable('project_pages')) {
        $page = \Illuminate\Support\Facades\DB::table('project_pages')
            ->where('slug', $slug)
            ->orWhere('slug', 'LIKE', "%{$slug}%")
            ->first();

        if ($page) {
            $category = $page;
            $categories = \Illuminate\Support\Facades\DB::table('project_pages')->get();

            // Deteksi kolom Kategori Halaman Proyek di tabel strategic_projects
            $fkCol = 'project_page_id';
            if (\Illuminate\Support\Facades\Schema::hasColumn('strategic_projects', 'projects_category_id')) {
                $fkCol = 'projects_category_id';
            } elseif (\Illuminate\Support\Facades\Schema::hasColumn('strategic_projects', 'project_category_id')) {
                $fkCol = 'project_category_id';
            }

            // Query proyek: Cocokkan ID Kategori, ATAU jika di-input berupa string/slug
            $projects = \Illuminate\Support\Facades\DB::table('strategic_projects')
                ->where($fkCol, $page->id)
                ->orWhere($fkCol, $page->slug)
                ->get();

            // Fallback: Jika $projects masih kosong, cari berdasarkan text/title kemiripan
            if ($projects->isEmpty()) {
                $projects = \Illuminate\Support\Facades\DB::table('strategic_projects')
                    ->where('title', 'LIKE', "%{$slug}%")
                    ->orWhere('description', 'LIKE', "%{$slug}%")
                    ->get();
            }

            return view('proyek.category', compact('category', 'page', 'projects', 'categories'));
        }
    }

    // ------------------------------------------------------------------
    // 2. CARI DI TABEL strategic_projects (Proyek Spesifik / Single Detail)
    // ------------------------------------------------------------------
    if (\Illuminate\Support\Facades\Schema::hasTable('strategic_projects')) {
        $project = null;

        if (\Illuminate\Support\Facades\Schema::hasColumn('strategic_projects', 'slug')) {
            $project = \Illuminate\Support\Facades\DB::table('strategic_projects')
                ->where('slug', $slug)
                ->first();
        }

        if (!$project) {
            $allProjects = \Illuminate\Support\Facades\DB::table('strategic_projects')->get();
            foreach ($allProjects as $sp) {
                if (!empty($sp->title) && \Illuminate\Support\Str::slug($sp->title) === $slug) {
                    $project = $sp;
                    break;
                }
            }
        }

        if (!$project) {
            $cleanTitle = str_replace('-', ' ', $slug);
            $shortTitle = substr($cleanTitle, 0, 25);

            $project = \Illuminate\Support\Facades\DB::table('strategic_projects')
                ->where('title', 'LIKE', "%{$shortTitle}%")
                ->first();
        }

        if ($project) {
            $catId = $project->projects_category_id 
                ?? $project->project_category_id 
                ?? $project->project_page_id 
                ?? null;

            $categoryObj = null;
            if ($catId && \Illuminate\Support\Facades\Schema::hasTable('project_pages')) {
                $categoryObj = \Illuminate\Support\Facades\DB::table('project_pages')->where('id', $catId)->first();
            }

            if (!$categoryObj) {
                $categoryObj = (object) [
                    'id'    => null,
                    'title' => 'Proyek Strategis',
                    'name'  => 'Proyek Strategis',
                    'slug'  => 'semua-proyek'
                ];
            }

            $sectorId = $project->sector_id ?? null;
            $sectorObj = null;

            if ($sectorId && \Illuminate\Support\Facades\Schema::hasTable('sectors')) {
                $sectorObj = \Illuminate\Support\Facades\DB::table('sectors')->where('id', $sectorId)->first();
            }

            if (!$sectorObj) {
                $sectorObj = (object) [
                    'id'    => null,
                    'name'  => 'Sektor Umum',
                    'title' => 'Sektor Umum',
                    'slug'  => 'umum'
                ];
            }

            $project->category = $categoryObj;
            $project->sector   = $sectorObj;
            $proyek            = $project;

            return view('proyek.detail', compact('project', 'proyek'));
        }
    }

    abort(404, 'Proyek tidak ditemukan.');
}

    /**
     * Halaman menampilkan daftar seluruh Articles (Publik)
     */
    public function articles()
    {
        $blogs = Blog::latest()->get();
        return view('resources.articles', compact('blogs'));
    }

    /**
     * Halaman menampilkan daftar seluruh News & Events (Publik)
     */
    public function newsEvents()
    {
        $blogs = Blog::latest()->get();
        return view('resources.news_events', compact('blogs'));
    }

    /**
     * Halaman detail artikel/blog berdasarkan Slug (Publik)
     */
    public function showBlog($slug)
    {
        // 1. Cari exact match slug
        $blog = Blog::where('slug', $slug)->first();

        // 2. Fallback: Cari kemiripan slug jika tidak exact match
        if (!$blog) {
            $blog = Blog::where('slug', 'LIKE', "%{$slug}%")->first();
            if ($blog) {
                return redirect()->to('/blog/' . $blog->slug);
            }
        }

        // 3. Jika tidak ditemukan
        if (!$blog) {
            abort(404, 'Artikel atau Berita tidak ditemukan.');
        }

        return view('resources.article-detail', compact('blog'));
    }
    /*
    |--------------------------------------------------------------------------
    | PANEL ADMIN METHOD (MANAJEMEN PROYEK)
    |--------------------------------------------------------------------------
    */

    /**
     * Menyimpan Proyek Baru dari Admin ke Database
     */
    public function store(Request $request)
{
    $request->validate([
        'title' => 'required|string|max:255',
        'description' => 'required',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
        'sector_id' => 'nullable|exists:sectors,id', 
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('projects', 'public');
    }

    StrategicProject::create([
        'title'                 => $request->title,
        'description'           => $request->description,
        'image'                 => $imagePath,
        'sector_id'             => $request->sector_id,
        'project_page_id'       => $request->project_page_id ?? $request->projects_category_id ?? $request->project_category_id, // ✅ TAMBAHKAN INI
        'projects_category_id'  => $request->projects_category_id ?? $request->project_page_id ?? $request->project_category_id, // ✅ TAMBAHKAN INI
        'location'              => $request->location,
        'year'                  => $request->year,
    ]);

    return redirect()->back()->with('success', 'Proyek baru sukses didaftarkan!');
}

    /**
     * Memperbarui Data Proyek dari Admin
     */
    public function update(Request $request, $id)
    {
        $project = StrategicProject::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,webp|max:5120',
            'sector_id' => 'nullable|exists:sectors,id',
        ]);

        $imagePath = $project->image;
        if ($request->hasFile('image')) {
            if ($project->image) {
                Storage::disk('public')->delete($project->image);
            }
            $imagePath = $request->file('image')->store('projects', 'public');
        }

        $project->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $imagePath,
            'sector_id' => $request->sector_id, 
            'location' => $request->location,
            'year' => $request->year,
        ]);

        return redirect()->back()->with('success', 'Data proyek sukses diperbarui!');
    }

    /*
    |--------------------------------------------------------------------------
    | PANEL ADMIN & API (MANAJEMEN PETA PROYEK / BRANCHES)
    |--------------------------------------------------------------------------
    */

    /**
     * Tampilan Halaman Utama Peta Proyek di Admin Panel (/admin/branches)
     */
    public function branchesAdmin()
    {
        $branches = Branch::all();
        $strategicProjects = StrategicProject::all(); 
        $sectors = Sector::orderBy('name')->get();
        $isEdit = false; 

        // Sediakan variabel $projects yang isinya sama dengan $strategicProjects
        $projects = $strategicProjects; 

        // Tambahkan 'projects' ke dalam compact
        return view('pages.admin.Branch.branch-manager', compact(
            'branches', 
            'strategicProjects', 
            'projects', 
            'sectors', 
            'isEdit'
        ));
    }

    /**
     * Tampilan Form Tambah Titik Peta Baru (/admin/branches/create)
     */
    public function createBranch()
    {
        $strategicProjects = StrategicProject::all();
        $projects = $strategicProjects;
        $sectors = Sector::orderBy('name')->get();
        $isEdit = false;

        // Pastikan path view sesuai tempat Anda menyimpan create.blade.php
        return view('pages.admin.Branch.create', compact(
            'strategicProjects',
            'projects',
            'sectors',
            'isEdit'
        ));
    }

    /**
     * Tambah Data / Edit Data (Mengambil data cabang tertentu ke form edit)
     */
    public function editBranch($id)
    {
        $branch = Branch::findOrFail($id);
        $branches = Branch::all();
        $strategicProjects = StrategicProject::all();
        $projects = $strategicProjects;
        $sectors = Sector::orderBy('name')->get();
        $isEdit = true;

        return view('pages.admin.Branch.branch-manager', compact(
            'branch',
            'branches',
            'strategicProjects',
            'projects',
            'sectors',
            'isEdit'
        ));
    }

    /**
     * Menyimpan Titik Koordinat Peta Baru (Opsi B - Unggah Gambar Mandiri)
     */
    public function storeBranch(Request $request)
    {
        $request->validate([
            'daerah'     => 'required|string|max:255',
            'title'      => 'required|string|max:255',
            'desc'       => 'required|string',
            'project_id' => 'nullable|exists:strategic_projects,id', 
            'img'        => 'required|image|mimes:jpeg,png,jpg,webp|max:2048', // Wajib diunggah saat simpan baru
            'lat'        => 'required',
            'lng'        => 'required',
        ]);

        $imagePath = null;
        if ($request->hasFile('img')) {
            $imagePath = $request->file('img')->store('branches', 'public');
        }

        DB::table('branches')->insert([
            'daerah'     => $request->daerah,
            'title'      => $request->title,
            'desc'       => $request->desc,
            'project_id' => $request->project_id,
            'img'        => $imagePath, 
            'lat'        => $request->lat,
            'lng'        => $request->lng,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.branches.index')->with('success', 'Sukses! Titik cabang baru berhasil ditambahkan ke dalam peta.');
    }

    /**
     * Memperbarui Data Titik Cabang Peta (Opsi B - Unggah Gambar Mandiri)
     */
    public function updateBranch(Request $request, $id)
    {
        $request->validate([
            'daerah'     => 'required|string|max:255',
            'title'      => 'required|string|max:255',
            'desc'       => 'required|string',
            'project_id' => 'nullable|exists:strategic_projects,id', 
            'img'        => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Opsional saat edit
            'lat'        => 'required',
            'lng'        => 'required',
        ]);

        $branch = DB::table('branches')->where('id', $id)->first();
        if (!$branch) {
            return redirect()->back()->with('error', 'Data cabang tidak ditemukan.');
        }

        $imagePath = $branch->img;
        if ($request->hasFile('img')) {
            // Hapus berkas gambar lama jika sudah ada
            if ($branch->img && Storage::disk('public')->exists($branch->img)) {
                Storage::disk('public')->delete($branch->img);
            }
            $imagePath = $request->file('img')->store('branches', 'public');
        }

        DB::table('branches')->where('id', $id)->update([
            'daerah'     => $request->daerah,
            'title'      => $request->title,
            'desc'       => $request->desc,
            'project_id' => $request->project_id,
            'img'        => $imagePath,
            'lat'        => $request->lat,
            'lng'        => $request->lng,
            'updated_at' => now(),
        ]);

        return redirect()->route('admin.branches.index')->with('success', 'Sukses! Data titik cabang berhasil diperbarui.');
    }

    /**
     * Menghapus Titik Cabang Peta beserta Berkas Gambar
     */
    public function destroyBranch($id)
    {
        $branch = DB::table('branches')->where('id', $id)->first();
        
        if ($branch && $branch->img && Storage::disk('public')->exists($branch->img)) {
            Storage::disk('public')->delete($branch->img);
        }

        DB::table('branches')->where('id', $id)->delete();
        return redirect()->back()->with('success', 'Titik cabang berhasil dihapus dari peta.');
    }

    /**
     * API Endpoint / Data Pendukung untuk Map di Front-End / Homepage
     */
    public function getBranchesJson()
    {
        $branches = DB::table('branches')->get();
        return response()->json($branches);
    }

    public function bulkDelete(Request $request)
{
    $request->validate([
        'ids' => 'required|array',
        'ids.*' => 'exists:branches,id',
    ]);

    $branches = Branch::whereIn('id', $request->ids)->get();

    foreach ($branches as $branch) {
        if ($branch->img) {
            $cleanedPath = preg_replace('#^(public/|storage/)#i', '', trim($branch->img));
            Storage::disk('public')->delete($cleanedPath);
        }
        $branch->delete();
    }

    return redirect()->back()->with('success', count($request->ids) . ' titik lokasi cabang berhasil dihapus massal.');
}
}
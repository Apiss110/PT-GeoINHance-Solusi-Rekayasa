<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Sector;
use App\Models\Project;
use App\Models\Product;
use App\Models\Syllabus;
use App\Models\Article;
use App\Models\Blog;        // Untuk Berita & Acara
use App\Models\AdminVideo;  // Untuk Video
use App\Models\CaseStudy;   // Untuk Studi Kasus
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class SliderDropdownController extends Controller
{
    /**
     * Level 2: Sub-Item berdasarkan Kategori Utama
     */
    public function getSubItems($category)
    {
        try {
            $items = collect([]);

            switch ($category) {
                // --- 1. SEKTOR ---
                case 'sektor':
                case 'sectors':
                    if (Schema::hasTable('sectors')) {
                        $titleCol = Schema::hasColumn('sectors', 'name') ? 'name as title' : 'title';
                        $selectCols = Schema::hasColumn('sectors', 'slug') ? ['id', $titleCol, 'slug'] : ['id', $titleCol];
                        $items = Sector::select($selectCols)->get();
                    }
                    break;

                // --- 2. PROYEK ---
                case 'proyek':
                case 'projects':
                    if (Schema::hasTable('project_pages')) {
                        // Ambil id, name (sebagai title), dan slug asli dari database
                        $items = DB::table('project_pages')
                            ->select('id', 'name as title', 'slug')
                            ->get();
                    } elseif (Schema::hasTable('project_categories')) {
                        $items = DB::table('project_categories')
                            ->select('id', 'name as title', 'slug')
                            ->get();
                    }
                    break;

                // --- 3. PRODUK ---
                case 'products':
                    if (Schema::hasTable('products')) {
                        $titleCol = Schema::hasColumn('products', 'name') ? 'name as title' : 'title';
                        $selectCols = Schema::hasColumn('products', 'slug') ? ['id', $titleCol, 'slug'] : ['id', $titleCol];
                        $items = Product::select($selectCols)->get();
                    }
                    break;

                // --- 4. TRAINING ---
                case 'training':
                    if (Schema::hasTable('syllabi')) {
                        $titleCol = Schema::hasColumn('syllabi', 'title') ? 'title' : 'name as title';
                        $selectCols = Schema::hasColumn('syllabi', 'slug') ? ['id', $titleCol, 'slug'] : ['id', $titleCol];
                        $items = Syllabus::select($selectCols)->get();
                    }
                    break;

                // --- 5. RESOURCES ---
                case 'resources':
                    $items = [
                        ['id' => 'articles',    'title' => 'Artikel',       'slug' => 'articles'],
                        ['id' => 'blog',        'title' => 'Berita & Acara', 'slug' => 'blog'],
                        ['id' => 'video',       'title' => 'Video',         'slug' => 'video'],
                        ['id' => 'studi-kasus', 'title' => 'Studi Kasus',   'slug' => 'studi-kasus'],
                    ];
                    break;

                default:
                    $items = collect([]);
            }

            // --- MAPPING AKHIR: Memastikan slug selalu terisi valid ---
            $formattedItems = collect($items)->map(function ($item) {
                $id    = is_array($item) ? ($item['id'] ?? null) : ($item->id ?? null);
                $title = is_array($item) ? ($item['title'] ?? '') : ($item->title ?? $item->name ?? '');
                $slug  = is_array($item) ? ($item['slug'] ?? null) : ($item->slug ?? null);

                // Jika slug kosong atau null, buat otomatis dari title
                if (empty($slug) && !empty($title)) {
                    $slug = \Illuminate\Support\Str::slug($title);
                }

                return [
                    'id'    => $id,
                    'title' => $title,
                    'slug'  => $slug,
                ];
            });

            return response()->json($formattedItems);

        } catch (\Exception $e) {
            Log::error("Error Dropdown getSubItems ({$category}): " . $e->getMessage());
            return response()->json([], 200);
        }
    }

    /**
     * Level 3: Card / Detail Item Spesifik
     */
    /**
     * Level 3: Card / Detail Item Spesifik
     */
    public function getDetailItems($category, $id)
    {
        try {
            $items = collect([]);

            // ----------------------------------------------------
            // 1. Jika Kategori Utama adalah Sektor
            // ----------------------------------------------------
            if (in_array($category, ['sektor', 'sectors'])) {
                $sector = Sector::where('id', $id)->orWhere('slug', $id)->first();

                if ($sector) {
                    if (method_exists($sector, 'projects')) {
                        $items = $sector->projects;
                    } elseif (method_exists($sector, 'sektorProjects')) {
                        $items = $sector->sektorProjects;
                    }

                    if ($items->isEmpty() && class_exists(Project::class)) {
                        if (method_exists(Project::class, 'sectors')) {
                            $items = Project::whereHas('sectors', function($q) use ($sector) {
                                $q->where('sectors.id', $sector->id);
                            })->get();
                        } elseif (method_exists(Project::class, 'sektors')) {
                            $items = Project::whereHas('sektors', function($q) use ($sector) {
                                $q->where('id', $sector->id);
                            })->get();
                        }
                    }

                    if ($items->isEmpty() && Schema::hasTable('projects')) {
                        $possibleKeys = ['sector_id', 'sektor_id', 'admin_sector_id', 'sector_category_id', 'id_sector'];
                        foreach ($possibleKeys as $key) {
                            if (Schema::hasColumn('projects', $key)) {
                                $items = Project::where($key, $sector->id)->get();
                                if ($items->isNotEmpty()) break;
                            }
                        }
                    }
                }
            } 
            
            // ----------------------------------------------------
            // 2. Jika Kategori Utama adalah Projects / Proyek
            // ----------------------------------------------------
            elseif (in_array($category, ['proyek', 'projects'])) {
                $targetId = null;

                // Step A: Cari ID di project_pages (baik $id dikirim berupa Angka ID 11 atau Slug string)
                if (Schema::hasTable('project_pages')) {
                    $page = DB::table('project_pages')
                        ->where('id', $id)
                        ->orWhere('slug', $id)
                        ->orWhere('slug', 'LIKE', "%{$id}%")
                        ->first();

                    if ($page) {
                        $targetId = $page->id;
                    }
                }

                // Fallback ID jika tidak ketemu di project_pages
                if (!$targetId && is_numeric($id)) {
                    $targetId = $id;
                }

                // Step B: Ambil dari strategic_projects dengan mengecek nama kolom Foreign Key yang sesuai DB
                if (Schema::hasTable('strategic_projects')) {
                    $possibleFks = ['projects_category_id', 'project_category_id', 'project_page_id', 'category_id'];
                    $fkColumn = null;

                    foreach ($possibleFks as $col) {
                        if (Schema::hasColumn('strategic_projects', $col)) {
                            $fkColumn = $col;
                            break;
                        }
                    }

                    if ($fkColumn && $targetId) {
                        $items = DB::table('strategic_projects')->where($fkColumn, $targetId)->get();
                    }
                }

                // Step C: Fallback ke tabel projects jika strategic_projects masih kosong
                if ($items->isEmpty() && Schema::hasTable('projects')) {
                    $catId = $targetId ?? $id;

                    $possibleKeys = ['projects_category_id', 'project_category_id', 'project_page_id', 'category_id', 'type_id', 'service_id'];
                    foreach ($possibleKeys as $key) {
                        if (Schema::hasColumn('projects', $key)) {
                            $items = Project::where($key, $catId)->get();
                            if ($items->isNotEmpty()) break;
                        }
                    }
                }
            }

            // ----------------------------------------------------
            // 3. Jika Kategori Utama adalah Resources
            // ----------------------------------------------------
            elseif ($category === 'resources') {
                switch ($id) {
                    case 'articles':
                        if (class_exists(Article::class) && Schema::hasTable('articles')) {
                            $items = Article::all();
                        }
                        break;

                    case 'blog':
                        if (class_exists(Blog::class) && Schema::hasTable('blogs')) {
                            $items = Blog::all();
                        }
                        break;

                    case 'video':
                        if (class_exists(AdminVideo::class) && Schema::hasTable('admin_videos')) {
                            $items = AdminVideo::all();
                        }
                        break;

                    case 'studi-kasus':
                        if (class_exists(CaseStudy::class) && Schema::hasTable('case_studies')) {
                            $items = CaseStudy::all();
                        }
                        break;
                }
            }

            // Normalisasi Response JSON
            $formattedItems = collect($items)->map(function ($item) {
                $itemId    = is_array($item) ? ($item['id'] ?? null) : ($item->id ?? null);
                $itemTitle = is_array($item) 
                    ? ($item['title'] ?? $item['name'] ?? null) 
                    : ($item->title ?? $item->name ?? $item->project_name ?? null);
                $itemSlug  = is_array($item) ? ($item['slug'] ?? null) : ($item->slug ?? null);

                if (empty($itemTitle)) {
                    $itemTitle = 'Item #' . $itemId;
                }

                if (empty($itemSlug)) {
                    $itemSlug = \Illuminate\Support\Str::slug($itemTitle);
                    if (empty($itemSlug)) {
                        $itemSlug = 'card-' . $itemId;
                    }
                }

                return [
                    'id'    => $itemId,
                    'title' => $itemTitle,
                    'slug'  => $itemSlug,
                ];
            });

            return response()->json($formattedItems->values());

        } catch (\Exception $e) {
            Log::error("Error Dropdown getDetailItems ({$category}, ID {$id}): " . $e->getMessage());
            return response()->json([], 200);
        }
    }
}
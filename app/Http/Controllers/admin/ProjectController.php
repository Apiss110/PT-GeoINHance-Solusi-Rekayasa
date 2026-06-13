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
     * 5. Menampilkan daftar proyek berdasarkan kategori di halaman user
     */
    public function showPublicByCategory($slug)
    {
        // Mencari kategori berdasarkan slug
        $category = ProjectCategory::where('slug', $slug)->firstOrFail();

        // Mengambil proyek berdasarkan ID kategori
        $projects = StrategicProject::where('project_category_id', $category->id)->latest()->get();

        // Mengembalikan ke view spesifik kategori
        return view('proyek.geotechnical-analysis', compact('category', 'projects'));
    }
}
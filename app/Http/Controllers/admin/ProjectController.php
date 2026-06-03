<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\StrategicProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Menampilkan halaman daftar proyek di dashboard admin
     */
    public function index()
    {
        $projects = StrategicProject::latest()->get();
        return view('pages.admin.project.index', compact('projects'));
    }

    /**
     * Menyimpan data proyek baru ke database dan folder storage
     */
    public function store(Request $request)
    {
        $request->validate([
            'category' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'location' => 'required|string|max:255',
            'year' => 'required|string|max:4',
            'image' => 'required|image|mimes:jpeg,jpg,png,webp|max:2048',
        ]);

        // Upload file gambar ke folder storage/app/public/projects
        $path = $request->file('image')->store('projects', 'public');

        StrategicProject::create([
            'category' => $request->category,
            'title' => $request->title,
            'description' => $request->description,
            'location' => $request->location,
            'year' => $request->year,
            'image_path' => $path,
        ]);

        return redirect()->route('admin.project.index')->with('success', 'Proyek strategis baru berhasil ditambahkan!');
    }

    /**
     * Menghapus data proyek dari database dan file fisiknya di storage
     */
    public function destroy($id)
    {
        $project = StrategicProject::findOrFail($id);

        // Hapus file gambar dari server lokalan/hosting
        if (Storage::disk('public')->exists($project->image_path)) {
            Storage::disk('public')->delete($project->image_path);
        }

        $project->delete();

        return redirect()->route('admin.project.index')->with('success', 'Proyek strategis berhasil dihapus!');
    }
}
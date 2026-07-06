<?php

namespace App\Http\Controllers;

use App\Models\Syllabus;
use Illuminate\Http\Request;

class SyllabusController extends Controller
{
    // Fungsi untuk halaman publik (User)
    public function publicIndex()
    {
        $syllabi = Syllabus::latest()->get();
        return view('training.silabus-materi', compact('syllabi'));
    }

    // ==========================================
    // SISI ADMIN (CRUD)
    // ==========================================

    public function index()
    {
        $syllabi = Syllabus::latest()->paginate(10);
        return view('pages.admin.syllabus.index', compact('syllabi'));
    }

    public function create()
    {
        return view('pages.admin.syllabus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255', // 🟢 Sudah diperbaiki di sini
            'description' => 'required|string',
            'software_category' => 'required|string',
            'level' => 'required|string',
            'modules_count' => 'required|integer|min:0',
            'icon' => 'nullable|string',
        ]);

        Syllabus::create($request->all());

        return redirect()->route('admin.syllabus.index')->with('success', 'Silabus berhasil ditambahkan!');
    }

    public function edit($id)
    {
        $syllabus = Syllabus::findOrFail($id);
        return view('pages.admin.syllabus.edit', compact('syllabus'));
    }

    public function update(Request $request, $id)
    {
        $syllabus = Syllabus::findOrFail($id);

        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'software_category' => 'required|string',
            'level' => 'required|string',
            'modules_count' => 'required|integer|min:0',
            'icon' => 'nullable|string',
        ]);

        $syllabus->update($request->all());

        return redirect()->route('admin.syllabus.index')->with('success', 'Silabus berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $syllabus = Syllabus::findOrFail($id);
        $syllabus->delete();

        return redirect()->route('admin.syllabus.index')->with('success', 'Silabus berhasil dihapus!');
    }
}
<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CaseStudyController extends Controller
{
    public function index()
    {
        // Mengambil data terbaru dari database
        $caseStudies = CaseStudy::latest()->get();
        return view('pages.admin.studi-kasus.index', compact('caseStudies'));
    }

    public function create()
    {
        return view('pages.admin.studi-kasus.create');
    }

    public function store(Request $request)
    {
        // 1. Validasi Input Form
        $request->validate([
            'title'       => 'required|string|max:255',
            'sector'      => 'required|string',
            'year'        => 'required|integer|min:2000', // Tetap 'year' mengikuti name atribut HTML form kamu
            'file_pdf'    => 'required|file|mimes:pdf|max:10240', // Maksimal 10MB
            'description' => 'nullable|string',
        ]);

        // 2. Handle Upload File PDF & Hitung Ukurannya
        if ($request->hasFile('file_pdf')) {
            $file = $request->file('file_pdf');
            
            // Hitung ukuran file dalam MB agar rapi di tabel index
            $bytes = $file->getSize();
            $fileSizeStr = round($bytes / 1024 / 1024, 1) . ' MB';

            // Simpan file ke direktori storage/app/public/case_studies
            $filePath = $file->store('case_studies', 'public');
        }

        // 3. Simpan ke Database (PERBAIKAN: Mapping input 'year' ke kolom 'publication_year')
        CaseStudy::create([
            'title'            => $request->title,
            'sector'           => $request->sector,
            'publication_year' => $request->year, // <--- Diubah ke 'publication_year' agar sesuai struktur migration
            'file_path'        => $filePath ?? null,
            'file_size'        => $fileSizeStr ?? '0 MB',
            'description'      => $request->description,
        ]);

        // 4. Return redirect ke halaman utama setelah sukses
        return redirect()->route('admin.studi-kasus.index')
                         ->with('success', 'Studi kasus baru berhasil disimpan!');
    }
}
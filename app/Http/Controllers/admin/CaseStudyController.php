<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\CaseStudy; 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class CaseStudyController extends Controller
{
    public function index()
    {
        $caseStudies = CaseStudy::latest()->get();
        return view('pages.admin.studi-kasus.index', compact('caseStudies'));
    }

    public function create()
    {
        return view('pages.admin.studi-kasus.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'       => 'required|string|max:255',
            'sector'      => 'required|string',
            'year'        => 'required|integer|min:2000', 
            'file_pdf'    => 'required|file|mimes:pdf|max:10240',
            'description' => 'nullable|string',
        ]);

        $filePath = null;
        $fileSizeStr = '0 MB';
        
        if ($request->hasFile('file_pdf')) {
            $file = $request->file('file_pdf');
            $bytes = $file->getSize();
            $fileSizeStr = round($bytes / 1024 / 1024, 1) . ' MB';
            $filePath = $file->store('case_studies', 'public');
        }

        // KEMBALIKAN KE 'publication_year' agar tidak melanggar constraint database
        CaseStudy::create([
            'title'            => $request->title,
            'slug'             => Str::slug($request->title), 
            'sector'           => $request->sector,
            'publication_year' => $request->year, // <--- Diperbaiki di sini
            'file_path'        => $filePath,
            'file_size'        => $fileSizeStr,
            'description'      => $request->description,
        ]);

        return redirect()->route('admin.studi-kasus.index')
                         ->with('success', 'Studi kasus baru berhasil disimpan!');
    }

    public function edit($id)
    {
        $caseStudy = CaseStudy::findOrFail($id);
        return view('pages.admin.studi-kasus.edit', compact('caseStudy'));
    }

    public function update(Request $request, $id)
    {
        $caseStudy = CaseStudy::findOrFail($id);

        $request->validate([
            'title'       => 'required|string|max:255',
            'sector'      => 'required|string',
            'year'        => 'required|integer|min:2000',
            'file_pdf'    => 'nullable|file|mimes:pdf|max:10240',
            'description' => 'nullable|string',
        ]);

        $caseStudy->title            = $request->title;
        $caseStudy->sector           = $request->sector;
        $caseStudy->publication_year = $request->year; // <--- Diperbaiki di sini
        $caseStudy->description      = $request->description;

        if ($request->hasFile('file_pdf')) {
            if ($caseStudy->file_path && Storage::disk('public')->exists($caseStudy->file_path)) {
                Storage::disk('public')->delete($caseStudy->file_path);
            }

            $file = $request->file('file_pdf');
            $bytes = $file->getSize();
            
            $caseStudy->file_size = round($bytes / 1024 / 1024, 1) . ' MB';
            $caseStudy->file_path = $file->store('case_studies', 'public');
        }

        $caseStudy->save();

        return redirect()->route('admin.studi-kasus.index')
                         ->with('success', 'Studi kasus berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $caseStudy = CaseStudy::findOrFail($id);

        try {
            if ($caseStudy->file_path && Storage::disk('public')->exists($caseStudy->file_path)) {
                Storage::disk('public')->delete($caseStudy->file_path);
            }

            $caseStudy->delete();

            return redirect()->route('admin.studi-kasus.index')
                             ->with('success', 'Studi kasus berhasil dihapus!');
                             
        } catch (\Exception $e) {
            return redirect()->route('admin.studi-kasus.index')
                             ->with('error', 'Gagal menghapus data: ' . $e->getMessage());
        }
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);

        if (empty($ids)) {
            return redirect()->route('admin.studi-kasus.index')->with('error', 'Tidak ada data studi kasus yang dipilih untuk dihapus.');
        }

        // 1. Ambil data studi kasus untuk penghapusan file pdf/dokumen fisiknya jika ada
        $caseStudies = CaseStudy::whereIn('id', $ids)->get();

        foreach ($caseStudies as $case) {
            // Ubah 'file_path' sesuai nama kolom penyimpanan berkas asli di tabel Anda
            if ($case->file_path && Storage::disk('public')->exists($case->file_path)) {
                Storage::disk('public')->delete($case->file_path);
            }
        }

        // 2. Hapus data massal sekaligus dari database
        CaseStudy::whereIn('id', $ids)->delete();

        // 3. Kembalikan ke halaman utama agar terhindar dari siklus error MethodNotAllowedHttpException
        return redirect()->route('admin.studi-kasus.index')->with('success', count($ids) . ' data studi kasus berhasil dihapus massal!');
    }
}
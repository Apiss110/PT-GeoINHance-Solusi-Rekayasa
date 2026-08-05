<?php

namespace App\Http\Controllers;

use App\Models\Syllabus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str; // 🟢 TAMBAHAN: Diperlukan untuk membuat slug

class SyllabusController extends Controller
{
    // Fungsi untuk halaman publik (User) - List Utama
    public function publicIndex()
    {
        $syllabi = Syllabus::latest()->get();
        return view('training.silabus-materi', compact('syllabi'));
    }

    // Fungsi untuk halaman publik (User) - Detail Materi Silabus
    public function publicShow($id)
    {
        $syllabus = Syllabus::findOrFail($id);
        return view('training.detail-silabus', compact('syllabus'));
    }

    public function show($identifier)
    {
        // Cari data berdasarkan ID atau Slug
        $data = Syllabus::where(function ($query) use ($identifier) {
            if (is_numeric($identifier)) {
                $query->where('id', $identifier);
            }
            $query->orWhere('slug', $identifier);
        })->firstOrFail();

        return view('pages.training.detail', compact('data'));
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
        // 1. Validasi Data Inputan
        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'description'       => 'required|string',
            'software_category' => 'required|string',
            'level'             => 'required|string',
            'modules_count'     => 'required|integer|min:0',
            'icon'              => 'nullable|string',

            // Field Tambahan Penyelarasan Kebutuhan Training Geoteknik
            'durasi'            => 'nullable|string|max:255',
            'jadwal_terdekat'   => 'nullable|string|max:255',
            'format_kelas'      => 'required|string|max:255',
            'poin_cpd'          => 'nullable|integer',
            'manfaat_kursus'    => 'nullable|string',
            'minimal_ram'       => 'nullable|string|max:255',
            'lisensi_software'  => 'nullable|string',
            'prasyarat_peserta' => 'nullable|string',
            'target_peserta'    => 'nullable|string',
            
            // Instruktur
            'nama_instruktur'   => 'nullable|string|max:255',
            'foto_instruktur'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'proyek_instruktur' => 'nullable|string',
            
            // Paket Harga (Investasi)
            'harga_mahasiswa'   => 'required|numeric|min:0',
            'harga_profesional' => 'required|numeric|min:0',
            
            // Data Dinamis Modul & FAQ (Array)
            'modul_materi'      => 'nullable|array',
            'faq_list'          => 'nullable|array',
        ]);

        // 🟢 2. Generate Unique Slug dari Title (Solusi Error Unique Constraint)
        $baseSlug = Str::slug($validated['title']);
        $slug = $baseSlug;
        $count = 1;

        // Cek jika slug sudah ada di DB, tambahkan angka dibelakangnya (-1, -2, dst)
        while (Syllabus::where('slug', $slug)->exists()) {
            $slug = "{$baseSlug}-{$count}";
            $count++;
        }
        $validated['slug'] = $slug;

        // 3. Handle Upload Foto Instruktur
        if ($request->hasFile('foto_instruktur')) {
            $path = $request->file('foto_instruktur')->store('instruktur', 'public');
            $validated['foto_instruktur'] = $path;
        }

        // 4. Simpan ke Database
        Syllabus::create($validated);

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

        // Validasi data untuk proses update
        $validated = $request->validate([
            'title'             => 'required|string|max:255',
            'description'       => 'required|string',
            'software_category' => 'required|string',
            'level'             => 'required|string',
            'modules_count'     => 'required|integer|min:0',
            'icon'              => 'nullable|string',
            'durasi'            => 'nullable|string|max:255',
            'jadwal_terdekat'   => 'nullable|string|max:255',
            'format_kelas'      => 'required|string|max:255',
            'poin_cpd'          => 'nullable|integer',
            'manfaat_kursus'    => 'nullable|string',
            'minimal_ram'       => 'nullable|string|max:255',
            'lisensi_software'  => 'nullable|string',
            'prasyarat_peserta' => 'nullable|string',
            'target_peserta'    => 'nullable|string',
            'nama_instruktur'   => 'nullable|string|max:255',
            'foto_instruktur'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048',
            'proyek_instruktur' => 'nullable|string',
            'harga_mahasiswa'   => 'required|numeric|min:0',
            'harga_profesional' => 'required|numeric|min:0',
            'modul_materi'      => 'nullable|array',
            'faq_list'          => 'nullable|array',
        ]);

        // 🟢 Jika Judul/Title Diubah, Update Juga Slug-nya Secara Unik
        if ($syllabus->title !== $validated['title']) {
            $baseSlug = Str::slug($validated['title']);
            $slug = $baseSlug;
            $count = 1;

            while (Syllabus::where('slug', $slug)->where('id', '!=', $id)->exists()) {
                $slug = "{$baseSlug}-{$count}";
                $count++;
            }
            $validated['slug'] = $slug;
        }

        // Handle Update Foto Instruktur
        if ($request->hasFile('foto_instruktur')) {
            if ($syllabus->foto_instruktur) {
                Storage::disk('public')->delete($syllabus->foto_instruktur);
            }
            $path = $request->file('foto_instruktur')->store('instruktur', 'public');
            $validated['foto_instruktur'] = $path;
        }

        // Update ke database
        $syllabus->update($validated);

        return redirect()->route('admin.syllabus.index')->with('success', 'Silabus berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $syllabus = Syllabus::findOrFail($id);
        
        if ($syllabus->foto_instruktur) {
            Storage::disk('public')->delete($syllabus->foto_instruktur);
        }

        $syllabus->delete();

        return redirect()->route('admin.syllabus.index')->with('success', 'Silabus berhasil dihapus!');
    }

    public function bulkDelete(Request $request)
    {
        $ids = $request->input('ids', []);

        if (empty($ids)) {
            return redirect()->route('admin.syllabus.index')->with('error', 'Tidak ada silabus yang dipilih untuk dihapus.');
        }

        Syllabus::whereIn('id', $ids)->delete();

        return redirect()->route('admin.syllabus.index')->with('success', count($ids) . ' data silabus berhasil dihapus massal!');
    }
}
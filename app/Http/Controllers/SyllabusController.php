<?php

namespace App\Http\Controllers;

use App\Models\Syllabus;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SyllabusController extends Controller
{
    // Fungsi untuk halaman publik (User) - List Utama
    public function publicIndex()
    {
        $syllabi = Syllabus::latest()->get();
        return view('training.silabus-materi', compact('syllabi'));
    }

    // 🟢 BARU: Fungsi untuk halaman publik (User) - Detail Materi Silabus
    public function publicShow($id)
    {
        $syllabus = Syllabus::findOrFail($id);
        return view('training.detail-silabus', compact('syllabus'));
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
        // 1. Validasi Data Inputan (Lengkap dengan field baru)
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
            'foto_instruktur'   => 'nullable|image|mimes:jpeg,png,jpg,webp|max:2048', // Maksimal 2MB
            'proyek_instruktur' => 'nullable|string',
            
            // Paket Harga (Investasi)
            'harga_mahasiswa'   => 'required|numeric|min:0',
            'harga_profesional' => 'required|numeric|min:0',
            
            // Data Dinamis Modul & FAQ (Array)
            'modul_materi'      => 'nullable|array',
            'faq_list'          => 'nullable|array',
        ]);

        // 2. Handle Upload Foto Instruktur
        if ($request->hasFile('foto_instruktur')) {
            $path = $request->file('foto_instruktur')->store('instruktur', 'public');
            $validated['foto_instruktur'] = $path;
        }

        // 3. Simpan ke Database menggunakan data yang sudah tervalidasi
        Syllabus::create($validated);

        return redirect()->route('admin.syllabus.index')->with('success', 'Silabus berhasil ditambahkan!');
    }

    public function edit($id)
    {
        // Dirapikan dari duplikasi sebelumnya
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

        // Handle Update Foto Instruktur (Hapus foto lama jika diganti baru)
        if ($request->hasFile('foto_instruktur')) {
            if ($syllabus->foto_instruktur) {
                Storage::disk('public')->delete($syllabus->foto_instruktur);
            }
            $path = $request->file('foto_instruktur')->store('instruktur', 'public');
            $validated['foto_instruktur'] = $path;
        }

        // Update ke database menggunakan array $validated
        $syllabus->update($validated);

        return redirect()->route('admin.syllabus.index')->with('success', 'Silabus berhasil diperbarui!');
    }

    public function destroy($id)
    {
        $syllabus = Syllabus::findOrFail($id);
        
        // Hapus file foto instruktur dari storage jika ada sebelum menghapus data row
        if ($syllabus->foto_instruktur) {
            Storage::disk('public')->delete($syllabus->foto_instruktur);
        }

        $syllabus->delete();

        return redirect()->route('admin.syllabus.index')->with('success', 'Silabus berhasil dihapus!');
    }

    public function bulkDelete(Request $request)
    {
        // Menangkap kumpulan ID dari checkbox array form
        $ids = $request->input('ids', []);

        if (empty($ids)) {
            return redirect()->route('admin.syllabus.index')->with('error', 'Tidak ada silabus yang dipilih untuk dihapus.');
        }

        // Eksekusi penghapusan massal data di database
        Syllabus::whereIn('id', $ids)->delete();

        // Redirect kembali ke halaman utama silabus untuk memutus daur ulang method request
        return redirect()->route('admin.syllabus.index')->with('success', count($ids) . ' data silabus berhasil dihapus massal!');
    }
}
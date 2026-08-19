<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Branch;
use App\Models\StrategicProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BranchController extends Controller
{
    /**
     * Tampilkan halaman utama (Tabel Data)
     */
    public function index()
    {
        $branches = Branch::latest()->get();
        // Menggunakan huruf kapital Branch sesuai struktur folder view Anda
        return view('pages.admin.Branch.index', compact('branches'));
    }

    /**
     * Tampilkan form tambah data
     */
    public function create()
    {
        $projects = StrategicProject::orderBy('title', 'asc')->get();
        return view('pages.admin.Branch.create', compact('projects'));
    }

    /**
     * Simpan data baru ke database
     */
    public function store(Request $request)
    {
        $request->validate([
            'daerah' => 'required|string|max:50',
            'title'  => 'required|string|max:100',
            'desc'   => 'required|string|max:500',
            'lat'    => 'required|numeric|between:-90,90',
            'lng'    => 'required|numeric|between:-180,180',
            'link'   => 'required|string|max:255',
        ], $this->messages());

        $projectId = $this->extractProjectId($request->link);
        $projectImagePath = $this->getProjectImagePath($projectId);

        Branch::create([
            'daerah'     => strtolower(trim($request->daerah)),
            'title'      => Str::of(trim($request->title))->upper()->toString(),
            'desc'       => trim($request->desc),
            'lat'        => $request->lat,
            'lng'        => $request->lng,
            'link'       => trim($request->link),
            'project_id' => $projectId,
            'img'        => $projectImagePath ?? '',
        ]);

        return redirect()->route('admin.branches.index')
            ->with('success', 'Titik cabang baru berhasil ditambahkan!');
    }

    /**
     * Tampilkan form edit data
     */
    public function edit($id)
    {
        $branch = Branch::findOrFail($id);
        $projects = StrategicProject::orderBy('title', 'asc')->get();

        return view('pages.admin.Branch.edit', compact('branch', 'projects'));
    }

    /**
     * Update data cabang yang dipilih
     */
    public function update(Request $request, $id)
    {
        $branch = Branch::findOrFail($id);

        $request->validate([
            'daerah' => 'required|string|max:50',
            'title'  => 'required|string|max:100',
            'desc'   => 'required|string|max:500',
            'lat'    => 'required|numeric|between:-90,90',
            'lng'    => 'required|numeric|between:-180,180',
            'link'   => 'required|string|max:255',
        ], $this->messages());

        $projectId = $this->extractProjectId($request->link);
        $projectImagePath = $this->getProjectImagePath($projectId);

        // Fallback ke gambar lama jika projectImagePath tidak ditemukan
        if (!$projectImagePath) {
            $projectImagePath = $branch->img;
        }

        $branch->update([
            'daerah'     => strtolower(trim($request->daerah)),
            'title'      => Str::of(trim($request->title))->upper()->toString(),
            'desc'       => trim($request->desc),
            'lat'        => $request->lat,
            'lng'        => $request->lng,
            'link'       => trim($request->link),
            'project_id' => $projectId,
            'img'        => $projectImagePath ?? '',
        ]);

        return redirect()->route('admin.branches.index')
            ->with('success', 'Titik peta berhasil diperbarui!');
    }

    /**
     * Hapus data tunggal
     */
    public function destroy($id)
    {
        $branch = Branch::findOrFail($id);
        $namaCabang = $branch->title;

        if ($branch->img) {
            $cleanedPath = preg_replace('#^(public/|storage/)#i', '', trim($branch->img));
            Storage::disk('public')->delete($cleanedPath);
        }

        $branch->delete();

        return redirect()->route('admin.branches.index')
            ->with('success', 'Titik cabang "' . $namaCabang . '" telah berhasil dihapus dari website.');
    }

    /**
     * Hapus banyak data (Bulk Delete)
     */
    public function bulkDestroy(Request $request)
    {
        $ids = $request->input('selected_branches', []);

        if (empty($ids)) {
            return redirect()->route('admin.branches.index')
                ->with('error', 'Tidak ada titik lokasi yang dipilih.');
        }

        $branches = Branch::whereIn('id', $ids)->get();
        $count = $branches->count();

        foreach ($branches as $branch) {
            if ($branch->img) {
                $cleanedPath = preg_replace('#^(public/|storage/)#i', '', trim($branch->img));
                Storage::disk('public')->delete($cleanedPath);
            }
            $branch->delete();
        }

        return redirect()->route('admin.branches.index')
            ->with('success', $count . ' titik lokasi cabang berhasil dihapus massal.');
    }

    /**
     * Helper: Ekstrak Project ID dari Link
     */
    private function extractProjectId($link)
    {
        if (!$link) return null;
        
        // Ambil hanya angka/ID di bagian paling akhir URL
        $path = parse_url($link, PHP_URL_PATH);
        $segments = explode('/', trim($path, '/'));
        $lastSegment = end($segments);

        return is_numeric($lastSegment) ? (int) $lastSegment : null;
    }

    /**
     * Helper: Ambil Path Gambar dari StrategicProject
     */
    private function getProjectImagePath($projectId)
    {
        if (!$projectId) return null;

        $project = StrategicProject::find($projectId);
        if ($project) {
            return $project->image_path ?? $project->image ?? $project->img ?? null;
        }

        return null;
    }

    /**
     * Pesan Validasi
     */
    private function messages()
    {
        return [
            'daerah.required' => 'Nama daerah wajib diisi.',
            'title.required'  => 'Title atau nama cabang tidak boleh kosong.',
            'desc.required'   => 'Deskripsi operasional wajib ditulis.',
            'lat.required'    => 'Titik koordinat Latitude wajib diisi.',
            'lat.numeric'     => 'Latitude harus berupa angka desimal.',
            'lng.required'    => 'Titik koordinat Longitude wajib diisi.',
            'lng.numeric'     => 'Longitude harus berupa angka desimal.',
            'link.required'   => 'Anda wajib memilih Hubungan Proyek Strategis.',
        ];
    }
}
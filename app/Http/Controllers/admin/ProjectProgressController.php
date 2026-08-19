<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ProjectProgress;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ProjectProgressController extends Controller
{
    // Tampilkan semua data progres proyek di tabel admin
    public function index()
    {
        $progresses = ProjectProgress::with('user')->latest()->get();
        return view('pages.admin.project-progress.index', compact('progresses'));
    }

    // Form tambah progres proyek baru
    public function create()
    {
        // Mengambil daftar user (khusus role client/klien)
        $clients = User::where('role', 'client')->get();
        return view('pages.admin.project-progress.create', compact('clients'));
    }

    // Simpan data progres baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'user_id'     => 'required|exists:users,id',
            'title'       => 'required|string|max:255',
            'description' => 'nullable|string',
            'percentage'  => 'required|integer|min:0|max:100',
            'status'      => 'required|in:pending,in_progress,completed',
            'image'       => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'start_date'  => 'nullable|date',
            'target_date' => 'nullable|date',
        ]);

        DB::beginTransaction();

        try {
            $data = $request->only([
                'user_id',
                'title',
                'description',
                'percentage',
                'status',
                'start_date',
                'target_date',
            ]);

            if ($request->hasFile('image')) {
                $data['image'] = $request->file('image')->store('project-progresses', 'public');
            }

            // 1. Simpan Data Utama Progres Proyek
            $progress = ProjectProgress::create($data);

            // 2. Simpan Tahapan & Poin Kegiatan ke Relasi
            if ($request->has('stages') && is_array($request->stages)) {
                foreach ($request->stages as $stageData) {
                    if (!empty($stageData['title'])) {
                        if (method_exists($progress, 'stages')) {
                            $stage = $progress->stages()->create([
                                'title' => $stageData['title'],
                            ]);

                            if (isset($stageData['items']) && is_array($stageData['items'])) {
                                foreach ($stageData['items'] as $itemData) {
                                    if (!empty($itemData['title'])) {
                                        $stage->items()->create([
                                            'title'        => $itemData['title'],
                                            'description'  => $itemData['description'] ?? null,
                                            'is_completed' => isset($itemData['is_completed']) ? 1 : 0,
                                        ]);
                                    }
                                }
                            }
                        }
                    }
                }
            }

            DB::commit();

            return redirect()->route('admin.project-progress.index')
                ->with('success', 'Data progres proyek berhasil dibuat!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal membuat data: ' . $e->getMessage())->withInput();
        }
    }

    // Menampilkan detail progres proyek & checklist poin kegiatan
    public function show($id)
    {
        $projectProgress = ProjectProgress::with(['user', 'stages.items'])->findOrFail($id);
        return view('pages.admin.project-progress.show', compact('projectProgress'));
    }

    public function edit($id)
    {
        $projectProgress = ProjectProgress::with('stages.items')->findOrFail($id);
        $clients = User::where('role', 'client')->get();

        return view('pages.admin.project-progress.edit', compact('projectProgress', 'clients'));
    }

    // Update data di database
    public function update(Request $request, ProjectProgress $projectProgress)
    {
        $request->validate([
            'user_id'       => 'required|exists:users,id',
            'title'         => 'required|string|max:255',
            'description'   => 'nullable|string',
            'percentage'    => 'required|integer|min:0|max:100',
            'status'        => 'required|in:pending,in_progress,completed',
            'image'         => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'attachments.*' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:4096',
            'start_date'    => 'nullable|date',
            'target_date'   => 'nullable|date',
        ]);

        DB::beginTransaction();

        try {
            $data = $request->only([
                'user_id',
                'title',
                'description',
                'percentage',
                'status',
                'start_date',
                'target_date',
            ]);

            // Ganti foto utama (cover) jika ada
            if ($request->hasFile('image')) {
                if ($projectProgress->image) {
                    Storage::disk('public')->delete($projectProgress->image);
                }
                $data['image'] = $request->file('image')->store('project-progresses', 'public');
            }

            // Ambil array lampiran foto lama
            $attachments = $projectProgress->attachments ?? [];

            // Tambahkan foto lampiran baru
            if ($request->hasFile('attachments')) {
                foreach ($request->file('attachments') as $file) {
                    $attachments[] = $file->store('project-progresses/attachments', 'public');
                }
            }

            $data['attachments'] = $attachments;

            $projectProgress->update($data);

            // Update Relasi Tahapan jika dikirim dari form edit
            if ($request->has('stages') && is_array($request->stages) && method_exists($projectProgress, 'stages')) {
                $projectProgress->stages()->delete();

                foreach ($request->stages as $stageData) {
                    if (!empty($stageData['title'])) {
                        $stage = $projectProgress->stages()->create([
                            'title' => $stageData['title'],
                        ]);

                        if (isset($stageData['items']) && is_array($stageData['items'])) {
                            foreach ($stageData['items'] as $itemData) {
                                if (!empty($itemData['title'])) {
                                    $stage->items()->create([
                                        'title'        => $itemData['title'],
                                        'description'  => $itemData['description'] ?? null,
                                        'is_completed' => isset($itemData['is_completed']) ? 1 : 0,
                                    ]);
                                }
                            }
                        }
                    }
                }
            }

            DB::commit();

            // Kembali ke halaman asal (Detail / Show)
            return redirect()->back()
                ->with('success', 'Data progres proyek dan foto berhasil diperbarui!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal memperbarui data: ' . $e->getMessage())->withInput();
        }
    }

    // Memperbarui checklist poin kegiatan secara cepat dari halaman detail
    public function updateChecklist(Request $request, $id)
    {
        $projectProgress = ProjectProgress::with('stages.items')->findOrFail($id);

        $checkedItemIds = $request->input('items', []);

        DB::beginTransaction();

        try {
            $totalItems = 0;
            $completedItems = 0;

            foreach ($projectProgress->stages as $stage) {
                foreach ($stage->items as $item) {
                    $totalItems++;
                    $isCompleted = isset($checkedItemIds[$item->id]) ? 1 : 0;

                    if ($isCompleted) {
                        $completedItems++;
                    }

                    $item->update([
                        'is_completed' => $isCompleted
                    ]);
                }
            }

            $percentage = $totalItems > 0 ? round(($completedItems / $totalItems) * 100) : 0;

            $status = 'pending';
            if ($percentage == 100) {
                $status = 'completed';
            } elseif ($percentage > 0) {
                $status = 'in_progress';
            }

            $projectProgress->update([
                'percentage' => $percentage,
                'status'     => $status
            ]);

            DB::commit();

            return redirect()->back()->with('success', 'Checklist poin kegiatan dan persentase berhasil diperbarui!');

        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Gagal memperbarui checklist: ' . $e->getMessage());
        }
    }

    // Hapus foto utama (cover)
    public function deleteImage($id)
    {
        $projectProgress = ProjectProgress::findOrFail($id);

        if ($projectProgress->image) {
            Storage::disk('public')->delete($projectProgress->image);
            $projectProgress->update(['image' => null]);
        }

        return redirect()->back()->with('success', 'Foto utama berhasil dihapus!');
    }

    // Hapus foto lampiran berdasarkan indeks array
    public function deleteAttachment($id, $index)
    {
        $projectProgress = ProjectProgress::findOrFail($id);
        $attachments = $projectProgress->attachments ?? [];

        if (isset($attachments[$index])) {
            // Hapus file fisik dari penyimpanan
            Storage::disk('public')->delete($attachments[$index]);

            // Hapus elemen array dan susun ulang indexnya
            unset($attachments[$index]);
            $attachments = array_values($attachments);

            // Simpan pembaruan ke database
            $projectProgress->update(['attachments' => $attachments]);
        }

        return redirect()->back()->with('success', 'Foto lampiran berhasil dihapus!');
    }

    // Hapus data progres beserta seluruh file foto
    public function destroy(ProjectProgress $projectProgress)
    {
        // Hapus foto utama jika ada
        if ($projectProgress->image) {
            Storage::disk('public')->delete($projectProgress->image);
        }

        // Hapus seluruh file lampiran jika ada
        if (!empty($projectProgress->attachments) && is_array($projectProgress->attachments)) {
            foreach ($projectProgress->attachments as $attachment) {
                Storage::disk('public')->delete($attachment);
            }
        }

        $projectProgress->delete();

        return redirect()->route('admin.project-progress.index')
            ->with('success', 'Data progres proyek berhasil dihapus!');
    }
}
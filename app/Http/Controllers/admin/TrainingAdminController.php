<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\TrainingRegistration;
use Illuminate\Http\Request;

class TrainingAdminController extends Controller
{
    // 1. Tampilkan semua daftar pendaftar
    public function index()
    {
        // Ambil data pendaftaran terbaru
        $registrations = TrainingRegistration::latest()->get();
        return view('pages.admin.training.index', compact('registrations'));
    }

    // 2. Tampilkan detail pendaftaran (persis seperti konsep Pesan Masuk)
    public function show($id)
{
    $reg = TrainingRegistration::findOrFail($id);

    // LOGIKA PERUBAHAN STATUS:
    // Jika statusnya masih belum dibaca, maka ubah menjadi true (dibaca)
    if (!$reg->is_read) {
        $reg->update(['is_read' => true]);
    }

    return view('pages.admin.training.show', compact('reg'));
}

    // 3. Hapus data pendaftara.
    public function destroy($id)
{
    $registration = TrainingRegistration::findOrFail($id);
    $registration->delete();

    // Ubah dari 'pages.admin.training.index' menjadi 'admin.training.index'
    return redirect()->route('admin.training.index')->with('success', 'Peserta berhasil dihapus.');
}
}
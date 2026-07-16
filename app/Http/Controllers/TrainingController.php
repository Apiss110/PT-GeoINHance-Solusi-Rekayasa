<?php

namespace App\Http\Controllers;

use App\Models\TrainingRegistration;
use App\Models\Syllabus;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    /**
     * Menampilkan halaman form pendaftaran training
     */
    public function pendaftaran(Request $request)
    {
        // Tangkap ID silabus dari tombol "Daftar" yang diklik di halaman silabus
        $selectedSyllabusId = $request->query('syllabus_id');

        // Ambil semua daftar silabus untuk pilihan dropdown di form pendaftaran
        $syllabi = Syllabus::all();

        return view('training.pendaftaran', compact('syllabi', 'selectedSyllabusId'));
    }

    /**
     * Menyimpan data pendaftaran dari pengunjung website
     */
    public function storeRegistration(Request $request)
{
    $request->validate([
        'name'             => 'required|string|max:255',
        'email'            => 'required|email|max:255',
        'whatsapp_number'  => 'required|string|max:20',
        'company'          => 'nullable|string|max:255',
        'syllabus_id'      => 'required|exists:syllabi,id',
        'message'          => 'nullable|string',
        'terms'            => 'required|accepted',
    ]);

    // 1. Ambil data silabus berdasarkan ID pilihan user
    $syllabus = \App\Models\Syllabus::findOrFail($request->syllabus_id);

    // 2. Simpan ke database menggunakan nama program ($syllabus->title), bukan ID-nya
    \App\Models\TrainingRegistration::create([
        'name'                   => $request->name,
        'email'                  => $request->email,
        'whatsapp_number'        => $request->whatsapp_number,
        'company_or_institution' => $request->company,
        'training_program'       => $syllabus->title, // <-- PASTIKAN menggunakan ->title
        'additional_message'     => $request->message,
    ]);

    return redirect()->back()->with('success', 'Pendaftaran Anda berhasil dikirim!');
}
}
<?php

namespace App\Http\Controllers;

use App\Models\TrainingRegistration;
use Illuminate\Http\Request;

class TrainingController extends Controller
{
    // Menampilkan halaman form pendaftaran (sesuaikan dengan return view asli Anda)
    public function pendaftaran()
    {
        return view('training.pendaftaran'); 
    }

    // Menyimpan data pendaftaran dari pengunjung website
    public function storeRegistration(Request $request)
    {
        // 1. Validasi input form
        $request->validate([
            'name'             => 'required|string|max:255',
            'email'            => 'required|email|max:255',
            'whatsapp_number'  => 'required|string|max:20',
            'company'          => 'nullable|string|max:255',
            'training_program' => 'required|string',
            'message'          => 'nullable|string',
            'terms'            => 'required|accepted', // Memastikan checkbox syarat dicentang
        ]);

        // 2. Simpan ke database
        TrainingRegistration::create([
            'name'                   => $request->name,
            'email'                  => $request->email,
            'whatsapp_number'        => $request->whatsapp_number,
            'company_or_institution' => $request->company,
            'training_program'       => $request->training_program,
            'additional_message'     => $request->message,
        ]);

        // 3. Kembalikan dengan notifikasi sukses
        return redirect()->back()->with('success', 'Pendaftaran Anda berhasil dikirim! Tim kami akan segera menghubungi Anda.');
    }
}
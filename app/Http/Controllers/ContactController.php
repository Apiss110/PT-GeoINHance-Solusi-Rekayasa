<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function store(Request $request)
    {
        // Validasi input form
        $request->validate([
            'full_name'        => 'required|string|max:255',
            'email'            => 'required|email|max:255',
            'phone'            => 'required|string|max:20',
            'company'          => 'nullable|string|max:255',
            'subject'          => 'required|string|max:255',
            'message_details'  => 'required|string',
        ]);

        // Simpan ke Database
        ContactMessage::create([
            'full_name' => $request->full_name,
            'email'     => $request->email,
            'phone'     => $request->phone,
            'company'   => $request->company,
            'subject'   => $request->subject,
            'message'   => $request->message_details,
        ]);

        // Kembali dengan notifikasi sukses
        return redirect()->back()->with('success', 'Pesan Anda berhasil dikirim! Tim kami akan segera menghubungi Anda.');
    }
}
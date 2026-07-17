<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    // Tampilkan daftar semua pesan masuk di dashboard admin
    public function index()
    {
        $messages = ContactMessage::latest()->paginate(15);
        return view('pages.admin.messages.index', compact('messages'));
    }

    // Detail isi pesan (sekaligus menandai 'is_read' menjadi true)
    public function show(ContactMessage $message)
    {
        $message->update(['is_read' => true]);
        return view('pages.admin.messages.show', compact('message'));
    }

    // Menghapus pesan
    public function destroy(ContactMessage $message)
    {
        $message->delete();
        return redirect()->route('admin.messages.index')->with('success', 'Pesan berhasil dihapus.');
    }

    public function bulkDelete(Request $request)
    {
        // Mengambil kumpulan array ID dari checkbox yang dikirimkan
        $ids = $request->input('ids', []);

        if (empty($ids)) {
            return redirect()->route('admin.messages.index')->with('error', 'Tidak ada pesan yang dipilih untuk dihapus.');
        }

        // Eksekusi penghapusan baris data terpilih dari tabel database
        ContactMessage::whereIn('id', $ids)->delete();

        // Redirect kembali ke index utama
        return redirect()->route('admin.messages.index')->with('success', count($ids) . ' data pesan berhasil dihapus massal!');
    }
}
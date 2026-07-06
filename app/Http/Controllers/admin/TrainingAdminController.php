<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\TrainingRegistration;
use Illuminate\Http\Request;

class TrainingAdminController extends Controller
{
    // Menampilkan list pendaftar di panel admin
    public function index()
    {
        $registrations = TrainingRegistration::latest()->get();
        return view('pages.admin.training.index', compact('registrations'));
    }

    // Menghapus data pendaftar jika diperlukan
    public function destroy($id)
    {
        $registration = TrainingRegistration::findOrFail($id);
        $registration->delete();

        return redirect()->route('admin.training.index')
                         ->with('success', 'Data pendaftar berhasil dihapus!');
    }
}
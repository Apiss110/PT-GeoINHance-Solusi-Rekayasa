<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    // 1. Menampilkan daftar semua admin biasa (bukan superadmin)
    public function index()
    {
        $admins = User::where('role', 'admin')->get();
        return view('pages.admin.kelola-admin.index', compact('admins'));
    }

    // 2. Menampilkan halaman form untuk menambah admin baru
    public function create()
    {
        return view('pages.admin.kelola-admin.create');
    }

    // 3. Menyimpan data admin baru ke database (Menggunakan Plain Text Password)
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:4',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => $request->password, // Disimpan berbentuk plain text untuk tugas kampus
            'role' => 'admin', // Mengunci role agar otomatis menjadi admin biasa
        ]);

        return redirect()->route('admin.kelola-admin.index')->with('success', 'Admin baru berhasil ditambahkan!');
    }

    // 4. Menampilkan halaman form edit data admin
    public function edit($id)
    {
        $admin = User::findOrFail($id);
        return view('pages.admin.kelola-admin.edit', compact('admin'));
    }

    // 5. Memperbarui data admin ke database
    public function update(Request $request, $id)
    {
        $admin = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,' . $admin->id,
            'password' => 'nullable|string|min:4',
        ]);

        $admin->name = $request->name;
        $admin->email = $request->email;

        // Jika form password diisi, perbarui datanya dengan plain text baru
        if ($request->filled('password')) {
            $admin->password = $request->password;
        }

        $admin->save();

        return redirect()->route('admin.kelola-admin.index')->with('success', 'Data admin berhasil diperbarui!');
    }

    // 6. Menghapus data admin dari database
    public function destroy($id)
    {
        $admin = User::findOrFail($id);
        $admin->delete();

        return redirect()->route('admin.kelola-admin.index')->with('success', 'Akun admin berhasil dihapus!');
    }
}
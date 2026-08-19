<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class ClientController extends Controller
{
    // Menampilkan daftar akun klien
    public function index()
    {
        $clients = User::where('role', 'client')->latest()->get();
        return view('pages.admin.clients.index', compact('clients'));
    }

    // Menampilkan form buat akun klien
    public function create()
    {
        return view('pages.admin.clients.create');
    }

    // Menyimpan akun klien baru ke database
    public function store(Request $request)
    {
        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name'     => $request->name,
            'email'    => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'client',
        ]);

        return redirect()->route('admin.clients.index')->with('success', 'Akun Klien berhasil dibuat!');
    }

    // Menampilkan form edit akun klien
    public function edit($id)
    {
        $client = User::where('role', 'client')->findOrFail($id);
        return view('pages.admin.clients.edit', compact('client')); // 👈 Sesuaikan lokasi view
    }

    // Memperbarui data akun klien
    public function update(Request $request, $id)
    {
        $client = User::where('role', 'client')->findOrFail($id);

        $request->validate([
            'name'     => 'required|string|max:255',
            'email'    => 'required|string|email|max:255|unique:users,email,'.$client->id,
            'password' => 'nullable|string|min:1',
        ]);

        $data = [
            'name'  => $request->name,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = Hash::make($request->password);
        }

        $client->update($data);

        return redirect()->route('admin.clients.index')->with('success', 'Akun Klien berhasil diperbarui!');
    }

    // Menghapus akun klien
    public function destroy($id)
    {
        $client = User::where('role', 'client')->findOrFail($id);
        $client->delete();

        return redirect()->route('admin.clients.index')->with('success', 'Akun Klien berhasil dihapus!');
    }
}
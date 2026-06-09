<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class IsSuperadmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah user sudah login DAN rolenya adalah superadmin
        if (Auth::check() && Auth::user()->role === 'superadmin') {
            return $next($request);
        }

        // Jika bukan superadmin, tendang balik ke dashboard dengan pesan eror
        return redirect('/dashboard')->with('error', 'Akses ditolak! Halaman ini khusus Superadmin.');
    }
}
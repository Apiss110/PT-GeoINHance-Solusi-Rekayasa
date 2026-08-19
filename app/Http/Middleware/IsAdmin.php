<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    public function handle(Request $request, Closure $next): Response
    {
        // Izinkan jika role-nya 'admin' ATAU 'superadmin'
        if (!auth()->check() || !in_array(auth()->user()->role, ['admin', 'superadmin'])) {
            return redirect('/')->with('error', 'Akses ditolak!');
        }

        return $next($request);
    }
}
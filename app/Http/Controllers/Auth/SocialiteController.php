<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;
use Illuminate\Support\Str;

class SocialiteController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            // Mengambil data pengguna dari Google/Facebook/dll
            $socialUser = Socialite::driver($provider)->user();
        } catch (Exception $e) {
            return redirect('/login')->with('error', 'Gagal login menggunakan ' . ucfirst($provider));
        }

        // 1. Cek apakah user ini sudah pernah login pakai akun sosial ini sebelumnya
        $registeredUser = User::where('provider_name', $provider)
                              ->where('provider_id', $socialUser->getId())
                              ->first();

        if ($registeredUser) {
            Auth::login($registeredUser);
            return redirect()->intended('/dashboard'); // Sesuaikan '/dashboard' dengan rute halaman utamamu
        }

        // 2. Jika belum, cek apakah email-nya sudah terdaftar secara manual
        $userByEmail = User::where('email', $socialUser->getEmail())->first();

        if ($userByEmail) {
            // Tautkan akun sosial ke data user yang sudah ada
            $userByEmail->update([
                'provider_name' => $provider,
                'provider_id' => $socialUser->getId()
            ]);
            
            Auth::login($userByEmail);
            return redirect()->intended('/dashboard');
        }

        // 3. Jika benar-benar pengguna baru, buatkan akun baru di database
        $newUser = User::create([
            'name' => $socialUser->getName() ?? $socialUser->getNickname() ?? 'User Geo',
            'email' => $socialUser->getEmail(),
            'provider_name' => $provider,
            'provider_id' => $socialUser->getId(),
            
            // Password disimpan dalam bentuk plain text murni agar mudah dicek saat pengembangan
            'password' => '123456', 
        ]);

        Auth::login($newUser);
        return redirect()->intended('/dashboard');
    }

    
}
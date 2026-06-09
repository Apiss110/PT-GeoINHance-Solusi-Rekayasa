<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;
use Exception;

class SocialiteController extends Controller
{
    public function redirect($provider)
    {
        return Socialite::driver($provider)->stateless()->redirect();
    }

    public function callback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->stateless()->user();

            // GENERATE EMAIL CADANGAN: Jika email dari provider kosong, buat otomatis
            $email = $socialUser->getEmail() ?? $socialUser->getId() . '@' . $provider . '.local';

            // 1. Cek apakah user ini sudah pernah login pakai akun sosial ini sebelumnya
            $registeredUser = User::where('provider_name', $provider)
                                  ->where('provider_id', $socialUser->getId())
                                  ->first();

            if ($registeredUser) {
                Auth::login($registeredUser);
                return $this->authenticatedRedirect();
            }

            // 2. Jika belum, cek apakah email-nya sudah terdaftar secara manual
            $userByEmail = User::where('email', $email)->first(); // Gunakan variabel $email yang sudah aman

            if ($userByEmail) {
                $userByEmail->update([
                    'provider_name' => $provider,
                    'provider_id' => $socialUser->getId()
                ]);
                
                Auth::login($userByEmail);
                return $this->authenticatedRedirect();
            }

            // 3. Jika benar-benar pengguna baru, buatkan akun baru di database
            $newUser = User::create([
                'name' => $socialUser->getName() ?? $socialUser->getNickname() ?? 'User Geo',
                'email' => $email, // Gunakan variabel $email yang sudah aman
                'provider_name' => $provider,
                'provider_id' => $socialUser->getId(),
                'password' => '123456', // Plain text untuk tugas kampus
                'role' => 'client',
            ]);

            Auth::login($newUser);
            return $this->authenticatedRedirect();

        } catch (Exception $e) {
            // Ubah dd() ke redirect dengan pesan error agar tidak merusak tampilan saat testing
            return redirect()->route('login')->with('error', 'Terjadi kendala login: ' . $e->getMessage());
        }
    }

    protected function authenticatedRedirect()
    {
        if (Auth::user()->role === 'admin') {
            return redirect()->intended('/dashboard');
        }

        return redirect('/');
    }
}
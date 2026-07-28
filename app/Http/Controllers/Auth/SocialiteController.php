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
        // Pastikan provider didukung sebelum melakukan redirect
        if (!in_array($provider, ['google', 'facebook'])) {
            return redirect()->route('login')->with('error', 'Metode login tidak didukung.');
        }

        return Socialite::driver($provider)->stateless()->redirect();
    }

    public function callback($provider)
    {
        try {
            $socialUser = Socialite::driver($provider)->stateless()->user();

            // GENERATE EMAIL CADANGAN: Jika email dari provider kosong, buat otomatis
            $email = $socialUser->getEmail() ?? $socialUser->getId() . '@' . $provider . '.local';

            // 1. Cek apakah user ini sudah pernah login pakai akun sosial ini sebelumnya
            // Pastikan kolom provider_name & provider_id sudah ada di migration tabel users Anda
            $registeredUser = User::where('provider_name', $provider)
                                  ->where('provider_id', $socialUser->getId())
                                  ->first();

            if ($registeredUser) {
                Auth::login($registeredUser);
                return $this->authenticatedRedirect();
            }

            // 2. Jika belum, cek apakah email-nya sudah terdaftar secara manual
            $userByEmail = User::where('email', $email)->first(); 

            if ($userByEmail) {
                // Hubungkan akun manual yang sudah ada dengan provider sosial ini
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
                'email' => $email,
                'provider_name' => $provider,
                'provider_id' => $socialUser->getId(),
                'password' => '123456', // Plain text untuk mempermudah tugas kampus
                'role' => 'client',
            ]);

            Auth::login($newUser);
            return $this->authenticatedRedirect();

        } catch (Exception $e) {
            // Kita gunakan dd($e->getMessage()) saat masa testing agar Anda tahu 
            // persis letak kegagalannya jika database belum di-migrate.
            dd('Gagal login via Socialite: ' . $e->getMessage() . ' di file ' . $e->getFile() . ' baris ' . $e->getLine());
            
            // Jika sudah masuk tahap production, aktifkan kembali redirect di bawah ini:
            // return redirect()->route('login')->with('error', 'Terjadi kendala login: ' . $e->getMessage());
        }
    }

    protected function authenticatedRedirect()
    {
        $user = Auth::user();

        // Arahkan admin ke dashboard admin
        if ($user->role === 'admin') {
            return redirect()->intended('/dashboard');
        }

        // SESUAIKAN DI SINI: Jika client login, arahkan ke rute client area Anda (misalnya '/client' atau '/proyek')
        // Jangan dilempar ke '/' jika halaman '/' tersebut dilindungi oleh auth middleware.
        return redirect()->intended('/'); 
    }
}
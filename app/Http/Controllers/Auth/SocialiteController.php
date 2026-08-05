<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
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

    public function callback(Request $request, $provider)
    {
        // 1. Validasi provider
        if (!in_array($provider, ['google', 'facebook'])) {
            return redirect()->route('login')->with('error', 'Metode login tidak didukung.');
        }

        // 2. CEK APABILA USER MEMBATALKAN OTORISASI / TERJADI ERROR DARI PROVIDER
        // Menghindari 400 Bad Request (Missing authorization code)
        if ($request->has('error') || !$request->has('code')) {
            return redirect()->route('login')->with('error', 'Login dibatalkan atau otorisasi ditolak.');
        }

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

            // 2. Jika belum, cek apakah email-nya sudah terdaftar
            $userByEmail = User::where('email', $email)->first(); 

            if ($userByEmail) {
                // Hubungkan akun yang sudah ada dengan provider sosial ini
                $userByEmail->update([
                    'provider_name' => $provider,
                    'provider_id'   => $socialUser->getId()
                ]);
                
                Auth::login($userByEmail);
                return $this->authenticatedRedirect();
            }

            // 3. Jika pengguna baru, buatkan akun baru
            $newUser = User::create([
                'name'          => $socialUser->getName() ?? $socialUser->getNickname() ?? 'User Geo',
                'email'         => $email,
                'provider_name' => $provider,
                'provider_id'   => $socialUser->getId(),
                'password'      => '123456', // Plain text untuk tugas kampus
                'role'          => 'client',
            ]);

            Auth::login($newUser);
            return $this->authenticatedRedirect();

        } catch (Exception $e) {
            // Untuk debugging masa pengembangan:
            dd('Gagal login via Socialite: ' . $e->getMessage() . ' di file ' . $e->getFile() . ' baris ' . $e->getLine());
        }
    }

    protected function authenticatedRedirect()
    {
        $user = Auth::user();

        // Arahkan admin ke dashboard admin
        if ($user && $user->role === 'admin') {
            return redirect()->intended('/dashboard');
        }

        return redirect()->intended('/'); 
    }
}
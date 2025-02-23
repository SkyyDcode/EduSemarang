<?php

namespace App\Services;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;

class AuthServices
{
    public function authenticate(Request $request)
    {
        try {
            // Cari user berdasarkan email
            $user = User::where('email', $request->email)->first();

            if (!$user) {
                return back()->withErrors([
                    'email' => 'Email tidak ditemukan.',
                ])->onlyInput('email');
            }

            // Debug log untuk memeriksa input
            Log::info('Login attempt for email: ' . $request->email);

            // Autentikasi dengan kredensial yang benar
            $credentials = [
                'email' => $request->email,
                'password' => $request->password
            ];

            if (Auth::attempt($credentials)) {
                $request->session()->regenerate();

                // Redirect berdasarkan level
                if ($user->level === 'admin') {
                    return redirect('/admin');
                }

                return redirect()->intended('/');
            }

            // Jika autentikasi gagal
            return back()->withErrors([
                'password' => 'Password tidak sesuai.',
            ])->onlyInput('email');

        } catch (\Exception $e) {
            Log::error('Login error: ' . $e->getMessage());
            return back()->withErrors([
                'email' => 'Terjadi kesalahan saat login.',
            ])->onlyInput('email');
        }
    }

    public function store(Request $request)
    {
        // Validasi dan simpan pengguna baru
        $validatedData = $request->validate([
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8',
        ]);

        // Hash password menggunakan bcrypt
        $user = User::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']), // Menggunakan Hash::make
            'level' => 'user' // default level
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }
}

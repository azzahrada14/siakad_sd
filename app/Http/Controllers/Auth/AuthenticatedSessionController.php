<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\View\View;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Halaman Login
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Proses Login
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'role' => ['required'],
        ]);

        $user = User::where('email', $request->email)->first();

        if (!$user) {
            return back()->withErrors([
                'email' => 'Email tidak ditemukan.',
            ])->withInput();
        }

        if (!Hash::check($request->password, $user->password)) {
            return back()->withErrors([
                'password' => 'Password salah.',
            ])->withInput();
        }

        // Cek role yang dipilih saat login
        if ($user->role != $request->role) {
            return back()->withErrors([
                'role' => 'Role yang dipilih tidak sesuai dengan akun.',
            ])->withInput();
        }

        Auth::login($user);

        $request->session()->regenerate();

        // Redirect sesuai role
        
        switch ($user->role) {

            case 'guru':
                return redirect()->route('guru.dashboard');

          case 'kepala_sekolah':
    return redirect()->route('dashboardKepala');

            case 'operator':
                return redirect()->route('dashboard');

            default:
                Auth::logout();

                return redirect()->route('login')
                    ->withErrors([
                        'email' => 'Role tidak dikenali.',
                    ]);
        }
    }

    /**
     * Logout
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}
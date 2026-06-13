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
        $user = User::where(
            'email',
            $request->email
        )->first();

        if (!$user) {

            return back()->withErrors([
                'email' => 'Email tidak ditemukan'
            ]);
        }

        if (!Hash::check(
            $request->password,
            $user->password
        )) {

            return back()->withErrors([
                'password' => 'Password salah'
            ]);
        }

        Auth::login($user);

        $request->session()->regenerate();

        if ($user->role == 'guru') {

            return redirect()->route(
                'guru.dashboard'
            );
        }

        if ($user->role == 'kepala_sekolah') {

            return redirect()->route(
                'kepala.dashboard'
            );
        }

        return redirect()->route(
            'dashboard'
        );
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
<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        $user = $request->user();

        if ($user->role === 'admin') {
            return redirect()->route('admin.dashboard');
        }

        return redirect()->route('dashboarduser');
    }

    /**
     * Destroy an authenticated session.
     */
public function destroy(Request $request): RedirectResponse
{
    // Hapus remember token dari database
    if (Auth::user()) {
        Auth::user()->setRememberToken(null);
        Auth::user()->save();
    }

    Auth::guard('web')->logout();

    $request->session()->invalidate();

    $request->session()->regenerateToken();

    // Hapus semua session data
    $request->session()->flush();

    // Hapus cookie remember
    $cookie = \Cookie::forget('remember_web');

    return redirect('/')->withCookie($cookie);
}
}

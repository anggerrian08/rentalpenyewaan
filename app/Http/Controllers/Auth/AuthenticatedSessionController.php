<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Models\LoginLogs;
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
    
        $user = Auth::user();
    
        if ($user->status == 'accepted') {
            $request->session()->regenerate();
    
            $user->update([
                'login_time' => now()->setTimezone('Asia/Jakarta'),
            ]);
    
            // Cek peran user
            if ($user->hasRole('admin')) {
                return redirect()->intended(route('dashboard')); // Halaman dashboard untuk admin
            } elseif ($user->hasRole('user')) {
                return redirect()->intended(route('halamanutama')); // Halaman utama untuk user
            } else {
                Auth::logout();
                return back()->withErrors([
                    'email' => 'Role tidak valid.',
                ]);
            }
        } elseif ($user->status == 'in_process') {
            Auth::logout();
            return back()->withErrors([
                'email' => 'Your account is not approved. Please contact support.',
            ]);
        } else {
            Auth::logout();
            return back()->withErrors([
                'email' => 'Akunmu ditolak!',
            ]);
        }
    }
    

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}

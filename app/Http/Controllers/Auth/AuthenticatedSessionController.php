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

        // $user = Auth::user();
        // $ip_address = $request->ip();

        // $detail_login = LoginLogs::where('user_id', $user->id)->where('ip_address', $ip_address)->first();
        // if($detail_login){
        //     $detail_login->update([
        //         'login_time' => now()->setTimezone('Asia/jakarta')
        //     ]);
        // }else{
        //     LoginLogs::create([
        //         'user_id' => $user->id,
        //         'ip_address' => $ip_address,
        //         'login_time' => now()->setTimezone('Asia/jakarta')
        //     ]);
        // }

        return redirect()->intended(route('dashboard', absolute: false));
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

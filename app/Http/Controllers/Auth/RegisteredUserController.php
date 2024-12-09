<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255', 'unique:users,email'],
            'photo' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
            'ktp' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
            'sim' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
            'nik' => ['required', 'string', 'max:255'],
            'birt_date' => ['required', 'date'],
            'jk' => ['required', 'in:laki-laki,perempuan'],
            'address' => ['required', 'string'],
            'phone_number' => ['required', 'string', 'max:15'],
            // 'status' => ['required', 'in:accepted,in_process,rejected'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);
        $photo = $request->file('photo');
        $photo->storeAs('uploads/photo', $photo->hashName(), 'public');
        $ktp = $request->file('ktp');
        $ktp->storeAs('uploads/ktp', $ktp->hashName(), 'public');
        $sim = $request->file('sim');
        $sim->storeAs('uploads/sim', $sim->hashName(), 'public');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'photo' => $photo->hashName(),
            'ktp' => $ktp->hashName(),
            'sim' => $sim->hashName(),
            'nik' => $request->nik,
            'birt_date' => $request->birt_date,
            'jk' => $request->jk,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
            'status' => 'accepted',
            'password' => Hash::make($request->password),
        ]);

        $user->assignRole('admin');

        event(new Registered($user));


        return redirect(route('login'));
    }
}

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
            'email' => ['required', 'string', 'email', 'lowercase', 'max:255', 'unique:users,email'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'photo' => ['required', 'image', 'mimes:jpg,png,jpeg' ,'max:2048'], // Maks 2MB
            'ktp' => ['required', 'image','mimes:jpg,png,jpeg', 'max:2048'], // Maks 2MB
            'sim' => ['required', 'image','mimes:jpg,png,jpeg', 'max:2048'], // Maks 2MB
            'nik' => ['required', 'string', 'max:16'],
            'birth_date' => ['required', 'date'],
            'jk' => ['required', 'in:laki-laki,perempuan'],
            'address' => ['required', 'string', 'max:255'],
            'phone_number' => ['required', 'string', 'max:15'],
        ]);

        // Upload files
        $photoPath = $request->file('photo');
        $photoPath->storeAs('photoprofile', $photoPath->hashName(),'public');

        $ktpPath = $request->file('ktp');
        $ktpPath->storeAs('photoktp', $ktpPath->hashName(), 'public');

        $simPath = $request->file('sim');
        $simPath->storeAs('photosim',$simPath->hashName(), 'public');

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'photo' => $photoPath->hashName(),
            'ktp' => $ktpPath->hashName(),
            'sim' => $simPath->hashName(),
            'nik' => $request->nik,
            'birth_date' => $request->birth_date,
            'jk' => $request->jk,
            'address' => $request->address,
            'phone_number' => $request->phone_number,
        ]);

        $user->assignRole('user');

        event(new Registered($user));

        return redirect(route('login'))->with('success', 'Registration successful. Please login.');
    }
}

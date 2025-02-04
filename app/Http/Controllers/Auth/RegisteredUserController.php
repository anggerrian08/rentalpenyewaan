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
        'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email'],
        'photo' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
        'ktp' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
        'sim' => ['required', 'image', 'mimes:jpg,png,jpeg', 'max:2048'],
        'nik' => ['required', 'string', 'max:255'],
        'birt_date' => ['required', 'date'],
        'jk' => ['required', 'in:laki-laki,perempuan'],
        'address' => ['required', 'string'],
        'phone_number' => ['required', 'string', 'max:15'],
        'password' => ['required', 'confirmed', Rules\Password::defaults()],
    ], [
        'name.required' => 'Nama tidak boleh kosong.',
        'name.string' => 'Nama harus berupa teks.',
        'name.max' => 'Nama tidak boleh lebih dari 255 karakter.',

        'email.required' => 'Email tidak boleh kosong.',
        'email.email' => 'Format email tidak valid.',
        'email.max' => 'Email tidak boleh lebih dari 255 karakter.',
        'email.unique' => 'Email sudah digunakan, gunakan email lain.',

        'photo.required' => 'Foto profil harus diunggah.',
        'photo.image' => 'File foto harus berupa gambar.',
        'photo.mimes' => 'Foto hanya boleh dalam format jpg, png, atau jpeg.',
        'photo.max' => 'Ukuran foto maksimal 2MB.',

        'ktp.required' => 'Foto KTP harus diunggah.',
        'ktp.image' => 'File KTP harus berupa gambar.',
        'ktp.mimes' => 'KTP hanya boleh dalam format jpg, png, atau jpeg.',
        'ktp.max' => 'Ukuran KTP maksimal 2MB.',

        'sim.required' => 'Foto SIM harus diunggah.',
        'sim.image' => 'File SIM harus berupa gambar.',
        'sim.mimes' => 'SIM hanya boleh dalam format jpg, png, atau jpeg.',
        'sim.max' => 'Ukuran SIM maksimal 2MB.',

        'nik.required' => 'NIK tidak boleh kosong.',
        'nik.string' => 'NIK harus berupa teks.',
        'nik.max' => 'NIK tidak boleh lebih dari 255 karakter.',

        'birt_date.required' => 'Tanggal lahir tidak boleh kosong.',
        'birt_date.date' => 'Format tanggal lahir tidak valid.',

        'jk.required' => 'Jenis kelamin tidak boleh kosong.',
        'jk.in' => 'Jenis kelamin harus diisi dengan "laki-laki" atau "perempuan".',

        'address.required' => 'Alamat tidak boleh kosong.',
        'address.string' => 'Alamat harus berupa teks.',

        'phone_number.required' => 'Nomor telepon tidak boleh kosong.',
        'phone_number.string' => 'Nomor telepon harus berupa teks.',
        'phone_number.max' => 'Nomor telepon tidak boleh lebih dari 15 karakter.',

        'password.required' => 'Kata sandi tidak boleh kosong.',
        'password.confirmed' => 'Konfirmasi kata sandi tidak cocok.',
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

        $user->assignRole('user');

        event(new Registered($user));


        return redirect(route('login'));
    }
}

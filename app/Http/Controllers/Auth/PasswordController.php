<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules\Password;

class PasswordController extends Controller
{
    /**
     * Update the user's password.
     */
    public function update(Request $request): RedirectResponse
    {
        // Buat validator dengan pesan kustom untuk error current_password
        $validator = Validator::make($request->all(), [
            'current_password' => ['required', 'current_password'],
            'password' => ['required', Password::defaults(), 'confirmed'],
        ], [
            'current_password.current_password' => 'Password lama yang Anda masukkan salah.',
        ]);

        // Jika validasi gagal, periksa apakah error di current_password dan return back dengan error message
        if ($validator->fails()) {
            if ($validator->errors()->has('current_password')) {
                return back()
                    ->withErrors($validator, 'updatePassword')
                    ->with('error', 'Password lama yang Anda masukkan salah.');
            }
            return back()->withErrors($validator, 'updatePassword');
        }

        // Validasi berhasil, ambil data yang tervalidasi
        $validated = $validator->validated();

        // Update password user di database
        $request->user()->update([
            'password' => Hash::make($validated['password']),
        ]);

        // Redirect dengan pesan success
        return back()->with('success', 'Password berhasil diperbarui.');
    }
}

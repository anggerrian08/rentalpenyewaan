<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Log;

class ChangePassword extends Controller
{
    public function update(Request $request)
    {
        // Validasi input dari form
        try {
        $request->validate([
            'current_password' => ['required'], // Password lama wajib diisi
            'password' => ['required', 'confirmed', Password::defaults()], // Password baru wajib, harus dikonfirmasi, dan sesuai aturan Laravel
        ]);

            // Cek apakah password lama cocok dengan password user saat ini
            if (!Hash::check($request->current_password, $request->user()->password)) {
                return back()->with(['current_password' => 'Password lama tidak sesuai.']);
            }

            // Update password user di database
            $request->user()->update([
                'password' => Hash::make($request->password),
            ]);

            // Redirect dengan pesan sukses
            return back()->with('success', 'Password berhasil diperbarui.');
        } catch (\Throwable $e) {
            // Log error untuk debugging
            // Log::error('Gagal memperbarui password: ' . $e->getMessage());

            // Redirect dengan pesan error
            return back()->with(['error' => 'Terjadi kesalahan saat memperbarui password. Silakan coba lagi.']);
        }
    }
}

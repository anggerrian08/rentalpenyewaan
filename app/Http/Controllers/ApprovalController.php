<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ApprovalController extends Controller
{
    public function index(Request $request)
    {
        $request->validate([
            'input' => 'nullable|string|max:30'
        ]);

        $input = $request->input('input');

        // Query untuk mendapatkan pengguna dengan status 'in_process'
        $userQuery = User::where('status', '!=','accepted');

        // Jika ada input pencarian, tambahkan kondisi pencarian
        if ($input) {
            $userQuery->where(function($query) use ($input) {
                $query->orWhere('name', 'LIKE', '%' . $input . '%');
            });
        }

        // Paginate hasil
        $user = $userQuery->paginate(8);

        return view('aproval.index', compact('user'));
    }
    public function show($id)
    {
        $user = User::find($id); // Mengambil data user berdasarkan ID
        if (!$user) {
            return redirect()->back()->with('error', 'Data user tidak ditemukan.');
        }

    }

    public function destroy(string $id){
        $user_id = User::findOrFail($id);
        $user_id->delete();
        Storage::disk('public')->delete('uploads/photo/'. $user_id->photo);
        return back()->with('success', 'berhasil hapus user');
    }

    public function accepted(Request $request, $id)
    {
        // Temukan pengguna berdasarkan ID
        $user = User::find($id);
        
        // Cek apakah pengguna ditemukan
        if (!$user) {
            return redirect()->back()->with('error', 'Data user tidak ditemukan.');
        }
    
        // Ubah status pengguna menjadi 'accepted'
        $user->update([
            'status' => 'accepted'
        ]);
        $user->save(); // Simpan perubahan
    
        // Redirect kembali dengan pesan sukses
        return redirect()->route('aproval.index')->with('success', 'Status pengguna berhasil diubah menjadi accepted.');
    }
    public function rejected(Request $request, $id)
    {
        // Temukan pengguna berdasarkan ID
        $user = User::find($id);
        
        // Cek apakah pengguna ditemukan
        if (!$user) {
            return redirect()->back()->with('error', 'Data user tidak ditemukan.');
        }
    
        // Ubah status pengguna menjadi 'accepted'
        $user->update([
            'status' => 'rejected'
        ]);
        $user->save(); // Simpan perubahan
    
        // Redirect kembali dengan pesan sukses
        return redirect()->route('aproval.index')->with('success', 'Status pengguna berhasil diubah menjadi accepted.');
    }
    
}

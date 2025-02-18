<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil parameter pencarian dan filter dari request
        $search = $request->input('search');
        $gender = $request->input('gender');

        // Query untuk mendapatkan pengguna dengan peran 'user'
        $query = User::role('user')->where('status', 'accepted');

        // Jika ada pencarian berdasarkan email
        if ($search) {
            $query->where('email', 'LIKE', '%' . $search . '%');
        }

        // Jika ada filter berdasarkan jenis kelamin
        if ($gender) {
            $query->where('jk', $gender);
        }

        // Paginate hasil
        $data = $query->paginate(5)->appends(request()->query());

        return view('user.index', compact('data'));
    }

    public function show(string $id)
    {
        $user = User::find($id); // Mengambil data user berdasarkan ID
        if (!$user) {
            return redirect()->back()->with('error', 'Data user tidak ditemukan.');
        }
    }
    public function destroy(string $id)
    {
            $user_id = User::findOrFail($id);
            $user_id->delete();
            Storage::disk('public')->delete('uploads/photo/'. $user_id->photo);
            return back()->with('success', 'berhasil hapus user');
    }
}

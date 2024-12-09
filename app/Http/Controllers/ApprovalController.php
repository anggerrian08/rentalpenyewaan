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
        $userQuery = User::where('status', 'in_process');

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
    public function destroy(string $id){
        $user_id = User::findOrFail($id);
        $user_id->delete();
        Storage::disk('public')->delete('uploads/photo/'. $user_id->photo);
        return back()->with('success', 'berhasil hapus user');
    }
}

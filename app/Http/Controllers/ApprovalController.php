<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ApprovalController extends Controller
{
    public function index(Request $request)
    {
      $data = Booking::with('user', 'car')->get();
      return view('aproval.index', compact('data'));
    }
    // public function show($id)
    // {
    //     $user = User::find($id); // Mengambil data user berdasarkan ID
    //     if (!$user) {
    //         return redirect()->back()->with('error', 'Data user tidak ditemukan.');
    //     }

    // }

    // public function destroy(string $id){
    //     $user_id = User::findOrFail($id);
    //     $user_id->delete();
    //     Storage::disk('public')->delete('uploads/photo/'. $user_id->photo);
    //     return back()->with('success', 'berhasil hapus user');
    // }

    public function accepted(Request $request, $id)
    {
        // Temukan pengguna berdasarkan ID
        $Booking = Booking::find($id);
        
        // Cek apakah pengguna ditemukan
        if (!$Booking) {
            return redirect()->back()->with('error', 'Data user tidak ditemukan.');
        }
    
        // Ubah status pengguna menjadi 'accepted'
        $Booking->update([
            'status' => 'borrowed'
        ]);
        $Booking->save(); // Simpan perubahan
        // Redirect kembali dengan pesan sukses
        return redirect()->route('aproval.index')->with('success', 'Status pengguna berhasil diubah menjadi accepted.');
    }
    public function rejected(Request $request, $id)
    {
        // Temukan pengguna berdasarkan ID
        $Booking = Booking::find($id);
        // Cek apakah pengguna ditemukan
        if (!$Booking) {
            return redirect()->back()->with('error', 'Data user tidak ditemukan.');
        }
        // Ubah status pengguna menjadi 'accepted'
        $Booking->update([
            'status' => 'rejected'
        ]);
        $Booking->save(); // Simpan perubahan
    
        // Redirect kembali dengan pesan sukses
        return redirect()->route('aproval.index')->with('success', 'Status pengguna berhasil diubah menjadi accepted.');
    }
    public function returned(Request $request, string $id){
        $booking = Booking::findOrFail($id);

        // Update status menjadi returned
        $booking->update([
            'status' => 'returned',
        ]);
    
        // Cari mobil terkait berdasarkan car_id di tabel booking
        $car = Car::findOrFail($booking->car_id);
    
        // Tambahkan stok mobil sebesar 1
        $car->update([
            'stock' => $car->stock + 1,
        ]);
    
        return back()->with('success', 'Status berhasil diperbarui menjadi returned, dan stok mobil bertambah.');
    }
}

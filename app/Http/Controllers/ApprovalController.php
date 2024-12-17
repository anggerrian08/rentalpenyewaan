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
        // Menampilkan data booking dengan relasi ke user dan car
        $data = Booking::with('user', 'car')->paginate(10); // Menggunakan pagination
        return view('aproval.index', compact('data'));
    }

    // Fungsi untuk menerima (approve) booking
    public function accepted(string $id)
    {
        $booking = Booking::find($id);

        if (!$booking) {
            return redirect()->back()->with('error', 'Data booking tidak ditemukan.');
        }

        $booking->update([
            'status' => 'borrowed',  // Ubah status menjadi borrowed
        ]);

        $booking->save(); // Simpan perubahan
        return redirect()->route('aproval.index')->with('success', 'Status booking berhasil diubah menjadi borrowed.');
    }

    // Fungsi untuk menolak (reject) booking
    public function rejected(Request $request, $id)
    {
        $booking = Booking::find($id);
        
        if (!$booking) {
            return redirect()->back()->with('error', 'Data booking tidak ditemukan.');
        }

        $booking->update([
            'status' => 'rejected', // Ubah status menjadi rejected
        ]);

        $car = Car::findOrFail($booking->car_id);
        
        // Tambahkan stok mobil yang dikembalikan
        $car->update([
            'stock' => $car->stock + 1,
        ]);

        $booking->save(); // Simpan perubahan
        return redirect()->route('aproval.index')->with('success', 'Status booking berhasil diubah menjadi rejected.');
    }

    // Fungsi untuk mengubah status booking menjadi returned (dikembalikan)
    public function returned(Request $request, string $id)
    {
        $booking = Booking::findOrFail($id);
        $booking->update([
            'status' => 'returned', // Ubah status menjadi returned
        ]);

        $car = Car::findOrFail($booking->car_id);
        
        // Tambahkan stok mobil yang dikembalikan
        $car->update([
            'stock' => $car->stock + 1,
        ]);

        return back()->with('success', 'Status booking berhasil diperbarui menjadi returned, dan stok mobil bertambah.');
    }
}

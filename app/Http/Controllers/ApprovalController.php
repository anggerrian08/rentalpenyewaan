<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use App\Models\DetailPembayaran;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Storage;

class ApprovalController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil data filter dan pencarian
        $filter = $request->input('filter');
        $search = $request->input('search');
    
        // Query dasar
        $query = Booking::with('user', 'car');
    
        // Filter berdasarkan email (A-Z, Z-A)
        if ($filter === 'a-z') {
            $query->orderBy(User::select('email')->whereColumn('users.id', 'bookings.user_id'), 'asc');
        } elseif ($filter === 'z-a') {
            $query->orderBy(User::select('email')->whereColumn('users.id', 'bookings.user_id'), 'desc');
        }
    
        // Pencarian berdasarkan email
        if ($search) {
            $query->whereHas('user', function ($q) use ($search) {
                $q->where('email', 'like', "%{$search}%");
            });
        }
    
        // Menggunakan pagination
        $data = $query->paginate(10);
    
        return view('aproval.index', compact('data', 'filter', 'search'));
    }
    

    public function show(string $id){
        $aproval = DetailPembayaran::with('booking')->findOrFail($id);
        return view('aproval.show', compact('aproval'));
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

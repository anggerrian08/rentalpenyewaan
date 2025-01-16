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
        
        // Ambil data booking dengan pagination
        $bookings = $query->paginate(10);
        
        // Iterasi melalui setiap booking untuk menghitung denda dan status
        foreach ($bookings as $booking) {
            $tanggal_pengembalian = strtotime(date('Y-m-d', strtotime($booking->return_date)));
            $tanggal_sekarang = strtotime(date('Y-m-d', strtotime(now())));
    
            $denda = 0;
            $status = $booking->status;
    
            // Jika status bukan "returned", kita hitung denda
            if ($status == 'late') {
                if ($tanggal_sekarang > $tanggal_pengembalian) {
                    $selisih_hari = ($tanggal_sekarang - $tanggal_pengembalian) / (60 * 60 * 24);
                    $denda_per_hari = 50000;
                    $denda = $selisih_hari * $denda_per_hari;
                    
                    // Ubah status menjadi "late" jika terlambat
                    if ($status !== 'returned') {
                        $status = 'late';
                    }
                }
            }
    
            // Jika ada perubahan pada denda atau status, update
            if ($booking->denda != $denda || $booking->status != $status) {
                $booking->denda = $denda;
                $booking->status = $status;
                $booking->save();
            }
        }
    
        // Kirim data booking ke view
        return view('aproval.index', ['data' => $bookings, 'filter' => $filter, 'search' => $search]);
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
    
        // Jika booking sudah dikembalikan, tidak bisa diubah lagi
        if ($booking->status == 'returned') {
            return redirect()->route('aproval.index')->with('error', 'Booking sudah dikembalikan.');
        }
    
        // Reset denda ketika status diubah ke 'returned'
        $booking->denda = 0;  // Reset denda ke 0
        $booking->status = 'returned';  // Ubah status menjadi 'returned'
        
        $booking->save();  // Simpan perubahan
        
        return redirect()->route('aproval.index')->with('success', 'Booking berhasil dikembalikan.');
    }
    
    

    // public function pay(Request $request, $id)
    // {
    //     // Validasi input jumlah pembayaran
    //     $request->validate([
    //         'amount' => 'required|numeric|min:1',
    //     ]);
        
    //     // Cari data booking berdasarkan ID
    //     $aproval = Booking::findOrFail($id);
        
    //     // Periksa status booking
    //     if ($aproval->status === 'late') {
    //         // Jika statusnya 'late', beritahu pengguna untuk mengembalikan mobil terlebih dahulu
    //         return back()->with(['error' => 'Anda harus mengembalikan mobil terlebih dahulu sebelum melakukan pembayaran denda.']);
    //     }
    
    //     // Pastikan hanya mengurangi denda jika status belum "returned"
    //     if ($aproval->status !== 'returned') {
    //         // Cek jika jumlah pembayaran lebih dari denda
    //         if ($request->amount > $aproval->denda) {
    //             return back()->withErrors(['amount' => 'Jumlah pembayaran melebihi total denda!']);
    //         }
    
    //         // Kurangi denda berdasarkan jumlah yang dibayarkan
    //         $aproval->denda -= $request->amount;
        
    //         // Jika denda lunas, ubah status menjadi "paid" atau status lain yang sesuai
    //         if ($aproval->denda <= 0) {
    //             $aproval->denda = 0;
    //             $aproval->status = 'paid';
    //         }
    
    //         // Simpan perubahan
    //         $aproval->save();
        
    //         // Redirect dengan pesan sukses
    //         return redirect()->route('aproval.index')->with('success', 'Pembayaran berhasil!');
    //     } else {
    //         return back()->withErrors(['error' => 'Booking sudah dikembalikan, tidak dapat melakukan pembayaran denda.']);
    //     }
    // }
}

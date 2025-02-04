<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use App\Models\DetailPembayaran;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ApprovalController extends Controller
{
    public function index(Request $request)
    {
        // Mengambil data filter dan pencarian
        $filter = $request->input('filter');
        $search = $request->input('search');
        $filter_no_telpon = $request->input('filter_no_telpon');
        $filter_status = $request->input('filter_status');
    
        // Query dasar
        $query = Booking::query()
            ->select('bookings.*')
            ->with('user', 'car')
            ->leftJoin('users', 'users.id', '=', 'bookings.user_id')
            ->orderByRaw("CASE WHEN bookings.status = 'in_process' THEN 1 ELSE 2 END");
    
        // Filter berdasarkan email (A-Z, Z-A)
        if ($filter === 'a-z') {
            $query->orderBy('users.email', 'asc');
        } elseif ($filter === 'z-a') {
            $query->orderBy('users.email', 'desc');
        }
    
        // Filter berdasarkan nomor telepon
        if ($filter_no_telpon) {
            $query->where('users.phone_number', 'like', "%{$filter_no_telpon}%");
        }
    
        // Filter berdasarkan status
        if ($filter_status) {
            $query->where('bookings.status', $filter_status);
        }
    
        // Pencarian berdasarkan email
        if ($search) {
            $query->where('users.email', 'like', "%{$search}%");
        }
    
        // Auto-reject jika "in_process" lebih dari 2 hari
        Booking::where('status', 'in_process')
            ->whereRaw('DATEDIFF(NOW(), order_date) > 2')
            ->update(['status' => 'rejected']);
    
        // Ubah status ke "late" hanya jika sudah lewat 1 hari penuh dari return_date
        Booking::where('status', 'borrowed')
            ->whereRaw('DATEDIFF(NOW(), return_date) >= 1')
            ->update(['status' => 'late']);
    
        // Hitung denda jika status sudah "late" dan lebih dari 1 hari dari return_date
        Booking::where('status', 'late')
            ->whereRaw('DATEDIFF(NOW(), return_date) >= 1')
            ->update([
                'denda' => DB::raw('FLOOR(TIMESTAMPDIFF(DAY, return_date, NOW()) * 50000)')
            ]);
    
        // Ambil data booking dengan pagination
        $bookings = $query->paginate(10);
    
        return view('aproval.index', compact(
            'bookings', 'filter', 'search', 'filter_no_telpon', 'filter_status'
        ));
    }
    

    public function show(string $id){
        $aproval = DetailPembayaran::with('booking')->findOrFail($id);
        return view('aproval.show', compact('aproval'));
    }

    // Fungsi untuk menerima (approve) booking
    public function accepted(Request $request, string $id)
    {
        // Cari booking berdasarkan ID
        $booking = Booking::findOrFail($id);
        
        // Cari mobil terkait
        $car = Car::findOrFail($booking->car_id);
    
        // Jika booking tidak ditemukan atau mobil tidak ditemukan
        if (!$booking || !$car) {
            return redirect()->back()->with('error', 'Data booking atau mobil tidak ditemukan.');
        }
    
        // Ubah status booking menjadi "borrowed"
        $booking->update([
            'status' => 'borrowed',
        ]);
    
        // Kurangi stok mobil
        $car->stock -= 1;
        $car->save();
    
        // Cari semua booking lain untuk mobil yang sama dengan status "proses"
        $otherBookings = Booking::where('car_id', $booking->car_id)
            ->where('status', 'in_process') // Status "proses" adalah status awal sebelum disetujui
            ->where('id', '!=', $id)   // Jangan termasuk booking yang disetujui
            ->get();
    
        // Ubah status booking lain menjadi "rejected"
        foreach ($otherBookings as $otherBooking) {
            $otherBooking->update([
                'status' => 'rejected',
            ]);
        }
    
        return redirect()->route('aproval.index')->with('success', 'Booking berhasil disetujui dan booking lain untuk mobil ini telah ditolak.');
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
        // $car->update([
        //     'stock' => $car->stock + 1,
        // ]);

        $booking->save(); // Simpan perubahan
        return redirect()->route('aproval.index')->with('success', 'Status booking berhasil diubah menjadi rejected.');
    }

    // Fungsi untuk mengubah status booking menjadi returned (dikembalikan)
    public function returned(Request $request, string $id)
    {
        $booking = Booking::findOrFail($id);
        $car = Car::findOrFail($booking->car_id);
    
        // Jika booking sudah dikembalikan, tidak bisa diubah lagi
        if ($booking->status == 'returned') {
            return redirect()->route('aproval.index')->with('error', 'Booking sudah dikembalikan.');
        }

    
        // Reset denda ketika status diubah ke 'returned'
        $booking->denda = 0;  // Reset denda ke 0
        $booking->status = 'returned';  // Ubah status menjadi 'returned'

          $car->update([
            'stock' => $car->stock + 1,
        ]);
        
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

<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Models\Car;
use App\Models\DetailPembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{

    public function index()
    {
        $cars = Car::paginate(8);
        // Ambil semua data booking

        if (Auth::user()->hasRole('admin')) {
            // Jika admin, tampilkan semua booking
            $bookings = Booking::all();
        } else {
            // Jika bukan admin (user biasa), tampilkan hanya booking milik user yang sedang login
            $bookings = Booking::where('user_id', Auth::id())->get();
        }

        // Iterasi melalui setiap booking untuk menghitung denda dan status
        foreach ($bookings as $booking) {


            // Ambil tanggal pengembalian dan tanggal saat ini (tanpa waktu)
            $tanggal_pengembalian = strtotime(date('Y-m-d', strtotime($booking->return_date)));
            $tanggal_sekarang = strtotime(date('Y-m-d', strtotime(now()))); // Tanggal saat ini tanpa waktu



            // Inisialisasi denda dan status
            $denda = 0;


            $status = $booking->status;

            // Cek apakah sudah terlambat
            if ($tanggal_sekarang > $tanggal_pengembalian) {


                // Hitung selisih hari terlambat
                $selisih_hari = ($tanggal_sekarang - $tanggal_pengembalian) / (60 * 60 * 24); // Menghitung perbedaan hari

                // Tentukan denda per hari


                $denda_per_hari = 50000;
                $denda = $selisih_hari * $denda_per_hari; // Denda berdasarkan jumlah hari terlambat

                // Jika status bukan 'returned', ubah status menjadi 'late'


                if ($status !== 'returned') {
                    $status = 'late';
                }
            } else {
                // Jika pengembalian tidak terlambat, pastikan statusnya 'in_process'
                if ($status !== 'returned') {


                    $status = 'in_process';
                }
            }



            // Jika denda atau status berubah, simpan perubahan ke database
            if ($booking->denda != $denda || $booking->status != $status) {
                $booking->denda = $denda;
                $booking->status = $status;
                $booking->save(); // Simpan perubahan
            }
        }

        // Kirim data booking ke view
        return view('bookings.index', compact('bookings','cars'));
    }
    public function create()
    {
        $booking = Booking::all();
        $users = User::all();
        $cars = Car::all();
        return view('bookings.create', compact('booking', 'users', 'cars'));
    }

    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'order_date' => 'required|date',
            'return_date' => 'required|date|after:order_date',
        ]);

        // Cek stok mobil
        $car = Car::findOrFail($request->car_id);

        if ($car->stock <= 0) {
            return back()->with('error', 'Mobil ini tidak tersedia untuk dipinjam saat ini.');
        }

        // Ambil user yang sedang login
        $user = Auth::user();

        // Hitung jumlah hari pinjam
        $orderDate = strtotime($request->order_date);
        $returnDate = strtotime($request->return_date);
        $days = ceil(($returnDate - $orderDate) / 86400); // Konversi ke hari

        // Hitung total harga (harga mobil * jumlah hari)
        $totalPrice = $car->price * $days;

        // Simpan data bookingPwebP

        $booking = Booking::create([
            'user_id' => $user->id,
            'car_id' => $request->car_id,
            'order_date' => $request->order_date,
            'return_date' => $request->return_date,
            'status' => 'in_process', // Status default
            'ktp' => $request->ktp,
            'sim' => $request->sim,
        ]);

        // Simpan data detail pembayaran
        DetailPembayaran::create([
            'booking_id' => $booking->id, // Menggunakan booking yang baru saja dibuat
            'rental_duration_days' => $days,
            'total_price' => $totalPrice,
        ]);

        // Kurangi stok mobil
        $car->stock -= 1;
        $car->save();


        return redirect()->route('bookings.index')->with('success', 'Booking berhasil ditambahkan.');
    }




    /**
     * Display the specified booking.
     */
    // public function show(Booking $booking)
    // {
    //     return view('bookings.show', compact('booking'));
    // }

    /**
     * Show the form for editing the specified booking.
     */
    // public function edit(Booking $booking)
    // {
    //     $users = User::all();
    //     $cars = Car::all();
    //     return view('bookings.edit', compact('booking', 'users', 'cars'));
    // }

    /**
     * Update the specified booking in storage.
     */
    public function update(Request $request, Booking $booking)
    {
        // Validasi data
        $validated = $request->validate([
            'user_id' => 'required|exists:users,id',
            'car_id' => 'required|exists:cars,id',
            'ktp' => 'nullable|string',
            'sim' => 'nullable|string',
            'order_date' => 'required|date',
            'return_date' => 'required|date|after:order_date',
            'status' => 'required|in:returned,in_process,borrowed,late',
        ]);

        // Update data
        $booking->update($validated);

        return redirect()->route('bookings.index')->with('success', 'Booking berhasil diperbarui.');
    }

    /**
     * Remove the specified booking from storage.
     */
    public function destroy(Booking $booking)
    {
        $booking->delete();
        return redirect()->route('bookings.index')->with('success', 'Booking berhasil dihapus.');
    }

    public function proses_pengembalian(Request $request, string $id)
    {
        $booking = Booking::findOrFail($id);

        // Update status menjadi in_process
        $booking->update([
            'status' => 'in_process',
        ]);

        return back()->with('success', 'Status berhasil diperbarui menjadi in_process.');
    }
}

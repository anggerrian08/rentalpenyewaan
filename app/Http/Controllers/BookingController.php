<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Models\Car;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BookingController extends Controller
{
    /**
     * Display a listing of the bookings.
     */
    public function index()
    {
        // Ambil semua data booking beserta relasi user dan car
        $bookings = Booking::with(['user', 'car'])->get();
        return view('bookings.index', compact('bookings'));
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
    
        // Cek tanggal manual (opsional)
        if (strtotime($request->order_date) >= strtotime($request->return_date)) {
            return back()->with('error', 'Tanggal kembali tidak boleh lebih kecil atau sama dengan tanggal order.');
        }
    
        // Ambil user yang sedang login
        $user = Auth::user();
    
        // Simpan data booking
        Booking::create([
            'user_id' => $user->id,
            'car_id' => $request->car_id,
            'order_date' => $request->order_date,
            'return_date' => $request->return_date,
            'status' => 'in_process', // Status default
        ]);
    
        // Kurangi stok mobil
        $car->stock -= 1;
        $car->save();
    
        return redirect()->route('bookings.index')->with('success', 'Booking berhasil ditambahkan.');
    }
    
    
    /**
     * Display the specified booking.
     */
    public function show(Booking $booking)
    {
        return view('bookings.show', compact('booking'));
    }

    /**
     * Show the form for editing the specified booking.
     */
    public function edit(Booking $booking)
    {
        $users = User::all();
        $cars = Car::all();
        return view('bookings.edit', compact('booking', 'users', 'cars'));
    }

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
}

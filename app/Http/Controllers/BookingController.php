<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\User;
use App\Models\Car;
use Illuminate\Http\Request;

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

    /**
     * Show the form for creating a new booking.
     */
    public function create()
    {
        // Ambil data user dan car untuk dropdown
        $users = User::all();
        $cars = Car::all();
        return view('bookings.create', compact('users', 'cars'));
    }

    /**
     * Store a newly created booking in storage.
     */
    public function store(Request $request)
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

        // Simpan data
        Booking::create($validated);

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

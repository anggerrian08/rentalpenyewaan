<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Booking;
class PemesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::paginate(8);
        return view('pemesanan',compact('cars'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    public function search(Request $request)
{
    // Validasi input
    $request->validate([
        'order_date' => 'nullable|date',
        'return_date' => 'nullable|date|after_or_equal:order_date',
    ]);

    // Query filter
    $query = Booking::query();

    if ($request->order_date) {
        $query->where('order_date', '>=', $request->order_date);
    }

    if ($request->return_date) {
        $query->where('return_date', '<=', $request->return_date);
    }

    // Ambil hasil filter
    $bookings = $query->get();

    // Return hasil ke view
    return view('pemesanan.index', compact('bookings'));
}

}

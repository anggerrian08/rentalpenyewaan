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
    public function index(Request $request)
    {
        // Ambil filter dari input (GET parameters)
        $orderDate = $request->input('order_date'); // Tanggal pinjam
        $returnDate = $request->input('return_date'); // Tanggal kembali
    
        // Query dasar
        $query = Booking::with('car', 'user')
            ->whereIn('status', ['borrowed', 'late'])
            ->whereHas('user', function ($query) {
                $query->where('id', auth()->id());
            });
    
        // Tambahkan filter berdasarkan rentang tanggal jika input ada
        if ($orderDate && $returnDate) {
            $query->whereBetween('order_date', [$orderDate, $returnDate])
                  ->orWhereBetween('return_date', [$orderDate, $returnDate]);
        }
    
        // Eksekusi query dengan pagination
        $cars = $query->paginate(8);
    
        return view('pemesanan', compact('cars'));
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
  
    

}

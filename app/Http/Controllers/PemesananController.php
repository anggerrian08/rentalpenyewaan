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
    
        // Ambil semua mobil
        $cars = Car::with('booking');
    
        if ($orderDate && $returnDate) {
            $cars = $cars->whereDoesntHave('booking', function ($query) use ($orderDate, $returnDate) {
                $query->where('status', 'borrowed') // Hanya booking yang statusnya "borrowed"
                      ->where(function ($q) use ($orderDate, $returnDate) {
                          $q->whereBetween('order_date', [$orderDate, $returnDate]) // Cek jika order_date ada di range filter
                            ->orWhere(function ($q) use ($orderDate, $returnDate) {
                                // Jika return_date user berada di bawah atau sama dengan return_date booking, maka mobil tidak ditampilkan
                                $q->where('return_date', '>=', $returnDate);
                            })
                            ->orWhere(function ($q) use ($orderDate, $returnDate) {
                                // Jika filter order_date masuk dalam range booking, maka mobil tidak ditampilkan
                                $q->where('order_date', '<=', $orderDate)
                                  ->where('return_date', '>=', $returnDate);
                            });
                      });
            });
        }
        
    
    
        // Paginate hasilnya
        $cars = $cars->paginate(8)->appends(request()->query());
    
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
        
    }
  
    

}

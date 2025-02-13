<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Car;
use App\Models\Favorite;
use App\Models\CarLikes;
use Illuminate\Support\Facades\Auth;

class FavoritController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        // Ambil filter dari input (GET parameters)
        $orderDate = $request->input('order_date'); // Tanggal pinjam
        $returnDate = $request->input('return_date'); // Tanggal kembali
        $carId = $request->input('car_id'); // ID Mobil (jika ada filter)
        $userId = Auth::id(); // ID user yang sedang login
    
        // Query mobil favorit berdasarkan user
        $cars = CarLikes::with('car') // Include relasi ke mobil
            ->where('user_id', $userId) // Hanya mobil yang disukai oleh user
            ->when($carId, function ($query) use ($carId) {
                return $query->where('car_id', $carId);
            })
            ->when($returnDate, function ($query) use ($returnDate) {
                $query->whereHas('car', function ($carQuery) use ($returnDate) {
                    $carQuery->whereDoesntHave('booking', function ($bookingQuery) use ($returnDate) {
                        $bookingQuery->where('status', 'borrowed')
                                     ->where('return_date', '>=', $returnDate);
                    });
                });
            })
            ->paginate(8)
            ->appends(request()->query()); // Menjaga parameter GET saat paginasi
    
        return view('favorit', compact('cars'));
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
         // Validasi input
         $request->validate([
            'car_id' => 'required|exists:cars,id',
        ]);

        // Cek apakah mobil sudah ada di favorit pengguna
        $exists = Favorite::where('user_id', Auth::id())
                          ->where('car_id', $request->car_id)
                          ->exists();

        if ($exists) {
            return redirect()->back()->with('error', 'Mobil sudah ada di favorit Anda!');
        }

        // Tambahkan ke favorit
        Favorite::create([
            'user_id' => Auth::id(),
            'car_id' => $request->car_id,
        ]);

        return redirect()->back()->with('success', 'Mobil berhasil ditambahkan ke favorit!');
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

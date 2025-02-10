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
    public function index()
    {
        $user_id = Auth::user()?->id;
        $data = CarLikes::with('user', 'car')->where('user_id', $user_id)->paginate(8);
        return view('favorit',compact('data'));
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

<?php

namespace App\Http\Controllers;

use App\Models\DetailPembayaran;
use Illuminate\Http\Request;

class DetailPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $search = $request->input('search'); // Ambil input pencarian
    
        // Ambil data dengan relasi booking dan filter berdasarkan email jika ada pencarian
        $data = DetailPembayaran::with('booking.user')
            ->when($search, function ($query, $search) {
                $query->whereHas('booking.user', function ($query) use ($search) {
                    $query->where('email', 'like', '%' . $search . '%');
                });
            })
            ->get();
    
        return view('detail_pembayarans.index', compact('data', 'search'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    // public function create()
    // {
    //     return view('detail_pembayarans.create');
    // }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'booking_id' => 'required|exists:bookings,id',
            'rental_duration_days' => 'required|integer|min:1',
            'total_price' => 'required|numeric|min:0',
        ]);

        DetailPembayaran::create($request->all());

        return redirect()->route('detail-pembayarans.index')->with('success', 'Detail pembayaran berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     */
    public function show(DetailPembayaran $detailPembayaran)
    {
        return view('detail_pembayarans.show', compact('detailPembayaran'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    // public function edit(DetailPembayaran $detailPembayaran)
    // {
    //     return view('detail_pembayarans.edit', compact('detailPembayaran'));
    // }

    /**
     * Update the specified resource in storage.
     */
    // public function update(Request $request, DetailPembayaran $detailPembayaran)
    // {
    //     $request->validate([
    //         'rental_duration_days' => 'required|integer|min:1',
    //         'total_price' => 'required|numeric|min:0',
    //     ]);

    //     $detailPembayaran->update($request->all());

    //     return redirect()->route('detail-pembayarans.index')->with('success', 'Detail pembayaran berhasil diperbarui.');
    // }

    /**
     * Remove the specified resource from storage.
     */
    // public function destroy(DetailPembayaran $detailPembayaran)
    // {
    //     $detailPembayaran->delete();

    //     return redirect()->route('detail-pembayarans.index')->with('success', 'Detail pembayaran berhasil dihapus.');
    // }
}

<?php

namespace App\Http\Controllers;

use App\Models\DetailPembayaran;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;

class DetailPembayaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index(Request $request)
    // {
    //     $search = $request->input('search'); // Pencarian berdasarkan email
    //     $min_price = $request->input('min_price'); // Harga minimal
    //     $max_price = $request->input('max_price'); // Harga maksimal
    
    //     // Ambil data dengan relasi booking dan filter berdasarkan email serta rentang harga
    //     $data = DetailPembayaran::with('booking.user')
    //         ->when($search, function ($query, $search) {
    //             $query->whereHas('booking.user', function ($query) use ($search) {
    //                 $query->where('email', 'like', '%' . $search . '%');
    //             });
    //         })
    //         ->when($min_price && $max_price, function ($query) use ($min_price, $max_price) {
    //             $query->whereBetween('total_price', [$min_price, $max_price]);
    //         })
    //         ->get()
    //         ->map(function ($item) {
    //             // Tambahkan total pembayaran dengan denda
    //             $item->total_pembayaran = $item->total_price + ($item->booking->denda ?? 0);
    //             return $item;
    //         });
    
    //     return view('detail_pembayarans.index', compact('data', 'search', 'min_price', 'max_price'));
    // }
    


    public function index(Request $request)
    {
        $search = $request->input('search'); // Pencarian berdasarkan email
        $min_price = $request->input('min_price'); // Harga minimal
        $max_price = $request->input('max_price'); // Harga maksimal
        $start_date = $request->input('start_date'); // Tanggal order
        $end_date = $request->input('end_date'); // Tanggal return
    
        // Ambil data dengan relasi booking dan filter berdasarkan email
        $query = DetailPembayaran::with('booking.user');
    
        if ($search) {
            $query->whereHas('booking.user', function ($query) use ($search) {
                $query->where('email', 'like', '%' . $search . '%');
            });
        }
    
        if ($start_date) {
            $query->whereHas('booking', function ($query) use ($start_date) {
                $query->whereDate('order_date', '=', $start_date);
            });
        }
    
        if ($end_date) {
            $query->whereHas('booking', function ($query) use ($end_date) {
                $query->whereDate('return_date', '=', $end_date);
            });
        }
    
        // Ambil semua data dulu sebelum paginate
        $allData = $query->get();
    
        // Tambahkan total pembayaran di setiap item
        $allData->transform(function ($item) {
            $item->total_pembayaran = $item->total_price + ($item->booking->denda ?? 0);
            return $item;
        });
    
        // Filter min_price dan max_price sebelum pagination
        if ($min_price || $max_price) {
            $allData = $allData->filter(function ($item) use ($min_price, $max_price) {
                return (!$min_price || $item->total_pembayaran >= $min_price) &&
                       (!$max_price || $item->total_pembayaran <= $max_price);
            });
        }
    
        // Ambil halaman saat ini
        $currentPage = request()->input('page', 1);
    
        // Konversi ke LengthAwarePaginator agar pagination tetap berfungsi
        $data = new LengthAwarePaginator(
            $allData->forPage($currentPage, 10), // Ambil 10 data sesuai halaman
            $allData->count(), // Total item setelah filter harga
            10, // Per page
            $currentPage, // Halaman saat ini
            ['path' => request()->url(), 'query' => request()->query()] // Jaga pagination tetap berjalan
        );
    
        return view('detail_pembayarans.index', compact('data', 'search', 'min_price', 'max_price', 'start_date', 'end_date'));
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

<?php
namespace App\Http\Controllers;

use App\Models\DetailPembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RiwayatController extends Controller
{
    public function index(Request $request)
    {
        $user_id = Auth::user()->id;
        
        $order_date = $request->input('order_date');

        // Query untuk mengambil data dengan filter order_date (jika ada)
        $data_all = DetailPembayaran::with('booking')
            ->whereHas('booking', function ($query) use ($user_id, $order_date) {
                $query->where('user_id', $user_id);
                if ($order_date) {
                    $query->whereDate('order_date', $order_date);
                }
            })
            ->paginate(5);


        // Hitung jumlah transaksi
        $count_transaksi = DetailPembayaran::whereHas('booking', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->count();

        // Hitung jumlah pesanan dengan berbagai status
        $pesanan_diprocess = DetailPembayaran::whereHas('booking', function ($query) use ($user_id) {
            $query->where('user_id', $user_id)->where('status', 'in_process');
        })->count();

        $pesanan_berlangsung = DetailPembayaran::whereHas('booking', function ($query) use ($user_id) {
            $query->where('user_id', $user_id)->where('status', 'borrowed');
        })->count();

        $pesanan_terlambat = DetailPembayaran::whereHas('booking', function ($query) use ($user_id) {
            $query->where('user_id', $user_id)->where('status', 'late');
        })->count();

        $pesanan_ditolak = DetailPembayaran::whereHas('booking', function ($query) use ($user_id) {
            $query->where('user_id', $user_id)->where('status', 'rejected');
        })->count();

        $pesanan_selesai = DetailPembayaran::whereHas('booking', function ($query) use ($user_id) {
            $query->where('user_id', $user_id)->where('status', 'returned');
        })->count();

        // Kirim data ke view
        return view('riwayat.index', compact(
            'data_all',
            'count_transaksi',
            'pesanan_diprocess',
            'pesanan_berlangsung',
            'pesanan_terlambat',
            'pesanan_ditolak',
            'pesanan_selesai'
        ));
    }
}

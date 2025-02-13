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

        // Query untuk mengambil data dengan paginasi
        $data_all = DetailPembayaran::with('booking')
        ->whereHas('booking', function ($query) use ($user_id, $order_date) {
            $query->where('user_id', $user_id);
            if ($order_date) {
                $query->whereDate('order_date', $order_date);
            }
        })
        ->paginate(10)
        ->through(function ($item) {
            // Tambahkan alias total_pembayaran tanpa perlu ada di database
            $item->total_pembayaran = $item->total_price + ($item->booking->denda ?? 0);
            return $item;
        });

        // Hitung jumlah transaksi
        $count_transaksi = DetailPembayaran::whereHas('booking', function ($query) use ($user_id) {
            $query->where('user_id', $user_id);
        })->count();

        // Hitung jumlah pesanan berdasarkan status
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

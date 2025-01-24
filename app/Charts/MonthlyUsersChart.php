<?php

namespace App\Charts;

use App\Models\Booking; // Model Booking
use marineusde\LarapexCharts\Charts\BarChart AS OriginalBarChart;

class MonthlyUsersChart
{
    public function build(): OriginalBarChart
    {
        // Ambil data booking dengan relasi ke mobil dan filter status "borrowed" atau "returned"
        $bookings = Booking::with('car')
        ->whereIn('status', ['borrowed', 'returned', 'late']) // Menggunakan whereIn untuk banyak kondisi
        ->selectRaw('MONTH(order_date) as month, car_id, DATEDIFF(return_date, order_date) as duration')
        ->get();


        // Inisialisasi data total harga per bulan
        $monthlyTotals = array_fill(1, 12, 0); // 12 bulan dengan nilai awal 0
        $xAxis = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];

        // Proses data untuk menghitung total harga per bulan
        foreach ($bookings as $booking) {
            $month = (int) $booking->month;
            $pricePerDay = $booking->car->price ?? 0; // Harga mobil per hari dari tabel cars
            $duration = max(1, $booking->duration); // Durasi minimal 1 hari jika datanya aneh

            // Hitung total harga booking ini
            $totalBookingPrice = $pricePerDay * $duration;

            // Akumulasi total harga di bulan yang sesuai
            $monthlyTotals[$month] += $totalBookingPrice;
        }

        // Konversi data total menjadi format untuk chart
        $chartData = array_values($monthlyTotals);

        // Kembalikan chart dengan data yang sudah diproses
        return (new OriginalBarChart)
            ->setTitle('Data Statistik Keuangan')
            ->setSubtitle('2024 - Status: Di Pinjam & Di Kembalikan')
            ->addData('Total Harga Booking per Bulan', $chartData) // Total harga per bulan
            ->setLabels($xAxis); // Label bulan menggunakan setLabels
    }
}

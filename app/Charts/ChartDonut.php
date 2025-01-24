<?php

namespace App\Charts;

use marineusde\LarapexCharts\Charts\DonutChart as OriginalDonutChart;
use App\Models\Booking;

class ChartDonut
{
    public function build(): OriginalDonutChart
    {
        // Hitung jumlah data berdasarkan status
        $lateCount = Booking::where('status', 'late')->count();
        $returnedCount = Booking::where('status', 'returned')->count();
        $borrowedCount = Booking::where('status', 'borrowed')->count();  // Menambahkan status 'borrowed'

        return (new OriginalDonutChart)
            ->setTitle('Status Pemesanan')
            ->setSubtitle('Jumlah berdasarkan status')
            ->addData([$lateCount, $returnedCount, $borrowedCount])  // Menambahkan data borrowed
            ->setLabels(['Terlambat', 'Dikembalikan', 'Dipinjam'])  // Menambahkan label Dipinjam
            ->setColors(['#FF0000', '#00FF00', '#FFFF00']); // Merah untuk 'Terlambat', hijau untuk 'Dikembalikan', kuning untuk 'Dipinjam'
    }
}

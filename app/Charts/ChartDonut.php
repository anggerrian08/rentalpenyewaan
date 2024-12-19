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

        return (new OriginalDonutChart)
            ->setTitle('Status Booking')
            ->setSubtitle('Jumlah berdasarkan status')
            ->addData([$lateCount, $returnedCount])
            ->setLabels(['Terlambat', 'Dikembalikan'])
            ->setColors(['#FF0000', '#00FF00']); // Merah untuk "Terlambat", hijau untuk "Dikembalikan"
    }
}

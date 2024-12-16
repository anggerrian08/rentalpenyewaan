<?php

namespace App\Charts;

use marineusde\LarapexCharts\Charts\BarChart AS OriginalBarChart;
use marineusde\LarapexCharts\Options\XAxisOption;

class MonthlyUsersChart
{
    public function build(): OriginalBarChart
    {
        return (new OriginalBarChart)
            ->setTitle('Data Statistik Keuangan')
            ->setSubtitle('2024')
            ->addData('Data Penjualan', [6, 9, 3, 4, 10, 8])
            // ->addData('', [7, 3, 8, 2, 6, 4])
            ->setXAxisOption(new XAxisOption(['January', 'February', 'March', 'April', 'May', 'June','July','August','September','October','November','December']));
    }
}

<?php

namespace App\Charts;

use marineusde\LarapexCharts\Charts\DonutChart AS OriginalDonutChart;

class ChartDonut
{
    public function build(): OriginalDonutChart
    {
        return (new OriginalDonutChart)
            ->setTitle('Data Sewa')
            ->setSubtitle('Bulan Januari')
            ->addData([20, 24])
            ->setLabels(['Denda', 'Aman']);
    }
}

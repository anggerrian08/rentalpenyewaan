<?php

namespace App\Charts;

use marineusde\LarapexCharts\Charts\BarChart AS OriginalBarChart;
use marineusde\LarapexCharts\Options\XAxisOption;

class MonthlyUsersChart
{
    public function build(): OriginalBarChart
    {
        return (new OriginalBarChart)
            ->setTitle('San Francisco vs Boston.')
            ->setSubtitle('Wins during season 2021.')
            ->addData('San Francisco', [6, 9, 3, 4, 10, 8])
            ->addData('Boston', [7, 3, 8, 2, 6, 4])
            ->setXAxisOption(new XAxisOption(['January', 'February', 'March', 'April', 'May', 'June']));
    }
}

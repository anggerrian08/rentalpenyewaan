<?php

namespace App\Http\Controllers;

use App\Charts\ChartDonut;
use App\Charts\MonthlyUsersChart;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\Facades\Charts;

class DashboardController extends Controller
{
    public function index(MonthlyUsersChart $chart, ChartDonut $chartDonut)
{

    $chart = $chart->build();
    $chartDonut = $chartDonut->build();

    return view('dashboard', compact('chart', 'chartDonut'));
}
}

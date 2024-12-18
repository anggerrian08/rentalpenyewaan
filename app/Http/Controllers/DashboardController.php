<?php

namespace App\Http\Controllers;

use App\Charts\ChartDonut;
use App\Charts\MonthlyUsersChart;
use App\Models\Car;
use App\Models\DetailPembayaran;
use App\Models\Merek;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\Facades\Charts;

class DashboardController extends Controller
{
    public function index(MonthlyUsersChart $chart, ChartDonut $chartDonut)
{
    $total_merek = Merek::count();
    $total_car = Car::count();
    $total_transaksi = DetailPembayaran::count();
    $chart = $chart->build();
    $chartDonut = $chartDonut->build();

    return view('dashboard', compact('chart', 'chartDonut', 'total_merek', 'total_car', 'total_transaksi'));
}
}

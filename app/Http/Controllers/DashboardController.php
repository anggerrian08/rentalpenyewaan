<?php

namespace App\Http\Controllers;

use App\Charts\MonthlyUsersChart;
use Illuminate\Http\Request;
use ConsoleTVs\Charts\Facades\Charts;

class DashboardController extends Controller
{
    public function index(MonthlyUsersChart $chart)
{

    $chart = $chart->build();

    return view('dashboard', compact('chart'));
}
}

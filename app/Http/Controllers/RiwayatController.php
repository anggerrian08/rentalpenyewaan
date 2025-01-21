<?php

namespace App\Http\Controllers;

use App\Models\DetailPembayaran;
use Illuminate\Http\Request;

class RiwayatController extends Controller
{
    public function index(){
        $data  = DetailPembayaran::with('bookking')->get();
        return view('riwayat.index', compact('data'));
    }
}

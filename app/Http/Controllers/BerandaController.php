<?php

namespace App\Http\Controllers;

use App\Models\beranda;
use App\Models\Car;
use App\Models\User;
use Illuminate\Http\Request;

class BerandaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $cars = Car::paginate(8);
        $count_user = User::count();
        return view('welcome', compact('cars', 'count_user'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(beranda $beranda)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(beranda $beranda)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, beranda $beranda)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(beranda $beranda)
    {
        //
    }
}

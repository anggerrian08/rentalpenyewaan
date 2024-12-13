<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Merek;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{

    public function index(Request $request)
    {
        $request->validate([
            'search' => 'nullable|string',
            'filter' => 'nullable|in:tersedia,tidak_tersedia,all',
        ]);

        $search = $request->input('search');
        $filter = $request->input('filter');

        $cars = Car::query(); // Awal query builder

        // Tambahkan pencarian
        if ($search) {
            $cars->where('name', 'LIKE', '%' . $search . '%');
        }

        // Tambahkan filter
        if ($filter == 'tersedia') {
            $cars->where('stock', '>', 0);
        } elseif ($filter == 'tidak_tersedia') {
            $cars->where('stock', 0);
        }

        // Urutkan hasil dan paginate
        $cars = $cars->orderBy('best_choice', 'ASC')->paginate(8);

        // Ambil data merek untuk tampilan
        $merek = Merek::all();

        return view('car.index', compact('cars', 'merek'));
    }
    public function create()
    {
        $data_merek = Merek::all();
        return view('car.create', compact('data_merek'));
    }
    public function store(Request $request)
    {
        $request->validate([
            'merek_id' => 'required|exists:mereks,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type_transmisi' => 'required|in:Transmisi Manual,Otomatis Konvensional,Otomatis CVT,DCT,AMT',
            'fuel_type' => 'required|in:bensin,solar,bio solar,cng,kendaraan listrik',
            'manufacture_year' => 'required|date',
            'plat' => 'required|string',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0',
            'best_choice' => 'required|in:1,2',
            'passenger_capacity' => 'required|integer|min:1',
            'luggage_capacity' => 'required|integer|min:0',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $photo = $request->file('photo');
        $photo->storeAs('uploads/car', $photo->hashName(), 'public');

        if(strtotime($request->manufacture_year) > strtotime(date('Y-m-d'))){
            return back()->with('error', 'waktu tidak boleh lebih dari sekarang');
        }
        if($request->stock < 0){
            return back()->with('error', 'stock tidakboleh dari 0');
        }
        if($request->price < 0){
            return back()->with('error', 'stock tidakboleh dari 0');
        }

        if(Car::where('plat', $request->plat)->exists()){
            return back()->with('error', 'gagal nambah plat karena ');
        }

        Car::create([
            'merek_id' => $request->merek_id,
            'name' => $request->name,
            'description' => $request->description,
            'type_transmisi' => $request->type_transmisi,
            'fuel_type' => $request->fuel_type,
            'manufacture_year' => $request->manufacture_year,
            'plat' => $request->plat,
            'price' => $request->price,
            'stock' => 1,
            'best_choice' => $request->best_choice,
            'passenger_capacity' => $request->passenger_capacity,
            'luggage_capacity' => $request->luggage_capacity,
            'photo' => $photo->hashName(),
        ]);

        return redirect()->route('car.index')->with('success', 'Car created successfully.');
    }
    public function show(Car $car)
    {
        return view('car.show', compact('car'));
    }
    public function edit(Car $car)
    {
        $data_merek = Merek::all();
        return view('car.edit', compact('data_merek', 'car'));
    }
    public function update(Request $request, Car $car)
    {
        $request->validate([
            'merek_id' => 'required|exists:mereks,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'type_transmisi' => 'required|in:Transmisi Manual,Otomatis Konvensional,Otomatis CVT,DCT,AMT',
            'fuel_type' => 'required|in:bensin,solar,bio solar,cng,kendaraan listrik',
            'manufacture_year' => 'required|date',
            'plat' => 'required|string',
            'price' => 'required|integer|min:0',
            'stock' => 'required|integer|min:0|max:1',
            'best_choice' => 'required|in:1,2',
            'passenger_capacity' => 'required|integer|min:1',
            'luggage_capacity' => 'required|integer|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);


        if(strtotime($request->manufacture_year) > strtotime(date('Y-m-d'))){
            return back()->with('error', 'waktu tidak boleh lebih dari sekarang');
        }
        if($request->stock < 0){
            return back()->with('error', 'stock tidakboleh dari 0');
        }
        if($request->stock > 1){
            return back()->with('error', 'stock tidakboleh lebih  dari 1');
        }
        if($request->price < 0){
            return back()->with('error', 'stock tidakboleh dari 0');
        }

        if(Car::where('plat', $request->plat)->where('id', '!=', $car->id)->exists()){
            return back()->with('error', 'gagal nambah plat karena ');
        }

        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $photo->storeAs('uploads/car', $photo->hashName(), 'public');
            Storage::disk('public')->delete('uploads/car/'. $car->photo);


            $car->update([
                'merek_id' => $request->merek_id,
                'name' => $request->name,
                'description' => $request->description,
                'type_transmisi' => $request->type_transmisi,
                'fuel_type' => $request->fuel_type,
                'manufacture_year' => $request->manufacture_year,
                'plat' => $request->plat,
                'price' => $request->price,
                'stock' => $request->stock,
                'best_choice' => $request->best_choice,
                'passenger_capacity' => $request->passenger_capacity,
                'luggage_capacity' => $request->luggage_capacity,
                'photo' => $photo->hashName(),
            ]);
        }else{
            $car->update([
                'merek_id' => $request->merek_id,
                'name' => $request->name,
                'description' => $request->description,
                'type_transmisi' => $request->type_transmisi,
                'fuel_type' => $request->fuel_type,
                'manufacture_year' => $request->manufacture_year,
                'plat' => $request->plat,
                'price' => $request->price,
                'stock' => $request->stock,
                'best_choice' => $request->best_choice,
                'passenger_capacity' => $request->passenger_capacity,
                'luggage_capacity' => $request->luggage_capacity,
            ]);
        }
        return redirect()->route('car.index');
    }

    public function destroy(Car $car)
    {
        try {
            $car->delete();
            Storage::disk('public')->delete('uploads/car/'. $car->photo);
            return redirect()->route('car.index')->with('success', 'Car deleted successfully.');
        } catch (\Throwable $th) {
            // Tangani error jika mobil terkait dengan entitas lain
            return back()->with('error', 'Gagal menghapus mobil karena terkait dengan data lain.');
        }
    }
    public function filter(Request $request)
    {
        $request->validate([
            'filter' => 'nullable|exists:mereks,id',
        ]);
        $filter = $request->input('filter');
        if ($filter) {
            $cars = Car::where('merek_id', $filter)->paginate(8);
        } else {
            $cars = Car::orderBy('best_choice', 'ASC')->paginate(8);
        }
        $merek = Merek::all();

        return view('car.index', compact('cars', 'merek'));
    }


}

<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Car;
use App\Models\CarLikes;
use App\Models\Merek;
use App\Models\Review;
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
        $cars = $cars->orderBy('best_choice', 'ASC')->paginate(5)->appends(request()->query());

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
            'stock' => 'nullable|integer|min:0',
            'best_choice' => 'required|in:1,2',
            'passenger_capacity' => 'required|integer|min:1',
            'luggage_capacity' => 'required|integer|min:0',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
        ], [
            'merek_id.required' => 'Merek mobil harus diisi.',
            'merek_id.exists' => 'Merek mobil tidak ditemukan dalam database.',

            'name.required' => 'Nama mobil harus diisi.',
            'name.max' => 'Nama mobil maksimal 255 karakter.',

            'description.required' => 'Deskripsi kendaraan harus diisi.',

            'type_transmisi.required' => 'Jenis transmisi harus diisi.',
            'type_transmisi.in' => 'Jenis transmisi tidak valid.',

            'fuel_type.required' => 'Jenis bahan bakar harus diisi.',
            'fuel_type.in' => 'Jenis bahan bakar tidak valid.',

            'manufacture_year.required' => 'Tahun pembuatan harus diisi.',
            'manufacture_year.date' => 'Tahun pembuatan produksi tidak valid.',

            'plat.required' => 'Nomor plat harus diisi.',

            'price.required' => 'Tarif/Harga kendaraan harus diisi.',
            'price.integer' => 'Tarif/Harga harus berupa angka.',
            'price.min' => 'Tarif/Harga tidak boleh kurang dari 0.',

            'stock.integer' => 'Stok harus berupa angka.',
            'stock.min' => 'Stok tidak boleh kurang dari 0.',

            'best_choice.required' => 'Pilihan terbaik harus diisi.',
            'best_choice.in' => 'Pilihan terbaik harus berupa angka 1 atau 2.',

            'passenger_capacity.required' => 'Kapasitas penumpang harus diisi.',
            'passenger_capacity.integer' => 'Kapasitas penumpang harus berupa angka.',
            'passenger_capacity.min' => 'Kapasitas penumpang minimal 1.',

            'luggage_capacity.required' => 'Muat koper harus diisi.',
            'luggage_capacity.integer' => 'Muat koper harus berupa angka.',
            'luggage_capacity.min' => 'Muat koper tidak boleh kurang dari 0.',

            'photo.required' => 'Foto kendaraan harus diunggah.',
            'photo.image' => 'File foto harus berupa gambar.',
            'photo.mimes' => 'Foto harus memiliki format jpeg, png, atau jpg.',
            'photo.max' => 'Ukuran foto maksimal 2MB.',
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

        return redirect()->route('car.index')->with('success', 'Jenis mobil berhasil dibuat.');
    }
    public function show(Car $car)
    {
        $reviews = Review::where('car_id', $car->id)->get();
        $count_data = $reviews->count(); 
    
        // Hitung total rating
        $total_rating = $reviews->sum('rating'); 
    
        // Hitung rata-rata rating, pastikan tidak membagi dengan 0
        $average_rating = $count_data > 0 ? round($total_rating / $count_data, 1) : 0;

        $count_like = CarLikes::where('car_id', $car->id)->count();

        $count_transaksi = Booking::where('car_id', $car->id)->count();

            // Ambil peminjaman terakhir untuk mengetahui kapan mobil dipinjam dan dikembalikan
        $last_booking = Booking::where('car_id', $car->id)
        ->where('status', 'borrowed') // Pastikan statusnya masih dipinjam
        ->orderBy('return_date', 'desc') // Urutkan berdasarkan return_date terbaru
        ->first();

        return view('car.show', compact('car', 'reviews', 'count_data', 'average_rating','count_like', 'count_transaksi', 'last_booking'));
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
        ], [
            'merek_id.required' => 'Merek mobil harus diisi.',
            'merek_id.exists' => 'Merek mobil tidak ditemukan dalam database.',

            'name.required' => 'Nama mobil harus diisi.',
            'name.max' => 'Nama mobil maksimal 255 karakter.',

            'description.required' => 'Deskripsi kendaraan harus diisi.',

            'type_transmisi.required' => 'Jenis transmisi harus diisi.',
            'type_transmisi.in' => 'Jenis transmisi tidak valid.',

            'fuel_type.required' => 'Jenis bahan bakar harus diisi.',
            'fuel_type.in' => 'Jenis bahan bakar tidak valid.',

            'manufacture_year.required' => 'Tahun pembuatan harus diisi.',
            'manufacture_year.date' => 'Tahun pembuatan produksi tidak valid.',

            'plat.required' => 'Nomor plat harus diisi.',

            'price.required' => 'Tarif/Harga kendaraan harus diisi.',
            'price.integer' => 'Tarif/Harga harus berupa angka.',
            'price.min' => 'Tarif/Harga tidak boleh kurang dari 0.',

            'stock.integer' => 'Stok harus berupa angka.',
            'stock.min' => 'Stok tidak boleh kurang dari 0.',

            'best_choice.required' => 'Pilihan terbaik harus diisi.',
            'best_choice.in' => 'Pilihan terbaik harus berupa angka 1 atau 2.',

            'passenger_capacity.required' => 'Kapasitas penumpang harus diisi.',
            'passenger_capacity.integer' => 'Kapasitas penumpang harus berupa angka.',
            'passenger_capacity.min' => 'Kapasitas penumpang minimal 1.',

            'luggage_capacity.required' => 'Muat koper harus diisi.',
            'luggage_capacity.integer' => 'Muat koper harus berupa angka.',
            'luggage_capacity.min' => 'Muat koper tidak boleh kurang dari 0.',

            'photo.required' => 'Foto kendaraan harus diunggah.',
            'photo.image' => 'File foto harus berupa gambar.',
            'photo.mimes' => 'Foto harus memiliki format jpeg, png, atau jpg.',
            'photo.max' => 'Ukuran foto maksimal 2MB.',
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
        return redirect()->route('car.index')->with('success','Berhasil Mengupdate jenis mobil');
    }

    public function destroy(Car $car)
    {
        try {
            $car->delete();
            Storage::disk('public')->delete('uploads/car/'. $car->photo);
            return redirect()->route('car.index')->with('success', 'Jenis mobil berhasil dihapus.');
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

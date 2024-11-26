<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\Category;
use App\Models\Plat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'input' => 'nullable|string|max:255'
        ]);

        $input = $request->input('input');
        if ($input) {
            $data = Car::where('name', 'LIKE', '%'.$input.'%')->paginate(8);
        }else{
            $data= Car::latest()->paginate(8);
        }

        return view('car.index',compact('data'));
        // $data = Car::with('category', 'plat')->latest()->paginate(8);
        // return view('car.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $data_category = Category::all();
        // $data_plat = Plat::all();
        $data_plat = Plat::whereDoesntHave('car')->get();
        return view('car.create', compact('data_category', 'data_plat'));
    }

    /**
     * Store a newly created resource in storage.
     */
   /**
 * Store a newly created resource in storage.
 */
    public function store(Request $request)
    {
    // Validasi data
    $request->validate([
        'category_id' => 'required|exists:categories,id',
        'plat_id' => 'required|exists:plats,id',
        'name' => 'required|string|max:255',
        'description' => 'required|string',
        'price' => 'required|numeric|min:999',
        'stock' => 'required|numeric|min:0',
        'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
    ]);

    $validate_plat = Car::where('plat_id', $request->plat_id)->exists();
    if($validate_plat){
        session()->flash('error', 'plat sudah di gunakan');
        return back()->withInput();
    }

    if($request->stock < 0){
        session()->flash('error', 'stock tidak boleh kurang dari 0');
        return back()->withInput();
    }

    $photo=$request->file('photo');
    $photo->storeAs('uploads', $photo->hashName(), 'public');

    Car::create([
        'category_id' => $request->category_id,
        'plat_id' => $request->plat_id,
        'name' => $request->name,
        'description' => $request->description,
        'price' => $request->price,
        'stock' => $request->stock,
        'photo' => $photo->hashName()
    ]);

    return redirect()->route('car.index')->with('success', 'Car created successfully!');
    }

    public function show(string $id)
    {
        $product = Car::with('category', 'plat')->findOrFail($id);
        $otherProducts = Car::where('id', '!=', $id)->inRandomOrder()->take(3)->get();
        return view('car.show', compact('product', 'otherProducts'));
    }

    public function edit(string $id)
    {
        $data = Car::with('category', 'plat')->findOrFail($id);
        $data_category = Category::all();
        // $data_plat = Plat::whereDoesntHave('car')->get();
        $data_plat = Plat::whereDoesntHave('car', function ($query) use ($id) {
            $query->where('id', '!=', $id);
        })->orWhere('id', $data->plat_id)->get();
        return view('car.edit', compact('data', 'data_category', 'data_plat'));
    }

    public function update(Request $request, string $id)
    {
        $request->validate([
            'category_id' => 'required|exists:categories,id',
            'plat_id' => 'required|exists:plats,id',
            'name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|numeric|min:999',
            'stock' => 'required|numeric|min:0',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $validate_plat = Car::where('plat_id', $request->plat_id)->where('id', '!=', $id)->exists();
        if($validate_plat){
            session()->flash('error', 'plat sudah di gunakan');
            return back()->withInput();
        }

        if($request->stock < 0){
            session()->flash('error', 'stock tidak boleh kurang dari 0');
            return back()->withInput();
        }

        $car = Car::findOrFail($id);

        if($request->hasFile('photo')){
            $photo = $request->file('photo');
            $photo->storeAs('uploads', $photo->hashName(), 'public');
            Storage::disk('public')->delete('uploads/'.$car->photo);

            $car->update([
                'category_id' => $request->category_id,
                'plat_id' => $request->plat_id,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
                'photo' => $photo->hashName()
            ]);
        }else{
            $car->update([
                'category_id' => $request->category_id,
                'plat_id' => $request->plat_id,
                'name' => $request->name,
                'description' => $request->description,
                'price' => $request->price,
                'stock' => $request->stock,
            ]);
        }
        return redirect()->route('car.index')->with('success', 'berhasil update data');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $car = Car::findOrFail($id);
        Storage::disk('public')->delete('uploads/'.$car->photo);
        $car->delete();
        return back()->with('success', 'succes deleted car');
    }


}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromosiRequest;
use App\Models\Promosi;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromosiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {


        $request->validate([
            'search' => 'nullable|string|max:30'
        ]);
        $search = $request->input('search');
        if($search){
            $promosi = Promosi::where('title', 'LIKE','%'.$search.'%')->paginate(6)->appends(request()->query());
        }else{
            $promosi = Promosi::paginate(6)->appends(request()->query());
        }
        return view('promosi.index', compact('promosi'));

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
        $request->validate([
            'title' => 'required|string|max:255',
            'photo' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date'
        ]);
        
        $photo = $request->file('photo');
        $photo->storeAs('photos', $photo->hashName(), 'public');
    
        Promosi::create([
            'title' => $request->title, // Pastikan ini tidak kosong
            'photo' => $photo->hashName(),
            'start_date' => $request->start_date,
            'end_date' => $request->end_date, // Hindari NULL error
        ]);
    
        return back()->with('success', 'Promosi berhasil dibuat');
    }
    


    /**
     * Display the specified resource.
     */
    public function show(Promosi $promosi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promosi $promosi)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,$id)
    {
        $promosi = Promosi::findOrFail($id);
        
        $request->validate([
            'title' => 'required|string|max:255',
            'photo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'start_date' => 'required|date',
            'end_date' => 'nullable|date|after_or_equal:start_date'
        ]);
    
        if ($request->hasFile('photo')) {
            $photo = $request->file('photo');
            $photo->storeAs('photos', $photo->hashName(), 'public');
            Storage::disk('public')->delete('photos/'. $promosi->photo);
            // Hapus foto lama jika ada

            $promosi->update([
                'title' => $request->title,
                'photo' => $photo->hashName(),
                'start_date' => $request->start_date,
                'end_date' => $request->end_date
            ]);
            // Simpan foto baru
        }else{
            $promosi->update([
                'title' => $request->title,
                'start_date' => $request->start_date,
                'end_date' => $request->end_date
            ]);
        }

    
        return back()->with('success', 'Promosi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $promosi)
    {
        $model = Promosi::find($promosi);


        // Hapus data dari database
        $model->delete();
        Storage::disk('public')->delete('photos/'. $model->photo);
        // Redirect dengan pesan sukses
        return redirect()->route('promosi.index')->with('success', 'Promosi berhasil dihapus.');
    }

    public function refresh()
    {
        $today = Carbon::today();
    
        // Ambil semua promosi yang sudah kadaluarsa
        $expiredPromotions = Promosi::where('end_date', '<', $today)->get();
    
        foreach ($expiredPromotions as $promo) {
            // Hapus gambar jika ada
            Storage::disk('public')->delete('photos/'. $promo->photo);
            // Hapus data promosi
            $promo->delete();
        }
    
        return back()->with('success', 'Data promosi yang kadaluarsa berhasil dihapus!');
    }
    
}

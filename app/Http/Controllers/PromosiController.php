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
            $promosi = Promosi::paginate(8)->appends(request()->query());
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
    public function store(PromosiRequest $request)
    {
        $validatedRequest = $request->validated();
        
        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('photos', 'public');
            $validatedRequest['photo'] = $photoPath;
        }
    
        Promosi::create([
            'title' => $validatedRequest['title'], // Pastikan ini tidak kosong
            'photo' => $validatedRequest['photo'],
            'start_date' => $validatedRequest['start_date'],
            'end_date' => $validatedRequest['end_date'] ?? null, // Hindari NULL error
        ]);
    
        return redirect()->route('promosi.index')->with('success', 'Promosi berhasil dibuat');
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
    public function update(PromosiRequest $request, $id)
    {
        $promosi = Promosi::findOrFail($id);
    
        $validated = $request->validated();
    
        if ($request->hasFile('photo')) {
            // Hapus foto lama jika ada
            if ($promosi->photo) {
                Storage::disk('public')->delete($promosi->photo);
            }
    
            // Simpan foto baru
            $validated['photo'] = $request->file('photo')->store('photos', 'public');
        }
    
        $promosi->update($validated);
    
        return back()->with('success', 'Promosi berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(int $promosi)
    {
        $model = Promosi::find($promosi);

        $filePath = 'public/' . $model->photo;

        if ($model->photo && Storage::exists($filePath)) {
            Storage::delete($filePath);
        } else {
            logger('File tidak ditemukan: ' . $filePath);
        }

        // Hapus data dari database
        $model->delete();

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
            if ($promo->photo && Storage::exists('public/' . $promo->photo)) {
                Storage::delete('public/' . $promo->photo);
            }
    
            // Hapus data promosi
            $promo->delete();
        }
    
        return back()->with('success', 'Data promosi yang kadaluarsa berhasil dihapus!');
    }
}

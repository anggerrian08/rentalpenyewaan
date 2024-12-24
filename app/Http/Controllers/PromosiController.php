<?php

namespace App\Http\Controllers;

use App\Http\Requests\PromosiRequest;
use App\Models\Promosi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class PromosiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $promosi = Promosi::all();
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

        Promosi::create($validatedRequest);

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

        // dd($promosi);

        $validated = $request->validated();

        if ($request->hasFile('photo')) {
            if ($promosi->photo && Storage::exists('public/' . $promosi->photo)) {
                Storage::delete('public/' . $promosi->photo);
            }

            $photoPath = $request->file('photo')->store('photos', 'public');
            $validated['photo'] = $photoPath;
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
}

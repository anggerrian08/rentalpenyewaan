<?php

namespace App\Http\Controllers;

use App\Models\Merek;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MerekController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $request->validate([
            'name' => 'nullable|string|max:30'
        ]);
        $search = $request->input('search');
        if($search){
            $data = Merek::where('name', 'LIKE','%'.$search.'%')->paginate(8)->appends(request()->query());
        }else{
            $data = Merek::latest()->paginate(8)->appends(request()->query());
        }
        return view('merek.index', compact('data'));
    }
    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255'
        ],[
            'name.required' => 'Nama merk wajib diisi.',
            'name.string' => 'Nama merk harus berupa teks.',
            'name.max' => 'Nama merk tidak boleh lebih dari 255 karakter.',
        ]);

        if (Merek::where('name', $data['name'])->exists()) {
            return back()->with('error', 'Gagal menambahkan Merek karena Nama Sudah di Gunakan.');
        }

        Merek::create($data);
        Alert::success('Berhasil', 'Data berhasil ditambahkan');
        return redirect()->route('merek.index')->with('success', 'Merek Berhasil di Tambahkan.');
    }

    public function update(Request $request, Merek $merek)
    {
        $data = $request->validate([
            'name' => 'required|string|max:255'
        ],[
            'name.required' => 'Nama merk wajib diisi.',
            'name.string' => 'Nama merk harus berupa teks.',
            'name.max' => 'Nama merk tidak boleh lebih dari 255 karakter.',
        ]);

        if (Merek::where('name', $data['name'])->where('id', '!=', $merek->id)->exists()) {
            return back()->with('error', 'Nama Merek Sudah Di Guanakan.');
        }

        $merek->update($data);

        return redirect()->route('merek.index')->with('success', 'Berhasil Mengupdate Merek.');

    }
    public function destroy(Merek $merek)
    {
        try {
            $merek->delete();
            return redirect()->route('merek.index')->with('success', 'Merek Berhasil Di Hapus.');
        } catch (\Throwable $th) {
            return back()->with('error', 'Gagal Menghapus Karena Merek Masih Di Gunakan');
        }
    }
}

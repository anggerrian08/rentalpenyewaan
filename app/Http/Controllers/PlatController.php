<?php

namespace App\Http\Controllers;

use App\Models\Plat;
use Illuminate\Http\Request;

class PlatController extends Controller
{
    public function index(Request $request){

        $request->validate([
            'input' => 'nullable|string|max:20'
        ]);
        $input = $request->input('input');

        if($input){
            $data = Plat::where('plat', 'LIKE', '%'.$input.'%')->paginate(10);
        }else{
            $data = Plat::latest()->paginate(10); // Batasi 10 data per halaman
        }

        return view('plat.index', compact('data'));
    }
    public function store(Request $request){
        $request->validate([
            'plat' => 'required'
        ]);

        $validate_plat = Plat::where('plat', $request->plat)->exists();
        if($validate_plat){
            return back()->with('error', 'failed to add category because plat already exists');
        }else{
            PLat::create(['plat' => $request->plat]);
            return back()->with('success', 'success add plat');
        }
    }
    public function update(Request $request, string $id){
        $request->validate([
            'plat' => 'required|max:20'
        ]);
        $plat_id = Plat::findOrFail($id);

        $validate_plat = Plat::where('plat', $request->plat)->where('id', '!=', $id)->exists();
        if($validate_plat){
            return back()->with('error', 'failed to update Plat because plat already exists');
        }else{
            $plat_id->update(['plat' => $request->plat]);
            return back()->with('success', 'success updated Plat');
        }
    }
    public function destroy(string $id){
        try {
            Plat::findOrFail($id)->delete();
            return back()->with('success', 'success deleted plat');
        } catch (\Throwable $th) {
            return back()->with('error', 'failed to deleted plat because of relation');
        }
    }
}

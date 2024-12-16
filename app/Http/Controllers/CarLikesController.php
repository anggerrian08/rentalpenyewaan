<?php

namespace App\Http\Controllers;

use App\Models\Car;
use App\Models\CarLikes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CarLikesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->user()->hasRole('user')){
            $data = CarLikes::where('user_id', auth()->user()->id)->with('user', 'car')->get();
        }else{
            $data = CarLikes::select('car_id', DB::raw('MAX(id) as id'))
            ->groupBy('car_id')
            ->with('car', 'user')
            ->get();
        }

        $likes = CarLikes::select('car_id')->selectRaw('COUNT(*) as count')->groupBy('car_id')->pluck('count', 'car_id');
        return view('car_likes.index', compact('data', 'likes'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'car_id' => 'required|integer|exists:cars,id'
        ]);
        $user = Auth::user();
        if(Carlikes::where('user_id', $user->id)->where('car_id', $request->car_id)->first()){
            session()->flash('error', 'anda sudah memberi like kepasa produk makanan ini');
            return back()->withInput();
        }
        Carlikes::create([
            'user_id' => $user->id,
            'car_id' => $request->car_id
        ]);
        return back();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $makanan = CarLikes::find($id);
        
        if($makanan){
            $makanan->delete();
        }else{
            session()->flash('error', 'id not found ');
        }
        return back();
     
    }
}

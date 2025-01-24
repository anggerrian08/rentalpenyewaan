<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;

class ReviewController2 extends Controller
{
  
    public function store(Request $request){
        $request->validate([
            'car_id' => 'required|exists:cars,id', // Check that the book exists
            'review' => 'required|string|max:255',
            'rating' => 'required|integer|between:1,5',
        ]);

        if(Review::where('user_id' , auth()->user()->id)->where('car_id', $request->car_id)->first()){
            session()->flash('error', 'tidak bisa reviews buku yang sama 2 kali');
            return back()->withInput();
        }

        try {
            $review =  Review::create([
                'user_id' => auth()->user()->id,  // Fetch the logged-in user's ID
                'car_id' => $request->car_id, // Fetch the book ID from the form
                'review' => $request->review,     // Fetch the review text from the form
                'rating' => $request->rating,     // Fetch the rating from the form
            ]);
            if($review){
                session()->flash('success', 'succesfully created reviews for books');
            }else{
                session()->flash('error','failed to reviews books');
            }
            
        } catch (\Throwable $th) {
            session()->flash('error', ' ada yang eror');
        }
    
        return back();
    }

}

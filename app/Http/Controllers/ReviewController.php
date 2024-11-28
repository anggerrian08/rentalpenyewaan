<?php

namespace App\Http\Controllers;

use App\Models\Review;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReviewController extends Controller
{
     public function index()
    {
        $user = Auth::user();

        if ($user->hasRole('admin')) {
            $data_ulasan = Review::with('user', 'car')->paginate(10);
        } else {
            $data_ulasan = Review::with('car', 'user')
                ->where('user_id', $user->id)
                ->paginate(10);
        }

        return view('review.index', compact( 'data_ulasan'));
    }
    public function store(Request $request){
        $request->validate([
            'car_id' => 'required|exists:cars,id',
            'review' => 'required|string',
            'rating' => 'required|numeric|max:5'
        ]);
        $user = Auth::user();
        $validate = Review::where('user_id', $user->id)->where('car_id', $request->car_id)->first();
        if($validate){
            return back()->with('error', 'crow leave a review because it has already been reviewed');
        }else{
            Review::create([
                'user_id' => $user->id,
                'car_id' => $request->car_id,
                'review' => $request->review,
                'rating' => $request->rating
            ]);
            return redirect()->route('review.index')->with('success', 'succes give review');
        }
    }
    public function show(string $id)
    {
        $review = Review::with('user', 'car')->findOrFail($id);
        $user = Auth::user();

        // Hanya admin atau pemilik ulasan yang dapat melihat detail ulasan
        if ($user->hasRole('admin') || $user->id === $review->user_id) {
            return view('review.show', compact('review'));
        }

        return redirect()->route('review.index')->with('error', 'Unauthorized action.');
    }

    public function update(Request $request, string $id)
    {
        $review = Review::findOrFail($id);
        $user = Auth::user();

        // Hanya pemilik ulasan atau admin yang bisa memperbarui ulasan
        if ($user->id === $review->user_id || $user->hasRole('admin')) {
            $request->validate([
                'review' => 'required|string',
                'rating' => 'required|numeric|max:5',
            ]);

            $review->update([
                'review' => $request->review,
                'rating' => $request->rating,
            ]);

            return redirect()->route('review.index')->with('success', 'Review updated successfully.');
        }

        return back()->with('error', 'Unauthorized action.');
    }


       public function destroyReview(string $id)
       {
        Review::findOrFail($id)->delete();
        return back()->with('success', 'Unauthorized action');
       }

}

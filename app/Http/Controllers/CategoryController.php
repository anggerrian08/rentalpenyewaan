<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request){
        $data = Category::latest()->paginate(10); // Batasi 10 data per halaman
        return view('category.index', compact('data'));
    }
    public function store(Request $request){
        $request->validate([
            'name' => 'required|string|max:20'
        ]);

        $validate_name = Category::where('name', $request->name)->exists();
        if($validate_name){
            return back()->with('error', 'failed to add category because name already exists');
        }else{
            category::create(['name' => $request->name]);
            return back()->with('success', 'success add category');
        }
    }
    public function update(Request $request, string $id){
        $request->validate([
            'name' => 'required|string|max:20'
        ]);
        $category_id = Category::findOrFail($id);

        $validate_name = Category::where('name', $request->name)->where('id', '!=', $id)->exists();
        if($validate_name){
            return back()->with('error', 'failed to update category because name already exists');
        }else{
            $category_id->update(['name' => $request->name]);
            return back()->with('success', 'success updated category');
        }
    }
    public function destroy(string $id){
        try {
            Category::findOrFail($id)->delete();
            return back()->with('success', 'success deleted category');
        } catch (\Throwable $th) {
            return back()->with('error', 'failed to deleted category because of relation');
        }
    }
    public function search(Request $request){
        $request->validate([
            'name' => 'nullable|string|max:20'
        ]);
        $input = $request->input('input');

        if ($input) {
            $data = Category::where('name', 'LIKE', '%'.$input.'%')->paginate(10);
        }else{
            $data = Category::latest()->paginate(10);
        }

        return view('category.index',compact('data'));
    }
}

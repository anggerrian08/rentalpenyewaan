<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\PlatController;
use App\Http\Controllers\CarController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth','role:admin')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::resource('/category', CategoryController::class)->only('index', 'store', 'update','destroy');
   Route::get('/category/search', [CategoryController::class, 'search'])->name('category.search');
   Route::resource('/plat', PlatController::class)->only('index', 'store', 'update','destroy');
  Route::resource('/car', CarController::class);

});


require __DIR__.'/auth.php';

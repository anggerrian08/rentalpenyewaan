<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginLogsController;
use App\Http\Controllers\PlatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MerekController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/aproval', function () {
    return view('aproval.index');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function(){
    Route::resource('/category', CategoryController::class)->only('index', 'store', 'update','destroy');
    Route::get('/category/search', [CategoryController::class, 'search'])->name('category.search');
    Route::resource('/plat', PlatController::class)->only('index', 'store', 'update','destroy');
    Route::resource('/car', CarController::class)->except('index', 'show');


});
Route::get('/loginlogs', [LoginLogsController::class, 'index'])->name('loginlogs.index');
Route::middleware(['auth', 'role:user'])->prefix('user')->group( function(){
    Route::resource('/review', ReviewController::class)->except('index', 'show');
});
Route::middleware('auth')->group(function () {
    // car
    Route::get('/car/filter', [CarController::class, 'filter'])->name('car.filter');
    Route::resource('/car', CarController::class)->only('index', 'show');
    Route::resource('/review', ReviewController::class)->only('index','show');
    Route::resource('/merek', MerekController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

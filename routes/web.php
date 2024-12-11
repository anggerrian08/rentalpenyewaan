<?php

use App\Http\Controllers\CarController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\LoginLogsController;
use App\Http\Controllers\PlatController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});


Route::get('/jenis mobil', function () {
    return view('list_jenis_mobil.index');
});
// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');


Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function(){
    Route::resource('/car', CarController::class)->except('index', 'show');
    Route::resource('/merek', MerekController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/aproval', ApprovalController::class);
    // Route::patch('/aproval/{id}', [ApprovalController::class, 'accepted'])->name('aproval.accepted');
    Route::patch('/aproval/{id}/accept', [ApprovalController::class, 'accepted'])->name('aproval.accepted');
    Route::patch('/aproval/{id}/rejected', [ApprovalController::class, 'rejected'])->name('aproval.rejected');
});
Route::middleware(['auth', 'role:user'])->prefix('user')->group( function(){
    Route::resource('/review', ReviewController::class)->except('index', 'show');
});
Route::middleware('auth')->group(function () {
    // car
    Route::get('/car/filter', [CarController::class, 'filter'])->name('car.filter');
    Route::resource('/car', CarController::class)->only('index', 'show');
    Route::resource('/review', ReviewController::class)->only('index','show');

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
});


require __DIR__.'/auth.php';

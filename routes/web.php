<?php
use App\Http\Controllers\CarController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\MerekController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ApprovalController;
use App\Http\Controllers\BerandaController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\CarLikesController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\PromosiController;
use App\Http\Controllers\FavoritController;
use App\Http\Controllers\PemesananController;

use App\Http\Controllers\DetailPembayaranController;
use App\Http\Controllers\RiwayatController;
use App\Models\Car;
use App\Models\DetailPembayaran;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    $cars = Car::paginate(8); // Ambil semua data mobil dari model Car
    return view('welcome', compact('cars')); // Kirim data ke view welcome
})->name('halamanutama');

Route::resource('/beranda',  BerandaController::class);
Route::resource('/account',  ProfileController::class);
// Route::resource('/pemesanan',  PemesananController::class);
// Route::resource('/favorit',  FavoritController::class);
Route::get('/pemesanan/search', [PemesananController::class, 'search'])->name('pemesanan.search');



Route::get('/jenis mobil', function () {
    return view('list_jenis_mobil.index');
});





// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->name('dashboard');

use App\Http\Controllers\ChangePassword;
use App\Http\Controllers\ReviewController2;

Route::middleware('auth')->group(function () {
    // Route::put('/password/update', [ChangePassword::class, 'update'])->name('password.update');
});

Route::middleware(['auth', 'role:admin'])->prefix('admin')->group(function(){
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    Route::resource('/car', CarController::class)->except('index', 'show');
    Route::resource('/merek', MerekController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/aproval', ApprovalController::class);


    // Route::resource('/bookings', BookingController::class);
    Route::resource('/promosi', controller: PromosiController::class);


    // Route::patch('/aproval/{id}', [ApprovalController::class, 'accepted'])->name('aproval.accepted');
    Route::patch('/aproval/{id}/accept', [ApprovalController::class, 'accepted'])->name('aproval.accepted');
    // Route::get('/aproval/{id}/show', [ApprovalController::class, 'show'])->name('aproval.show');
    Route::patch('/aproval/{id}/rejected', [ApprovalController::class, 'rejected'])->name('aproval.rejected');
    Route::patch('/aproval/{id}/returned', [ApprovalController::class, 'returned'])->name('aproval.returned');
    Route::post('/aproval/pay/{id}', [ApprovalController::class, 'pay'])->name('aproval.pay');

});
Route::middleware(['auth', 'role:user'])->prefix('user')->group( function(){
    Route::resource('/review', ReviewController::class)->except('index', 'show');

    Route::put('/bookings/{id}/proses_pengembalian', [BookingController::class, 'proses_pengembalian'])->name('bookings.proses_pengembalian');

    // Route::resource('/bookings', BookingController::class);

    Route::put('/bookings/{id}/proses_pengembalian', [BookingController::class, 'proses_pengembalian'])->name('bookings.proses_pengembalian');

    // Route::resource('/detail_pembayarans', DetailPembayaranController::class)->only('index');
    Route::post('/review2', [ReviewController2::class, 'store'])->name('review2.store');
});


Route::middleware('auth')->group(function () {
    Route::resource('/pemesanan',  PemesananController::class);
Route::resource('/favorit',  FavoritController::class);
    Route::resource('/bookings', BookingController::class);
    Route::resource('/detail_pembayarans', DetailPembayaranController::class)->only('index');
    Route::get('/riwayat', [RiwayatController::class, 'index'])->name('riwayat.index');
    // car
    Route::get('/car/filter', [CarController::class, 'filter'])->name('car.filter');
    Route::resource('/car', CarController::class)->only('index', 'show');
    Route::resource('/review', ReviewController::class)->only('index','show');

    Route::resource('/car_likes', CarLikesController::class);

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');


});
// require __DIR__. '/user.php';
require __DIR__.'/auth.php';
require __DIR__. '/admin.php';


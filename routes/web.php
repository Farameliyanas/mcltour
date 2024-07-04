<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\BookingController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Auth;

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\AdminController;


// Route untuk menampilkan form registrasi
Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register');

// Route untuk menangani proses registrasi
Route::post('/register', [AuthController::class, 'register'])->name('register.submit');

// Route untuk menampilkan form login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login')->middleware('guest');

// Route untuk menangani proses login
Route::post('/login', [AuthController::class, 'login'])->name('login.submit')->middleware('guest');

// Route untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Route untuk halaman utama yang hanya bisa diakses setelah login
Route::get('/', [AuthController::class, 'home'])->name('home');

Route::middleware(['auth', 'admin:admin,sadmin'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'showDashboard'])->name('dashboard');
    Route::get('/change-password', [AuthController::class, 'adminShowChangePasswordForm'])->name('change-password-form');
    Route::post('/change-password', [AuthController::class, 'adminChangePassword'])->name('change-password');
    

    Route::get('/wisata', [AdminController::class, 'showWisata'])->name('wisata');
    Route::post('/store-wisata', [AdminController::class, 'storeWisata'])->name('store-wisata');
    Route::put('/update-wisata/{id}', [AdminController::class, 'updateWisata'])->name('update-wisata');
    Route::delete('/hapus-wisata/{id}', [AdminController::class, 'destroyWisata'])->name('hapus-wisata');
    Route::get('/data-wisata', [AdminController::class, 'getDataWisata'])->name('data-wisata');

    Route::get('/pelanggan', [AdminController::class, 'showPelanggan'])->name('pelanggan');
    Route::post('/store-pelanggan', [AdminController::class, 'storePelanggan'])->name('store-pelanggan');
    Route::put('/update-pelanggan/{id}', [AdminController::class, 'updatePelanggan'])->name('update-pelanggan');
    Route::delete('/hapus-pelanggan/{id}', [AdminController::class, 'destroyPelanggan'])->name('hapus-pelanggan');

    Route::get('/transaksi', [AdminController::class, 'showTransaksi'])->name('transaksi');
    Route::post('/store-transaksi', [AdminController::class, 'storeTransaksi'])->name('store-transaksi');
    Route::put('/update-transaksi/{id}', [AdminController::class, 'updateTransaksi'])->name('update-transaksi');
    Route::delete('/hapus-transaksi/{id}', [AdminController::class, 'destroyTransaksi'])->name('hapus-transaksi');
    Route::get('/data-transaksi', [AdminController::class, 'getDataTransaksi'])->name('data-transaksi');

    Route::get('/users', [AdminController::class, 'showUser'])->name('users');
    Route::post('/store-users', [AdminController::class, 'storeUser'])->name('store-users');
    Route::put('/update-users/{id}', [AdminController::class, 'updateUser'])->name('update-users');
    Route::delete('/hapus-users/{id}', [AdminController::class, 'destroyUser'])->name('hapus-users');
    Route::get('/data-users', [AdminController::class, 'getDataUser'])->name('data-users');
});



// Route untuk halaman About
Route::get('/about', function () {
    return view('frontend.about');
})->name('about');

// Route untuk halaman Services
Route::get('/services', function () {
    return view('frontend.service');
})->name('service');

// Route untuk halaman Packages
Route::get('/packages', function () {
    return view('frontend.packages');
})->name('packages');

// Route untuk halaman Contact
Route::get('/contact', function () {
    return view('frontend.contact');
})->name('contact');

// Route::middleware('auth')->group(function () {
//     Route::get('/booking', function () {
//         // Cek apakah pengguna terautentikasi dan memiliki role 'user'
//         if (Auth::check() && Auth::user()->role === 'user') {
//             return view('frontend.booking');
//         } else {
//             // Jika tidak, redirect atau tampilkan pesan kesalahan
//             return redirect()->route('login')->with('error', 'Anda tidak memiliki izin untuk mengakses halaman ini.');
//         }
//     })->name('booking');

//     // Rute-rute lain yang memerlukan autentikasi
// });

// Rute untuk pengguna yang terautentikasi sebagai user


Route::get('/payment-success', [BookingController::class, 'success'])->name('payment.success');
Route::middleware(['auth'])->group(function () {
    Route::get('/booking', [BookingController::class, 'index'])->name('booking');
    Route::post('/submit-booking', [BookingController::class, 'submitBooking'])->name('submit_booking');
    Route::get('/transaksi/{id}', [BookingController::class, 'show'])->name('transaksi');
    Route::get('/account-settings/change-password', [AuthController::class, 'showChangePasswordForm'])->name('account.change-password-form');
    Route::post('/account-settings/change-password', [AuthController::class, 'changePassword'])->name('account.change-password');
    // Route::post('/pay', [PaymentController::class, 'pay'])->name('pay');
    // // routes/web.php
    // Route::post('/get-snap-token', [BookingController::class, 'getSnapToken'])->name('getSnapToken');

});

//Route::post('/get-snap-token', 'BookingController@getSnapToken')->name('getSnapToken');




// Clear cache route
Route::get('/clear-cache', function () {
    $run = Artisan::call('config:clear');
    $run = Artisan::call('cache:clear');
    $run = Artisan::call('config:cache');
    return 'FINISHED';
});

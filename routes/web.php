<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookingController; 
use App\Http\Controllers\JadwalDokterController; 
use App\Http\Controllers\PemberianObatController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FeedbackController;
use App\Http\Controllers\PemeriksaanRiwayatController;




Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

//  /*  Routes untuk Fitur Menu  */ (ini contoh,ntar kalian isi sendiri sesuain)
    Route::controller(BookingController::class) 
    ->prefix('menu')
    ->middleware(['auth', 'verified'])
    ->group(function () {
        Route::get('', 'index')->name('menu');
        Route::get('create', 'create')->name('menu.create');
        Route::post('store', 'store')->name('menu.store');
        Route::get('show/{id}', 'show')->name('menu.show');
        Route::get('edit/{id}', 'edit')->name('menu.edit');
        Route::put('edit/{id}', 'update')->name('menu.update');
        Route::delete('destroy/{id}', 'destroy')->name('menu.destroy');
    });

    /*  Routes untuk Fitur JadwalDokter  */


    /*  Routes untuk Fitur PemberianObat  */


    /*  Routes untuk Fitur Pemeriksaan  */
    Route::get('/bookings', [BookingController::class, 'index'])->name('bookings.index');          // Tampilkan daftar bookings
Route::get('/bookings/create', [BookingController::class, 'create'])->name('bookings.create');  // Form tambah booking
Route::post('/bookings', [BookingController::class, 'store'])->name('bookings.store');          // Simpan booking baru
Route::get('/bookings/{booking}/edit', [BookingController::class, 'edit'])->name('bookings.edit'); // Form edit booking
Route::put('/bookings/{booking}', [BookingController::class, 'update'])->name('bookings.update');  // Simpan perubahan
Route::delete('/bookings/{booking}', [BookingController::class, 'destroy'])->name('bookings.destroy'); // Hapus booking


    /*  Routes untuk Fitur Users  */
    

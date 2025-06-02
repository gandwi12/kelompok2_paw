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
Route::resource('jadwals', JadwalDokterController::class); 
Route::get('/jadwals', [JadwalDokterController::class, 'index'])->name('jadwals.index');
Route::get('/jadwals/create', [JadwalDokterController::class, 'create'])->name('jadwals.create');
Route::post('/jadwals', [JadwalDokterController::class, 'store'])->name('jadwals.store');

    /*  Routes untuk Fitur PemberianObat  */


    /*  Routes untuk Fitur Pemeriksaan  */


    /*  Routes untuk Fitur Users  */
    

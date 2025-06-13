<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});


Route::resource('users', UserController::class);



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
    Route::resource('pemeriksaan_riwayat', PemeriksaanRiwayatController::class);
    Route::controller(PemeriksaanRiwayatController::class)
    ->prefix('pemeriksaan')
    ->group(function () {
        Route::get('', 'index')->name('pemeriksaan.index');
        Route::get('create', 'create')->name('pemeriksaan.create');
        Route::post('store', 'store')->name('pemeriksaan.store');
        Route::get('show/{id}', 'show')->name('pemeriksaan.show');
        Route::get('edit/{id}', 'edit')->name('pemeriksaan.edit');
        Route::put('update/{id}', 'update')->name('pemeriksaan.update');
        Route::delete('destroy/{id}', 'destroy')->name('pemeriksaan.destroy');
    });

require __DIR__.'/auth.php';

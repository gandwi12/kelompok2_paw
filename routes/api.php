<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Api\JadwalApiController;
use App\Http\Controllers\API\PemeriksaanRiwayatApiController;
use App\Http\Controllers\Api\BookingAPIController;


/*  Routes API untuk Fitur Users  */
Route::middleware('api')
    ->prefix('api')
    ->group(function () {
        //
    });


/*  Routes API untuk Fitur JadwalDokter  */
Route::get('/jadwal', [JadwalApiController::class, 'index']);
Route::get('/jadwal/{id}', [JadwalApiController::class, 'show']);


/*  Routes API untuk Fitur Bookings  */
Route::get('/booking', [BookingAPIController::class, 'index']);
Route::get('/booking/{id}', [BookingAPIController::class, 'show']);

/*  Routes API untuk Fitur Pemeriksaan  */
Route::middleware('api')
    ->prefix('api')
    ->group(function () {

        // Route API Riwayat Pemeriksaan Pasien
        Route::get('/riwayat-pemeriksaan', [PemeriksaanRiwayatApiController::class, 'index']);
        Route::post('/riwayat-pemeriksaan', [PemeriksaanRiwayatApiController::class, 'store']);
        Route::get('/riwayat-pemeriksaan/{id}', [PemeriksaanRiwayatApiController::class, 'show']);
        Route::put('/riwayat-pemeriksaan/{id}', [PemeriksaanRiwayatApiController::class, 'update']);
        Route::delete('/riwayat-pemeriksaan/{id}', [PemeriksaanRiwayatApiController::class, 'destroy']);
    });

/*  Routes API untuk Fitur PemberianObat  */
Route::middleware('api')
    ->prefix('api')
    ->group(function () {
        //
    });
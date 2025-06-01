<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\JadwalApiController;

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
Route::middleware('api')
    ->prefix('api')
    ->group(function () {
        //
    });

/*  Routes API untuk Fitur Pemeriksaan  */
Route::middleware('api')
    ->prefix('api')
    ->group(function () {
        //
    });

/*  Routes API untuk Fitur PemberianObat  */
Route::middleware('api')
    ->prefix('api')
    ->group(function () {
        //
    });
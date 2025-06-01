<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BookingAPIController;

/*  Routes API untuk Fitur Users  */
Route::middleware('api')
    ->prefix('api')
    ->group(function () {
        //
    });


/*  Routes API untuk Fitur JadwalDokter  */
Route::middleware('api')
    ->prefix('api')
    ->group(function () {
        //
    });


/*  Routes API untuk Fitur Bookings  */
Route::middleware('api')
    ->prefix('api')
    ->group(function () {
Route::get('/booking', [BookingAPIController::class, 'index']);
Route::get('/booking/{id}', [BookingAPIController::class, 'show']);

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
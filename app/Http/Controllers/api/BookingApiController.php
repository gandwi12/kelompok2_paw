<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Booking; // <- ini penting
use Illuminate\Http\Request;

class BookingAPIController extends Controller
{
    public function index()
    {
        // Ambil semua data booking beserta data dokter terkait
        $bookings = Booking::with('doctor')->get();

        // Kembalikan dalam format JSON
        return response()->json($bookings);
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Jadwal;
use App\Models\JadwalDokters;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $doctors = JadwalDokters::all();
        $bookings = Booking::with('doctor')->get();

        return view('bookings.index', compact('doctors', 'bookings'));
    }

    public function create(Request $request)
    {
        $jadwal = JadwalDokters::findOrFail($request->doctor);
        return view('bookings.create', compact('jadwal'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'doctor_id' => 'required|exists:jadwal_dokters,id',
            'nama'      => 'required|string',
            'nim'       => 'required|string',
            'diagnosa'  => 'required|string',
        ]);

        $data['user_id'] = 0; // Dummy user_id, bisa diganti jika pakai auth

        Booking::create($data);

        return redirect()->route('bookings.index')
                         ->with('success', 'Booking berhasil!');
    }

    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $doctors = JadwalDokters::all();
        return view('bookings.edit', compact('booking', 'doctors'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $data = $request->validate([
            'doctor_id' => 'required|exists:jadwal_dokters,id',
            'nama'      => 'required|string',
            'nim'       => 'required|string',
            'diagnosa'  => 'required|string',
        ]);

        $booking->update($data);

        return redirect()->route('bookings.index')
                         ->with('success', 'Booking diperbarui!');
    }

    public function destroy($id)
    {
        Booking::findOrFail($id)->delete();

        return redirect()->route('bookings.index')
                         ->with('success', 'Booking dibatalkan.');
    }
}

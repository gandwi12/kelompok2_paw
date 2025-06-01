<?php
namespace App\Http\Controllers;
use App\Models\Booking;
use App\Models\Jadwal;
use Illuminate\Http\Request;

class BookingController extends Controller
{
    public function index()
    {
        $doctors = Jadwal::all();
    
        // Tampilkan semua booking tanpa filter user
        $bookings = Booking::with('doctor')->get();

        return view('bookings.index', compact('doctors', 'bookings'));
    }

    public function create(Request $request)
    {
        $jadwal = Jadwal::findOrFail($request->doctor);
        return view('bookings.create', compact('jadwal'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'doctor_id' => 'required|exists:jadwals,id',
            'nama'      => 'required|string',
            'nim'       => 'required|string',
            'diagnosa'  => 'required|string',
    ]);

    // Berikan nilai dummy untuk user_id
        $data['user_id'] = 0; // atau nilai apa pun yang Anda inginkan

        Booking::create($data);

        return redirect()->route('bookings.index')
                        ->with('success', 'Booking berhasil!');
}


    public function edit($id)
    {
        $booking = Booking::findOrFail($id);
        $doctors = Jadwal::all();
        return view('bookings.edit', compact('booking', 'doctors'));
    }

    public function update(Request $request, $id)
    {
        $booking = Booking::findOrFail($id);
        $data = $request->validate([
            'doctor_id' => 'required|exists:jadwals,id',
            'nama'      => 'required|string',  // tambahkan
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
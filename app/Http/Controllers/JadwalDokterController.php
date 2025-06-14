<?php

namespace App\Http\Controllers;


use App\Models\JadwalDokters;
use Illuminate\Http\Request;

class JadwalDokterController extends Controller
{
    public function index()
    {
        $jadwals = JadwalDokters::all();
        return view('jadwals.index', compact('jadwals'));
    }

    public function create()
    {
        return view('jadwals.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_dokter' => 'required|string',
            'hari' => 'required|string',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        JadwalDokters::create($validated);

        return redirect()->route('jadwals.index')
                         ->with('success', 'Jadwal berhasil ditambahkan');
    }

    public function edit($id)
    {
        $jadwal = JadwalDokters::findOrFail($id);
        return view('jadwals.edit', compact('jadwal'));
    }

    public function update(Request $request, $id)
    {
        $jadwal = JadwalDokters::findOrFail($id);

        $validated = $request->validate([
            'nama_dokter' => 'required|string',
            'hari' => 'required|string',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $jadwal->update($validated);

        return redirect()->route('jadwals.index')
                         ->with('success', 'Jadwal berhasil diperbarui');
    }

    public function destroy($id)
    {
        $jadwal = JadwalDokters::findOrFail($id);
        $jadwal->delete();

        return redirect()->route('jadwals.index')
                         ->with('success', 'Jadwal berhasil dihapus');
    }
}

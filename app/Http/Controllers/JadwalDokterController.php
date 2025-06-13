<?php

namespace App\Http\Controllers;

use App\Models\JadwalDokter;
use Illuminate\Http\Request;


class JadwalDokterController extends Controller
{
    // GET /api/jadwal
     public function index()
    {
        $jadwals = JadwalDokter::all();
        return view('jadwals.index', compact('jadwals'));
    
    }

    public function create() 
    {
    return view('jadwals.create'); 
    }

    // GET /api/jadwal/{id}
    public function show($id)
    {
        $jadwal = JadwalDokter::find($id);
        if (!$jadwal) {
            return response()->json(['message' => 'Jadwal tidak ditemukan'], 404);
        }
        return response()->json($jadwal);
    }

    // POST /api/jadwal
    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_dokter' => 'required|string',
            'hari' => 'required|string',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $jadwal = JadwalDokter::create($validated);
        return redirect()->route('jadwals.index')->with('success', 'Jadwal berhasil ditambahkan');
    }

    // PUT /api/jadwal/{id}
    public function update(Request $request, $id)
    {
        $jadwal = JadwalDokter::find($id);
        if (!$jadwal) {
            return response()->json(['message' => 'Jadwal tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'nama_dokter' => 'required|string',
            'hari' => 'required|string',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required',
        ]);

        $jadwal->update($validated);
        return redirect()->route('jadwals.index')->with('success', 'Jadwal berhasil diperbarui');
    }


    public function edit($id) 
    {
        $jadwal = JadwalDokter::findOrFail($id);
        return view('jadwals.edit', compact('jadwal'));
    }


    // DELETE /api/jadwal/{id}
    public function destroy($id)
    {
        $jadwal = JadwalDokter::find($id);
        if (!$jadwal) {
        return redirect()->route('jadwals.index')->with('error', 'Jadwal tidak ditemukan');
    }

    $jadwal->delete();
    return redirect()->route('jadwals.index')->with('success', 'Jadwal berhasil dihapus');
    }
}

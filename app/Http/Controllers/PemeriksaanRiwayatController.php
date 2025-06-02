<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemeriksaanRiwayat;


class PemeriksaanRiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     * Menampilkan semua riwayat pemeriksaan pasien.
     */
    public function index()
    {
        $riwayats = PemeriksaanRiwayat::with('mahasiswa')->get();
        return view('pemeriksaan.index', compact('riwayats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pemeriksaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'pasien_id' => 'required|integer',
            'tanggal_pemeriksaan' => 'required|date',
            'diagnosa' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);

        $riwayat = PemeriksaanRiwayat::create($validated);

        return response()->json([
            'message' => 'Riwayat pemeriksaan berhasil dibuat',
            'data' => $riwayat
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $riwayat = PemeriksaanRiwayat::find($id);

        if (!$riwayat) {
            return response()->json(['message' => 'Riwayat tidak ditemukan'], 404);
        }

        return response()->json($riwayat, 200);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $riwayat = PemeriksaanRiwayat::find($id);

        if (!$riwayat) {
            return redirect()->route('pemeriksaan_riwayat.index')->with('error', 'Data tidak ditemukan.');
        }

        return view('pemeriksaan.edit', compact('riwayat'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $riwayat = PemeriksaanRiwayat::find($id);

        if (!$riwayat) {
            return response()->json(['message' => 'Riwayat tidak ditemukan'], 404);
        }

        $validated = $request->validate([
            'pasien_id' => 'sometimes|integer',
            'tanggal_pemeriksaan' => 'sometimes|date',
            'diagnosa' => 'sometimes|string',
            'keterangan' => 'nullable|string',
        ]);

        $riwayat->update($validated);

        return response()->json([
            'message' => 'Riwayat berhasil diperbarui',
            'data' => $riwayat
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $riwayat = PemeriksaanRiwayat::find($id);

        if (!$riwayat) {
            return response()->json(['message' => 'Riwayat tidak ditemukan'], 404);
        }

        $riwayat->delete();

        return response()->json(['message' => 'Riwayat berhasil dihapus'], 200);
    }
}

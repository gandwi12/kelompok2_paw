<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PemeriksaanRiwayat;
use App\Models\Mahasiswa;
use Illuminate\Support\Facades\Log;


class PemeriksaanRiwayatController extends Controller
{
    /**
     * Display a listing of the resource.
     * Menampilkan semua riwayat pemeriksaan pasien.
     */
   public function index()
{
    $riwayats = PemeriksaanRiwayat::latest()->get();
    return view('Pemeriksaan.index', compact('riwayats'));
}


    /**
     * Show the form for creating a new resource.
     */
    public function create()
{
    $mahasiswa = Mahasiswa::all(); // kalau mau pakai data mahasiswa di form
    return view('Pemeriksaan.create', compact('mahasiswa'));
}


    /**
     * Store a newly created resource in storage.
     */
   public function store(Request $request)
{
    $validated = $request->validate([
        'nama_mahasiswa' => 'required|string|max:255',
        'tanggal_pemeriksaan' => 'required|date',
        'diagnosa' => 'required|string',
        'keterangan' => 'nullable|string',
    ]);

    PemeriksaanRiwayat::create($validated);

    return redirect()->route('pemeriksaan_riwayat.index')
                     ->with('success', 'Riwayat pemeriksaan berhasil disimpan');
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
   public function edit($id)
{
    $pemeriksaanRiwayat = PemeriksaanRiwayat::findOrFail($id);
    $mahasiswa = Mahasiswa::all();

    return view('Pemeriksaan.edit', compact('pemeriksaanRiwayat', 'mahasiswa'));
}



    /**
     * Update the specified resource in storage.
     */
  public function update(Request $request, $id)
{
    $validated = $request->validate([
        'nama_mahasiswa' => 'required|string|max:255',
        'tanggal_pemeriksaan' => 'required|date',
        'diagnosa' => 'required|string',
        'keterangan' => 'nullable|string',
    ]);

    $riwayat = PemeriksaanRiwayat::findOrFail($id);
    $riwayat->update($validated);

    // Redirect ke halaman index atau show dengan pesan sukses
    return redirect()->route('pemeriksaan_riwayat.index')
        ->with('success', 'Riwayat berhasil diperbarui');
}




    /**
     * Remove the specified resource from storage.
     */
   public function destroy($id)
{
    Log::info("Menerima request hapus dengan ID: $id");

    $riwayat = PemeriksaanRiwayat::find($id);
    if (!$riwayat) {
        Log::warning("Data dengan ID $id tidak ditemukan");
        return response()->json(['message' => 'Riwayat tidak ditemukan'], 404);
    }

    $riwayat->delete();
    Log::info("Data dengan ID $id berhasil dihapus");

    return redirect()->route('pemeriksaan_riwayat.index')
        ->with('success', 'Riwayat berhasil dihapus');
}


}

<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\JadwalDokters; // atau JadwalDokter, cek namanya

class JadwalApiController extends Controller
{
    public function index()
    {
        return response()->json(JadwalDokters::all());
    }

    public function show($id)
    {
        $jadwal = JadwalDokters::find($id);

        if (!$jadwal) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }

        return response()->json($jadwal);
    }
}

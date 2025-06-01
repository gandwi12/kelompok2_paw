<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\JadwalDokter;

class JadwalApiController extends Controller
{
    
    public function index()
    {
        $jadwal = JadwalDokter::all();
        return response()->json($jadwal);
    }


    public function show($id)
    {
        $jadwal = JadwalDokter::find($id);

        if (!$jadwal) {
            return response()->json(['message' => 'Jadwal tidak ditemukan'], 404);
        }

        return response()->json($jadwal);
    }
}

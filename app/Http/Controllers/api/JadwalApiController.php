<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\JadwalDokter;

class JadwalApiController extends Controller
{
    public function index()
    {
        return response()->json(JadwalDokter::all());
    }
}
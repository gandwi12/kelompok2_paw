<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\PemberianObat;
use Illuminate\Http\Request;

class PemberianObatApiController extends Controller
{
    public function index()
    {
        // Ambil semua data pemberian obat beserta relasi obat dan user
        $pemberians = PemberianObat::with(['obat', 'user'])->get();

        // Kembalikan dalam format JSON
        return response()->json($pemberians);
    }
}

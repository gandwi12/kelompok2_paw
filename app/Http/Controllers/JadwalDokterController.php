<?php

namespace App\Http\Controllers;

use App\Models\JadwalDokter;
use App\Models\User;
use Illuminate\Http\Request;

class JadwalDokterController extends Controller
{
    
    public function index()
    {
        $jadwals = JadwalDokter::with('dokter')->get(); 
        return view('jadwal.index', compact('jadwals'));
    }


    public function create()
    {
        $dokters = User::where('role', 'dokter')->get(); 
        return view('jadwal.create', compact('dokters'));
    }

}

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

    public function store(Request $request)
    {
        $request->validate([
            'dokter_id' => 'required|exists:users,id',
            'hari' => 'required',
            'jam_mulai' => 'required',
            'jam_selesai' => 'required|after:jam_mulai',
        ]);

        JadwalDokter::create($request->all());

        return redirect()->route('jadwal.index')->with('success', 'Jadwal berhasil ditambahkan');
    }

   
    public function show(string $id)
    {
        $jadwal = JadwalDokter::with('dokter')->findOrFail($id);
        return view('jadwal.show', compact('jadwal'));
    }

  
    public function edit(string $id)
    {
        $jadwal = JadwalDokter::findOrFail($id);
        $dokters = User::where('role', 'dokter')->get();
        return view('jadwal.edit', compact('jadwal', 'dokters'));
    }




}

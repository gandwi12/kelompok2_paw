<?php

namespace App\Http\Controllers;

use App\Models\PemberianObat;
use App\Models\Obat; // pastikan ada model Obat
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemberianObatController extends Controller
{
    // GET /pemberian-obat
    public function index()
    {
        $obats = PemberianObat::with(['obat', 'user'])->get();
        return view('Pemberian.index', compact('obats'));
    }

    // GET /pemberian-obat/create
    public function create()
    {
        $obats = PemberianObat::all(); // ambil semua obat untuk dropdown
        return view('Pemberian.create', compact('obats'));
    }

    // GET /pemberian-obat/{id}
    public function show($id)
    {
        $pemberian = PemberianObat::with(['obat', 'user'])->find($id);
        if (!$pemberian) {
            return response()->json(['message' => 'Data tidak ditemukan'], 404);
        }
        return response()->json($pemberian);
    }

    // POST /pemberian-obat
    public function store(Request $request)
    {
        $validated = $request->validate([
            'obat_id'        => 'required|exists:obats,id',
            'diberikan_pada' => 'required|date',
            'catatan'        => 'nullable|string',
        ]);

        $validated['user_id'] = Auth::id(); // set user id dari user login

        PemberianObat::create($validated);

        return redirect()->route('pemberian.index')->with('success', 'Pemberian obat berhasil disimpan.');
    }

    // GET /pemberian-obat/{id}/edit
    public function edit($id)
    {
        $pemberian = PemberianObat::findOrFail($id);
        $obats = PemberianObat::all();
        return view('Pemberian.edit', compact('pemberian', 'obats'));
    }

    // PUT /pemberian-obat/{id}
    public function update(Request $request, $id)
    {
        $pemberian = PemberianObat::find($id);
        if (!$pemberian) {
            return redirect()->route('pemberian.index')->with('error', 'Data tidak ditemukan.');
        }

        $validated = $request->validate([
            'obat_id'        => 'required|exists:obats,id',
            'diberikan_pada' => 'required|date',
            'catatan'        => 'nullable|string',
        ]);

        $validated['user_id'] = Auth::id();

        $pemberian->update($validated);

        return redirect()->route('pemberian.index')->with('success', 'Data berhasil diperbarui.');
    }

    // DELETE /pemberian-obat/{id}
    public function destroy($id)
    {
        $pemberian = PemberianObat::find($id);
        if (!$pemberian) {
            return redirect()->route('pemberian.index')->with('error', 'Data tidak ditemukan.');
        }

        $pemberian->delete();
        return redirect()->route('pemberian.index')->with('success', 'Data berhasil dihapus.');
    }
}
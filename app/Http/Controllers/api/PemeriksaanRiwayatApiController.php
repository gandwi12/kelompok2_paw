<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\PemeriksaanRiwayat; 
use Illuminate\Support\Facades\Validator;

class PemeriksaanRiwayatApiController extends Controller
{
    /**
     * Menampilkan semua riwayat pemeriksaan (bisa difilter per pasien)
     */
    public function index(Request $request)
    {
        if ($request->has('patient_id')) {
            $histories = PemeriksaanRiwayat::where('patient_id', $request->patient_id)->get();
        } else {
            $histories = PemeriksaanRiwayat::all();
        }

        return response()->json([
            'status' => 'success',
            'data' => $histories
        ]);
    }

    /**
     * Menambahkan riwayat pemeriksaan baru
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'patient_id' => 'required|exists:patients,id',
            'exam_date' => 'required|date',
            'diagnosis' => 'required|string',
            'treatment' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'errors' => $validator->errors()
            ], 422);
        }

        $history = PemeriksaanRiwayat::create($validator->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Riwayat berhasil ditambahkan.',
            'data' => $history
        ], 201);
    }

    /**
     * Menampilkan detail riwayat pemeriksaan berdasarkan ID
     */
    public function show($id)
    {
        $history = PemeriksaanRiwayat::find($id);

        if (!$history) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data tidak ditemukan.'
            ], 404);
        }

        return response()->json([
            'status' => 'success',
            'data' => $history
        ]);
    }

    /**
     * Mengupdate data riwayat pemeriksaan berdasarkan ID
     */
    public function update(Request $request, $id)
    {
        $history = PemeriksaanRiwayat::find($id);

        if (!$history) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data tidak ditemukan.'
            ], 404);
        }

        $validator = Validator::make($request->all(), [
            'exam_date' => 'sometimes|required|date',
            'diagnosis' => 'sometimes|required|string',
            'treatment' => 'nullable|string',
            'notes' => 'nullable|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'fail',
                'errors' => $validator->errors()
            ], 422);
        }

        $history->update($validator->validated());

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil diperbarui.',
            'data' => $history
        ]);
    }

    /**
     * Menghapus riwayat pemeriksaan berdasarkan ID
     */
    public function destroy($id)
    {
        $history = PemeriksaanRiwayat::find($id);

        if (!$history) {
            return response()->json([
                'status' => 'fail',
                'message' => 'Data tidak ditemukan.'
            ], 404);
        }

        $history->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Data berhasil dihapus.'
        ]);
    }
}

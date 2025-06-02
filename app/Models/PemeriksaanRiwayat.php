<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mahasiswa;

class PemeriksaanRiwayat extends Model
{
    protected $table = 'pemeriksaan_riwayat'; // nama tabel di database

    protected $fillable = [
        'pasien_id',
        'tanggal_pemeriksaan',
        'diagnosa',
        'keterangan',
    ];

    // Relasi ke model Pasien
    public function mahasiswa()
{
    return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id');
}

}

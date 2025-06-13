<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    protected $table = 'mahasiswa'; // sesuaikan nama tabel di DB

    protected $fillable = [
        'nama_mahasiswa',
        'alamat',
        'tanggal_lahir',
        // kolom lain yang relevan
    ];

    // Relasi ke pemeriksaan riwayat
    public function pemeriksaanRiwayat()
    {
        return $this->hasMany(PemeriksaanRiwayat::class, 'nama_mahasiswa', 'nama');
    }
}

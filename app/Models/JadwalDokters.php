<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalDokters extends Model
{
    use HasFactory;

    protected $table = 'jadwal_dokters'; // Tambahkan ini untuk mapping ke tabel yang benar

    protected $fillable = [
        'nama_dokter',
        'hari',
        'jam_mulai',
        'jam_selesai',
    ];
}

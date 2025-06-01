<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JadwalDokter extends Model
{
    protected $table = 'jadwal_dokter'; // pastikan sama dengan nama tabel di migration

    protected $fillable = [
        'dokter_id',
        'hari',
        'jam_mulai',
        'jam_selesai',
    ];

    // relasi ke tabel users, asumsinya dokter disimpan di tabel users
    public function dokter()
    {
        return $this->belongsTo(User::class, 'dokter_id');
    }
}

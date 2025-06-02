<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PemberianObat extends Model
{
    protected $table = 'pemberian_obats';

    protected $fillable = [
        'nama_obat',
        'keterangan',
        'status',
        'diberikan_pada',
        'user_id',
        'catatan'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}


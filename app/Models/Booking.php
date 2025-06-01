<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'doctor_id', 'nama', 'nim', 'diagnosa'];

    public function doctor()
    {
        return $this->belongsTo(Jadwal::class, 'doctor_id');
    }
}
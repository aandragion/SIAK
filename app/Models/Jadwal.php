<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jadwal extends Model
{
    use HasFactory;
    protected $table = "jadwal";
    protected $primaryKey = "id_jadwal";
    protected $fillable = [
        'id_jadwal', 'id_kmatkul', 'id_dosen', 'id','kelas', 'hari', 'jam_mulai','jam_selesai','kapasitas'
    ];
}

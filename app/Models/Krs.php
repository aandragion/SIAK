<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Krs extends Model
{
    use HasFactory;
    protected $table = "krs";
    protected $primaryKey = "id_krs";
    protected $fillable = [
        'id_krs',
        'id_jadwal',
        'id_mhs',
        'id_snilai',
        'uts',
        'uas',
        'tugas',
        'status'
    ];
}
 
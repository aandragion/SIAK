<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pegawai extends Model
{
    use HasFactory;
    protected $connection ="mysql2";

    protected $table = "pegawai";
    protected $primaryKey = "id_pegawai";
    protected $fillable = [
        'id_pegawai',
        'namapegawai',
        'nip',
        'tempattanggallahir',
        'agama',
        'alamat'
    ];
}

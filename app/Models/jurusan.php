<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class jurusan extends Model
{
    use HasFactory;
    protected $table = "jurusan";
    protected $primaryKey = "id_programstudi";
    protected $fillable = [
        'id_programstudi', 'kode_jurusan', 'nama_jurusan','jenjang', 'jumlah_semester', 'angkatan_prodi','id_fakultas','angkatan_prodi',
    ];
}

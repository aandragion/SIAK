<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;
    protected $table = "dosen";
    protected $primaryKey = "id_dosen";
    protected $fillable = [
        'id_dosen',
        'nik',
        'nidn',
        'nama_dosen',
        'jabatan',
        'jns_kelamin_dsn',
        'tempat_lahir_dsn',
        'tgl_lahir_dsn',
        'alamat_dsn', 
        'tlp_dsn',
        'pendidikan',
        'photo_dsn',
    ];
}

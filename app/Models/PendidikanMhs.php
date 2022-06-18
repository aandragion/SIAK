<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PendidikanMhs extends Model
{
    use HasFactory;
    protected $table = "pendidikan_mhs";
    protected $primaryKey = "id_pdmhs";
    protected $fillable = [
        'id_mhs', 
        'nama_sekolah', 
        'alamat_sekolah ', 
        'tlp_sekolah', 
        'npsn', 
        'status_sekolah',
        'jurusan_sekolah',
        'organisasi',
        'prestasi'
    ];
}

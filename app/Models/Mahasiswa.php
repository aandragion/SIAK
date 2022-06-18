<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = "mahasiswa";
    protected $primaryKey = "id_mhs";
    protected $fillable = [
        'id_mhs',
		'id',
        'nim', 
        'nama_mhs', 
        'tempat_lahir', 
        'tgl_lahir', 
        'jns_kelamin', 
        'agama', 
        'id_programstudi',
        'angkatan', 
        'no_tlp', 
        'alamat', 
        'rt', 
        'rw', 
        'dusun', 
        'kelurahan', 
        'kecamatan', 
        'kode_pos', 
        'jns_tinggal', 
        'alat_tranportasi', 
        'email', 
        'nik', 
        'nisn', 
        'npwp', 
        'kewarganegaraan', 
        'photo', 
        'status', 
        'anak_ke',
        'jml_saudara',
        'id_jalurmasuk',
        'kps',
		'smt_mahasiswa'
    ];
}

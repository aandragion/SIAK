<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrtuMhs extends Model
{
    use HasFactory; 
    protected $table = "ortu_mhs";
    protected $primaryKey = "id_ortumhs";
    protected $fillable = [
        'id_mhs', 
        'nik_ayah', 
        'nama_ayah ', 
        'tgllhr_ayah', 
        'pendidikan_ayah', 
        'kerja_ayah',
        'hsl_ayah',
        'nik_ibu', 
        'nama_ibu', 
        'tgllhr_ibu', 
        'pendidikan_ibu', 
        'kerja_ibu',
        'hsl_ibu',
        'nama_wali',
        'tgllhr_wali',
        'pendidikan_wali',
        'kerja_wali',
        'hsl_wali',
        'alamat_ortu',
        'alamat_wali',
        'tlp_ortu',
        'tlp_wali',

    ];
}

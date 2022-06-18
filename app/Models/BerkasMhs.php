<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BerkasMhs extends Model
{
    use HasFactory;
    protected $table = "berkas_mhs";
    protected $primaryKey = "id_bksmhs";
    protected $fillable = [
        'id_mhs', 
        'ijazah', 
        'ktp', 
        'kk', 
        'akta_lhr', 
        'sertifikat',
    ];
}

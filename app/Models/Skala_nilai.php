<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Skala_nilai extends Model
{
    use HasFactory;
    protected $table = "skala_nilai";
    protected $primaryKey = "id_snilai";
    protected $fillable = [
        'id_snilai', 'grade', 'mutu', 'n_atas', 'n_bawah','keterangan'
    ];
}
 
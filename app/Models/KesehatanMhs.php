<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KesehatanMhs extends Model
{
    use HasFactory;
    protected $table = "kesehatan_mhs";
    protected $primaryKey = "id_kesehatanmhs";
    protected $fillable = [
        'id_mhs', 
        'gdarah', 
        'rpenyakit', 
        'tb', 
        'bb',
    ];
}

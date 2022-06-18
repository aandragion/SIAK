<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JalurMasuk extends Model
{
    use HasFactory;
    protected $table = "tb_jalurmasuk";
    protected $primaryKey = "id_jalurmasuk";
    protected $fillable = [
        'id_jalurmasuk',
        'jalur_masuk', 
       
    ];
}

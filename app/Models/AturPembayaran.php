<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AturPembayaran extends Model
{
    use HasFactory;
    protected $table = "tb_aturpembayaranspp";
    protected $primaryKey = "id_spp";
    protected $fillable = [
        'id_spp',
        'id_programstudi',
        'biaya',
		'keterangan'
    ];
}

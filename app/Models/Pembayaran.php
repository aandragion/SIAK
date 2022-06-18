<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    use HasFactory;
    protected $table = "tb_pembayaranspp";
    protected $primaryKey = "id_pembayaranspp";
    protected $fillable = [
        'id_pembayaranspp',
        'id_mhs',
        'id_spp',
        'bulan',
		'tanggal_setor',
        'bayar',
        'statusspp'
        
    ];
}

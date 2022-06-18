<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kurikulum extends Model
{
    use HasFactory;
    protected $table = "kurikulum";
    protected $primaryKey = "id_kurikulum";
    protected $fillable = [
        'id_kurikulum', 'nama_kurikulum','id_programstudi', 'id_periode'
    ];
}

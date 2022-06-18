<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kmatkul extends Model
{
    use HasFactory;
    protected $table = "kmatkul";
    protected $primaryKey = "id_kmatkul";
    protected $fillable = [
        'id_matkul', 'id_kurikulum','semester'
    ];
}

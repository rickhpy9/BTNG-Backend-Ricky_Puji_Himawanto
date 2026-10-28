<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mobil extends Model
{
    protected $fillable = [
        'nama', 'brand', 'harga', 'tahun',
        'transmisi', 'bahan_bakar', 'status', 'foto',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pendidikan extends Model
{
    use HasFactory;

    protected $fillable = [
        'jenjang',
        'institusi',
        'jurusan',
        'kota',
        'tanggal_lulus',
        'nilai_uan_ipk',
        'akreditasi'
        
    ];
}

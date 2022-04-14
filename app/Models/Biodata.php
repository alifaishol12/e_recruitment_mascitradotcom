<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Biodata extends Model
{
    use HasFactory;

    protected $fillable = [
        'no_ktp',
        'nama',
        'tanggal_lahir',
        'tempat_lahir',
        'email',
        'jenis_kelamin',
        'status_nikah',
        'kewarganegaraan',
        'agama',
        'provinsi',
        'kabupaten',
        'kecamatan',
        'desa',
        'alamat_ktp',
        'handphone',
        'no_npwp'
    ];

    public function nama_provinsi()
    {
        return $this->belongsTo(Province::class, 'provinsi', 'id');
    }
}

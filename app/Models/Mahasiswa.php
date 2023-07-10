<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'nama',
        'nim',
        'no_telp',
        'umur',
        'alamat',
        'tanggal_lahir',
        'jenis_kelamin',
        'image',
    ];
}

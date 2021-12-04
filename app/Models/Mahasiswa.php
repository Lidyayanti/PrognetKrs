<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Mahasiswa extends Authenticatable
{
    use HasFactory;

    protected $fillable = [
        'nim',
        'nama',
        'alamat',
        'telepon',
        'email',
        'password',
        'program_studi',
        'angkatan',
        'foto_mahasiswa'
    ];
}

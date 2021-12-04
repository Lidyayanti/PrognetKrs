<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matakuliah extends Model
{
    use HasFactory;

    protected $fillable = [
        'id',
        'kode',
        'nama_matakuliah',
        'semester',
        'sks',
        'prodi',
        'status_mk',
        'created_at',
        'updated_at'
    ];
}

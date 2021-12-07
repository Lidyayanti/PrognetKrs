<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiKrs extends Model
{
    use HasFactory;

    protected $table = "trx_krss";

    protected $fillaable = [
        'id',
        'tahun_ajaran',
        'semester',
        'mahasiswa_id',
        'matakuliah_id',
        'nilai',
        'created_at',
        'updated_at'
    ];

    public function Mahasiswa(){
        return $this->belongsTo(Mahasiswa::class,'mahasiswa_id','id');
    }

    public function Matakuliah(){
        return $this->belongsTo(Matakuliah::class,'matakuliah_id','id');
    }
}

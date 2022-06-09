<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class coa extends Model
{
    protected $table = "coa";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'id_coa', 'nama_coa', 'ket_keg', 'tahun', 'anggaran', 'prodi', 'realisasi_coa'
    ];
}

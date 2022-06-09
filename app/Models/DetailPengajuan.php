<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetailPengajuan extends Model
{
    protected $table = "detail_pengajuan";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'id_pengajuan', 'id_coa', 'realisasi', 'kegiatan', 'biaya', 'status'
    ];
}

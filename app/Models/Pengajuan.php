<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    protected $table = "pengajuan";
    protected $primaryKey = "id";
    protected $fillable = [
        'id', 'id_user', 'username','jumlah_pengajuan', 'prodi'
    ];
}

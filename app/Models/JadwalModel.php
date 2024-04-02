<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JadwalModel extends Model
{
    use HasFactory;
    protected $table        = "jadwal";
    protected $primaryKey   = "id_jadwal";
    protected $fillable     = ['id_jadwal','tanggal','waktu','hari'];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\MorphMany;

class JadwalModel extends Model
{
    use HasFactory;
    protected $table        = "jadwal";
    protected $primaryKey   = "id_jadwal";
    protected $fillable     = ['id_jadwal','tanggal','waktu','hari'];

    public function siswa ():BelongsToMany{
        return  $this->belongsToMany(SiswaModel::class);
    }
}
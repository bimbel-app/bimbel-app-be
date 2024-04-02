<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BelajarModel extends Model
{
    use HasFactory;
    protected $table        = "belajar";
    protected $primaryKey   = "id_belajar";
    protected $fillable     = ['id_belajar','id_siswa','id_tentor','id_jadwal','id_mapel'];

    //relasi ke siswa
    public function siswa()
    {
        return $this->belongsTo('App\Models\SiswaModel', 'id_siswa');
    }

    //relasi ke tentor
    public function tentor()
    {
        return $this->belongsTo('App\Models\TentorModel', 'id_tentor');
    }

    //relasi ke jadwal
    public function jadwal()
    {
        return $this->belongsTo('App\Models\JadwalModel', 'id_jadwal');
    }

    //relasi ke mapel
    public function mapel()
    {
        return $this->belongsTo('App\Models\MapelModel', 'id_mapel');
    }
}

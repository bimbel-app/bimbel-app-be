<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TentorModel extends Model
{
    use HasFactory;
    protected $table        = "tentor";
    protected $primaryKey   = "id_tentor";
    protected $fillable     = ['id_tentor','nama','asal_sekolah','alamat','pendidikan','pengalaman','keterangan'];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MapelModel extends Model
{
    use HasFactory;
    protected $table        = "mapel";
    protected $primaryKey   = "id_mapel";
    protected $fillable     = ['id_mapel','nama_mapel'];
}
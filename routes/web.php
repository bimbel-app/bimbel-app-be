<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Contracts\Session\Session;

use App\Http\Controllers\HalamanController;
use App\Http\Controllers\SessionController;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('index');
});

//Route untuk Data Siswa
Route::get('/siswa', 'SiswaController@siswatampil');
Route::post('/siswa/tambah','SiswaController@siswatambah');
Route::get('/siswa/hapus/{id_siswa}','SiswaController@siswahapus');
Route::put('/siswa/edit/{id_siswa}', 'SiswaController@siswaedit');

//Route untuk Data Home
Route::get('/home', function() { return view('view_home');});

//Route untuk Data Tentor
Route::get('/tentor', 'TentorController@tentortampil');
Route::post('/tentor/tambah','TentorController@tentortambah');
Route::get('/tentor/hapus/{id_tentor}','TentorController@tentorhapus');
Route::put('/tentor/edit/{id_tentor}', 'TentorController@tentoredit');

//Route untuk Data Jadwal
Route::get('/jadwal', 'JadwalController@jadwaltampil');
Route::post('/jadwal/tambah','JadwalController@jadwaltambah');
Route::get('/jadwal/hapus/{id_jadwal}','JadwalController@jadwalhapus');
Route::put('/jadwal/edit/{id_jadwal}', 'JadwalController@jadwaledit');

//Route untuk Data Mata Pelajaran
Route::get('/mapel', 'MapelController@mapeltampil');
Route::post('/mapel/tambah','MapelController@mapeltambah');
Route::get('/mapel/hapus/{id_mapel}','MapelController@mapelhapus');
Route::put('/mapel/edit/{id_mapel}', 'MapelController@mapeledit');

//Route untuk Data Mata Belajar
Route::get('/belajar', 'BelajarController@belajartampil');
Route::post('/belajar/tambah','BelajarController@belajartambah');
Route::get('/belajar/hapus/{id_belajar}','BelajarController@belajarhapus');
Route::put('/belajar/edit/{id_belajar}', 'BelajarController@belajaredit');

//Proses untuk melakukan routing
Route::get('/sesi', [SessionController::class, 'index']);
Route::post('/sesi/login', [SessionController::class, 'index']);
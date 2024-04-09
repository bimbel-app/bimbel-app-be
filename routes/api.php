<?php

use App\Http\Controllers\JadwalController;
use App\Http\Controllers\MapelController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\TentorController;
/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::post("register", [UserController::class,"register"]);
Route::post("login", [UserController::class,"login"]);
Route::post("add_user", [UserController::class,"add_user"]);


Route::middleware('jwt.auth')->group(function(){

    Route::prefix('siswa')->group(function(){
        Route::get("index", [SiswaController::class,"siswatampil"]);
        Route::get("index/{id}", [SiswaController::class,"siswatampilbyid"]);
        Route::post("add", [SiswaController::class,"siswatambah"]);
        Route::post("edit/{id}", [SiswaController::class,"siswaedit"]);
        Route::delete("delete/{id}", [SiswaController::class,"siswahapus"]);
});
Route::prefix('tentor')->group(function(){
    Route::get("index", [TentorController::class,"tentortampil"]);
    Route::get("index/{id}", [TentorController::class,"tentortampilbyid"]);
    Route::post("add", [TentorController::class,"tentortambah"]);
    Route::post("edit/{id}", [TentorController::class,"tentoredit"]);
    Route::delete("delete/{id}", [TentorController::class,"tentorhapus"]);
});

Route::prefix('jadwal')->group(function(){
    Route::get('index', [JadwalController::class,"jadwaltampil"]);
    Route::get("index/{id}", [JadwalController::class,"jadwaltampilbyid"]);
    Route::post("add", [JadwalController::class,"jadwaltambah"]);
    Route::post("edit/{id}", [JadwalController::class,"jadwaledit"]);
    Route::delete("delete/{id}", [JadwalController::class,"jadwalhapus"]); 
});

Route::prefix('mapel')->group( function(){
    Route::get('index', [MapelController::class,  'mapeltampil']);
    Route::get("index/{id}", [MapelController::class,"mapeltampilbyid"]);
    Route::post("add", [MapelController::class,"mapeltambah"]);
    Route::post("edit/{id}", [MapelController::class,"mapeledit"]);
    Route::delete("delete/{id}", [MapelController::class,"mapelhapus"]); 
});
});

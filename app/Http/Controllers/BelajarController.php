<?php

namespace App\Http\Controllers;

// use App\Models\SiswaModel;
// use App\Models\TentorModel;
use Illuminate\Http\Request;

//memanggil model BelajarModel
use App\Models\BelajarModel;

//memanggil model TentorModel
use App\Models\TentorModel;

//memanggil model SiswaModel
use App\Models\SiswaModel;

//memanggil model JadwalModel
use App\Models\JadwalModel;

//panggil model MapelModel
use App\Models\MapelModel;

class BelajarController extends Controller
{
    //method untuk tampil data belajar
    public function belajartampil()
    {
        $databelajar = BelajarModel::orderby('id_belajar', 'ASC')
        ->paginate(5);

        $datasiswa    = SiswaModel::all();
        $datatentor      = TentorModel::all();
        $datajadwal       = JadwalModel::all();
        $datamapel       = MapelModel::all();

        /* return response()->json([$datasiswa, 200]); */

        return view('halaman/view_belajar',['belajar'=>$databelajar,'siswa'=>$datasiswa,'tentor'=>$datatentor,'jadwal'=>$datajadwal,'mapel'=>$datamapel]);
    }

    //method untuk tambah data belajar
    public function belajartambah(Request $request)
    {
        $this->validate($request, [
            'id_siswa' => 'required',
            'id_tentor' => 'required',
            'id_jadwal' => 'required',
            'id_mapel' => 'required'
        ]);

        BelajarModel::create([
            'id_siswa' => $request->id_siswa,
            'id_tentor' => $request->id_tentor,
            'id_jadwal' => $request->id_jadwal,
            'id_mapel' => $request->id_mapel
        ]);

        return redirect('/belajar');
    }

     //method untuk hapus data belajar
     public function Belajarhapus($id_belajar)
     {
         $databelajar=BelajarModel::find($id_belajar);
         $databelajar->delete();
 
         return redirect()->back();
     }

     //method untuk edit data belajar
    public function belajaredit($id_belajar, Request $request)
    {
        $this->validate($request, [
            'id_siswa' => 'required',
            'id_tentor' => 'required',
            'id_jadwal' => 'required',
            'id_mapel' => 'required'
        ]);

        $id_belajar = BelajarModel::find($id_belajar);
        $id_belajar->id_siswa   = $request->id_siswa;
        $id_belajar->id_tentor      = $request->id_tentor;
        $id_belajar->id_jadwal  = $request->id_jadwal;
        $id_belajar->id_mapel   = $request->id_mapel;

        $id_belajar->save();

        return redirect()->back();
    }
}
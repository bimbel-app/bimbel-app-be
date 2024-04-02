<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model TentorModel
use App\Models\TentorModel;

class TentorController extends Controller
{
    //method untuk tampil data tentor
    public function tentortampil()
    {
        $datatentor = TentorModel::all();
        // return view('halaman/view_tentor',['tentor'=>$datatentor]);
        return response()->json($datatentor, 200);
    }
    public function tentortampilbyid($id_siswa)
    {
        $datatentor = TentorModel::find($id_siswa);
        // return view('halaman/view_tentor',['tentor'=>$datatentor]);
        return response()->json($datatentor, 200);
    }

    //method untuk tambah data tentor
    public function tentortambah(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'asal_sekolah' => 'required',
            'alamat' => 'required',
            'pendidikan' => 'required',
            'pengalaman' => 'required',
            'keterangan' => 'required'
            
        ]);

        TentorModel::create([
            'nama' => $request->nama,
            'asal_sekolah' => $request->asal_sekolah,
            'alamat' => $request->alamat,
            'pendidikan' => $request->pendidikan,
            'pengalaman' => $request->pengalaman,
            'keterangan' => $request->keterangan
            
        ]);

        // return redirect('/tentor');
        return response()->json(['message'=>'successfully add new data'], 201);
    }

     //method untuk hapus data tentor
     public function tentorhapus($id_tentor)
     {
         $datatentor=TentorModel::find($id_tentor);
         $datatentor->delete();
 
         return redirect()->back();
     }

     //method untuk edit data tentor
    public function tentoredit($id_tentor, Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'asal_sekolah' => 'required',
            'alamat' => 'required',
            'pendidikan' => 'required',
            'pengalaman' => 'required',
            'keterangan' => 'required'
            
        ]);

        $id_tentor = TentorModel::find($id_tentor);
        $id_tentor->nama   = $request->nama;
        $id_tentor->asal_sekolah      = $request->asal_sekolah;
        $id_tentor->alamat   = $request->alamat;
        $id_tentor->pendidikan  = $request->pendidikan;
        $id_tentor->pengalaman   = $request->pengalaman;
        $id_tentor->keterangan   = $request->keterangan;
        

        $id_tentor->save();

        return redirect()->back();
    }
}
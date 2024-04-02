<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model SiswaModel
use App\Models\SiswaModel;

class SiswaController extends Controller
{
    //method untuk tampil data siswa
    public function siswatampil()
    {
        $datasiswa = SiswaModel::all();

        // return view('halaman/view_siswa',['siswa'=>$datasiswa]);
        return response()->json($datasiswa, 200);
    }
    public function siswatampilbyid($id)
    {
        $datasiswa = SiswaModel::find($id);

        // return view('halaman/view_siswa',['siswa'=>$datasiswa]);
        return response()->json($datasiswa, 200);
    }

    //method untuk tambah data siswa
    public function siswatambah(Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'asal_sekolah' => 'required',
            'pendidikan' => 'required',
            'alamat' => 'required'
        ]);

        $data = SiswaModel::create([
            'nama' => $request->nama,
            'asal_sekolah' => $request->asal_sekolah,
            'pendidikan' => $request->pendidikan,
            'alamat' => $request->alamat
        ]);

        // return redirect('/siswa');
        return response()->json([
            'status' => 'OK',
            $data
        ],201);
    }

     //method untuk hapus data siswa
     public function siswahapus($id_siswa)
     {
         $datasiswa=SiswaModel::find($id_siswa);
         $datasiswa->delete();
 
         return response()->json(["message"=>"successfully delete data"]);
     }

     //method untuk edit data siswa
    public function siswaedit($id_siswa, Request $request)
    {
        $this->validate($request, [
            'nama' => 'required',
            'asal_sekolah' => 'required',
            'pendidikan' => 'required',
            'alamat' => 'required'
        ]);

        $id_siswa = SiswaModel::find($id_siswa);
        $id_siswa->nama   = $request->nama;
        $id_siswa->asal_sekolah      = $request->asal_sekolah;
        $id_siswa->pendidikan  = $request->pendidikan;
        $id_siswa->alamat   = $request->alamat;

        $id_siswa->save();

        // return redirect()->back();
        return response()->json(["message"=>"successfully edit data"], 200);
    }
}
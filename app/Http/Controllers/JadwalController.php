<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model JadwalModel
use App\Models\JadwalModel;

class JadwalController extends Controller
{
    //method untuk tampil data jadwal
    public function jadwaltampil()
    {
        $datajadwal = JadwalModel::all();

        // return view('halaman/view_jadwal',['jadwal'=>$datajadwal]);
        return response()->json($datajadwal, 200);
    }
    public function jadwaltampilbyid($id_jadwal)
    {
        $datajadwal = JadwalModel::find($id_jadwal);

        // return view('halaman/view_jadwal',['jadwal'=>$datajadwal]);
        return response()->json($datajadwal, 200);
    }

    //method untuk tambah data jadwal
    public function jadwaltambah(Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'waktu' => 'required',
            'hari' => 'required'
        ]);

        JadwalModel::create([
            'tanggal' => $request->tanggal,
            'waktu' => $request->waktu,
            'hari' => $request->hari
        ]);

        // return redirect('/jadwal');
        return response()->json(["message"=>"successfully add data"], 201);
    }
    
    //method untuk hapus data jadwal
    public function jadwalhapus($id_jadwal)
    {
        $datajadwal=JadwalModel::find($id_jadwal);
        $datajadwal->delete();
        
        //  return redirect()->back();
        return response()->json(["message"=>"successfully delete data"], 200);
    }
    
    //method untuk edit data jadwal
    public function jadwaledit($id_jadwal, Request $request)
    {
        $this->validate($request, [
            'tanggal' => 'required',
            'waktu' => 'required',
            'hari' => 'required'
        ]);
        
        $id_jadwal = JadwalModel::find($id_jadwal);
        $id_jadwal->tanggal   = $request->tanggal;
        $id_jadwal->waktu      = $request->waktu;
        $id_jadwal->hari  = $request->hari;
        
        $id_jadwal->save();
        
        // return redirect()->back();
        return response()->json([$request->all(), "message"=>"successfully edit data"], 200);
    }
}
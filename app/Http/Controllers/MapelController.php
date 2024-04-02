<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//panggil model MapelModel
use App\Models\MapelModel;

class MapelController extends Controller
{
    //method untuk tampil data mapel
    public function mapeltampil()
    {
        // $datamapel = MapelModel::orderby('nama_mapel', 'ASC')
        // ->paginate(5);
        $datamapel = MapelModel::all();

        // return view('halaman/view_mapel',['mapel'=>$datamapel]);
        return response()->json($datamapel);
    }
    public function mapeltampilbyid($id_mapel)
    {
        // $datamapel = MapelModel::orderby('nama_mapel', 'ASC')
        // ->paginate(5);
        $datamapel = MapelModel::find($id_mapel);

        // return view('halaman/view_mapel',['mapel'=>$datamapel]);
        return response()->json($datamapel);
    }
    
    //method untuk tambah data mapel
    public function mapeltambah(Request $request)
    {
        $this->validate($request, [
            'nama_mapel' => 'required'
        ]);
        
        MapelModel::create([
            'nama_mapel' => $request->nama_mapel
        ]);
        
        // return redirect('/mapel');
        return response()->json(["message"=>"successfully add data"]);
    }
    
    //method untuk hapus data mapel
    public function mapelhapus($id_mapel)
    {
        $datamapel=MapelModel::find($id_mapel);
        $datamapel->delete();
        
        //  return redirect()->back();
        return response()->json(["message"=>"successfully delete data"]);
    }
    
    //method untuk edit data mapel
    public function mapeledit($id_mapel, Request $request)
    {
        $this->validate($request, [
            'nama_mapel' => 'required'
        ]);

        $id_mapel = MapelModel::find($id_mapel);
        $id_mapel->nama_mapel   = $request->nama_mapel;
        $id_mapel->save();

        // return redirect()->back();
        return response()->json(["message"=>"successfully edit data"]);
    }
}
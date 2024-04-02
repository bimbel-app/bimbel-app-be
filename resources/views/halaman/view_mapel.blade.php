@extends('index')
@section('title', 'Mapel')

@section('isihalaman')
    <h3><center>Daftar Mata Pelajaran Bimbel Zinda</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalMapelTambah"> 
        Tambah Data Mapel 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Mata Pelajaran</td>
                <td align="center">Nama Mata Pelajaran</td>
        </thead>

        <tbody>
            @foreach ($mapel as $index=>$mp)
                <tr>
                    <td align="center" scope="row">{{ $index + $mapel->firstItem() }}</td>
                    <td>{{$mp->id_mapel}}</td>
                    <td>{{$mp->nama_mapel}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalMapelEdit{{$mp->id_mapel}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data Mapel -->
                        <div class="modal fade" id="modalMapelEdit{{$mp->id_mapel}}" tabindex="-1" role="dialog" aria-labelledby="modalMapelEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalMapelEditLabel">Form Edit Data Mata Pelajaran</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formmapeledit" id="formmapeledit" action="/mapel/edit/{{ $mp->id_mapel}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_mapel" class="col-sm-4 col-form-label">Nama Mapel</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" placeholder="Masukan Nama Pelajaran">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="mapeltambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data mapel -->
                        |
                        <a href="mapel/hapus/{{$mp->id_mapel}}" onclick="return confirm('Yakin mau dihapus?')">
                            <button class="btn-danger">
                                Delete
                            </button>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!--awal pagination-->
    Halaman : {{ $mapel->currentPage() }} <br />
    Jumlah Data : {{ $mapel->total() }} <br />
    Data Per Halaman : {{ $mapel->perPage() }} <br />

    {{ $mapel->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Mapel -->
    <div class="modal fade" id="modalMapelTambah" tabindex="-1" role="dialog" aria-labelledby="modalMapelTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalMapelTambahLabel">Form Input Data Mata Pelajaran</h5>
                </div>
                <div class="modal-body">
                    <form name="formmapeltambah" id="formmapeltambah" action="/mapel/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_buku" class="col-sm-4 col-form-label">Nama Pelajaran</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama_mapel" name="nama_mapel" placeholder="Masukan Nama Pelajaran">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="mapeltambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data Mapel -->
    
@endsection
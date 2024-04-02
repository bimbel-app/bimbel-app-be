@extends('index')
@section('title', 'Siswa')

@section('isihalaman')
    <h3><center>Daftar Siswa Bimbel Zinda</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalSiswaTambah"> 
        Tambah Data Siswa 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Siswa</td>
                <td align="center">Nama</td>
                <td align="center">Asal Sekolah</td>
                <td align="center">Pendidikan</td>
                <td align="center">Alamat</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($siswa as $index=>$sw)
                <tr>
                    <td align="center" scope="row">{{ $index + $siswa->firstItem() }}</td>
                    <td>{{$sw->id_siswa}}</td>
                    <td>{{$sw->nama}}</td>
                    <td>{{$sw->asal_sekolah}}</td>
                    <td>{{$sw->pendidikan}}</td>
                    <td>{{$sw->alamat}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalSiswaEdit{{$sw->id_siswa}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data Siswa -->
                        <div class="modal fade" id="modalSiswaEdit{{$sw->id_siswa}}" tabindex="-1" role="dialog" aria-labelledby="modalSiswaEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalSiswaEditLabel">Form Edit Data Siswa</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formsiswaedit" id="formsiswaedit" action="/siswa/edit/{{ $sw->id_siswa}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_siswa" class="col-sm-4 col-form-label">Nama</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="asal_sekolah" class="col-sm-4 col-form-label">Asal Sekolah</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="{{ $sw->asal_sekolah}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="pendidikan" class="col-sm-4 col-form-label">Pendidikan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="{{ $sw->pendidikan}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $sw->alamat}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="siswatambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data siswa -->
                        |
                        <a href="siswa/hapus/{{$sw->id_siswa}}" onclick="return confirm('Yakin mau dihapus?')">
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
    Halaman : {{ $siswa->currentPage() }} <br />
    Jumlah Data : {{ $siswa->total() }} <br />
    Data Per Halaman : {{ $siswa->perPage() }} <br />

    {{ $siswa->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Siswa -->
    <div class="modal fade" id="modalSiswaTambah" tabindex="-1" role="dialog" aria-labelledby="modalSiswaTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalSiswaTambahLabel">Form Input Data Siswa</h5>
                </div>
                <div class="modal-body">
                    <form name="formsiswatambah" id="formsiswatambah" action="/siswa/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_buku" class="col-sm-4 col-form-label">Nama</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="asal_sekolah" class="col-sm-4 col-form-label">Asal Sekolah</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" placeholder="Masukan Asal Sekolah">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="pendidikan" class="col-sm-4 col-form-label">Pendidikan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pendidikan" name="pendidikan" placeholder="Masukan Pendidikan">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="siswatambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data Siswa -->
    
@endsection
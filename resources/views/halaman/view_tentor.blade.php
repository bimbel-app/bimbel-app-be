@extends('index')
@section('title', 'Tentor')

@section('isihalaman')
    <h3><center>Daftar Tentor Bimbel Zinda</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalTentorTambah"> 
        Tambah Data Tentor 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Tentor</td>
                <td align="center">Nama</td>
                <td align="center">Asal Sekolah</td>
                <td align="center">Alamat</td>
                <td align="center">Pendidikan</td>
                <td align="center">Pengalaman</td>
                <td align="center">Keterangan</td>
                
            </tr>
        </thead>

        <tbody>
            @foreach ($tentor as $index=>$tt)
                <tr>
                    <td align="center" scope="row">{{ $index . $tentor->first() }}</td>
                    <td>{{$tt->id_tentor}}</td>
                    <td>{{$tt->nama}}</td>
                    <td>{{$tt->asal_sekolah}}</td>
                    <td>{{$tt->alamat}}</td>
                    <td>{{$tt->pendidikan}}</td>
                    <td>{{$tt->pengalaman}}</td>
                    <td>{{$tt->keterangan}}</td>
                    
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalTentorEdit{{$tt->id_tentor}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data Tentor -->
                        <div class="modal fade" id="modalTentorEdit{{$tt->id_tentor}}" tabindex="-1" role="dialog" aria-labelledby="modalTentorEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalTentorEditLabel">Form Edit Data Tentor</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formtentoredit" id="formtentoredit" action="/tentor/edit/{{ $tt->id_tentor}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_tentor" class="col-sm-4 col-form-label">Nama</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="nama" name="nama" placeholder="Masukan Nama">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="asal_sekolah" class="col-sm-4 col-form-label">Asal Sekolah</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="asal_sekolah" name="asal_sekolah" value="{{ $tt->asal_sekolah}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="alamat" name="alamat" value="{{ $tt->alamat}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="pendidikan" class="col-sm-4 col-form-label">Pendidikan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="pendidikan" name="pendidikan" value="{{ $tt->pendidikan}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="pengalaman" class="col-sm-4 col-form-label">Pengalaman</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="pengalaman" name="pengalaman" value="{{ $tt->pengalaman}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="keterangan" name="keterangan" value="{{ $tt->keterangan}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="tentortambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data tentor -->
                        |
                        <a href="tentor/hapus/{{$tt->id_tentor}}" onclick="return confirm('Yakin mau dihapus?')">
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
    Halaman : {{ $tentor->currentPage() }} <br />
    Jumlah Data : {{ $tentor->total() }} <br />
    Data Per Halaman : {{ $tentor->perPage() }} <br />

    {{ $tentor->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Tentor -->
    <div class="modal fade" id="modalTentorTambah" tabindex="-1" role="dialog" aria-labelledby="modalTentorTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalTentorTambahLabel">Form Input Data Tentor</h5>
                </div>
                <div class="modal-body">
                    <form name="formtentortambah" id="formtentortambah" action="/tentor/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_tentor" class="col-sm-4 col-form-label">Nama</label>
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
                            <label for="alamat" class="col-sm-4 col-form-label">Alamat</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="alamat" name="alamat" placeholder="Masukan Alamat">
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
                            <label for="pengalaman" class="col-sm-4 col-form-label">Pengalaman</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="pengalaman" name="pengalaman" placeholder="Masukan Pengalaman">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="keterangan" class="col-sm-4 col-form-label">Keterangan</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Masukan Keterangan">
                            </div>
                        </div>

                        

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="temtortambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data Tentor -->
    
@endsection
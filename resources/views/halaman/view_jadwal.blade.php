@extends('index')
@section('title', 'Jadwal')

@section('isihalaman')
    <h3><center>Daftar Jadwal Bimbel Zinda</center></h3>
    
    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalJadwalTambah"> 
        Tambah Data Jadwal 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Jadwal</td>
                <td align="center">Tanggal</td>
                <td align="center">Waktu</td>
                <td align="center">Hari</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($jadwal as $index=>$jw)
                <tr>
                    <td align="center" scope="row">{{ $index + $jadwal->firstItem() }}</td>
                    <td>{{$jw->id_jadwal}}</td>
                    <td>{{$jw->tanggal}}</td>
                    <td>{{$jw->waktu}}</td>
                    <td>{{$jw->hari}}</td>
                    <td align="center">
                        
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalJadwalEdit{{$jw->id_jadwal}}"> 
                            Edit
                        </button>
                         <!-- Awal Modal EDIT data Jadwal -->
                        <div class="modal fade" id="modalJadwalEdit{{$jw->id_jadwal}}" tabindex="-1" role="dialog" aria-labelledby="modalJadwalEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalJadwalEditLabel">Form Edit Data Jadwal</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formjadwaledit" id="formjadwaledit" action="/jadwal/edit/{{ $jw->id_jadwal}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_siswa" class="col-sm-4 col-form-label">Tanggal</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Masukan Tanggal">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="asal_sekolah" class="col-sm-4 col-form-label">Waktu</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="waktu" name="waktu" value="{{ $jw->waktu}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="hari" class="col-sm-4 col-form-label">Hari</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="hari" name="hari" value="{{ $jw->hari}}">
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="jadwaltambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data Jadwal -->
                        |
                        <a href="jadwal/hapus/{{$jw->id_jadwal}}" onclick="return confirm('Yakin mau dihapus?')">
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
    Halaman : {{ $jadwal->currentPage() }} <br />
    Jumlah Data : {{ $jadwal->total() }} <br />
    Data Per Halaman : {{ $jadwal->perPage() }} <br />

    {{ $jadwal->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Jadwal -->
    <div class="modal fade" id="modalJadwalTambah" tabindex="-1" role="dialog" aria-labelledby="modalJadwalTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalJadwalTambahLabel">Form Input Data Jadwal</h5>
                </div>
                <div class="modal-body">
                    <form name="formjadwaltambah" id="formjadwaltambah" action="/jadwal/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_jadwal" class="col-sm-4 col-form-label">Tanggal</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="tanggal" name="tanggal" placeholder="Masukan Tanggal">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="waktu" class="col-sm-4 col-form-label">Waktu</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="waktu" name="waktu" placeholder="Masukan Waktu">
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="hari" class="col-sm-4 col-form-label">Hari</label>
                            <div class="col-sm-8">
                                <input type="text" class="form-control" id="hari" name="hari" placeholder="Masukan Hari">
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="jadwaltambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data Jadwal -->
    
@endsection
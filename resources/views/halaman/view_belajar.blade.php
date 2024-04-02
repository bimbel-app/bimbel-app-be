
@extends('index')
@section('title', 'Belajar')

@section('isihalaman')
    <h3><center>Data Belajar</center><h3>
    <h3><center>Bimbel Zinda</center></h3>

    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modalBelajarTambah"> 
        Tambah Data Belajar 
    </button>

    <p>
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <td align="center">No</td>
                <td align="center">ID Belajar</td>
                <td align="center">ID Siswa</td>
                <td align="center">ID Tentor</td>
                <td align="center">ID Jadwal</td>
                <td align="center">ID Mapel</td>
                <td align="center">Aksi</td>
            </tr>
        </thead>

        <tbody>
            @foreach ($belajar as $index=>$b)
                <tr>
                    <td align="center" scope="row">{{ $index + $belajar->firstItem() }}</td>
                    <td align="center">{{$b->id_belajar}}</td>
                    <td>{{$b->siswa->id_siswa}}</td>
                    <td>{{$b->tentor->id_tentor}}</td>
                    <td>{{$b->jadwal->tanggal}}</td>
                    <td>{{$b->mapel->nama_mapel}}</td>
                    <td align="center">
                        <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#modalBelajarEdit{{$b->id_belajar}}"> 
                            Edit
                        </button>

                        <!-- Awal Modal EDIT data Belajar -->
                        <div class="modal fade" id="modalBelajarEdit{{$b->id_belajar}}" tabindex="-1" role="dialog" aria-labelledby="modalBelajarEditLabel" aria-hidden="true">
                            <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="modalBelajarEditLabel">Form Edit Data Belajar</h5>
                                    </div>
                                    <div class="modal-body">

                                        <form name="formbelajaredit" id="formbelajaredit" action="/belajar/edit/{{ $b->id_belajar}} " method="post" enctype="multipart/form-data">
                                            @csrf
                                            {{ method_field('PUT') }}
                                            <div class="form-group row">
                                                <label for="id_belajar" class="col-sm-4 col-form-label">ID Belajar</label>
                                                <div class="col-sm-8">
                                                    <input type="text" class="form-control" id="id_belajar" name="id_belajar" value="{{ $b->id_belajar}}" readonly>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="siswa" class="col-sm-4 col-form-label">Nama Siswa</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_siswa" name="id_siswa">
                                                        @foreach ($siswa as $sw)
                                                            @if ($sw->id_siswa == $b->id_siswa)
                                                                <option value="{{ $sw->id_siswa }}" selected>{{ $sw->nama_siswa }}</option>
                                                            @else
                                                                <option value="{{ $sw->id_siswa }}">{{ $sw->nama_siswa }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="tentor" class="col-sm-4 col-form-label">Nama Tentor</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_tentor" name="id_tentor">
                                                        @foreach ($tentor as $tt)
                                                            @if ($tt->id_tentor == $b->id_tentor)
                                                                <option value="{{ $tt->id_tentor }}" selected>{{ $tt->nama_tentor }}</option>
                                                            @else
                                                                <option value="{{ $tt->id_tentor }}">{{ $tt->nama_tentor }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="tanggal" class="col-sm-4 col-form-label">Tanggal</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_jadwal" name="id_jadwal">
                                                        @foreach ($jadwal as $jw)
                                                            @if ($jw->id_jadwal == $b->id_jadwal)
                                                                <option value="{{ $jw->id_jadwal }}" selected>{{ $jw->tanggal }}</option>
                                                            @else
                                                                <option value="{{ $jw->id_jadwal }}">{{ $jw->tanggal }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="form-group row">
                                                <label for="nama_mapel" class="col-sm-4 col-form-label">Nama Mapel</label>
                                                <div class="col-sm-8">
                                                    <select type="text" class="form-control" id="id_mapel" name="id_mapel">
                                                        @foreach ($mapel as $mp)
                                                            @if ($mp->id_mapel == $b->id_mapel)
                                                                <option value="{{ $mp->id_mapel }}" selected>{{ $mp->nama_mapel }}</option>
                                                            @else
                                                                <option value="{{ $mp->id_mapel }}">{{ $mp->nama_mapel }}</option>
                                                            @endif
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>

                                            <p>
                                            <div class="modal-footer">
                                                <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                                                <button type="submit" name="belajartambah" class="btn btn-success">Edit</button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Akhir Modal EDIT data Belajar -->
                        |
                        <a href="belajar/hapus/{{$b->id_belajar}}" onclick="return confirm('Yakin mau dihapus?')">
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
    Halaman : {{ $belajar->currentPage() }} <br />
    Jumlah Data : {{ $belajar->total() }} <br />
    Data Per Halaman : {{ $belajar->perPage() }} <br />

    {{ $belajar->links() }}
    <!--akhir pagination-->

    <!-- Awal Modal tambah data Belajar -->
    <div class="modal fade" id="modalBelajarTambah" tabindex="-1" role="dialog" aria-labelledby="modalBelajarTambahLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="modalBelajarTambahLabel">Form Input Data Belajar</h5>
                </div>
                <div class="modal-body">

                    <form name="formbelajartambah" id="formbelajartambah" action="/belajar/tambah " method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group row">
                            <label for="id_siswa" class="col-sm-4 col-form-label">Nama Siswa</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_siswa" name="id_siswa" placeholder="Pilih Nama Siswa">
                                    <option></option>
                                    @foreach($siswa as $sw)
                                        <option value="{{ $sw->id_siswa }}">{{ $sw->id_siswa }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="id_tentor" class="col-sm-4 col-form-label">Nama Tentor</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_tentor" name="id_tentor" placeholder="Pilih Nama Tentor">
                                    <option></option>
                                    @foreach($tentor as $tt)
                                        <option value="{{ $tt->id_tentor }}">{{ $tt->id_tentor }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="id_jadwal" class="col-sm-4 col-form-label">Tanggal</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_jadwal" name="id_jadwal" placeholder="Pilih Jadwal">
                                    <option></option>
                                    @foreach($jadwal as $jw)
                                        <option value="{{ $jw->id_jadwal }}">{{ $jw->tanggal }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="form-group row">
                            <label for="id_mapel" class="col-sm-4 col-form-label">Mata Pelajaran</label>
                            <div class="col-sm-8">
                                <select type="text" class="form-control" id="id_mapel" name="id_mapel" placeholder="Pilih Mapel">
                                    <option></option>
                                    @foreach($mapel as $mp)
                                        <option value="{{ $mp->id_mapel }}">{{ $mp->nama_mapel }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <p>
                        <div class="modal-footer">
                            <button type="button" name="tutup" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" name="belajartambah" class="btn btn-success">Tambah</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Akhir Modal tambah data Belajar -->
    
@endsection
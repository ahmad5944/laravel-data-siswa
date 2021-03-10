@extends('layouts.master')

@section('content')
<div class="main">
    <div class="main-content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="panel">
                        <div class="panel-heading">
                            <h3 class="panel-title">Edit Data Siswa</h3>
                        </div>
                        <div class="panel-body">
                            <form action="/siswa/{{ $siswa->id }}/update" method="POST" enctype="multipart/form-data">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Depan</label>
                                    <input name="nama_depan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                        placeholder="Nama Depan" value="{{ $siswa->nama_depan }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleInputEmail1">Nama Belakang</label>
                                    <input name="nama_belakang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                                        placeholder="Nama Belakang" value="{{ $siswa->nama_belakang }}">
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                                    <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                                        <option hidden>--Pilih--</option>
                                        <option value="L" @if ($siswa->jenis_kelamin == 'L') selected @endif>Laki - laki</option>
                                        <option value="P" @IF($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlSelect1">Agama</label>
                                    <select name="agama" class="form-control" id="exampleFormControlSelect1">
                                        <option hidden>--Pilih--</option>
                                        <option value="Islam" @if ($siswa->agama == 'Islam') selected @endif>Islam</option>
                                        <option value="katolik" @if ($siswa->agama == 'Katolik') selected @endif>Katolik</option>
                                        <option value="Protestan" @if ($siswa->agama == 'Protestan') selected @endif>Protestan</option>
                                        <option value="Hindu" @if ($siswa->agama == 'Hindu') selected @endif>Hindu</option>
                                        <option value="buddha" @if ($siswa->agama == 'Buddha') selected @endif>Buddha</option>
                                        <option value="Konghuchu" @if ($siswa->agama == 'Konghuchu') selected @endif>Konghuchu</option>
                                        <option value="Lainnya" @if ($siswa->lainnya == 'Lainnya') selected @endif>Lainnya</option>
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Alamat</label>
                                    <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="4"
                                        value="alamat">{{ $siswa->alamat }}</textarea>
                                </div>

                                <div class="form-group">
                                    <label for="exampleFormControlTextarea1">Avatar</label>
                                    <input type="file" name="avatar" class="form-control">
                                </div>
                                {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
                                <button type="submit" class="btn btn-warning">Update</button>
                        </div>
                        </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop


@section('content1')
<h1>Edit Data</h1>
@if (session('sukses'))
    <div class="alert alert-success" role="alert">
        {{ session('sukses') }}
    </div>
@endif
<div class="row">
    <div class="col-lg-12">
        <form action="/siswa/{{ $siswa->id }}/update" method="POST">
            {{ csrf_field() }}
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Depan</label>
                <input name="nama_depan" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Nama Depan" value="{{ $siswa->nama_depan }}">
            </div>
            <div class="form-group">
                <label for="exampleInputEmail1">Nama Belakang</label>
                <input name="nama_belakang" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp"
                    placeholder="Nama Belakang" value="{{ $siswa->nama_belakang }}">
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1">
                    <option hidden>--Pilih--</option>
                    <option value="L" @if ($siswa->jenis_kelamin == 'L') selected @endif>Laki - laki</option>
                    <option value="P" @IF($siswa->jenis_kelamin == 'P') selected @endif>Perempuan</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlSelect1">Agama</label>
                <select name="agama" class="form-control" id="exampleFormControlSelect1">
                    <option hidden>--Pilih--</option>
                    <option value="Islam" @if ($siswa->agama == 'Islam') selected @endif>Islam</option>
                    <option value="katolik" @if ($siswa->agama == 'Katolik') selected @endif>Katolik</option>
                    <option value="Protestan" @if ($siswa->agama == 'Protestan') selected @endif>Protestan</option>
                    <option value="Hindu" @if ($siswa->agama == 'Hindu') selected @endif>Hindu</option>
                    <option value="buddha" @if ($siswa->agama == 'Buddha') selected @endif>Buddha</option>
                    <option value="Konghuchu" @if ($siswa->agama == 'Konghuchu') selected @endif>Konghuchu</option>
                    <option value="Lainnya" @if ($siswa->lainnya == 'Lainnya') selected @endif>Lainnya</option>
                </select>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1">Alamat</label>
                <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="4"
                    value="alamat">{{ $siswa->alamat }}</textarea>
            </div>
            {{-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button> --}}
            <button type="submit" class="btn btn-warning">Update</button>
    </div>
    </form>
</div>
@endsection
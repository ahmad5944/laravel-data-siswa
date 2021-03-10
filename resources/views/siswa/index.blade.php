@extends('layouts.master')

@section('content')
    <div class="main">
        <div class="main-content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="panel">
                            <div class="panel-heading">
                                <h3 class="panel-title">Data Siswa</h3>
                                <div class="right">
                                    <button type="button" class="btn-lg" data-toggle="modal" data-target="#exampleModal"><i
                                            class="lnr lnr-plus-circle btn btn-primary" style="font-weight: bold;"></i></button>
                                </div>
                            </div>
                            <div class="panel-body">
                                <table class="table table-hover">
                                    <thead>
                                        <tr>
                                            <th>Nama Depan</th>
                                            <th>Nama Belakang</th>
                                            <th>Email</th>
                                            <th>Jenis Kelamin</th>
                                            <th>Agama</th>
                                            <th>Alamat</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($data_siswa as $sis)
                                            <tr>
                                                <td><a
                                                        href="/siswa/{{ $sis->id }}/profile">{{ $sis->nama_depan }}</a>
                                                </td>
                                                <td><a href="/siswa/{{ $sis->id }}/profile">{{ $sis->nama_belakang }}
                                                        @if ($sis->nama_belakang == null) -
                                                        @endif</a></td>
                                                <td>{{ $sis->email }}</td>
                                                <td>{{ $sis->jenis_kelamin }}</td>
                                                <td>{{ $sis->agama }}</td>
                                                <td>{{ $sis->alamat }}</td>
                                                <td>
                                                    <a href="/siswa/{{ $sis->id }}/edit"
                                                        class="btn btn-warning btn-sm">Edit</a>
                                                    <a href="/siswa/{{ $sis->id }}/delete"
                                                        class="btn btn-danger btn-sm">Delete</a>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Data Siswa</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <form action="/siswa/create" method="POST" enctype="multipart/form-data">
                        {{ csrf_field() }}
                        <div class="form-group{{ $errors->has('nama_depan') ? ' has-error' : '' }}">
                            <label for="exampleInputEmail1">Nama Depan</label>
                            <input name="nama_depan" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Nama Depan" required
                                value="{{ old('nama_depan') }}">
                            @if ($errors->has('nama_depan'))
                                <span class="help-block">{{ $errors->first('nama_depan') }}</span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('nama_belakang') ? ' has-error' : '' }}">
                            <label for="exampleInputEmail1">Nama Belakang</label>
                            <input name="nama_belakang" class="form-control" id="exampleInputEmail1"
                                aria-describedby="emailHelp" placeholder="Nama Belakang"
                                value="{{ old('nama_belakang') }}">
                            @if ($errors->has('nama_belakang'))
                                <span class="help-block">{{ $errors->first('nama_belakang') }}</span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label for="exampleInputEmail1">Email</label>
                            <input name="email" class="form-control" id="exampleInputEmail1" type="email"
                                aria-describedby="emailHelp" placeholder="Email" required value="{{ old('email') }}">
                            @if ($errors->has('email'))
                                <span class="help-block">{{ $errors->first('email') }}</span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('jenis_kelamin') ? ' has-error' : '' }}">
                            <label for="exampleFormControlSelect1">Jenis Kelamin</label>
                            <select name="jenis_kelamin" class="form-control" id="exampleFormControlSelect1" required">
                                <option hidden>--Pilih--</option>
                                <option value="L" {{ old('jenis_kelamin') == 'L' ? 'selected ' : '' }}>Laki - laki
                                </option>
                                <option value="P" {{ old('jenis_kelamin') == 'P' ? 'selected ' : '' }}>Perempuan</option>
                            </select>
                            @if ($errors->has('jenis_kelamin'))
                                <span class="help-block">{{ $errors->first('jenis_kelamin') }}</span>
                            @endif
                        </div>
                        <div class="form-group{{ $errors->has('agama') ? ' has-error' : '' }}">
                            <label for="exampleFormControlSelect1">Agama</label>
                            <select name="agama" class="form-control" id="exampleFormControlSelect1" required>
                                <option hidden>--Pilih--</option>
                                <option>Islam</option>
                                <option>Katolik</option>
                                <option>Protestan</option>
                                <option>Hindu</option>
                                <option>Buddha</option>
                                <option>Konghuchu</option>
                                <option>Lainnya</option>
                            </select>
                            @if ($errors->has('agama'))
                                <span class="help-block">{{ $errors->first('agama') }}</span>
                            @endif
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Alamat</label>
                            <textarea name="alamat" class="form-control" id="exampleFormControlTextarea1" rows="4"
                                required>{{ old('alamat') }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Avatar</label>
                            <input type="file" name="avatar" class="form-control" {{old('avatar')}}>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop

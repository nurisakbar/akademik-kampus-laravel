@extends('layouts.dosen')
@section('title','Input Kehadiran Mahasiswa')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Input Kehadiran Mahasiswa</div>

                <div class="card-body">
                    @include('alert')

                    {{ Form::open(['url'=>'kehadiran/'.Request::segment(2)])}}
                    <table class="table table-bordered">
                        <tr><td width="120">Matakuliah</td><td>{{ $jadwal->nama_mk }}</td></tr>
                        <tr><td>Dosen</td><td> {{ $jadwal->nama }}</td></tr>
                        <tr><td>Jurusan</td><td>{{ $jadwal->nama_jurusan}}</td></tr>
                        <tr><td>Pertemuan Ke</td><td>: {{ $pertemuan_ke }} <input type="hidden" name="pertemuan_ke" value="{{ $pertemuan_ke }}"> </td></tr>
                        <tr><td>Topik</td><td><input type="text" name="topik_pembahasan" class="form-control" placeholder="Topik Pembahasan"></td></tr>
                        <tr>
                            <td></td>
                            <td>
                                <button type="submit" class="btn btn-danger">Simpan</button>
                                <a href="/kehadiran/{{ Request::segment(2)}}" class="btn btn-danger">Kembali</a>
                            </td>
                        </tr>
                    </table>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
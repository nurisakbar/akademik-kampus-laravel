@extends('layouts.app')
@section('title','Jadwal Kuliah')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Jadwal Kuliah</div>

                <div class="card-body">

                    @include('validation_error')
                    
             

                        <div class="row">
                            <div class="col-md-4">
                                {{ Form::open(['url'=>'jadwalkuliah','method'=>'GET'])}}

                                @csrf

                                <table class="table table-bordered">
                                    <tr>
                                        <td>Jurusan</td>
                                        <td>{{ Form::select('jurusan',$jurusan,$jurusan_terpilih,['class'=>'form-control'])}}</td></tr>
                                    <tr>
                                        <td>Semester</td>
                                        <td>{{ Form::select('semester',['1'=>'Semester 1','2'=>'Semester 2','3'=>'Semester 3','4'=>'Semester 4','5'=>'Semester 5','6'=>'Semester 6','7'=>'Semester 7','8'=>'Semester 8'],$semester_terpilih,['class'=>'form-control'])}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2">
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-plus-square"></i> Refresh Data</button>
                                            <a href="/jadwalkuliah/create" class="btn btn-danger"><i class="fas fa-plus-square"></i> Input Jadwal</a>
                                        </td></tr>
                                </table>

                            </form>
                            </div>
                            <div class="col-md-8">
                                <table class="table table-bordered">
                                    <tr><th>HARI</th><th>JAM</th><th>MATAKULIAH</th><th>DOSEN</th><th>RUANG</th><th></th></tr>
                                    @foreach($jadwal as $row)
                                    <tr>
                                        <td>{{ $row->hari }}</td>
                                        <td>{{ $row->jam }}</td>
                                        <td>{{ $row->nama_mk }}</td>
                                        <td>{{ $row->nama }}</td>
                                        <td>{{ $row->nama_ruangan }}</td>
                                        <td><a href="jadwalkuliah/{{ $row->id }}/edit"><i class="fas fa-edit"></i></a></td>
                                    <tr>
                                    @endforeach
                                </table>
                            </div>
                        </div>
                   
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

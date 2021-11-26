@extends('layouts.app')
@section('title','Data Kurikulum')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Modul Kurikulum</div>

                <div class="card-body">
                    @include('alert')

                    <div class="row">
                        <div class="col-md-4">
                            {{ Form::open(['url'=>'kurikulum','method'=>'GET'])}}
                                <table class="table table-bordered">
                                    <tr>
                                        <td>Jurusan</td>
                                        <td>{{ Form::select('jurusan',$jurusan,$jurusan_terpilih,['class'=>'form-control'])}}</td>
                                        <tr>
                                    <tr>
                                        <td></td>
                                        <td>
                                            <button type="submit" class="btn btn-danger"><i class="fas fa-sync-alt"></i> Refresh</button>
                                            <a href="/kurikulum/create" class="btn btn-danger">Input Data Baru</a></td>
                                    </tr>
                                </table>
                            {{ Form::close()}}
                        </div>
                        <div class="col-md-8">
                                <table class="table table-bordered" id="users-table">
                                        <thead>
                                            <tr>
                                                <th width="120">Kode Makul</th>
                                                <th>Nama Matakuliah</th>
                                                <th width="10">SKS</th>
                                                <th width="100">Semester</th>
                                                <th width="53">Action</th>
                                            </tr>
            
                                            @foreach($kurikulum as $row)
                                                <tr>
                                                    <td>{{ $row->kode_mk }}</td>
                                                    <td>{{ $row->nama_mk }}</td>
                                                    <td align="center">{{ $row->jml_sks }}</td>
                                                    <td align="center">{{ $row->semester }}</td>
                                                    <td>
                                                        {{ Form::open(['url'=>'kurikulum/'.$row->id,'method'=>'delete'])}}
                                                            <button type="submit" class="btn btn-danger btn-sm"><i class='fas fa-trash-alt'></i></button>
                                                        {{ Form::close()}}
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </thead>
                                    </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
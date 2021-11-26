@extends('layouts.app')
@section('title','Input Data tahun_akademik')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Input Data Tahun Akademik</div>

                <div class="card-body">

                    @include('validation_error')
                    
                    {{ Form::open(['url'=>'tahunakademik'])}}

                        @csrf

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Kode Tahun Akademik</label>
                            <div class="col-md-3">
                                {{ Form::text('kode_tahun_akademik',null,['class'=>'form-control','placeholder'=>'Kode Tahun Akademik'])}}
                            </div>
                        </div>

                        @include('tahun_akademik.form')

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">

                                {{ Form::submit('Simpan Data',['class'=>'btn btn-primary'])}}
                                <a href="/tahunakademik" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

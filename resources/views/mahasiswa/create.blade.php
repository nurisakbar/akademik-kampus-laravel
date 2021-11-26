@extends('layouts.app')
@section('title','Input Data mahasiswa')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Input Data mahasiswa</div>

                <div class="card-body">

                    @include('validation_error')
                    
                    {{ Form::open(['url'=>'mahasiswa'])}}

                        @csrf

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Kode mahasiswa</label>
                            <div class="col-md-3">
                                {{ Form::text('nim',null,['class'=>'form-control','placeholder'=>'No Induk Mahasiswa'])}}
                            </div>
                        </div>

                        @include('mahasiswa.form')

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">

                                {{ Form::submit('Simpan Data',['class'=>'btn btn-primary'])}}
                                <a href="/mahasiswa" class="btn btn-primary">Kembali</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

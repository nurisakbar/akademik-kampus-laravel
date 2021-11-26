@extends('layouts.app')
@section('title','Setting Aplikasi')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Setting Aplikasi</div>

                <div class="card-body">

                    @include('validation_error')
                    
                    {{ Form::model($setting,['url'=>'setting','method'=>'put'])}}

                        @csrf

                        <div class="form-group row">
                            <label class="col-md-2 col-form-label text-md-right">Nama Universitas</label>
                            <div class="col-md-4">
                                {{ Form::text('nama_universitas',null,['class'=>'form-control','placeholder'=>'Nama Universitas'])}}
                            </div>
                        </div>
                        <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">Email & Alamat Web</label>
                                <div class="col-md-3">
                                    {{ Form::text('email',null,['class'=>'form-control','placeholder'=>'Email'])}}
                                </div>
                                <div class="col-md-3">
                                        {{ Form::text('web',null,['class'=>'form-control','placeholder'=>'Alamat Web'])}}
                                    </div>
                        </div>

                        <div class="form-group row">
                                <label class="col-md-2 col-form-label text-md-right">No Telpon & FAX</label>
                                <div class="col-md-3">
                                    {{ Form::text('no_telpon',null,['class'=>'form-control','placeholder'=>'No Telpon'])}}
                                </div>
                                <div class="col-md-3">
                                        {{ Form::text('no_telpon',null,['class'=>'form-control','placeholder'=>'FAX'])}}
                                    </div>
                        </div>

                        <div class="form-group row">
                                    <label class="col-md-2 col-form-label text-md-right">Alamat</label>
                                    <div class="col-md-6">
                                        {{ Form::text('alamat',null,['class'=>'form-control','placeholder'=>'alamat universitas'])}}
                                    </div>
                        </div>


                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-2">

                                <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Simpan Perubahan</button>
                               
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@extends('layouts.app')
@section('title','Kirim Pesan Whatapps')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Setting Whatapps</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{ Form::model($setting,['url'=>'update-setting-whatapps'])}}

                    <table class="table table-bordered">
                        <tr>
                            <td width="140">Api Key</td>
                            <td>
                                <div class="row">
                                    <div class="col-md-4">
                                            {{ Form::text('apiwha_apikey',null,['class'=>'form-control','placeholder'=>'Api Key'])}}
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td></td>
                            <td>
                                    <button type="submit" class="btn btn-danger"><i class="fas fa-save"></i> Simpan Perubahan</button>
                                    <a href="http://apiwha.com/" class="btn btn-success"><i class="fas fa-info-circle"></i> Dokumentasi apiwha.com</a>
                            </td>
                        </tr>
                    </table>

                    {{ Form::close()}}

                    <h5>Form Kirim Pesan WhatApps</h5>
                    <hr>

                    {{ Form::open(['url'=>'kirim-pesan-whatapps'])}}

                    <table class="table table-bordered">
                        <tr>
                            <td  width="140">No Tujuan</td>
                            <td>
                                <textarea name="tujuan" class="form-control" placeholder="Untuk Mengirimkan Pesan Lebih Dari Satu Nomor Maka Pisahkan Dengan Enter"></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td>Pesan</td>
                            <td>
                                <textarea name="pesan" class="form-control" placeholder="Pesan Yang Ingin Dikirimkan"></textarea>
                            </td></tr>
                        <tr>
                            <td></td>
                            <td><button type="submit" class="btn btn-danger"><i class="fas fa-arrow-alt-circle-right"></i> Kirim Pesan Sekarang</button></td>
                        </tr>
                    </table>
                    {{ Form::close()}}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

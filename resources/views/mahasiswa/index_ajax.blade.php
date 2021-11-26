@extends('layouts.app')
@section('title','Data mahasiswa')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Modul mahasiswa</div>

                <div class="card-body">
                    
                    <a href="/mahasiswa/create" class="btn btn-danger">Input Data Baru</a>
                    <a href="/dosen/create" class="btn btn-success"><i class="far fa-file-excel"></i> Export Excel</a>
                    <hr>

                    @include('alert')

                    <div class="row">
                        <div class="col-md-4">
                            <table class="table table-bordered">
                                <tr><td>Pilih Jurusan</td></tr>
                                
                                <tr><td>{{ Form::select('jurusan',$jurusan,null,['class'=>'form-control jurusan','onChange'=>'ubah_jurusan()','multiple'])}}</td></tr>
                                <tr><td>Pilih Tahun Akademik</td></tr>
                                <tr><td>{{ Form::select('tahun_aakdemik',$tahun_akademik,null,['class'=>'form-control','multiple'])}}</td></tr>
                            </table>
                        </div>
                        <div class="col-md-8">
                            <table class="table table-bordered" id="users-table">
                                <thead>
                                    <tr>
                                        <th width="100">NIM</th>
                                        <th>Nama</th>
                                        <th width="53">Action</th>
                                    </tr>
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


@push('scripts')
<script>
        $(document).ready(function() {
            tampil_data();
          });
</script>

<script>

    function tampil_data()
    {
        $(function() {
            $('#users-table').DataTable({
                processing: true,
                serverSide: true,
                ajax: '/mahasiswa/json',
                columns: [
                    { data: 'nim', name: 'nim' },
                    { data: 'nama_mahasiswa', name: 'nama_mahasiswa' },
                    { data: 'action', name: 'action' }
                ]
            });
        });
    }

    function ubah_jurusan()
    {
        var jurusan = $(".jurusan").val();
        alert(jurusan);
        //tampil_data();
        $.ajax({
            type: "GET",
            url: '/mahasiswa/json',
            data: {jurusan: jurusan},
            success: function( msg ) {
                //$("#ajaxResponse").append("<div>"+msg+"</div>");
                alert('ok');
            }
        });


        $('#users-table').DataTable().ajax.reload();
    }
</script>
@endpush

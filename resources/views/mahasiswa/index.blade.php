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
                    <hr>

                    @include('alert')


                    <table class="table table-bordered" id="users-table">
                            <thead>
                                <tr>
                                    <th width="100">NIM</th>
                                    <th>Nama</th>
                                    <th>Nama Fakultas</th>
                                    <th>Jurusan</th>
                                    <th width="53">Action</th>
                                </tr>
                            </thead>
                        </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


@push('scripts')
<script>
$(function() {
    $('#users-table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '/mahasiswa/json',
        columns: [
            { data: 'nim', name: 'nim' },
            { data: 'nama_mahasiswa', name: 'nama_mahasiswa' },
            { data: 'nama_jurusan', name: 'nama_jurusan' },
            { data: 'nama_fakultas', name: 'nama_fakultas' },
            { data: 'action', name: 'action' }
        ]
    });
});
</script>
@endpush

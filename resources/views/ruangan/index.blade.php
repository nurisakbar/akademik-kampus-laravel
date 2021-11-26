@extends('layouts.app')
@section('title','Data Ruangan')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Modul Ruangan</div>

                <div class="card-body">
                    
                    <a href="/ruangan/create" class="btn btn-danger">Input Data Baru</a>
                    <hr>

                    @include('alert')


                    <table class="table table-bordered" id="users-table">
                            <thead>
                                <tr>
                                    <th width="120">Kode Ruangan</th>
                                    <th>Nama Ruangan</th>
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
        ajax: '/ruangan/json',
        columns: [
            { data: 'kode_ruangan', name: 'kode_ruangan' },
            { data: 'nama_ruangan', name: 'nama_ruangan' },
            { data: 'action', name: 'action' }
        ]
    });
});
</script>
@endpush

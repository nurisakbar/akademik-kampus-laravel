@extends('layouts.app')
@section('title','dosen')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Modul Dosen</div>

                <div class="card-body">
                    
                    <a href="/dosen/create" class="btn btn-danger">Input Data Baru</a>
                    <a href="/dosen/excel" class="btn btn-danger">Export Ke Excel</a>
                    <hr>

                    @include('alert')


                    <table class="table table-bordered" id="users-table">
                            <thead>
                                <tr>
                                    <th width="70">NIDN</th>
                                    <th>Nama Dosen</th>
                                    <th width="40">Email</th>
                                    <th width="40">No HP</th>
                                    <th>Home Base</th>
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
        ajax: '/dosen/json',
        columns: [
            { data: 'nidn', name: 'nidn' },
            { data: 'nama', name: 'nama' },
            { data: 'email', name: 'email' },
            { data: 'no_hp', name: 'no_hp' },
            { data: 'nama_fakultas', name: 'nama_fakultas' },
            { data: 'action', name: 'action' }
        ]
    });
});
</script>
@endpush

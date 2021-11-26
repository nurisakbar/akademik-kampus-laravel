@extends('layouts.app')
@section('title','Tahun Akademik')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Modul Tahun Akademik</div>

                <div class="card-body">
                    
                    <a href="/tahunakademik/create" class="btn btn-danger"><i class="fas fa-plus-square"></i> Input Data Baru</a>
                    <hr>

                    @include('alert')


                    <table class="table table-bordered" id="users-table">
                            <thead>
                                <tr>
                                    <th width="100">Kode</th>
                                    <th>Tahun akademik</th>
                                    <th>Status</th>
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
        ajax: '/tahunakademik/json',
        columns: [
            { data: 'kode_tahun_akademik', name: 'kode_tahun_akademik' },
            { data: 'tahun_akademik', name: 'tahun_akademik' },
            { data: 'status', name: 'status' },
            { data: 'action', name: 'action' }
        ]
    });
});
</script>
@endpush

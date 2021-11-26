@extends('layouts.dosen')
@section('title','Jadwal Mengajar')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Jadwal Mengajar</div>

                <div class="card-body">
                    @include('alert')


                    <table class="table table-bordered" id="users-table">
                            <thead>
                                <tr>
                                    <th width="200">Matakuliah</th>
                                    <th width="50">Hari</th>
                                    <th width="50">Jam</th>
                                    <th width="70">Ruang</th>
                                    <th width="100">Jurusan</th>
                                    <th width="100">Action</th>
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
        ajax: '/jadwal_mengajar/json',
        columns: [
            { data: 'nama_mk', name: 'nama_mk' },
            { data: 'hari', name: 'hari' },
            { data: 'jam', name: 'jam' },
            { data: 'nama_ruangan', name: 'nama_ruangan' },
            { data: 'nama_jurusan', name: 'nama_jurusan' },
            { data: 'action', name: 'action' }
        ]
    });
});
</script>
@endpush

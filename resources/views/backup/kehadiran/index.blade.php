@extends('layouts.dosen')
@section('title','Daftar Kehadiran Mahasiswa')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Kehadiran Mahasiswa</div>

                <div class="card-body">
                    @include('alert')
                    <table class="table table-bordered">
                        <tr><td width="120">Matakuliah</td><td>{{ $jadwal->nama_mk }}</td></tr>
                        <tr><td>Dosen</td><td> {{ $jadwal->nama }}</td></tr>
                        <tr><td>Jurusan</td><td>{{ $jadwal->nama_jurusan}}</td></tr>
                    </table>

                    <a href="/jadwal_mengajar" class="btn btn-danger">Kembali Ke jadwal Mengajar</a>
                    <a href="/kehadiran/{{ Request::segment(2)}}/create" class="btn btn-danger">Input Kehadiran</a>
                    <hr>

                    <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th width="90">NIM</th>
                                    <th>Nama Mahasiswa</th>
                                    <?php
                                    for($pertemuan=1;$pertemuan<=16;$pertemuan++)
                                    {
                                        echo " <th>$pertemuan</th>";
                                    }
                                    ?>
                                    
                                </tr>
                                @foreach($mahasiswa as $row)
                                <tr>
                                    <td>{{ $row->nim}}</td>
                                    <td>{{ $row->nama_mahasiswa}}</td>
                                    <?php
                                    for($pertemuan=1;$pertemuan<=16;$pertemuan++)
                                    {
                                        echo " <th>$pertemuan</th>";
                                    }
                                    ?>
                                </tr>
                                </tr>
                                @endforeach
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

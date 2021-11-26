@extends('layouts.mahasiswa')
@section('title','Kartu Rencana Studi')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Form Kartu Rencana Studi</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div class="row">
                        @if($periode_isi_krs==true)
                        <div class="col-md-6">
                            <h6>Daftar Matakuliah Kontrak</h6>
                            <hr>
                            <table class="table table-bordered" id="users-table">
                                <thead>
                                    <tr>
                                        <th width="70">Kode MK</th>
                                        <th>Nama Matakuliah</th>
                                        <th width="40">SKS</th>
                                        <th width="18"></th>
                                    </tr>
                                </thead>
                            </table>
                        </div>
                        <div class="col-md-6">
                                <h6>Daftar Matakuliah Yang Anda Pilih</h6>
                                <hr>
                                <div id="list"></div>
                        </div>
                        @else
                        <div class="col-md-12">
                            <div class="alert alert-info">
                                    <strong>Info!</strong> Periode Pengisian KRS Untuk Semester Ini Sedang Tidak Aktif.
                            </div>
                        </div>
                        @endif
                    </div>
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
        ajax: '/krs/daftarMatakuliahKontrak',
        columns: [
            { data: 'kode_mk', name: 'kode_mk' },
            { data: 'nama_mk', name: 'nama_mk' },
            { data: 'jml_sks', name: 'jml_sks' },
            { data: 'action', name: 'action' }
        ]
    });

    tampil_krs();
});
</script>

<script>

    function tambah_krs(kode_mk){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.get("/krs/tambahKrs",
        {
          kode_mk : kode_mk,
          _token: CSRF_TOKEN
        },
        function(data, status){
          tampil_krs();
      });
    }


    function tampil_krs(){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');
        $.get("/krs/tampilKrs",
        {
          _token    :   CSRF_TOKEN
        },
        function(data, status){
            $("#list").html(data);
      });
    }

    function hapus_krs(id){
        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.post("/krs/hapusKrs",
        {
          id : id,
          _token: CSRF_TOKEN
        },
        function(data, status){
          tampil_krs();
      });
    }
</script>
@endpush

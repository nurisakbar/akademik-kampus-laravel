@extends('layouts.dosen')
@section('title','Daftar Hadir Mahasiswa')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Daftar Hadir Mahasiswa</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <table class="table table-bordered">
                        <tr><td width="270">Kode Matakuliah</td><td>{{ $jadwal->kode_mk}}</td></tr>
                        <tr><td>Nama Matakuliah</td><td>{{ $jadwal->nama_mk}}</td></tr>
                        <tr><td>Nama Dosen</td><td>{{ $jadwal->nama}}</td></tr>
                    </table>

                    <a href="/jadwal_mengajar" class="btn btn-danger"><i class="fas fa-backward"></i> Kembali</a>
                    <a href="/kehadiran/{{ Request::segment(2)}}/create" class="btn btn-info"><i class="far fa-calendar-alt"></i> Input Kehadiran</a>
                    <hr>
                    <table class="table table-bordered">
                        <tr>
                            <th>NIM</th>
                            <th>Nama Mahassiwa</th>
                            <?php for($pertemuan=1;$pertemuan<=16;$pertemuan++)
                            {
                                echo "<th>$pertemuan</th>";
                            }
                            ?>
                        </tr>
                        @foreach($mahasiswa as $row)
                        <tr>
                            <td>{{ $row->nim}}</td>
                            <td>{{ $row->nama_mahasiswa}}</td>
                            <?php for($pertemuan=1;$pertemuan<=16;$pertemuan++)
                            {
                                echo "<td>".chek_kehadiran($row->nim,Request::segment(2),$pertemuan)."</td>";
                            }
                            ?>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')
<script>

    function simpan_nilai(id_khs)
    {
        var nilai_uas = $("#uas-"+id_khs).val();
        var nilai_uts = $("#uts-"+id_khs).val();
        var nilai_tugas = $("#tugas-"+id_khs).val();
        var nilai_kehadiran = $("#kehadiran-"+id_khs).val();


        console.log(nilai_uas);
        console.log(nilai_uts);
        console.log(nilai_tugas);
        console.log(nilai_kehadiran);


        var CSRF_TOKEN = $('meta[name="csrf-token"]').attr('content');

        $.post("/nilai/update_nilai/update",
        {
          id_khs : id_khs,
          nilai_uas : nilai_uas,
          nilai_uts:nilai_uts,
          nilai_tugas:nilai_tugas,
          nilai_kehadiran:nilai_kehadiran,
          _token: CSRF_TOKEN
        },
        function(data, status){
          //alert('sukses')
      });
    }
</script>
@endpush

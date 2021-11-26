@extends('layouts.mahasiswa')
@section('title','Kartu Hasil Studi')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card">
                <div class="card-header">Kartu Hasil Studi</div>

                <div class="card-body">
                    @php
                    $totalSKS   =   0;
                    $totalMutu  =   0;
                    $sksPoint   =   0;
                    $semester   =   1;
                    @endphp

                    <table class="table table-bordered">
                        <tr>
                            <th>NO</th>
                            <th>Kode MK</th>
                            <th>Matakuliah</th>
                            <th>Semester</th>
                            <th>SKS</th>
                            <th>Nilai</th>
                            <th>Grade</th>
                            <th>Point</th>
                            <th>Point SKS</th>
                        </tr>
                        @foreach($khs as $row)

                        @php
                        $nilai = hitung_nilai($row->id);
                        $grade = hitung_grade($nilai);
                        $mutu  = hitung_mutu($grade);
                        //$semester = $row->semester;
                        @endphp

                        @if($semester !=$row->semester)
                        <tr class="table-secondary">
                            <td colspan="3">Jumlah IP Semester : {{ $semester }}</td>
                            <td colspan="6">{{ hitungIpBerdasarkanSemester($nim,$semester) }}</td>
                        </tr>
                        @endif

                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $row->kode_mk}}</td>
                            <td>{{ $row->nama_mk}}</td>
                            <td>{{ $row->semester}}</td>
                            <td>{{ $row->jml_sks}}</td>
                            <td>{{ $nilai }}</td>
                            <td>{{ $grade }}</td>
                            <td>{{ $mutu }}</td>
                            <td>{{ $mutu*$row->jml_sks}}</td>
                        </tr>
                        <?php
                        $semester = $row->semester;
                       
                        $totalSKS=$totalSKS+$row->jml_sks;
                        $totalMutu = $totalMutu+$mutu;
                        $sksPoint = $sksPoint + ($mutu*$row->jml_sks);
                        ?>
                        @endforeach


                        <tr class="table-secondary">
                            <td colspan="3">Jumlah IP Semester : {{ $semester }}</td>
                            <td colspan="6">{{ hitungIpBerdasarkanSemester($nim,$semester) }}</td>
                        </tr>

                        <tr>
                            <?php 
                            if(empty($totalMutu) or empty($totalSKS))
                            {
                                $ipk =0;
                                $ip =0;
                            }
                            else
                            {
                                $ipk = $totalMutu/$totalSKS;
                                $ip = $sksPoint/$totalSKS;
                            }
                            ?>

                            <td colspan="3">IPK</td>
                            <td colspan="6">{{ hitungIPK($nim) }}</td>
                        </tr>
                    </table>

                    <a href="/khs/pdf" class="btn btn-danger">Cetak KHS PDF</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

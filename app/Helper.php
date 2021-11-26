<?php

function get_tahun_akademik($field){

    $tahun_akademik = \DB::table('tahun_akademik')
                        ->where('status','y')
                        ->first();
    return $tahun_akademik->$field;
}


function chek_kehadiran($nim,$id_jadwal,$pertemuan_ke)
{
    $jadwal_kuliah = DB::table('jadwal_kuliah')
                    ->where('id',$id_jadwal)->first();

    $kehadiran = DB::table('kehadiran')
                ->where('kode_mk',$jadwal_kuliah->kode_mk)
                ->where('kode_dosen',$jadwal_kuliah->kode_dosen)
                ->where('kode_jurusan',$jadwal_kuliah->kode_jurusan)
                ->where('kode_ruang',$jadwal_kuliah->kode_ruangan)
                ->where('pertemuan_ke',$pertemuan_ke)
                ->where('kode_tahun_akademik',$jadwal_kuliah->kode_tahun_akademik)->count();

    $riwayat  = DB::table('riwayat_kehadiran')
                ->where('nim',$nim)
                ->where('pertemuan_ke',$pertemuan_ke);
                

    

    if($riwayat->count()>0)
    {
        $riwayat = $riwayat->first();
        return $riwayat->status_kehadiran;
    }else{
        return '-';
    }

}



// Sumber : https://www.youthmanual.com/post/dunia-kuliah/kehidupan-mahasiswa/bagaimana-cara-menghitung-ipk-ini-dia-rumusnya

function hitung_nilai($idKHS)
{
    $khs        = DB::table('khs')->where('id',$idKHS)->first();
    $uts        = $khs->nilai_uts*(30/100);
    $uas        = $khs->nilai_uas*(30/100);
    $tugas      = $khs->nilai_tugas*(20/100);
    $kehadiran  = $khs->nilai_kehadiran*(20/100);
    $hasil      = $uts+$uas+$tugas+$kehadiran;
    return $hasil; 
}

function hitung_mutu($grade)
{
    if($grade=='A')
    {
        $mutu = 4;
    }elseif($grade=='B')
    {
        $mutu=3;
    }elseif($grade=='C')
    {
        $mutu = 2;
    }elseif($grade=='D')
    {
        $mutu=1;
    }else{
        $mutu=0;
    }

    return $mutu;
}

function hitung_grade($nilai)
{
    if($nilai>81)
    {
        $grade = "A";
    }elseif($nilai>75)
    {
        $grade="B";
    }elseif($nilai>55)
    {
        $grade ="C";
    }elseif($nilai>45)
    {
        $grade = "D";
    }else
    {
        $grade = "E";
    }

    return $grade;
}


function kirim_sms($tujuan,$pesan)
{
    $apiKey ="";
    $apiPass="";
}


function kirim_whatapps($tujuan,$pesan)
{
    $apiKey ="";
    $apiPass="";
}


function hitungIpBerdasarkanSemester($nim,$semester)
{
    $nilai = 0;
    $grade = "";
    $mutu = 0;
    $totalSKS   =   0;
    $totalMutu  =   0;
    $sksPoint   =   0;

    $dataKhs = \DB::table('khs')
                ->join('matakuliah','matakuliah.kode_mk','=','khs.kode_mk')
                ->where('khs.nim',$nim)
                ->where('khs.semester',$semester)
                ->get();

                
    foreach($dataKhs as $row)
    {
        $nilai = hitung_nilai($row->id);
        $grade = hitung_grade($nilai);
        $mutu  = hitung_mutu($grade);
        $totalSKS=$totalSKS+$row->jml_sks;
        $totalMutu = $totalMutu+$mutu;
        $sksPoint = $sksPoint + ($mutu*$row->jml_sks);
    }

    return substr($sksPoint/$totalSKS,0,3);
}


function hitungIPK($nim)
{
    $totalSKS   = 0;
    $totalMutu  = 0;

    $dataKhs = \DB::table('khs')
    ->join('matakuliah','matakuliah.kode_mk','=','khs.kode_mk')
    ->where('khs.nim',$nim)
    ->get();

    foreach($dataKhs as $row)
    {
        $nilai = hitung_nilai($row->id);
        $grade = hitung_grade($nilai);
        $mutu  = hitung_mutu($grade);

        $totalSKS+= $row->jml_sks;
        $totalMutu+=($mutu*$row->jml_sks);
    }

    return  round($totalMutu/$totalSKS,2);
    //return $totalMutu;
    
}
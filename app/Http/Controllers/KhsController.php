<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Fpdf;

class KhsController extends Controller
{
    function index()
    {
        $nim = Auth::guard('mahasiswa')->user()->nim;
        $data['khs'] = \DB::table('khs')
                ->join('matakuliah','matakuliah.kode_mk','=','khs.kode_mk')
                ->join('dosen','dosen.kode_dosen','=','khs.kode_dosen')
                ->where('nim',$nim)
                ->orderBy('semester','ASC')
                ->get();
        $data['nim'] = $nim;
        return view('khs',$data);
    }

    function KHSpdf()
    {
        $nim = Auth::guard('mahasiswa')->user()->nim;
        $mahasiswa = \DB::table('mahasiswa')
                    ->join('jurusan','jurusan.kode_jurusan','=','mahasiswa.kode_jurusan')
                    ->join('tahun_akademik','tahun_akademik.kode_tahun_akademik','=','mahasiswa.kode_tahun_akademik')
                    ->where('mahasiswa.nim',$nim)->first();

        $setting    = \DB::table('setting')->where('id',1)->first();

        $khs = \DB::table('khs')
                ->join('matakuliah','matakuliah.kode_mk','=','khs.kode_mk')
                ->join('dosen','dosen.kode_dosen','=','khs.kode_dosen')
                ->where('nim',$nim)
                ->get();
        


        Fpdf::AddPage();
        Fpdf::SetFont('Arial', 'B', 18);
        Fpdf::Image('http://4.bp.blogspot.com/-ImZRIGVHkfk/UcrUd9thx1I/AAAAAAAAOJA/yYY0HpYMBZU/s1600/LOGO+POLITEKNIK+TEDC+BANDUNG.png',10,5,-1000);
        Fpdf::Cell(185,7,$setting->nama_universitas,0,1,'C');

        Fpdf::SetFont('Arial', '', 12);
        Fpdf::Cell(185,5,$setting->alamat,0,1,'C');
        Fpdf::SetFont('Arial', '', 12);
        Fpdf::Cell(185,5,"Telpon : ".$setting->no_telpon." | Email : ".$setting->email.' | Fax : '.$setting->fax,0,1,'C');

        Fpdf::Line(10,30,190,30);
        Fpdf::Line(10,31,190,31);

        Fpdf::Cell(30,10,'',0,1);
        Fpdf::SetFont('Arial', 'B', 14);
        Fpdf::Cell(185,5,'KARTU HASIL STUDI',0,0,'C');

        Fpdf::Cell(30,10,'',0,1);
        // biodata mahasiswa
        Fpdf::SetFont('Arial', '', 12);
        Fpdf::Cell(35,5,'NIM',0,0);
        Fpdf::Cell(50,5,' : '.$mahasiswa->nim,0,0);
        Fpdf::Cell(10,5,'',0,0);
        Fpdf::Cell(35,5,'Jurusan',0,0);
        Fpdf::Cell(10,5,' : '.$mahasiswa->nama_jurusan,0,1);

        Fpdf::Cell(35,5,'Nama',0,0);
        Fpdf::Cell(50,5,' : '.$mahasiswa->nama_mahasiswa,0,0);
        Fpdf::Cell(10,5,'',0,0);
        Fpdf::Cell(35,5,'Semester',0,0);
        Fpdf::Cell(10,5,' : 1',0,1);

        Fpdf::Cell(35,5,'Tahun Angkatan',0,0);
        Fpdf::Cell(50,5,' : '.$mahasiswa->tahun_akademik,0,0);
        Fpdf::Cell(10,5,'',0,0);
        Fpdf::Cell(35,5,'Jenjang',0,0);
        Fpdf::Cell(10,5,' : Diploma IV',0,1);

        Fpdf::Cell(30,10,'',0,1);

        Fpdf::SetFont('Arial', 'B', 12);
        Fpdf::Cell(10,7,'No',1,0);
        Fpdf::Cell(25,7,'KODE MK',1,0);
        Fpdf::Cell(106,7,'NAMA MATAKULIAH',1,0);
        Fpdf::Cell(11,7,'SKS',1,0);
        Fpdf::Cell(16,7,'NILAI',1,0);
        Fpdf::Cell(17,7,'GRADE',1,1);
        Fpdf::SetFont('Arial', '', 12);
        $no         =1;
        $totalSKS   =0;
        $totalMutu  =0;
        foreach($khs as $row)
        {
            $nilai = hitung_nilai($row->id);
            $grade = hitung_grade($nilai);
            $mutu  = hitung_mutu($grade);
            Fpdf::Cell(10,7,$no,1,0);
            Fpdf::Cell(25,7,$row->kode_mk,1,0);
            Fpdf::Cell(106,7,$row->nama_mk,1,0);
            Fpdf::Cell(11,7,$row->jml_sks,1,0);
            Fpdf::Cell(16,7,$nilai,1,0);
            Fpdf::Cell(17,7,$grade,1,1);
            $no++;
            $totalSKS=$totalSKS+$row->jml_sks;
            $totalMutu = $totalMutu+($mutu*$row->jml_sks);
        }

        Fpdf::Cell(141,7,'Jumlah SKS',1,0);
        Fpdf::Cell(44,7,$totalSKS,1,1);
        Fpdf::Cell(141,7,'Mutu',1,0);
        Fpdf::Cell(44,7,$totalMutu,1,1);
        Fpdf::Cell(141,7,'IPK',1,0);


        if(empty($totalMutu) or empty($totalSKS))
        {
            $ipk =0;
        }
        else
        {
            $ipk = $totalMutu/$totalSKS;
        }
                                
        Fpdf::Cell(44,7,round($ipk,2),1,1);

        Fpdf::Cell(30,10,'',0,1);
        Fpdf::Cell(120,10,'',0,0);
        Fpdf::Cell(40,7,'Kaprodi Teknik Informatika',0,1);
        Fpdf::Cell(120,20,'',0,1);
        Fpdf::Cell(130,10,'',0,0);
        Fpdf::Cell(40,7,'Nuris Akbar M.Kom',0,1);

        Fpdf::Output();
        exit();
    }
}

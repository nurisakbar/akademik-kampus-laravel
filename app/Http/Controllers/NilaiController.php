<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class NilaiController extends Controller
{
    function index($id_jadwal){
        $jadwal = \DB::table('jadwal_kuliah')
                ->join('dosen','dosen.kode_dosen','=','jadwal_kuliah.kode_dosen')
                ->join('matakuliah','matakuliah.kode_mk','=','jadwal_kuliah.kode_mk')
                ->where('id',$id_jadwal)->first();

        $data['mahasiswa'] = \DB::table('khs')
                            ->join('mahasiswa','mahasiswa.nim','=','khs.nim')
                            ->where('khs.kode_dosen',$jadwal->kode_dosen)
                            ->where('khs.kode_mk',$jadwal->kode_mk)
                            ->get();
        $data['jadwal']    = $jadwal;
        return view('nilai.index',$data);
    }

    function update_nilai(request $request)
    {
        $nilai = \DB::table('khs')
                ->where('id',$request->id_khs)
                ->update([
                    'nilai_uas'         =>  $request->nilai_uas,
                    'nilai_uts'         =>  $request->nilai_uts,
                    'nilai_kehadiran'   =>  $request->nilai_kehadiran,
                    'nilai_tugas'       =>  $request->nilai_tugas
                    ]);
    }
    
}

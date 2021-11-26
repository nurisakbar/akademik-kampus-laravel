<?php

namespace App\Http\Controllers;
use App\Kehadiran;

use Illuminate\Http\Request;

class KehadiranController extends Controller
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
        return view('kehadiran.index',$data);
    }

    function create($id_jadwal)
    {
        $jadwal = \DB::table('jadwal_kuliah')
                ->join('dosen','dosen.kode_dosen','=','jadwal_kuliah.kode_dosen')
                ->join('matakuliah','matakuliah.kode_mk','=','jadwal_kuliah.kode_mk')
                ->where('id',$id_jadwal)->first();

        $pertemuan = \DB::table('kehadiran')
                    ->where('kode_mk',$jadwal->kode_mk)
                    ->where('kode_dosen',$jadwal->kode_dosen)
                    ->where('kode_tahun_akademik',$jadwal->kode_tahun_akademik)
                    ->where('kode_jurusan',$jadwal->kode_jurusan)->count();


        $data['jadwal']    = $jadwal;
        $data['pertemuan_ke'] = $pertemuan+1;
        return view('kehadiran.create',$data);
    }

    function store(Request $request,$id_jadwal){

        $jadwal = \DB::table('jadwal_kuliah')->where('id',$id_jadwal)->first();

        $kehadiran = new Kehadiran;
        $kehadiran->kode_mk             = $jadwal->kode_mk;
        $kehadiran->kode_dosen          = $jadwal->kode_dosen;
        $kehadiran->kode_jurusan        = $jadwal->kode_jurusan;
        $kehadiran->kode_ruang          = $jadwal->kode_ruangan;
        $kehadiran->kode_tahun_akademik = $jadwal->kode_tahun_akademik;
        $kehadiran->topik_pembahasan    = $request->topik;
        $kehadiran->pertemuan_ke        = $request->pertemuan_ke;
        $kehadiran->save();

        $lastID = $kehadiran->id;

        return redirect('kehadiran/'.$lastID.'/absen/');

    }


    function show($id_kehadiran)
    {
        $kehadiran          = \DB::table('kehadiran')
                            ->join('dosen','dosen.kode_dosen','=','kehadiran.kode_dosen')
                            ->join('matakuliah','matakuliah.kode_mk','=','kehadiran.kode_mk')
                            ->first();

        $data['mahasiswa'] = \DB::table('khs')
                            ->join('mahasiswa','mahasiswa.nim','=','khs.nim')
                            ->where('khs.kode_dosen',$kehadiran->kode_dosen)
                            ->where('khs.kode_mk',$kehadiran->kode_mk)
                            ->get();
        $data['kehadiran'] = $kehadiran;
        return view('kehadiran.show',$data);
    }

    function update(Request $request)
    {
        $chek = \DB::table('riwayat_kehadiran')
        ->where('nim',$request->nim)
        ->where('kehadiran_id',$request->id_kehadiran)
        ->count();
        if($chek>0)
        {
            // lakukan update

            \DB::table('riwayat_kehadiran')
                    ->where('kehadiran_id',$request->id_kehadiran)
                    ->update([
                    'status_kehadiran'=>$request->status_kehadiran
                    ]);
        }else{
            // lakukan insert
            \DB::table('riwayat_kehadiran')
                    ->insert([
                            'nim'=>$request->nim,
                            'kehadiran_id'=>$request->id_kehadiran,
                            'status_kehadiran'=>$request->status_kehadiran,
                            'pertemuan_ke' => $request->pertemuan_ke
                            ]);
        }
        
    }
}

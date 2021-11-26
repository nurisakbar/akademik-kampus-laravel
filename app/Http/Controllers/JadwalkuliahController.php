<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use App\Matakuliah;
use App\Dosen;
use App\Ruangan;
use App\Jamkuliah;
use App\Jadwalkuliah;

class JadwalkuliahController extends Controller
{
    function index(Request $request){

        $jurusan  = $request->get('jurusan');
        $semester = $request->get('semester');


        $data['jadwal'] = \DB::table('jadwal_kuliah')
                    ->join('matakuliah','matakuliah.kode_mk','=','jadwal_kuliah.kode_mk')
                    ->join('dosen','dosen.kode_dosen','=','jadwal_kuliah.kode_dosen')
                    ->join('ruangan','ruangan.kode_ruangan','=','jadwal_kuliah.kode_ruangan')
                    ->join('jam_kuliah','jam_kuliah.id','=','jadwal_kuliah.jam')
                    ->where('jadwal_kuliah.kode_jurusan',$jurusan)
                    ->where('jadwal_kuliah.semester',$semester)
                    ->get();
        $data['jurusan'] = Jurusan::pluck('nama_jurusan','kode_jurusan');
        $data['jurusan_terpilih'] = $jurusan;
        $data['semester_terpilih'] = $semester;

        return view('jadwalkuliah.index',$data);
    }


    function create(){
        $data['matakuliah'] = Matakuliah::pluck('nama_mk','kode_mk');
        $data['jurusan'] = Jurusan::pluck('nama_jurusan','kode_jurusan');
        $data['dosen'] = Dosen::pluck('nama','kode_dosen');
        $data['ruangan'] = Ruangan::pluck('nama_ruangan','kode_ruangan');
        $data['jamkuliah'] = Jamkuliah::pluck('jam','id');
        $data['hari'] = ['senin'=>'senin','selasa'=>'selasa','rabu'=>'rabu','kamis'=>'kamis','jumat'=>'jumat','sabtu'=>'sabtu','minggu'=>'minggu'];
        $data['tahun_akademik'] = \DB::table('tahun_akademik')->where('status','y')->first();
        return view('jadwalkuliah.create',$data);
    }

    function store(request $request)
    {
        $jadwal = new Jadwalkuliah();
        $jadwal->create($request->all());
        return redirect('jadwalkuliah')->with('status','Jadwal Kuliah Berhasil Di Input');
    }
}

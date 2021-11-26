<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Matakuliah;
use App\Krs;
use Auth;
use App\Khs;

class KrsController extends Controller
{

    function __construct()
    {
        return $this->middleware('auth:mahasiswa');
    }

    function daftarMatakuliahKontrak(){
        return Datatables::of(Matakuliah::all())
        ->addColumn('action', function ($row) {
            $action = '<button class="btn btn-info btn-sm" onClick="tambah_krs(\''.$row->kode_mk.'\')"><i class="fas fa-plus-square"></i> Ambil</button>';
            //$action  = '<a href="/matakuliah/'.$row->kode_mk.'/edit" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i>Ambil</a>';
            
            return $action;
        })
        ->make(true);
    }

    function hapusKrs(Request $request){
        $krs = Krs::find($request->id);
        $krs->delete();
    }

    function chek_semester()
    {
        $nim = Auth::guard('mahasiswa')->user()->nim;
        $khs = \DB::table('khs')->where('nim',$nim);
        if($khs->count()>0)
        {
            $mahasiswa = \DB::table('mahasiswa')->where('nim',$nim)->first();
            return $mahasiswa->semester_aktif+1;
        }else{
            return 1;
        }
    }


    function get_jadwal($kode_mk,$kd_jurusan)
    {
       

        $jadwal = \DB::table('jadwal_kuliah')
                    ->where('kode_mk',$kode_mk)
                    ->where('kode_tahun_akademik',get_tahun_akademik('kode_tahun_akademik'))
                    ->where('kode_jurusan',$kd_jurusan)
                    ->first();
                    
        return $jadwal->kode_dosen;
    }

    function tambahKrs(Request $request){
        $tahun_akademik = \DB::table('tahun_akademik')->where('status','y')->first();

        $krs = new Krs;
        $krs->kode_mk   = $request->kode_mk;
        $krs->nim       = Auth::guard('mahasiswa')->user()->nim;
        $krs->kode_tahun_akademik = $tahun_akademik->kode_tahun_akademik;
        $krs->semester = $this->chek_semester();
        $krs->kode_dosen = $this->get_jadwal($request->kode_mk,Auth::guard('mahasiswa')->user()->kode_jurusan);
        $krs->save();
    }

    function tampilKrs(){
        $result = '<table class="table table-bordered">
                <tr><th>Kode MK</th><th>Nama Matakuliah</th><th>SKS</th><th></th><tr>';
        
        $krs = \DB::table('krs')
                ->join('matakuliah','krs.kode_mk','=','matakuliah.kode_mk')
                ->where('nim',Auth::guard('mahasiswa')->user()->nim)
                ->get();
        foreach($krs as $row)
        {
            $result .= '<tr>
                        <td>'.$row->kode_mk.'</td>
                        <td>'.$row->nama_mk.'</td>
                        <td>'.$row->jml_sks.'</td>
                        <td><button class="btn btn-danger btn-sm" onClick="hapus_krs('.$row->id.')"><i class="fas fa-trash-alt"></i></button></td>
                        </tr>'; 
        }
        
        $result .='<tr><td colspan="4"><a class="btn btn-success" href="/krs/selesai"><i class="fas fa-cart-plus"></i> Saya Selesai Mengisi KRS</a></td></tr>';
        $result .='</table>';
        return $result;
    }

    function selesai()
    {
        $nim = Auth::guard('mahasiswa')->user()->nim;
        $krs = \DB::table('krs')->where('nim',$nim)->get();
        $tahun_akademik = \DB::table('tahun_akademik')->where('status','y')->first();
        foreach($krs as $row)
        {
            
            $khs = new Khs;
            $khs->kode_mk   = $row->kode_mk;
            $khs->nim       = $nim;
            $khs->kode_tahun_akademik = $tahun_akademik->kode_tahun_akademik;
            $khs->nilai_uts = 0;
            $khs->semester  = $row->semester;
            $khs->nilai_uas = 0;
            $khs->nilai_tugas=0;
            $khs->nilai_kehadiran=0;
            $khs->kode_dosen = $row->kode_dosen;
            $khs->save();
        }
        \DB::table('krs')->where('nim',$nim)->delete();
        return redirect('khs');
    }



    function index(){
        // chek priode isi krs untuk semster inii
        $tahunAkademikAktif = \DB::table('tahun_akademik')->where('status','y')->first();
        $tanggalSekarang = $today = date("Y-m-d");
        $tanggalAwalisiKRS =  $tahunAkademikAktif->tanggal_awal_isi_krs;
        $tanggalAKhirIsiKRS = $tahunAkademikAktif->tanggal_akhir_isi_krs;

     
        if($tanggalSekarang<=$tanggalAKhirIsiKRS and $tanggalSekarang>=$tanggalAwalisiKRS)
        {
            $data['periode_isi_krs'] = true;
        }else{
            $data['periode_isi_krs'] = false;
        }
        return view('krs.index',$data);
    }
}

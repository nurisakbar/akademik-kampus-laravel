<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use DataTables;
use App\Dosen;
use Auth;
use App\Fakultas;
use App\Exports\DosenExport;
use Maatwebsite\Excel\Facades\Excel;
class DosenController extends Controller
{
    function json(){
        $dosen = \DB::table('dosen')
                ->join('fakultas','fakultas.kode_fakultas','=','dosen.kode_fakultas')
                ->get();

        return Datatables::of($dosen)
        ->addColumn('action', function ($row) {
            $action  = '<a href="/dosen/'.$row->nidn.'/edit" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>';
            $action .= \Form::open(['url'=>'dosen/'.$row->nidn,'method'=>'delete','style'=>'float:right']);
            $action .= "<button type='submit'class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i></button>";
            $action .= \Form::close();
            return $action;
        })
        ->make(true);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['fakultas'] = Fakultas::pluck('nama_fakultas','kode_fakultas');
        return view('dosen.index_update',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['fakultas'] = Fakultas::pluck('nama_fakultas','kode_fakultas');
        return view('dosen.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nidn' => 'required|unique:dosen|min:4',
            'nama' => 'required|min:6',
            'email'     =>'required',
            'no_hp'     =>'required'
        ]);


        $dosen = New dosen();
        $dosen->nidn        = $request->nidn;
        $dosen->kode_dosen  = $request->kode_dosen;
        $dosen->nama        = $request->nama;
        $dosen->no_hp       = $request->no_hp;
        $dosen->email       = $request->email;
        $dosen->kode_fakultas  = $request->kode_fakultas;
        $dosen->password    = Hash::make($request->password);
        $dosen->save();
        return redirect('/dosen')->with('status','Data dosen Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($nidn)
    {
        $data['fakultas'] = Fakultas::pluck('nama_fakultas','kode_fakultas');
        $data['dosen'] = dosen::where('nidn',$nidn)->first();
        return view('dosen.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nidn)
    {
        $request->validate([
            'nama' => 'required|min:6',
            'email'     =>'required',
            'no_hp'     =>'required'
        ]);


        $dosen = dosen::where('nidn',$nidn)->first();
        $dosen->nidn        = $request->nidn;
        $dosen->kode_dosen  = $request->kode_dosen;
        $dosen->nama        = $request->nama;
        $dosen->no_hp       = $request->no_hp;
        $dosen->kode_fakultas  = $request->kode_fakultas;
        $dosen->email       = $request->email;
        if($request->password!='')
        {
            $dosen->password    = Hash::make($request->password);
        }
        $dosen->update();
        return redirect('/dosen')->with('status','Data dosen Berhasil Di Update');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nidn)
    {
        $dosen = dosen::where('nidn',$nidn);
        $dosen->delete();
        return redirect('/dosen')->with('status','Data dosen Berhasil Dihapus');;
    }


    function jadwal_mengajar(){
        return view('dosen.jadwal_mengajar');
    }

    function jadwal_mengajar_json(){
        $jadwal = \DB::table('jadwal_kuliah')
                ->select('jadwal_kuliah.id as id_jadwal','matakuliah.nama_mk','jadwal_kuliah.hari','jam_kuliah.jam','ruangan.nama_ruangan','jurusan.nama_jurusan')
                ->join('ruangan','ruangan.kode_ruangan','=','jadwal_kuliah.kode_ruangan')
                ->join('matakuliah','matakuliah.kode_mk','=','jadwal_kuliah.kode_mk')
                ->join('jam_kuliah','jam_kuliah.id','=','jadwal_kuliah.jam')
                ->join('jurusan','jurusan.kode_jurusan','=','jadwal_kuliah.kode_jurusan')
                ->where('jadwal_kuliah.kode_tahun_akademik','=',get_tahun_akademik('kode_tahun_akademik'))
                ->where('jadwal_kuliah.kode_dosen',Auth::guard('dosen')->user()->kode_dosen);

        return Datatables::of($jadwal)
        ->addColumn('action', function ($row) {
            $action  = '<a href="/nilai/'.$row->id_jadwal.'" class="btn btn-primary btn-sm"><i class="fas fa-address-book"></i> Nilai</a> ';
            $action  .= '<a href="/kehadiran/'.$row->id_jadwal.'" class="btn btn-primary btn-sm"><i class="fas fa-address-book"></i> Kehadiran</a>';
            //$action .= \Form::open(['url'=>'dosen/'.$row->nidn,'method'=>'delete','style'=>'float:right']);
            //$action .= "<button type='submit'class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i></button>";
            return $action;
        })
        ->make(true);

    }


    function exportExcel()
    {
        return Excel::download(new DosenExport, 'data-dosen.xlsx');
    }
}

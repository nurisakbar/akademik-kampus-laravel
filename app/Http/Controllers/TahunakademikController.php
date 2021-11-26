<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\TahunAkademik;
use DataTables;
use DateTime;

class TahunakademikController extends Controller
{
    function json(){
        return Datatables::of(TahunAkademik::all())
        ->addColumn('action', function ($row) {
            $action  = '<a href="/tahunakademik/'.$row->kode_tahun_akademik.'/edit" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>';
            $action .= \Form::open(['url'=>'tahunakademik/'.$row->kode_tahun_akademik,'method'=>'delete','style'=>'float:right']);
            $action .= "<button type='submit'class='btn btn-danger btn-sm'><i class='fas fa-trash-alt'></i></button>";
            $action .= \Form::close();
            return $action;
        })
        ->addColumn('status', function ($row) {
            return $row->status=='y'?'Aktif':'Tidak Aktif';
        })
        ->addColumn('periode_perkuliahan', function ($row) {
            $awal = DateTime::createFromFormat('Y-m-d', $row->tanggal_awal_kuliah);
            $akhir = DateTime::createFromFormat('Y-m-d', $row->tanggal_akhir_kuliah);

            return $awal->format('d-M-Y').' - '.$akhir->format('d-M-Y');
            //return $row->tanggal_awal_kuliah.' - '.$row->tanggal_akhir_kuliah;
        })
        ->addColumn('periode_uts', function ($row) {
            $awal = DateTime::createFromFormat('Y-m-d', $row->tanggal_awal_uts);
            $akhir = DateTime::createFromFormat('Y-m-d', $row->tanggal_akhir_uts);

            return $awal->format('d-M-Y').' - '.$akhir->format('d-M-Y');
        })
        ->addColumn('periode_uas', function ($row) {
            $awal = DateTime::createFromFormat('Y-m-d', $row->tanggal_awal_uas);
            $akhir = DateTime::createFromFormat('Y-m-d', $row->tanggal_akhir_uas);

            return $awal->format('d-M-Y').' - '.$akhir->format('d-M-Y');
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
        return view('tahun_akademik.index_update');
        //return view('tahun_akademik.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('tahun_akademik.create');
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
            'kode_tahun_akademik' => 'required|unique:tahun_akademik|min:5',
            'tahun_akademik' => 'required|min:5'
        ]);


        $tahun_akademik = New tahunAkademik();
        $tahun_akademik->create($request->all());
        return redirect('/tahunakademik')->with('status','Data tahun_akademik Berhasil Disimpan');
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
    public function edit($kode_tahun_akademik)
    {
        $data['tahunakademik'] = TahunAkademik::where('kode_tahun_akademik',$kode_tahun_akademik)->first();
        return view('tahun_akademik.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_tahun_akademik)
    {
        $request->validate([
            'tahun_akademik' => 'required|min:5'
        ]);


        $tahun_akademik = TahunAkademik::where('kode_tahun_akademik','=',$kode_tahun_akademik);
        $tahun_akademik->update($request->except('_method','_token'));
        return redirect('/tahunakademik')->with('status','Data tahun_akademik Berhasil Di Update');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_tahun_akademik)
    {
        $tahun_akademik = TahunAkademik::where('kode_tahun_akademik',$kode_tahun_akademik);
        $tahun_akademik->delete();
        return redirect('/tahunakademik')->with('status','Data tahun_akademik Berhasil Dihapus');;
    }
}

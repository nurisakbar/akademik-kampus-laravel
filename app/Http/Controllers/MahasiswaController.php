<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DataTables;
use App\Jurusan;
use App\Mahasiswa;
use App\TahunAkademik;


class MahasiswaController extends Controller
{
    function json(Request $request){
        $jurusan = $request->get('jurusan');
        if(isset($jurusan))
        {
            $mahasiswa = \DB::table('mahasiswa')
            ->join('jurusan','mahasiswa.kode_jurusan','=','jurusan.kode_jurusan')
            ->join('fakultas','fakultas.kode_fakultas','=','jurusan.kode_fakultas')
            ->where('jurusan.kode_jurusan','=',$jurusan)
            ->get();
        }else{
            $mahasiswa = \DB::table('mahasiswa')
            ->join('jurusan','mahasiswa.kode_jurusan','=','jurusan.kode_jurusan')
            ->join('fakultas','fakultas.kode_fakultas','=','jurusan.kode_fakultas')
            ->get();
        }


        return Datatables::of($mahasiswa)
        ->addColumn('action', function ($row) {
            $action  = '<a href="/mahasiswa/'.$row->nim.'/edit" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>';
            $action .= \Form::open(['url'=>'mahasiswa/'.$row->nim,'method'=>'delete','style'=>'float:right']);
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
        $data['tahun_akademik'] = TahunAkademik::pluck('tahun_akademik','kode_tahun_akademik');
        $data['jurusan']        = Jurusan::pluck('nama_jurusan','kode_jurusan');
        return view('mahasiswa.index_ajax',$data);
        //return view('mahasiswa.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['tahun_akademik'] = TahunAkademik::pluck('tahun_akademik','kode_tahun_akademik');
        $data['jurusan'] = Jurusan::pluck('nama_jurusan','kode_jurusan');
        $data['semester_aktif'] = ['1'=>'Semester 1','2'=>'Semester 2','3'=>'Semester 3',
                                    '4'=>'Semester 4','5'=>'semester 5','6'=>'Semester 6','7'=>'Semester 7','8'=>'Semester 8'];
        return view('mahasiswa.create',$data);
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
            'nim' => 'required|unique:mahasiswa|min:4',
            'nama_mahasiswa' => 'required|min:6',
            'email' => 'required|min:6',
            'password' => 'required|min:6'
        ]);


        $mahasiswa = New mahasiswa();
        $mahasiswa->create($request->all());
        return redirect('/mahasiswa')->with('status','Data mahasiswa Berhasil Disimpan');
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
    public function edit($nim)
    {
        $data['jurusan'] = Jurusan::pluck('nama_jurusan','kode_jurusan');
        $data['mahasiswa'] = mahasiswa::where('nim',$nim)->first();
        $data['tahun_akademik'] = TahunAkademik::pluck('tahun_akademik','kode_tahun_akademik');
        $data['jurusan']        = Jurusan::pluck('nama_jurusan','kode_jurusan');
        $data['semester_aktif'] = ['1'=>'Semester 1','2'=>'Semester 2','3'=>'Semester 3',
        '4'=>'Semester 4','5'=>'semester 5','6'=>'Semester 6','7'=>'Semester 7','8'=>'Semester 8'];
        return view('mahasiswa.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $nim)
    {
        // $request->validate([
        //     'nama_mahasiswa' => 'required|min:6'
        // ]);


        $mahasiswa = Mahasiswa::where('nim','=',$nim)->first();
        $mahasiswa->nama_mahasiswa = $request->nama_mahasiswa;
        $mahasiswa->email = $request->email;
        $mahasiswa->alamat = $request->alamat;
        $mahasiswa->kode_jurusan = $request->kode_jurusan;
        if($request->password!='')
        {
            $mahasiswa->password = $request->password;
        }

        $mahasiswa->save();
        //$mahasiswa->update($request->except('_method','_token'));
        return redirect('/mahasiswa')->with('status','Data mahasiswa Berhasil Di Update');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($nim)
    {
        $mahasiswa = mahasiswa::where('nim',$nim);
        $mahasiswa->delete();
        return redirect('/mahasiswa')->with('status','Data mahasiswa Berhasil Dihapus');;
    }
}

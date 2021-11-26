<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jurusan;
use DataTables;
use App\Fakultas;

class JurusanController extends Controller
{
    function json(){
        $jurusan = \DB::table('jurusan')
                    ->join('fakultas','jurusan.kode_fakultas','=','fakultas.kode_fakultas')
                    ->get();

        return Datatables::of($jurusan)
        ->addColumn('action', function ($row) {
            $action  = '<a href="/jurusan/'.$row->kode_jurusan.'/edit" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>';
            $action .= \Form::open(['url'=>'jurusan/'.$row->kode_jurusan,'method'=>'delete','style'=>'float:right']);
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
        return view('jurusan.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['fakultas'] = Fakultas::pluck('nama_fakultas','kode_fakultas');
        return view('jurusan.create',$data);
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
            'kode_jurusan' => 'required|unique:jurusan|min:4',
            'nama_jurusan' => 'required|min:6'
        ]);


        $jurusan = New jurusan();
        $jurusan->create($request->all());
        return redirect('/jurusan')->with('status','Data jurusan Berhasil Disimpan');
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
    public function edit($kode_jurusan)
    {
        $data['fakultas'] = Fakultas::pluck('nama_fakultas','kode_fakultas');
        $data['jurusan'] = jurusan::where('kode_jurusan',$kode_jurusan)->first();
        return view('jurusan.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_jurusan)
    {
        $request->validate([
            'nama_jurusan' => 'required|min:6'
        ]);


        $jurusan = jurusan::where('kode_jurusan','=',$kode_jurusan);
        $jurusan->update($request->except('_method','_token'));
        return redirect('/jurusan')->with('status','Data jurusan Berhasil Di Update');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_jurusan)
    {
        $jurusan = jurusan::where('kode_jurusan',$kode_jurusan);
        $jurusan->delete();
        return redirect('/jurusan')->with('status','Data jurusan Berhasil Dihapus');;
    }
}

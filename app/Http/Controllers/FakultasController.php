<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Fakultas;
use DataTables;

class FakultasController extends Controller
{
    function json(){
        return Datatables::of(Fakultas::all())
        ->addColumn('action', function ($row) {
            $action  = '<a href="/fakultas/'.$row->kode_fakultas.'/edit" class="btn btn-primary btn-sm"><i class="fas fa-pencil-alt"></i></a>';
            $action .= \Form::open(['url'=>'fakultas/'.$row->kode_fakultas,'method'=>'delete','style'=>'float:right']);
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
        return view('fakultas.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('fakultas.create');
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
            'kode_fakultas' => 'required|unique:fakultas|min:4',
            'nama_fakultas' => 'required|min:6'
        ]);


        $fakultas = New fakultas();
        $fakultas->create($request->all());
        return redirect('/fakultas')->with('status','Data fakultas Berhasil Disimpan');
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
    public function edit($kode_fakultas)
    {
        $data['fakultas'] = fakultas::where('kode_fakultas',$kode_fakultas)->first();
        return view('fakultas.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $kode_fakultas)
    {
        $request->validate([
            'nama_fakultas' => 'required|min:6'
        ]);


        $fakultas = fakultas::where('kode_fakultas','=',$kode_fakultas);
        $fakultas->update($request->except('_method','_token'));
        return redirect('/fakultas')->with('status','Data fakultas Berhasil Di Update');;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($kode_fakultas)
    {
        $fakultas = fakultas::where('kode_fakultas',$kode_fakultas);
        $fakultas->delete();
        return redirect('/fakultas')->with('status','Data fakultas Berhasil Dihapus');;
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{
    function index(){
        $data['setting'] = Setting::find(1);
        return view('setting',$data);
    }

    function update(Request $request){
        $setting = Setting::find(1);
        $setting->update($request->except('_method','_token'));
        return redirect('/setting')->with('status','Perubahan Berhasil Disimpan');
    }
}

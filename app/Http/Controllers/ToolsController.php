<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class ToolsController extends Controller
{


    // update setting api zenziva
    function updateSettingSms(request $request)
    {
        $setting = Setting::find(1);
        $setting->zenziva_userkey = $request->zenziva_userkey;
        $setting->zenziva_passkey = $request->zenziva_passkey;
        $setting->update();
        return redirect('/tools/sms')->with('status','Setting SMS Api Sudah berhasil Di Update');
    }

    // menampikan form untuk kirim sms
    function sms()
    {
        $data['setting'] = \DB::table('setting')->where('id',1)->first();
        return view('setting.sms',$data);
    }

    // fungsi untuk mengirim sms
    function send_sms(request $request)
    {
        $phones  = explode(' ',$request->tujuan);
        $message = $request->pesan;

        // ambil konfigurasi dari tabel setting
        $setting = Setting::find(1);
        $userkeyanda = $setting->zenziva_userkey;
        $passkeyanda = $setting->zenziva_passkey;
        $status=[];

        foreach($phones as $phone)
        {
            $nohptujuan  = $phone;
            $url       =   "https://reguler.zenziva.net/apps/smsapi.php?userkey=$userkeyanda&passkey=$passkeyanda&nohp=$nohptujuan&pesan=$message";
            $client = new \GuzzleHttp\Client();
            $send = $client->request('GET', $url);
            $response = $send->getBody();
        }

        return redirect('/tools/sms')->with('status','Pesan Sudah Dikirim');
    }




    function whatapps()
    {
        $data['setting'] = \DB::table('setting')->where('id',1)->first();
        return view('setting.whatapps',$data);
    }

    function updateSettingWhatapps(request $request)
    {
        $setting = Setting::find(1);
        $setting->apiwha_apikey = $request->apiwha_apikey;
        $setting->update();
        return redirect('/tools/whatapps')->with('status','Setting Whatapps Api Sudah berhasil Di Update');   
    }

    function send_whatapps(Request $request)
    {
        $setting = Setting::find(1);
        $my_apikey = $setting->apiwha_apikey;
        $berhasil = 0;
        
        $numbers = explode(PHP_EOL,$request->tujuan);
        $messages = $request->pesan;

        foreach($numbers as $number)
        {
            $message = "test kirim pesan dari aplikasi sistem informasi akademik";
            $api_url = "http://panel.apiwha.com/send_message.php"; 
            $api_url .= "?apikey=". urlencode ($my_apikey); 
            $api_url .= "&number=". urlencode ($number); 
            $api_url .= "&text=". urlencode ($message); 
            $my_result_object = json_decode(file_get_contents($api_url, false));

            if($my_result_object->success==true)
            {
                $berhasil = $berhasil+1;
            }
        }

        return redirect('/tools/whatapps')->with('status',$berhasil.' Pesan Sudah Dikirim');
    }
}

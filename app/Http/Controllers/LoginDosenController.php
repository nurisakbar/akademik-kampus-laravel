<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class LoginDosenController extends Controller
{
    // menampilkan form login
    function index(){
        return view('dosen.login');
    }

    // chek proses login
    function submit(Request $request)
    {
        // Validate the form data
         $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required|min:6'
      ]);

      // Attempt to log the user in
      if (Auth::guard('dosen')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        return redirect()->intended('/jadwal_mengajar');
      }
      // if unsuccessful, then redirect back to the login with the form data
      return redirect('dosen/login')->withInput($request->only('email', 'remember'));
    }
}

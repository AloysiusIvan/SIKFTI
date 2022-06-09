<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use RealRashid\SweetAlert\Facades\Alert;

class LoginController extends Controller
{
    public function postlogin (Request $request){
        if (Auth::attempt($request->only('username','password')) && Auth::user()->level == "wd2"){
            return redirect('dashboard');
        } else if (Auth::attempt($request->only('username','password')) && Auth::user()->level == "admin"){
            return redirect('dashboardadmin');
        } else{
            Alert::error('Login gagal', 'Silahkan coba kembali.');
            return view('login');
        }
    }
    
    public function logout (Request $request){
        Auth::logout();
        return redirect('/');
    }
}

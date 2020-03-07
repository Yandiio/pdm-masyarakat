<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Petugas;
use App\Model\User;
use Auth;

class AuthController extends Controller
{
    public function getLogin()
    {
        return view('login');
    }


    public function postLogin(Request $request)
    {
        if(Auth::guard('petugas')->attempt(['email' => $request->email,'password'=>$request->email])){
            return redirect()->intended('/petugas');
        }else if(Auth::guard('user')->attempt(['email' => $request->email,'password'=>$request->email])){
            return redirect()->intended('/masyarakat');
        }
    }

    public function logout()
    {
        if (Auth::guard('petugas')->check()) {
         Auth::guard('petugas')->logout();
        }elseif (Auth::guard('user')->check()) {
         Auth::guard('user')->logout();
        }
        return redirect('/login');
    }



}

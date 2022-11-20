<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{

    function getAuthLogin(){
        return view('/login');
    }

    function getAccount_admin(){
        $user = Auth::user();
        return view('/giaovien/layouts/master', compact('user'));
    }
    
    function getAccount_user(){
        $user = Auth::user();
        return view('/sinhvien/layouts/master', compact('user'));
    }

    function postAuthLogin(Request $request)
    {
        $arr = [
            'username' => $request->username,
            'password' => $request->password
        ];
        if (Auth::attempt($arr)){
            if (Auth::user()->role == '1') {
                return redirect()->route('giaovien.layouts.master');
            } else {
                return redirect()->route('sinhvien.layouts.master');
            }
        }else
        {
            dd('Thong tin sai');
            return redirect()->route('login');
        }
    }
}

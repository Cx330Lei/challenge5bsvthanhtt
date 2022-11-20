<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    public function getLogout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}

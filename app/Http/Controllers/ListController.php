<?php

namespace App\Http\Controllers;
use App\Models\User;

class ListController extends Controller
{
    function getListusersSV() {
        $user = User::paginate(5);
        return view('/sinhvien/listusers', compact('user'))->with('i', (request()->input('page', 1) -1) *5);
    }

    function getListusersGV() {
        $user = User::paginate(5);
        return view('/giaovien/listusers', compact('user'))->with('i', (request()->input('page', 1) -1) *5);
    }
}

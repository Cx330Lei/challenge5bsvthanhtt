<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\User;


class InfController extends Controller
{
    function getInfstudent() {
        $user = Auth::user();
        return view('/sinhvien/infStudent', compact('user'));
    }
    
    function getManageuser() {
        return view('/giaovien/manage_user');
    }

    public function update(Request $request,User $sinhvien)
    {
        $sinhvien = User::find(Auth::user()->id);
        $sinhvien->email = $request->input('email');
        $sinhvien->password = $request->input('password');
        $sinhvien->phone = $request->input('phone');
    if ($request->has('file_update')) {
        $file_name = $request->file_update->getClientOriginalName();
        //Lưu file vào thư mục upload với tên là biến $file_name
        $request->file_update->move(public_path('uploads'), $file_name);
        $request->merge(['image' => $file_name]);
        $sinhvien->image = $request->input('image');
    }
        $sinhvien->update();
        return redirect()->route('sinhvien.infStudent');
}
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Comment;
class SinhvienController extends Controller


{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sinhvien = User::where('role','0')->paginate(5);
        return view('/giaovien/manage_user', compact('sinhvien'))->with('i', (request()->input('page', 1) -1) *5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('/giaovien/create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->has('file_image')){
            $file_name = $request->file_image->getClientOriginalName();
            //Lưu file vào thư mục upload với tên là biến $file_name
            $request->file_image->move(public_path('uploads'), $file_name);
        }
        $request->merge(['image' => $file_name]);
        if(User::create($request->all())){
            return redirect()->route('sinhvien.index')->with('thongbao', 'Them sinh vien thanh cong');
        }
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
    public function edit(User $sinhvien)
    {
        return view('/giaovien/edit', compact('sinhvien'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $sinhvien)
    {
    if ($request->has('file_update')) {
        $file_name = $request->file_update->getClientOriginalName();
        //Lưu file vào thư mục upload với tên là biến $file_name
        $request->file_update->move(public_path('uploads'), $file_name);
        $request->merge(['image' => $file_name]);
    }
    if ($sinhvien->update($request->all())) {
        return redirect()->route('sinhvien.index')->with('thongbao', 'Cap nhat sinh vien thanh cong');
    }
}

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $sinhvien)
    {
        if($sinhvien->delete()){
            return redirect()->route('sinhvien.index')->with('thongbao', 'Xoa sinh vien thanh cong');
        }
    }

}

<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\exercise;
use App\Models\yourfile;
use Illuminate\Support\Facades\Auth;

class ExerciseController extends Controller
{
    function getExercise() {
        $exercise = exercise::paginate(5);
        return view('/sinhvien/exercise', compact('exercise'))->with('i', (request()->input('page', 1) -1) *5);
    }

    function getGVExercise() {
        $exercise = exercise::paginate(5);
        return view('/giaovien/exercise', compact('exercise'))->with('i', (request()->input('page', 1) -1) *5);
    }

    function upload(Request $request) {
        if ($request->has('file_exercise')){
            $file_name = $request->file_exercise->getClientOriginalName();
            //Lưu file vào thư mục upload với tên là biến $file_name
            $request->file_exercise->move(public_path('exercise'), $file_name);
            $request->merge(['filename' => $file_name]);
        }
        if(exercise::create($request->all())){
            return redirect()->route('giaovien.exercise');
        }
    }
    
    function uploadSV(Request $request,$id) {
        $Yourfile = new yourfile;
        if ($request->has('file_exercise')){
            $file_name = $request->file_exercise->getClientOriginalName();
            //Lưu file vào thư mục upload với tên là biến $file_name
            $request->file_exercise->move(public_path('yourfile'), $file_name);
            $request->merge(['filename' => $file_name]);
        }
        $Yourfile->id_ex = $id;
        $Yourfile->filename_y = $request->filename;
        if($Yourfile->save()){
            return redirect()->route('sinhvien.exercise')->with('thongbao', 'Upload file bai lam thanh cong');
        }
    }

    function submitted($id_ex) {
        $Yourfile = yourfile::where('id_ex',$id_ex)->paginate(5);
        return view('/giaovien/submitted', compact('Yourfile'))->with('i', (request()->input('page', 1) -1) *5);
    }
}

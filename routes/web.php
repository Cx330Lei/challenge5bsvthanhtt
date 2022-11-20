<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\ExerciseController;
use App\Http\Controllers\InfController;
use App\Http\Controllers\ListController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\SinhvienController;
use App\Http\Controllers\CommentController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/*Route::get('/', function () {
    return view('welcome');
});*/

route::get('authlogin', [LoginController::class, 'getAuthLogin'])->name('login');
route::post('authlogin', [LoginController::class, 'postAuthLogin']);

route::get('account_admin', [LoginController::class, 'getAccount_admin'])->name('giaovien.layouts.master')->middleware('AdminRole');
route::get('account_user', [LoginController::class, 'getAccount_user'])->name('sinhvien.layouts.master');
//sinhvien
route::get('infstudent', [InfController::class, 'getInfstudent'])->name('sinhvien.infStudent');
route::get('/sinhvien/listusers', [ListController::class, 'getListusersSV'])->name('sinhvien.listusersSV');
route::get('/sinhvien/exercise', [ExerciseController::class, 'getExercise'])->name('sinhvien.exercise');
route::post('/sinhvien/exercise/upload/{id}', [ExerciseController::class, 'uploadSV']);
route::get('logout', [LogoutController::class, 'getLogout'])->name('logout');
route::put('infstudent', [InfController::class, 'update'])->name('infStudent.update');

//giao vien
route::resource('sinhvien', SinhvienController::class)->middleware('AdminRole');
route::get('/giaovien/listusers', [ListController::class, 'getListusersGV'])->name('giaovien.listusersGV')->middleware('AdminRole');
route::get('giaovien/upload', [ExerciseController::class, 'getGVExercise'])->name('giaovien.exercise')->middleware('AdminRole');
route::post('giaovien/upload', [ExerciseController::class, 'upload'])->name('exercise.upload')->middleware('AdminRole');
route::get('giaovien/submitted/{id_ex}', [ExerciseController::class, 'submitted'])->name('giaovien.submitted')->middleware('AdminRole');

route::resource('comment', CommentController::class);
route::post('/create',[CommentController::class,'create'])->name('comment.create');
route::delete('/delete/{id}',[CommentController::class,'delete'])->name('comment.delete');
route::post('/update/{id}',[CommentController::class,'update'])->name('comment.update');
route::get('/detail/{id}',[CommentController::class, 'detail'])->name('comment.detail');
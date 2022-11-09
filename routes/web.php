<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\StudentController;
use App\Http\Controllers\Auth\TeacherController;

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

Route::get('/', function () {
    return view('layouts.front-layout.app');
});


Route::redirect('/home', '/', 301 );
Route::controller(AdminController::class)->group(function(){
    Route::get('admin-login', 'index')->name('admin.login')->middleware(['guest']);
    Route::post('admin-login', 'checkLogin')->name('admin.login-check');
});
Route::controller(StudentController::class)->group(function(){
    Route::get('student-login', 'index')->name('admin.login');
});
Route::controller(TeacherController::class)->group(function(){
    Route::get('teacher-login', 'index')->name('admin.login');
});

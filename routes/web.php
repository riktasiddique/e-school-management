<?php

use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\StudentController;
use App\Http\Controllers\Auth\TeacherController;
use App\Http\Controllers\Teacher\UploadStudentController;



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
Route::redirect('/home', '/', 301 );
Route::get('/', [HomeController::class, 'home']);
Route::get('login-panel', [AuthController::class, 'loginPanel'])->name('login')->middleware(['guest']);
// Auth Controllers
Route::controller(AdminController::class)->group(function(){
    Route::get('admin-login', 'index')->name('admin.login')->middleware(['guest']);
    Route::post('admin-login', 'checkLogin')->name('admin.login-check');
});
Route::controller(StudentController::class)->group(function(){
    Route::get('student-login', 'index')->name('student.login')->middleware(['guest:student']);
    Route::post('student-login', 'userLoginCheck')->name('student.login');
});
Route::controller(TeacherController::class)->group(function(){
    Route::get('teacher-login', 'index')->name('teacher.login')->middleware(['guest:teacher']);
    Route::post('teacher-login', 'userLoginCheck')->name('teacher.login');
});
Route::post('/logout',[ AuthController::class, 'logout'])->name('logout');
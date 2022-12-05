<?php

use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\SubjectController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\AdminController;
use App\Http\Controllers\Auth\StudentController;
use App\Http\Controllers\Auth\TeacherController;
use App\Http\Controllers\Teacher\UploadStudentController;
use App\Http\Controllers\Admin\DashboardController;




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
Route::prefix('/')->controller(DashboardController::class)->middleware('auth')->group(function(){
    Route::redirect('/home', 'admin-panel', 301 );
    Route::get('admin-panel', 'index')->name('admin.admin-panel');
    Route::get('add-teacher', 'addTeacher')->name('admin.add-teacher');
    Route::post('add-teacher', 'addTeacherStore')->name('admin.add-teacher');
});
Route::prefix('/admin-panel')->middleware(['auth'])->group(function () {
    Route::resource('department', DepartmentController::class);
    Route::resource('subject', SubjectController::class);
    Route::post('subject/csv',[ SubjectController::class, 'storeCsv'])->name('subject.storeCsv');
    Route::post('department/csv',[ DepartmentController::class, 'storeCsv'])->name('department.storeCsv');
    Route::controller(UploadStudentController::class)->group(function(){
        Route::get('add-student', 'addStudent')->name('admin.add-student');
        Route::post('add-student', 'addStudentStore')->name('admin.add-student');
        Route::get('viewSubject/{id}', 'viewSubject')->name('admin.subject-view');
    });

});
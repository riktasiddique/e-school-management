<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class TeacherController extends Controller
{
    public function index(){
        return view('auth.teacher.index');
    }
    public function store(){
        // return
    }
    public function userCheck(){
    }
}

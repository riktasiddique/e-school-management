<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function index(){
        return view('auth.student.index');
    }
    public function store(){
        // return
    }
    public function userCheck(){
    }
}

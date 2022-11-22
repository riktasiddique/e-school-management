<?php

namespace App\Http\Controllers\Auth;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class StudentController extends Controller
{
    public function index(){
        return view('auth.student.index');
    }
    public function store(){
        // return
    }
    public function userLoginCheck(Request $request){
        // return $request->all();
        $request->validate([
            'userName' => 'required',
            'batch_id' => 'required',
        ]);
   
        $studentCredentials = Student::query()->where( 'name', $request->userName )
            ->where( 'batch_id', $request->batch_id )
            ->first();

        if ($studentCredentials) {
            Auth::guard('student')->login( $studentCredentials );
            return redirect( '/' );
            // return $studentCredentials;
        }
        return back()->with('error', 'Please Enter Valid Credentials!');
    }

}

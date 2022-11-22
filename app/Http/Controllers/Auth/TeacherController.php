<?php

namespace App\Http\Controllers\Auth;

use App\Models\Teacher;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class TeacherController extends Controller
{
    public function index(){
        return view('auth.teacher.index');
    }
    public function userLoginCheck(Request $request){
        // return $request->all();
        $request->validate([
            'email' => 'required',
            'join_id' => 'required',
        ]);
        // return $request->all();
        $teacherCredentials = Teacher::query()->where( 'email', $request->email )
            ->where( 'join_id', $request->join_id )
            ->first();

        if ($teacherCredentials) {
            Auth::guard('teacher')->login( $teacherCredentials );
            return redirect( '/' );
        }
        return back()->with('error', 'Please Enter Valid Credentials!');
    }
}

<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index(){
        return view('auth.admin.index');
    }
    public function store(){
        // return
    }
    public function checkLogin(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            // return redirect()->intended('/')->withSuccess('You have Successfully loggedin');
            return redirect()->route('admin.admin-panel');
        }
        return back()->with('error', 'Please Enter Valid Credentials!');

    }
}

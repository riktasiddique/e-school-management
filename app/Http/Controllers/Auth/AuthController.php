<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPanel(){
        if(!(Auth::guard('student')->check() || Auth::guard('teacher')->check()))
        {
            return view('auth.login-panel');
        }
        return back();
    }
}

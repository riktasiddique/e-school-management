<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function home(){
        if(!(Auth::guard('student')->check() || Auth::guard('teacher')->check())){
            return redirect()->route('login');
        }
        return view('layouts.front-layout.app');
        
    }
}

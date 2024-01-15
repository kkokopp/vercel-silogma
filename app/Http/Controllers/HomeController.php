<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function home(Request $request)
    {
        $user = $request->user();
        // dd($user);
        if($user->hasRole('admin')){
            return view('admin.dashboard');
        }else if($user->hasRole('user')){
            return view('user.dashboard');
        }else{
            return view('auth.login');
        }
    }
}

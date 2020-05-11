<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    public function login()
    {
    	return view('login.login');
    }

    public function postLogin(Request $request)
    {
    	if (Auth::attempt($request->only('username','password'))) {
			if (auth()->user()->role == 'Admin') {
        		return redirect()->route('admin.dashboard')->with('welcome','');
			}elseif (auth()->user()->role == 'Peserta') {
        		return redirect()->route('peserta.dashboard')->with('welcome','');
			}
    	}

    	return redirect()->back()->with('error','');
    }

    public function logout()
    {
        Auth::logout();

        return redirect('login');
    }
}

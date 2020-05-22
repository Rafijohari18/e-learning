<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peserta;
use App\Program;
use App\Module;
use App\User;

class DashboardController extends Controller
{
    public function admin()
    {
    	// Count
    	$program = Program::count();
    	$module = Module::count();
    	$peserta = Peserta::count();

    	return view('dashboard.admin', compact('program','module','peserta'));
    }

    public function peserta()
    {
    	$neko = Peserta::where('user_id', auth()->user()->id)->first();

    	return view('dashboard.peserta', compact('neko'));
    }
}

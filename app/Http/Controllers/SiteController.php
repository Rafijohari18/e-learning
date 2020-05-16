<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Konten;
use App\Program;
use App\Peserta;

class SiteController extends Controller
{
    public function beranda()
    {
		$konten = Konten::latest()->limit(8)->get();
		
		$program = Program::latest()->limit(3)->get();
		
		$module = Module::latest()->limit(3)->get();
		$program = Program::count();
		$peserta = Peserta::count();

		return view('layouts.landingpage', compact('konten','module','program','peserta'));

    }
}

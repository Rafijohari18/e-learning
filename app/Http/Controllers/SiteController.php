<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Konten;

class SiteController extends Controller
{
    public function beranda()
    {
		$konten = Konten::latest()->limit(8)->get();
		$program = Program::latest()->limit(3)->get();
		
		return view('layouts.landingpage', compact('konten','program'));
    }
}

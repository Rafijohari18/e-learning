<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
use App\Konten;

class SiteController extends Controller
{
    public function beranda()
    {
		$konten = Konten::latest()->limit(8)->get();
		$module = Module::latest()->limit(3)->get();
		
		return view('layouts.landingpage', compact('konten','module'));
    }
}

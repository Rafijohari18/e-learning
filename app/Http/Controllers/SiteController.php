<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Konten;
use App\Peserta;

class SiteController extends Controller
{
    public function beranda()
    {
		$konten = Konten::latest()->limit(3)->get();
		$program = Program::latest()->limit(6)->get();

		return view('layouts.landingpage', compact('konten','program'));
    }

    // Informasi
    public function informasi()
    {
    	$informasi = Konten::latest()->get();

    	return view('sites.informasi', compact('informasi'));
    }
}

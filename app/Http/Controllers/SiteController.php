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
		$konten = Konten::latest()->limit(8)->get();
		$program = Program::latest()->limit(3)->get();
		$hitung = Program::count();
		$peserta = Peserta::count();

		return view('layouts.landingpage', compact('konten','program','peserta','hitung'));
    }

    // Informasi
    public function informasi()
    {
    	$informasi = Konten::latest()->get();

    	return view('sites.informasi', compact('informasi'));
    }
}

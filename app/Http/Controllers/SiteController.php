<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Konten;
use App\Peserta;
use App\Kategori;

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

    // Detail Informasi
    public function detailInformasi($slug)
    {
        $jquin = Konten::where('slug', '=', $slug)->first();
        $neko = Konten::latest()->limit(4)->get();

        return view('sites.detailInformasi', compact('jquin','neko'));
    }

    public function detailProgram($slug)
    {
        $jquin = Program::where('slug', '=', $slug)->first();
        $neko = Program::latest()->limit(4)->get();
        $kategori = Kategori::latest()->get();

        return view('sites.detailProgram', compact('jquin','neko','kategori'));
    }

    public function checkout(Program $program)
    {
        return view('sites.checkout', compact('program'));
    }
}

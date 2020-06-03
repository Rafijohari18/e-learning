<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Konten;
use App\Peserta;
use App\Kategori;
use App\Slider;

class SiteController extends Controller
{
    public function beranda()
    {
		$konten = Konten::latest()->limit(3)->get();
		$program = Program::latest()->limit(6)->get();
        $slider = Slider::latest()->get();

		return view('layouts.landingpage', compact('konten','program','slider'));
    }

    // Informasi
    public function informasi()
    {
    	$informasi = Konten::latest()->paginate(12);

    	return view('sites.informasi', compact('informasi'));
    }

    public function program()
    {
        $program = Program::latest()->paginate(12);

        return view('sites.program', compact('program'));
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

    public function checkout($slug)
    {
        $program = Program::where('slug', '=', $slug)->first();

        if ($program != NULL) {
            return view('sites.checkout', compact('program'));
        }
        
        // return redirect()->back();
    }

    // Cari
    public function cariProgram(Request $request)
    {
        $program = Program::where('nama_program','LIKE','%'.$request->q.'%')->get();

        return view('sites.program', compact('program'));
    }

    public function cariInformasi(Request $request)
    {
        $informasi = Konten::where('judul','LIKE','%'.$request->q.'%')->get();

        return view('sites.informasi', compact('informasi'));
    }
}

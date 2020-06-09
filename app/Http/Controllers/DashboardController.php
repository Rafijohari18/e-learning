<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Peserta;
use App\Program;
use App\Module;
use App\User;
use App\Transaksi;

class DashboardController extends Controller
{
    public function admin()
    {
    	// Count
    	$program = Program::count();
    	$module = Module::count();
        $peserta = Peserta::where('prakerja','Tidak')->count();
        $pengajar = User::where('role','Pengajar')->count();
        $tmv = Transaksi::where('status','Menunggu Verifikasi')->count();
        $dv = Transaksi::where('status','Diverifikasi')->count();
    	$prakerja = Peserta::where('prakerja','Ya')->count();

    	return view('dashboard.admin', compact('program','module','peserta','pengajar','tmv','dv','prakerja'));
    }

    public function peserta()
    {
    	$neko = Peserta::where('user_id', auth()->user()->id)->first();

    	return view('dashboard.peserta', compact('neko'));
    }

    public function pengajar()
    {
        $program = Program::count();
        $module = Module::count();
        $peserta = Peserta::count();

        return view('dashboard.admin', compact('program','module','peserta'));
    }
}

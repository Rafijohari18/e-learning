<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Pengaturan;
use DB;

class PengaturanController extends Controller
{
    public function index()
    {
    	$jquin = Pengaturan::latest()->first();
        $time = DB::table('timer')->first();

    	return view('admin.pengaturan.index', compact('jquin','time'));
    }

    public function store(Request $request)
    {
        // Move File
        $informasi = Storage::disk('public')->putFile('pengaturan',$request->file('informasi'));
        $program = Storage::disk('public')->putFile('pengaturan',$request->file('program'));
        $login = Storage::disk('public')->putFile('pengaturan',$request->file('login'));
        $checkout = Storage::disk('public')->putFile('pengaturan',$request->file('checkout'));
        $logo = Storage::disk('public')->putFile('pengaturan',$request->file('logo'));
    	
    	$neko = [
            'no_tlp' => $request->no_tlp,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'footer' => $request->footer,
            'no_rek' => $request->no_rek,
            'informasi' => $informasi,
            'program' => $program,
            'login' => $login,
            'checkout' => $checkout,
            'logo' => $logo
        ];

        Pengaturan::create($neko);

        return redirect()->back()->with('store','');
    }

    public function update(Request $request, Pengaturan $pengaturan)
    {
        if ($request->informasi != NULL) {
            Storage::delete('public/'.$request->informasiOri);
            $informasi = Storage::disk('public')->putFile('pengaturan',$request->file('informasi'));
        } else {
            $informasi = $request->informasiOri;
        }

        if ($request->program != NULL) {
            Storage::delete('public/'.$request->programOri);
            $program = Storage::disk('public')->putFile('pengaturan',$request->file('program'));
        } else {
            $program = $request->programOri;
        }

        if ($request->login != NULL) {
            Storage::delete('public/'.$request->loginOri);
            $login = Storage::disk('public')->putFile('pengaturan',$request->file('login'));
        } else {
            $login = $request->loginOri;
        }

        if ($request->checkout != NULL) {
            Storage::delete('public/'.$request->transaksiOri);
            $checkout = Storage::disk('public')->putFile('pengaturan',$request->file('checkout'));
        } else {
            $checkout = $request->transaksiOri;
        }

        if ($request->logo != NULL) {
            Storage::delete('public/'.$request->logoOri);
            $logo = Storage::disk('public')->putFile('pengaturan',$request->file('logo'));
        } else {
            $logo = $request->logoOri;
        }
        // Waktu
        $time = DB::table('timer')
              ->where('id', 1)
              ->update(['waktu' => $request->waktu]); 

    	$neko = [
            'no_tlp' => $request->no_tlp,
            'email' => $request->email,
            'alamat' => $request->alamat,
            'footer' => $request->footer,
            'no_rek' => $request->no_rek,
            'informasi' => $informasi,
            'program' => $program,
            'login' => $login,
            'checkout' => $checkout,
            'logo' => $logo
        ];

        $jquin = Pengaturan::findOrFail($pengaturan->id);
        $jquin->update($neko);

        return redirect()->back()->with('update','');
    }
}

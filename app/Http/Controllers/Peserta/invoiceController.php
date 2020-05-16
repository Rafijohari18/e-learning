<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Soal;	
use App\ProgramPeserta;
use Illuminate\Support\Facades\DB;	
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;

class invoiceController extends Controller
{
    public function index(Request $request){
        
       if ($request->user_id == null) {
       	$user = DB ::table('users')->orderBy('id','DESC')->first();
    	$tambah = (int)$user->id + 1;
 
       	$data = [
    		'user_id' => $tambah ,
            'program_id' => $request->program_id,
            'harga' =>  $request->harga,	
    	];

       	$cookie = Cookie::queue(Cookie::make('hosting', serialize($data), 10));

		return redirect()->route('registrasi')->withCookie(cookie()->forever('hosting', serialize($data)));
		dd(unserialize($request->cookie('hosting')));
       }else{

       	 $neko = array(
            'user_id' => $request->user_id ,
            'program_id' => $request->program_id,
            'harga' => $request->harga,

        );
        ProgramPeserta::create($neko);
        return redirect()->route();
       }
       
    }

}

<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Soal;	
use App\ProgramPeserta;
use App\Transaksi;
use Illuminate\Support\Facades\DB;	
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Cookie;
use Auth;

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
          'created_at' =>  date('Y-m-d H:i:s'),	
        ];

        $cookie = Cookie::queue(Cookie::make('hosting', serialize($data), 25));

        return redirect()->route('registrasi')->withCookie(cookie()->forever('hosting', serialize($data)));
        dd(unserialize($request->cookie('hosting')));
      }else{

       $neko = array(
        'user_id' => $request->user_id ,
        'program_id' => $request->program_id,
        'harga' => $request->harga,

      );
       ProgramPeserta::create($neko);
       return redirect()->route('peserta.invoice');
     }

  }
  
  public function show()
  {
    $data['invoice'] = ProgramPeserta::where('user_id',Auth::user()->id)->orderBy('id','DESC')->first();
    
    return view('peserta.invoice.index',compact('data'));
  }

  public function detail($id)
  {
    $data['invoice'] = ProgramPeserta::where('id',$id)->find($id);
    
    return view('peserta.invoice.detail',compact('data'));
  }

  // Transaksi Peserta
  public function list()
  {
     $neko = Transaksi::where('user_id',Auth::user()->id)->get();

     return view('peserta.invoice.list',compact('neko'));
  }
}

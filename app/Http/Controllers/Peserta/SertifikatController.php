<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\ProgramPeserta; 
use Auth;

class SertifikatController extends Controller
{
  public function index(){

   $data['program'] = ProgramPeserta::with('program')->where('user_id',Auth::user()['id'])->get();

   return view('peserta.sertifikat.index',compact('data'));
 }
 public function show($id)
 {
    $data['program'] = ProgramPeserta::with('program')->where('id',$id)->first();
    return view('peserta.sertifikat.show',compact('data'));
 }


}

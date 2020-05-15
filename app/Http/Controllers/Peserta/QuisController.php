<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Soal;	
use App\Pilihan;	

class QuisController extends Controller
{
    public function index(){
       $data['soal'] = Soal::get();
       $data['shuffled'] = Pilihan::get();

	   $data['pilihan'] = $data['shuffled']->shuffle();

       return view('peserta.quiz.index',compact('data'));
    }

}

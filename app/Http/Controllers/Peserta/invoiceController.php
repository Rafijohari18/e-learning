<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Soal;	
use App\Pilihan;	

class invoiceController extends Controller
{
    public function index(){
      
       return view('peserta.quiz.index',compact('data'));
    }

}

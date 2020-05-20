<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Soal;	
use App\Pilihan;
use App\Hasil;	
use Auth;

class QuisController extends Controller
{
    public function index($id){

       $soal = Soal::where('program_id',$id)->get();
       $data['jumlah'] = Soal::where('program_id',$id)->count();

       return view('peserta.quiz.index',compact('data','soal'));
   }

   public function tambah(Request $request,$id)
   {
    $benar = 0;
    $items = $request->get('jawaban');
    $jumlah = $request->jumlah;
    foreach($items as $item)
    {
    
       $jawaban = explode('---',$item);
       $cek =  Soal::where('id',$jawaban[0])->where('jawaban',$jawaban[1])->count();


       if($cek > 0){
        $benar++;

    }
}
         $score = 100/$jumlah*$benar;
         $hasil = number_format($score);
        
        $data = array(
            'hasil'       => $hasil,
            'user_id'      => Auth::user()->id,
            'program_id'   => $id,
        );
         Hasil::create($data);
        return redirect()->route('peserta.list');



}


}

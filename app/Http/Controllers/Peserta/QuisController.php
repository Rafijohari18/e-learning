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
<<<<<<< HEAD
    
    $hasil = Hasil::where('user_id',Auth::user()['id'])->where('program_id',$id)->count();
    
    if($hasil > 0){
      redirect()->route('peserta.program');
    }
       $soal = Soal::where('program_id',$id)->get();
       $data['jumlah'] = Soal::where('program_id',$id)->count();

        return view('peserta.quiz.index',compact('data','soal'));
    

    
=======
      if (Hasil::where('user_id', auth()->user()->id)->exists()) {
          return redirect()->back()->with('selesaiQuis','');
      } else {
         $soal = Soal::where('program_id',$id)->get();
         $data['jumlah'] = Soal::where('program_id',$id)->count();

         return view('peserta.quiz.index',compact('data','soal'));
      }
>>>>>>> af216159ad2fee1531d32888dff39811812901a7
   }

   public function tambah(Request $request,$id)
   {
    $benar = 0;
    $salah=0;
    $kosong=0;

    $items = $request->get('jawaban');
    $jumlah = $request->jumlah;
    foreach($items as $item)
    {
      $jawaban = explode('---',$item);

      if(empty($jawaban)){
        $kosong++;
      }else{ 



      $cek =  Soal::where('id',$jawaban[0])->where('jawaban',$jawaban[1])->count();

      if($cek > 0){
        $benar++;
      }
      else{
        //jika salah
        $salah++;
      }
    }
  }

  $score = 100/$jumlah*$benar;
  $hasil = number_format($score);

  $data = array(
    'hasil'           => $hasil,
    'jawaban_benar'   => $benar,
    'jawaban_salah'   => $salah,
    'jawaban_kosong'  => $kosong,
    'user_id'         => Auth::user()->id,
    'program_id'      => $id,
  );

   Hasil::create($data);

  return redirect()->route('quis.hasil');
}

  public function hasil()
  {
      $data['hasil'] = Hasil::with('program','user')->where('user_id',Auth::user()->id)->orderBy('id','Desc')->first();
      return view('peserta.quiz.hasil',compact('data'));
  }


}

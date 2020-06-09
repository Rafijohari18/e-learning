<?php

namespace App\Http\Controllers\Peserta;

use App\Http\Controllers\Controller;
use willvincent\Rateable\Rateable;
use Illuminate\Http\Request;
use App\ProgramPeserta; 
use App\Program; 
use App\Hasil;
use App\Rating;
use Auth;
use DB;

class SertifikatController extends Controller
{
  public function index(Request $request){
    if ($request->rating != null) {
        $post = Program::find($request->id);
        $rating = new \willvincent\Rateable\Rating;
        $rating->rating = $request->rating;
        $rating->komentar = $request->komentar;
        $rating->user_id = auth()->user()->id;
        $cek =  $post->ratings()->save($rating);
   }

    $rating = DB::table('ratings')->where('user_id', auth()->user()->id)->count();
    $data['program'] = Hasil::with('program')->where('user_id',Auth::user()['id'])->get();

    // Cek Apakah Peserta Memiliki Sertifikat
    if (Hasil::where('user_id', auth()->user()->id)->exists()) {
        // Cek Apakah Peserta Sudah Melakukan Penilaian
        if ($rating > 0) {
           return view('peserta.sertifikat.index',compact('data'));
        }

        return redirect()->route('quis.hasil')->with('ratingRequired','');
    }

   return view('peserta.sertifikat.index',compact('data'));
 }

 public function show($id)
 {
    $data['program'] = Hasil::with('program','user','transaksi')->where('id',$id)->where('user_id',Auth::user()['id'])->first();
    $data['modul'] = Hasil::with('program','user')->where('id',$id)->get();
    $data['tanggal'] = $data['program']->user->peserta->tgl_lahir;
    return view('peserta.sertifikat.show',compact('data'));
 }

  function tanggal_indonesia($tanggal){
        $bulan = array (
        1 =>    'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
        );
        
        $pecahkan = explode('-', $tanggal);
        
        // variabel pecahkan 0 = tanggal
        // variabel pecahkan 1 = bulan
        // variabel pecahkan 2 = tahun
         
        return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
    }

}

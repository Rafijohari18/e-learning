<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Peserta;
use App\Hasil;
use Auth;
class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $neko = Peserta::where('prakerja','Tidak')->latest()->get();

        return view('admin.peserta.indexUmum', compact('neko'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Peserta $peserta)
    {
        return view('admin.peserta.showUmum', compact('peserta'));
    }
    public function sertifikat(Request $request,$id)
    {

        $data['sertifikat'] = Hasil::with('program','user')->where('user_id',$id)->get();
        $data['user'] = Hasil::with('program','user')->where('user_id',$id)->first();
        return view('admin.peserta.sertifikat',compact('data'));
    }

       public function preview(Request $request,$id)
    {

        $data['program'] = Hasil::with('program','user','transaksi')->where('id',$id)->first();
        $data['modul'] = Hasil::with('program','user')->where('id',$id)->get();
        $data['tanggal'] = $this->tanggal_indonesia(date($data['program']->user->peserta->tgl_lahir));

        return view('admin.peserta.preview',compact('data'));
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


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editProfil()
    {
        $peserta = Peserta::where('user_id', auth()->user()->id)->first();

        return view('peserta.editProfil', compact('peserta'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function updateProfil(Request $request)
    {
        $fileOri = $request->file('path');
       
        if (empty($request->path)) {
            $fileMove = $request->fileOri;
        } else {
            Storage::delete('public/'.$request->fileOri);
            $fileMove = Storage::disk('public')->putFile('avatar', $fileOri);
        }

        // Update Peserta
        $neko = [
            'nik' => $request->nik,
            'nama_lengkap' => $request->nama_lengkap,
            'tgl_lahir' => $request->tgl_lahir,
            'umur' => $request->umur,
            'gender' => $request->gender,
            'profesi' => $request->profesi,
            'whatsapp' => $request->whatsapp,
            'email' => $request->email,
            'motivasi' => $request->motivasi,
            'alamat' => $request->alamat
        ];

        $jquin = [
            'nama_lengkap' => $request->nama_lengkap,
            'path' => $fileMove
        ];

        // Update Peserta
        $peserta = Peserta::where('user_id', auth()->user()->id)->update($neko);
        $user = User::findOrFail(auth()->user()->id);
        $user->update($jquin);

        return redirect()->route('peserta.dashboard')->with('profil','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        Storage::delete('public/'.$user->path);
        $user->delete();

        return redirect()->back()->with('destroy','');
    }

    // Peserta Prakerja
    public function indexPrakerja()
    {
        $neko = Peserta::where('prakerja','Ya')->latest()->get();

        return view('admin.peserta.indexPrakerja', compact('neko'));
    }
}

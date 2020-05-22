<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use App\Peserta;

class PesertaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $neko = Peserta::latest()->get();

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
            'username' => $request->nama_pengguna,
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
}

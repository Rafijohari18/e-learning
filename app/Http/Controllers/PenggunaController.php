<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\User;
use Auth;
use Hash;

class PenggunaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $neko = User::orderBy('nama_lengkap','ASC')->get();

        return view('admin.pengguna.index', compact('neko'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if (empty($request->path)) {
            $fileMove = 'default.png';
        } else {
            $fileMove = Storage::disk('public')->putFile('pengguna',$request->file('path'));
        }
        $neko = array(
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->username,
            'password' => bcrypt($request->password),
            'role' => $request->role,
            'path' => $fileMove,
        );

        User::create($neko);

        return redirect()->back()->with('store','');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profil()
    {
        return view('admin.pengguna.profil');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function profUpdate(Request $request)
    {
        $fileOri = $request->file('path');
       
        if (empty($request->path)) {
            $fileMove = $request->fileOri;
        } else {
            Storage::delete('public/'.$request->fileOri);
            $fileMove = Storage::disk('public')->putFile('avatar', $fileOri);
        }

        $jquin = [
            'nama_lengkap' => $request->nama_lengkap,
            'username' => $request->nama_pengguna,
            'path' => $fileMove
        ];

        // Update User
        $user = User::findOrFail(auth()->user()->id);
        $user->update($jquin);

        return redirect()->back()->with('profil','');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $pw = [
            'password' => bcrypt('rahasia')
        ];

        $user->update($pw);

        return redirect()->back()->with('suksesPw','');
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

    // Semua Pengguna
    public function gantiPw()
    {
        return view('login.gantiPw');
    }

    public function updatePw(Request $request)
    {
        // Validasi
        $this->validate($request, [
            'sandiLama' => 'required',
            'sandiBaru' => 'required|min:8'
        ]);

        $sandiLama = $request->sandiLama;
        $sandiBaru = $request->sandiBaru;

            if (!Hash::check($sandiLama, Auth::user()->password)) {
                return redirect()->back()->with('errorPw','');
            }else{
                $neko = [
                    'password' => bcrypt($request->sandiBaru)
                ];

                $jquin = User::findOrFail(auth()->user()->id);
                $jquin->update($neko);

                if (auth()->user()->role == 'Admin') {
                    return redirect()->route('admin.dashboard')->with('suksesPw','');
                } else {
                    return redirect()->route('peserta.dashboard')->with('suksesPw','');
                }

            }
    }
}

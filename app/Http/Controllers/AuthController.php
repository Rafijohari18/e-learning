<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Peserta;
use App\User;
use Cookie;
use App\ProgramPeserta; 

class AuthController extends Controller
{
    public function login()
    {
    	return view('login.loginPeserta');
    }

    public function postLogin(Request $request)
    {
        if (unserialize(Cookie::get('hosting'))) {
            $cookie = unserialize(Cookie::get('hosting'));
            if (Auth::attempt($request->only('username','password'))) {
            if (auth()->user()->role == 'Peserta') {
                return redirect()->route('peserta.invoice')->with('welcome','');
            }
          }
        }else{
            if (Auth::attempt($request->only('username','password'))) {
                if (auth()->user()->role == 'Admin') {
                    return redirect()->route('admin.dashboard')->with('welcome','');
                }elseif (auth()->user()->role == 'Peserta') {
                    return redirect()->route('peserta.dashboard')->with('welcome','');
                }
            }
        }


        return redirect()->back()->with('error','');
    }

    public function register(Request $request)
    {
       if (unserialize(Cookie::get('hosting'))) {
        $cookie = unserialize(Cookie::get('hosting'));
        $a['user_id'] = $cookie['user_id'];
        $a['program_id'] = $cookie['program_id'];
        $a['harga'] = $cookie['harga'];

        $ProgramPeserta = ProgramPeserta::insert($cookie);

        $data =  new User();
        $data->nama_lengkap = $request->nama_lengkap;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->role = 'Peserta';
        $data->path = 'default.png';
        $data->save();


        $peserta = new Peserta();
        $peserta->user_id = $data->id;
        $peserta->nik = $request->nik;
        $peserta->nama_lengkap = $request->nama_lengkap;
        $peserta->tgl_lahir = $request->tgl_lahir;
        $peserta->umur = $request->umur;
        $peserta->gender = $request->gender;
        $peserta->whatsapp = $request->whatsapp;
        $peserta->email = $request->email;
        $peserta->profesi = $request->profesi;
        $peserta->alamat = $request->alamat;
        $peserta->motivasi = $request->motivasi;
        $peserta->save();

        return redirect('login')->with('alert-success','Kamu berhasil Register');
        
        }else{
            // Insert To Table User
            $data =  new User();
            $data->nama_lengkap = $request->nama_lengkap;
            $data->username = $request->username;
            $data->password = bcrypt($request->password);
            $data->role = 'Peserta';
            $data->path = 'default.png';
            $data->save();

            // Insert To Table Peserta
            $peserta = new Peserta();
            $peserta->user_id = $cookie['user_id'];
            $peserta->nik = $request->nik;
            $peserta->nama_lengkap = $request->nama_lengkap;
            $peserta->tgl_lahir = $request->tgl_lahir;
            $peserta->umur = $request->umur;
            $peserta->gender = $request->gender;
            $peserta->whatsapp = $request->whatsapp;
            $peserta->email = $request->email;
            $peserta->profesi = $request->profesi;
            $peserta->alamat = $request->alamat;
            $peserta->motivasi = $request->motivasi;
            $peserta->save();
            
            return redirect('login')->with('alert-success','Kamu berhasil Register');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('login');
    }

}

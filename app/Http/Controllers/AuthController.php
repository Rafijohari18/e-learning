<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Peserta;
use App\User;
use Cookie;
use App\Transaksi; 

class AuthController extends Controller
{
    // Admin Login
    public function loginAdmin()
    {
    	return view('login.login');
    }

    public function login()
    {
        return view('login.loginPeserta');
    }

    public function postLogin(Request $request)
    {
        if (Auth::attempt($request->only('username','password'))) {
            if (auth()->user()->role == 'Admin') {
                return redirect()->route('admin.dashboard')->with('welcome','');
            }elseif (auth()->user()->role == 'Peserta') {
                return redirect()->route('peserta.dashboard')->with('welcome','');
            }
            elseif (auth()->user()->role == 'Pengajar') {
                return redirect()->route('admin.dashboard')->with('welcome','');
            }
        }

        return redirect()->back()->with('error','');
    }

    public function register(Request $request)
    {
        // Validasi
        $request->validate([
            'nik' => 'required|unique:peserta',
            'username' => 'required|unique:users',
            'email' => 'required|unique:peserta',
        ]);

        // Insert To Table User
        $data =  new User();
        $data->nama_lengkap = $request->nama_lengkap;
        $data->username = $request->username;
        $data->password = bcrypt($request->password);
        $data->role = 'Peserta';
        $data->path = 'default.png';
        $data->save();

        // Insert Table Transaksi
        $a['kode_invoice'] = 'INV-'.mt_rand(100000, 999999).date('s');
        $a['user_id'] = $data->id;
        $a['program_id'] = $request->program_id;
        $a['status'] = 'Menunggu Verifikasi';
        $a['created_at'] = date('Y-m-d H:i:s');

        $transaksi = Transaksi::insert($a);

        // Insert Table Peserta
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

        // Login
        if (Auth::attempt($request->only('username','password'))) {
            return redirect()->route('struk.upload')->with('newWelcome','');
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('login');
    }

}

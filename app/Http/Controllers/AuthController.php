<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Peserta;
use App\User;
use Cookie;
use App\Transaksi; 
use App\ProgramPeserta;
use App\KategoriKupon;
use App\Kupon;
use App\Program;

class AuthController extends Controller
{
    // Admin Login
    public function loginAdmin()
    {
    	return view('login.login');
    }

    public function daftarAkun()
    {
        $listProgram = Program::orderBy('nama_program', 'ASC')->get();

        return view('sites.daftarAkun', compact('listProgram'));
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

        // Validas Jika Value Program Peserta == 0
        if ($request->program_id == 0) {
            return redirect()->back()->with('pilihProgram','');
        }

        if ($request->payment == 'kartuprakerja') {
            // Cek Kupon
            if (Kupon::where('kode', $request->kupon)->exists()) {
                // Cek Apakah Program Memiliki Kupon
                $kupon = Kupon::where('kode', $request->kupon)->first();
                if (KategoriKupon::where('program_id', $request->program_id)->where('kupon_id', $kupon->id)->exists()) {
                    // Cek Tanggal Expired Kupon
                    $exp = date('Y-m-d');
                    if ($exp >= $kupon->tanggal_expired) {
                        return redirect()->back()->with('kuponExpired','');
                    }
                    // Cek Apakah Kupon Masih Tersedia Jika Ada Kurangi Kuota Kupon
                    if ($kupon->kuota != 0) {
                        $kuota = $kupon->kuota - 1;
                        $jquin = Kupon::where('kode', $request->kupon)->update(['kuota' => $kuota]);

                        // Insert To Table User
                        $data = new User();
                        $data->nama_lengkap = $request->nama_lengkap;
                        $data->username = $request->username;
                        $data->password = bcrypt($request->password);
                        $data->role = 'Peserta';
                        $data->path = 'default.png';
                        $data->save();

                        // Insert Table Transaksi Dengan Metode Pembayaran Via Kartu Prakerja
                        $a['kode_invoice'] = 'INV-'.mt_rand(100000, 999999).date('s');
                        $a['user_id'] = $data->id;
                        $a['program_id'] = $request->program_id;
                        $a['status'] = 'Diverifikasi';
                        $a['kartu_prakerja'] = $request->no_kk;
                        $a['kupon'] = $request->kupon;
                        $a['created_at'] = date('Y-m-d H:i:s');

                        $transaksi = Transaksi::insert($a); 
                        // Insert Program Ke Table peserta_program
                        $pesertaProgram = ProgramPeserta::insert([
                            'user_id' => $data->id,
                            'program_id' => $request->program_id,
                            'created_at' => date('Y-m-d H:i:s')
                        ]);  

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
                        $peserta->prakerja = 'Ya';
                        $peserta->save();

                        // Login
                        if (Auth::attempt($request->only('username','password'))) {
                            return redirect()->route('peserta.dashboard')->with('newWelcome','');
                        }
                    } else {
                        // Jika Kupon == 0
                        return redirect()->back()->with('kuponLimited','');
                    }
                }
                // Jika Program Tidak Memiliki Kupon
                return redirect()->back()->with('programKuponInvalid','');
            }
            // Jika Kupon Tidak Ada Di Table Kupon
            return redirect()->back()->with('kuponInvalid','');
        } else {
            // Insert To Table User
            $data =  new User();
            $data->nama_lengkap = $request->nama_lengkap;
            $data->username = $request->username;
            $data->password = bcrypt($request->password);
            $data->role = 'Peserta';
            $data->path = 'default.png';
            $data->save();

            // Insert Table Transaksi Dengan Status Pembayaran Via E-Banking
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
            $peserta->prakerja = 'Tidak';
            $peserta->save();

            // Login
            if (Auth::attempt($request->only('username','password'))) {
                return redirect()->route('struk.upload')->with('newWelcome','');
            }
        }
    }

    public function logout()
    {
        Auth::logout();

        return redirect('login');
    }

    // Json
    public function cariProgram($id)
    {
        $program = Program::find($id);

        return $program;
    }

}

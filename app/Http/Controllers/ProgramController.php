<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\ProgramPeserta;
use App\Kategori;
use App\Module;
use App\DaftarBelajar;
use App\Repositories\Repository;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;

class ProgramController extends Controller
{

    protected $model;

    public function __construct(Program $Program){
        $this->model = new Repository($Program);
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Program';
        $data = Program::latest()->get();

        return view('admin.program.index',compact('title','data'));
    }

    public function create()
    {
        $kategori = Kategori::orderBy('nama_kategori')->get();

        return view('admin.program.create', compact('kategori'));
    }

    public function store(Request $request)
    {
        // Kupon
        if ($request->kupon == 'Ya') {
            $permitted_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $kupon = substr(str_shuffle($permitted_chars), 0, 8);
        } else {
            $kupon = NULL;
        }

        $fileMove = Storage::disk('public')->putFile('program',$request->file('path'));
        $slug = Str::of($request->nama_program)->slug('-');

        $neko = array(
            'user_id' => Auth::user()->id,
            'kategori_id' => $request->kategori_id,
            'nama_program' => $request->nama_program,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'durasi_program' => $request->durasi_program,
            'diskon' => $request->diskon,
            'path' => $fileMove,
            'kupon' => $kupon,
            'slug' => $slug
        );

        Program::create($neko);

        return redirect()->route('program.index')->with('store','');
    }

    public function edit(Program $program)
    {
        $kategori = Kategori::orderBy('nama_kategori', 'ASC')->get();

        return view('admin.program.edit', compact('program','kategori'));
    }

    public function update(Request $request, Program $program)
    {
        // Kupon
        if ($request->kupon == 'Ya') {
            $permitted_chars = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $kupon = substr(str_shuffle($permitted_chars), 0, 8);
        } else {
            $kupon = NULL;
        }

        $fileOri = $request->file('path');
       
        if (empty($request->path)) {
            $fileMove = $request->fileOri;
        } else {
            Storage::delete('public/'.$request->fileOri);
            $fileMove = Storage::disk('public')->putFile('program', $fileOri);
        }

        $slug = Str::of($request->nama_program)->slug('-');

        $neko = array(
            'user_id' => Auth::user()->id,
            'kategori_id' => $request->kategori_id,
            'nama_program' => $request->nama_program,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'durasi_program' => $request->durasi_program,
            'diskon' => $request->diskon,
            'path' => $fileMove,
            'kupon' => $kupon,
            'slug' => $slug
        );

        $program = Program::findOrFail($program->id);
        $program->update($neko);

        return redirect()->route('program.index')->with('update','Program Succes Updated !');
    }

    public function destroy(Program $program)
    {
        Storage::delete('public/'.$program->path);
        $this->model->delete($program->id);

        return back()->with('destroy','Program Succes Delete !');
    }

    // Program dan Modul Halaman Peserta
    public function indexPeserta()
    {
        $neko = ProgramPeserta::where('user_id', auth()->user()->id)->get();

        return view('peserta.program.index', compact('neko'));
    }

    public function showProgram(Program $program)
    {
        return view('peserta.program.detail', compact('program'));
    }

    public function readModul($proId, $mdId)
    {
        // Cek materi pertama
        $intro = DaftarBelajar::where('user_id', auth()->user()->id)->where('modul_id', $mdId)->first();
        if ($intro == NULL) {
            // Jika materi tidak ada, insert materi ke table daftar_belajar
            $neko = DaftarBelajar::create([
                'user_id' => auth()->user()->id,
                'program_id' => $proId,
                'modul_id' => $mdId
            ]);
        }

        // Validasi Modul
        if (Module::where('id', $mdId)->where('program_id', $proId)->exists()) {
            // Cari Program Peserta
            $pesPro = ProgramPeserta::where('program_id', $proId)->where('user_id', auth()->user()->id)->get();
            // Jika peserta memiliki program
            if (count($pesPro) > 0) {
                // Tampil materi
                $modul = Module::where('program_id', $proId)->where('id', $mdId)->orderBy('judul','ASC')->first();
                // Next Prev Button
                $prev_id = Module::where('id', '<', $mdId)->where('program_id', $proId)->max('id');
                $next_id = Module::where('id', '>', $mdId)->where('program_id', $proId)->min('id');
                // Daftar Belajar
                $neko = Module::where('program_id', $proId)->orderBy('judul', 'ASC')->get();
                // Quis
                $quis = Program::with('module')->where('id',$proId)->first();
                $totalModul = DaftarBelajar::where('user_id', auth()->user()->id)->where('program_id', $proId)->count();

                return view('peserta.program.show', compact('modul','neko','quis','next_id','prev_id','totalModul'));
            } else {
                // Jika peserta tidak memiliki program
                return redirect()->back();
            }
        }

        return redirect()->back();
    }

    public function daftarBelajar(Request $request)
    {
        // Cek data di table daftar_belajar
        if (DaftarBelajar::where('user_id', auth()->user()->id)->where('program_id', $request->program_id)->where('modul_id', $request->modul_id)->exists()) {
            // Jika data ada, redirect ke halaman selanjutnya
            return redirect()->route('program.read', [$request->program_id,$request->modul_id]);
        } else {
            // Jika data tidak ada, insert data ke table daftar_belajar
            $neko = DaftarBelajar::create([
                'user_id' => auth()->user()->id,
                'program_id' => $request->program_id,
                'modul_id' => $request->modul_id
            ]);

            // Redirect ke halaman selanjutnya
            return redirect()->route('program.read', [$request->program_id,$request->modul_id]);
        }
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\ProgramPeserta;
use App\Kategori;
use App\Module;
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

    public function readModul(Program $program)
    {
        $neko = Module::where('program_id', $program->id)->orderBy('judul', 'ASC')->get();
        $modul = Module::where('program_id', $program->id)->orderBy('judul','ASC')->first();
        $quis = Program::with('module')->where('id',$program->id)->get();


        return view('peserta.program.show', compact('modul','neko','quis'));
    }
}

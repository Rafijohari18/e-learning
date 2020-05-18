<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
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
        $data = $this->model->all();

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

        $neko = array(
            'user_id' => Auth::user()->id,
            'kategori_id' => $request->kategori_id,
            'nama_program' => $request->nama_program,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'durasi_program' => $request->durasi_program,
            'diskon' => $request->diskon,
            'path' => $fileMove,
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

        $neko = array(
            'user_id' => Auth::user()->id,
            'kategori_id' => $request->kategori_id,
            'nama_program' => $request->nama_program,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'durasi_program' => $request->durasi_program,
            'diskon' => $request->diskon,
            'path' => $fileMove,
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

    // Program Halaman Peserta
    public function indexPeserta()
    {
        // $neko = Program::latest()->get();
        $neko = Module::where('program_id', 4)->orderBy('judul', 'ASC')->get();

        return view('peserta.module.index', compact('neko'));
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
use App\Program;
use App\Kategori;
use App\Repositories\Repository;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Auth;

class ModuleController extends Controller
{

    protected $model;

    public function __construct(Module $Module){
        $this->model = new Repository($Module);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Module';
        $data = Module::with('kategori','program','user')->get();
        return view('admin.module.index',compact('title','data'));
    }
    public function create($id)
    {
        $title = 'Tambah Module';
        $data['kategori'] = Kategori::all();
        $data['program'] = Program::all();
        return view('admin.module.create',compact('title','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request,$id)
    {
       if (empty($request->path)) {
            $fileMove = 'default.png';
        } else {
            $fileMove =  $request->file('path')->store('data_file');
        }
        $neko = array(
            'user_id' => Auth::user()->id,
            'program_id' => $request->program,
            'kategori_id' => $request->kategori,
            'nama_modul' => $request->modul,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'durasi_program' => $request->durasi,
            'diskon' => $request->diskon,
            'path' => $fileMove,
        );

        Module::create($neko);

        return redirect()->back()->with('store','');
    }

    public function edit($id)
    {
        $title = 'Edit Module';
        $data['kategori'] = Kategori::all();
        $data['program'] = Program::all();
        $data['module'] = Module::find($id);
        return view('admin.module.edit',compact('title','data'));
    }

   
    public function update(Request $request, $id)
    {
       $fileOri = $request->file('path');
       
        if (empty($request->path)) {
            $fileMove = $request->fileOri;
        } else {
            Storage::delete('public/'.$request->fileOri);
            $fileMove = Storage::disk('public')->putFile('konten', $fileOri);
        }


        $neko = [
            'user_id' => Auth::user()->id,
            'program_id' => $request->program,
            'kategori_id' => $request->kategori,
            'nama_modul' => $request->modul,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'durasi_program' => $request->durasi,
            'diskon' => $request->diskon,
            'path' => $fileMove,
        ];

        $jquin = Module::findOrFail($id);
        $jquin->update($neko);

        return redirect()->back()->with('update','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $this->model->delete($id);
        return back()->with('destroy','Module Succes Delete !');
    }
}

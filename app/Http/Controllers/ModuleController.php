<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Module;
use App\Program;
use App\Repositories\Repository;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Auth;
use DB;

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
        $neko = Module::latest()->get();

        return view('admin.module.index', compact('neko'));
    }

    public function create()
    {
        $data['program'] = Program::all();

        return view('admin.module.create',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $neko = array(
            'user_id' => Auth::user()->id,
            'program_id' => $request->program_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'link' => $request->link
        );

        Module::create($neko);

        return redirect()->route('module.index')->with('store','');
    }

    public function show(Module $module)
    {
        return view('admin.module.show', compact('module'));
    }

    public function edit(Module $module)
    {
        $data['program'] = Program::all();

        return view('admin.module.edit',compact('module','data'));
    }
   
    public function update(Request $request, Module $module)
    {
        $neko = array(
            'user_id' => Auth::user()->id,
            'program_id' => $request->program_id,
            'judul' => $request->judul,
            'deskripsi' => $request->deskripsi,
            'link' => $request->link,
        );

        $jquin = Module::findOrFail($module->id);
        $jquin->update($neko);

        return redirect()->route('module.index')->with('update','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Module $module)
    {
        $this->model->delete($module->id);

        return back()->with('destroy','Module Succes Delete !');
    }

    // Modul Halaman Peserta
    public function showModul(Module $module)
    {
        $neko = Module::where('program_id', 4)->orderBy('judul', 'ASC')->get();

        return view('peserta.module.show', compact('module','neko'));
    }
}

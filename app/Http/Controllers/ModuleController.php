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
        if ($request->file('path')) {
             $fileMove = Storage::disk('public')->putFile('module',$request->file('path'));

             $neko = array(
                'user_id' => Auth::user()->id,
                'program_id' => $request->program_id,
                'judul' => $request->judul,
                'durasi' => $request->durasi,
                'deskripsi' => $request->deskripsi,
                'file'  => $fileMove,
                'link' => $request->link
            );

        Module::create($neko);

        return redirect()->route('module.index')->with('store','');
        }else{
             $neko = array(
                'user_id' => Auth::user()->id,
                'program_id' => $request->program_id,
                'judul' => $request->judul,
                'durasi' => $request->durasi,
                'deskripsi' => $request->deskripsi,
                'link' => $request->link
            );

        Module::create($neko);

        return redirect()->route('module.index')->with('store','');
        }
       
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
          $fileOri = $request->file('path');
       
            if (empty($request->path)) {
                $fileMove = $request->fileOri;
            } else {
                Storage::delete('public/'.$request->fileOri);
                $fileMove = Storage::disk('public')->putFile('module', $fileOri);
            }

        $neko = array(
            'user_id' => Auth::user()->id,
            'program_id' => $request->program_id,
            'judul' => $request->judul,
            'durasi' => $request->durasi,
            'deskripsi' => $request->deskripsi,
            'link' => $request->link,
            'file' => $fileMove,
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
        Storage::delete('public/'.$module->file);
        $this->model->delete($module->id);

        return back()->with('destroy','Module Succes Delete !');
    }
}

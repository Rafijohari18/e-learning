<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Materi;
use App\Repositories\Repository;
use Illuminate\Support\Str;

class MateriController extends Controller
{

    protected $model;

    public function __construct(Materi $Materi){
        $this->model = new Repository($Materi);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $title = 'Materi';
<<<<<<< HEAD
        $data = Materi::where('modul_id',$id)->get();
        return view('admin.materi.index',compact('title','data'));
=======
        $data = Materi::where('modul_id', $id)->latest()->get();

        return view('admin.materi.index',compact('title','data','id'));
>>>>>>> 2b3404b581b77692afd49ed037cad60e7d49a6eb
    }

    public function create($id)
    {
        $title = 'Tambah Materi';
        $modulId = $id;

        return view('admin.materi.create',compact('title','modulId'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $neko = [
            'user_id' => auth()->user()->id,
            'modul_id' => $request->module_id,
            'judul' => $request->judul,
            'deskripsi' =>$request->deskripsi,
        ];

        Materi::create($neko);

        return redirect()->route('materi.index',['id'=>$request->module_id])->with('store','');
    }

     public function edit($id)
    {
        $title = 'Edit Materi';
        $data['materi'] = Materi::find($id);
        return view('admin.materi.edit',compact('title','data'));
    }

   
    public function update(Request $request, $id)
    {
         $neko = [
            'user_id' => auth()->user()->id,
            'modul_id' => $request->module_id,
            'judul' => $request->judul,
            'deskripsi' =>$request->deskripsi,

        ];

        $jquin = Materi::findOrFail($id);
        $jquin->update($neko);

        return redirect()->route('materi.index',['id'=>$request->module_id])->with('update','');
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
        return back()->with('destroy','Program Succes Delete !');
    }
}

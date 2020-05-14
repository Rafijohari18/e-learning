<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Kategori;
use App\Repositories\Repository;
use Illuminate\Support\Str;

class KategoriController extends Controller
{

    protected $model;

    public function __construct(Kategori $Kategori){
        $this->model = new Repository($Kategori);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $title = 'Kategori ';
        $data = $this->model->all();
        return view('admin.kategori.index',compact('title','data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
    {
        $this->model->create($request->only($this->model->getModel()->fillable));
        return back()->with('store','Kategori Succes Created !');
    }

   
    public function update(Request $request, $id)
    {
        $this->model->update($request->only($this->model->getmodel()->fillable),$id);
        return back()->with('update','Kategori Succes Updated !');
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
        return back()->with('destroy','Kategori Succes Delete !');
    }
}

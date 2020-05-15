<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Program;
use App\Repositories\Repository;
use Illuminate\Support\Str;

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


   public function store(Request $request)
    {
        $this->model->create($request->only($this->model->getModel()->fillable));
        return back()->with('store','Program Created !');

    }

    public function update(Request $request, $id)
    {
        $this->model->update($request->only($this->model->getmodel()->fillable),$id);
        return back()->with('update','Program Succes Updated !');
    }


     public function destroy($id)
    {

        $this->model->delete($id);
        return back()->with('destroy','Program Succes Delete !');

    }
}

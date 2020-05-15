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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function store(Request $request)
    {
        $this->model->create($request->only($this->model->getModel()->fillable));

<<<<<<< HEAD
        return back()->with('store','Program Created !');
=======
        return back()->with('store','');
>>>>>>> 2b3404b581b77692afd49ed037cad60e7d49a6eb
    }

    public function update(Request $request, $id)
    {
        $this->model->update($request->only($this->model->getmodel()->fillable),$id);

<<<<<<< HEAD
        return back()->with('update','Program Succes Updated !');
=======
        return back()->with('update','');
>>>>>>> 2b3404b581b77692afd49ed037cad60e7d49a6eb
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
    {
<<<<<<< HEAD
        $this->model->delete($id);
        return back()->with('destroy','Program Succes Delete !');
=======
        $ea = $this->model->delete($id);

        return back()->with('destroy','');
>>>>>>> 2b3404b581b77692afd49ed037cad60e7d49a6eb
    }
}

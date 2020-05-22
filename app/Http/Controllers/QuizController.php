<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Soal;
use App\Program;
use App\Pilihan;
use App\Module;
use App\Hasil;
use App\Repositories\Repository;
use Illuminate\Support\Str;

class QuizController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        // Nama Program
        $program = Program::findOrFail($id);
        $nmProgram = $program->nama_program;

        // Tampil data per program
        $title = 'Module';
        $data = Program::with('module')->where('id',$id)->get();

        return view('admin.quiz.index',compact('title','data','nmProgram'));
    }
    public function nilai($id)
    {
      $program = Program::findOrFail($id);
      $nmProgram = $program->nama_program;
     
     $data['hasil'] = Hasil::with('user')->where('program_id',$id)->orderBy('hasil','DESC')->get();
     return view('admin.quiz.nilai',compact('data','nmProgram'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function soal($id)
    {
        $program = Program::findOrFail($id);
        $nmProgram = $program->nama_program;

        $data = Soal::where('program_id', $id)->get();

        return view('admin.quiz.soal',compact('data','nmProgram'));
    }

    public function create($id)
    { 
        $title = 'Tambah Soal';

        return view('admin.quiz.create',compact('title'));
    }

    public function store(Request $request)
    {
      $soal = Soal::create([
          'soal'          => $request->soal,
          'program_id'    =>  $request->program_id,
          'jawaban'       =>  $request->jawaban,
      ]);  

      $pilihan = $request->pilihan;
     
      $no = 1;
      foreach ($pilihan as $key => $item) 
      {
          $insert_data[] = array(
              'pilihan' => $item,
              'soal_id' => $soal->id,
              'opsi'    => $no++ 
          );
      }
   
      $pilihan =  Pilihan::insert($insert_data);
      return redirect()->route('quiz.soal',['id'=>$request->program_id])->with('success','Soal Succes Create !');
  }

  public function edit(Request $request,$id)
  {
    $data['soal'] = Soal::where('id',$id)->first();
    $data['pilihan'] = Pilihan::where('soal_id',$id)->get();

    return view('admin.quiz.edit',compact('data'));
  }

  public function update(Request $request, $id)
  {
         $data = Soal::findorFail($id);
          $data->soal= $request->soal;
          $data->jawaban= $request->jawaban;
          $data->program_id= $request->program_id;
          $data->update();
             
         $pilihan = $request->pilihan;
         Pilihan::where('soal_id',$id)->delete();
     
          $no = 1;
          foreach ($pilihan as $key => $item) 
          {
              $insert_data[] = array(

                  'pilihan' => $item,
                  'soal_id' => $data->id,
                  'opsi'    => $no++ 
              );
          }
       
        $pilihan =  Pilihan::insert($insert_data);
        return redirect()->route('quiz.soal',['id'=>$request->program_id])->with('update','Soal Succes Create !');  
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
        
        return back()->with('success','Program Succes Delete !');
    }
}

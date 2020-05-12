<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Program;

class ProgramController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $neko = Program::latest()->get();

        return view('admin.program.index', compact('neko'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.program.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $fileMove = Storage::disk('public')->putFile('program',$request->path);
     
        $neko = Program::create([
            'nama_program' => $request->nama_program,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'diskon' => $request->diskon,
            'total_waktu' => $request->total_waktu,
            'path' => $fileMove,
        ]);

        return redirect()->route('program.index')->with('store','');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Program $program)
    {
        return view('admin.program.edit', compact('program'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Program $program)
    {
        $fileOri = $request->file('path');
       
        if (empty($request->path)) {
            $fileMove = $request->fileOri;
        } else {
            Storage::delete('public/'.$request->fileOri);
            $fileMove = Storage::disk('public')->putFile('program', $fileOri);
        }

        $neko = [
            'nama_program' => $request->nama_program,
            'deskripsi' => $request->deskripsi,
            'harga' => $request->harga,
            'diskon' => $request->diskon,
            'total_waktu' => $request->total_waktu,
            'path' => $fileMove,
        ];

        $jquin = Program::findOrFail($program->id);
        $jquin->update($neko);

        return redirect()->route('program.index')->with('update','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Program $program)
    {
        Storage::delete('public/'.$program->path);
        $program->delete();

        return redirect()->back()->with('destroy','');
    }
}

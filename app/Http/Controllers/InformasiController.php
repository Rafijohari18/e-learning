<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Konten;

class InformasiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $neko = Konten::latest()->get();

        return view('admin.konten.index', compact('neko'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.konten.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->path != NULL) {
            $fileMove = Storage::disk('public')->putFile('konten',$request->file('path'));
        } else {
            $fileMove = NULL;
        }

        $slug = Str::of($request->judul)->slug('-');

        $neko = [
            'user_id' => auth()->user()->id,
            'judul' => $request->judul,
            'artikel' => $request->artikel,
            'path' => $fileMove,
            'slug' => $slug
        ];

        Konten::create($neko);

        return redirect()->route('konten.index')->with('store','');
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
    public function edit(Konten $konten)
    {
        return view('admin.konten.edit', compact('konten'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Konten $konten)
    {
        $fileOri = $request->file('path');
       
        if (empty($request->path)) {
            $fileMove = $request->fileOri;
        } else {
            Storage::delete('public/'.$request->fileOri);
            $fileMove = Storage::disk('public')->putFile('konten', $fileOri);
        }

        $slug = Str::of($request->judul)->slug('-');

        $neko = [
            'user_id' => auth()->user()->id,
            'judul' => $request->judul,
            'artikel' => $request->artikel,
            'path' => $fileMove,
            'slug' => $slug
        ];

        $jquin = Konten::findOrFail($konten->id);
        $jquin->update($neko);

        return redirect()->route('konten.index')->with('update','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Konten $konten)
    {
        if ($konten->path != NULL) {
            Storage::delete('public/'.$konten->path);
        }

        $konten->delete();

        return redirect()->back()->with('destroy','');
    }

    // Dowload File (Belum selesai)
    public function download($filename)
    {
        return response()->download(storage_path("app/public/{$filename}"));
    }
}

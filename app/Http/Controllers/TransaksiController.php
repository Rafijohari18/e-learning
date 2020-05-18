<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Transaksi;
use App\ProgramPeserta;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $neko = Transaksi::latest()->get();

        return view('admin.transaksi.index', compact('neko'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
    public function update(Transaksi $transaksi)
    {
        // Insert Table ProgramPeserta
        $pp = ProgramPeserta::create([
            'user_id' => $transaksi->user_id,
            'program_id' => $transaksi->program_id,
            'harga' => $transaksi->program->harga
        ]);

        // Update Status Transaksi
        $neko = [
            'status' => 'Diverifikasi',
        ];

        $jquin = Transaksi::findOrFail($transaksi->id);
        $jquin->update($neko);

        return redirect()->back()->with('verifikasi','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}

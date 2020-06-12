<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Transaksi;
use App\ProgramPeserta;
use App\Exports\TransaksiExport;
use App\Exports\TransaksiUmumExport;
use Maatwebsite\Excel\Facades\Excel;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $neko = Transaksi::where('kartu_prakerja', '!=', NULL)->where('kupon', '!=', NULL)->orderBy('status','DESC')->latest()->get();

        return view('admin.transaksi.index', compact('neko'));
    }

    public function indexUmum()
    {
        $neko = Transaksi::where('kartu_prakerja', NULL)->where('kupon', NULL)->orderBy('status','DESC')->latest()->get();

        return view('admin.transaksi.indexUmum', compact('neko'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Transaksi $transaksi)
    {
        return view('admin.transaksi.show', compact('transaksi'));
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
            'program_id' => $transaksi->program_id
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
    public function destroy(Transaksi $transaksi)
    {
        Storage::delete('public/'.$transaksi->path);
        $transaksi->delete();

        return redirect()->back()->with('destroy','');
    }

    // Export
    public function exportExcelPrakerja() 
    {
        $date = date('d-F-Y');

        return Excel::download(new TransaksiExport, 'rekapitulasi-transaksi-prakerja-'.$date.'.xlsx');
    }

    public function exportExcelUmum() 
    {
        $date = date('d-F-Y');

        return Excel::download(new TransaksiUmumExport, 'rekapitulasi-transaksi-umum-'.$date.'.xlsx');
    }
}

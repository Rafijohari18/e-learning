<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Kupon;
use App\KategoriKupon;
use App\Program;
use App\Exports\KuponExport;
use Maatwebsite\Excel\Facades\Excel;

class KuponController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $neko = Kupon::with('KategoriKupon')->latest()->get();

        return view('admin.kupon.index', compact('neko'));
    }



    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['program'] = Program::all();

        return view('admin.kupon.create',compact('data'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $neko = [
            'kode' => $request->kode,
            'kuota' => $request->kuota,
            'name' => $request->name,
            'potongan' => $request->potongan,
            'tanggal_expired' => date('Y-m-d',strtotime($request->tanggal)),
        ];

        $kupon = Kupon::create($neko);


          $kategori = $request->kategori;
            if($kategori != null){
               $cek = KategoriKupon::where('kupon_id',$kupon->id)->get();
            if ($cek != null) {
                    KategoriKupon::where('kupon_id',$kupon->id)->delete();
                }

            foreach ($kategori as $key => $item) 
                {
                    $insert_data[] = array(
                        'program_id' => $item,
                        'kupon_id'     => $kupon->id,
                        'name' => $request->name
                      );
                  }
            $kategori = KategoriKupon::insert($insert_data);

            }
    
     

        return redirect()->route('kupon.index')->with('store','');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['program'] = Program::all();
        $data['kupon']      = Kupon::where('id',$id)->first();

        $data['kategori_kupon']      =  KategoriKupon::where('kupon_id',$id)->get();
    
        $collectRoles = collect($data['kategori_kupon']);
        $data['program_id'] = $collectRoles->map(function($item, $key) {
            return $item['program_id'];
        })->all();

        return view('admin.kupon.edit', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        $neko = [
            'kode' => $request->kode,
            'kuota' => $request->kuota,
            'name' => $request->name,
            'potongan' => $request->potongan,
            'tanggal_expired' => date('Y-m-d',strtotime($request->tanggal)),
        ];

        $jquin = Kupon::findOrFail($id);
        $jquin->update($neko);

        $kategori = $request->kategori;
            if($kategori != null){
               $cek = KategoriKupon::where('kupon_id',$id)->get();
            if ($cek != null) {
                    KategoriKupon::where('kupon_id',$id)->delete();
                }

            foreach ($kategori as $key => $item) 
                {
                    $insert_data[] = array(
                        'program_id' => $item,
                        'kupon_id'     => $id,
                        'name' => $request->name
                      );
                  }
            $kategori = KategoriKupon::insert($insert_data);

            }

        return redirect()->route('kupon.index')->with('update','');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Kupon::where('id',$id)->delete();
        KategoriKupon::where('kupon_id',$id)->delete();

        return redirect()->back()->with('destroy','');
    }

    // Export
    public function exportExcel() 
    {
        $date = date('d-F-Y');

        return Excel::download(new KuponExport, 'rekapitulasi-kupon-'.$date.'.xlsx');
    }
}

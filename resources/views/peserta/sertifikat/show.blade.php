@extends('layouts.master')

@section('title','Hasil Sertifikat')

@section('css')
<!-- DataTables -->
<link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@stop

@section('content')
<div class="container-fluid">
    <?php setlocale(LC_ALL, 'id-ID', 'id_ID'); ?>
    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title">

                    </h4>
                     <div class="d-print-none pb-5">
                        <div class="pull-left ">
                            <a href="javascript:window.print()" class="btn btn-success waves-effect waves-light"><i class="fa fa-print"></i>&nbsp; Cetak</a>
                        </div>
                    </div>
                    <br>

                    <div class="row">
                        <div class="col-md-2" style="border: 0px solid black;">
                           <img src="{{asset('assets/images/KEMNAKER.png')}}" class="img-thumbnail" style="width: 100px;height: 100px;"> 
                       </div> <!-- end col -->

                       <div class="col-md-8 text-center"  style="border: 0px solid black;">
                        <h5>KEMENTRIAN KETENAGAKERJAAN REPUBLIK INDONESIA</h5>
                        <h5>BALAI LATIHAN KERJA KOMUNITAS</h5>  
                        <h5>NURUL HIDAYAH BOJONGNANGKA</h5>  
                        <h2 style="font-style: oblique">Sertifikat Pelatihan Kerja</h2>
                        <p>No : 85492.4115.1.00000{{ $data['program']->id }}.<?php echo date('Y'); ?></p>
                        <p>Dengan ini menerangkan :</p>

                    </div> <!-- end col -->

                    <div class="col-md-2"  style="border: 0px solid black;">
                        <img src="{{asset('assets/images/blk.png')}}" class="img-thumbnail float-right" style="width: 100px;height: 100px;"> 
                    </div> 
                </div> <!-- end row -->
                <div class="row">
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-8">
                        <table>
                            <tr>
                                <td width="200">Nama</td>
                                <td >:</td>
                                <td>{{ $data['program']->user->nama_lengkap }}</td>
                            </tr>
                            <tr>
                                <td width="200">Tanggal lahir</td>
                                <td>:</td>
                                <td>{{ $data['tanggal'] }}</td>
                            </tr>
                            <tr>
                                <td width="200">Nomor Induk</td>
                                <td >:</td>
                                <td>{{  $data['program']->user->peserta->nik }}</td>
                            </tr>
                        </table>


                        <p class="text-center">
                            @if($data['program']->hasil > 70)
                            Dinyatakan berhasil mengikuti program pelatihan  {{  $data['program']->program->nama_program }}
                            @else
                            Dinyatakan sebagai peserta  pelatihan  {{  $data['program']->program->nama_program }}
                            @endif
                        </p>
                        <p class="ml-5">Nama Program 

                            <a class="ml-5">:</a>

                            {{  $data['program']->program->nama_program }} </p> 

                            <p class="ml-5">Yang di selenggarakan di Balai Latihan Kerja Komunitas Nurul Hidayah Bojongnangka Kota Tasikmalaya</p> 
                        </div>
                        <div class="col-md-2">

                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-6">

                        </div>
                        <div class="col-md-4">
                            Kota Tasikmalaya,19 Mei 2020 <br>
                            Kepala BLK Komunitas <br>
                            Ponpes Nurul Hidayah Bojongnangka <br><br><br><br>

                            <p>KH.Entang Bunyamin</p> 
                        </div>
                    </div>

                </div>
            </div>
        </div> <!-- end col -->
    </div>

    <!-- end row -->
</div>
 @if($data['program']->hasil > 70)

<div class="container-fluid">

    <div class="row">
        <div class="col-12">
            <div class="card m-b-30">
                <div class="card-body">
                    <h4 class="mt-0 header-title"></h4>
                    <br>

                    <div class="row">
                        <div class="col-md-2" style="border: 0px solid black;">

                        </div> <!-- end col -->

                        <div class="col-md-8 text-center"  style="border: 0px solid black;">

                            <h2 style="font-style: oblique">UNIT-UNIT KOMPETENSI</h2><hr style="border: 2px solid black;">


                        </div> <!-- end col -->

                        <div class="col-md-2"  style="border: 0px solid black;">

                        </div> 
                    </div> <!-- end row --><br>
                    <div class="row">
                        <div class="col-md-2">

                        </div>
                        <div class="col-md-8">
                            <h5>Nama Program :  {{  $data['program']->program->nama_program }} </h5> 

                        </div>
                        <div class="col-md-2">

                        </div>
                    </div> <br><br><br>
                    <div class="row">
                      <div class="col-md-2">

                      </div>
                      <div class="col-md-8">
                         <div class="table-responsive">
                            <table class="table table-striped">
                                <thead>
                                    <tr class="text-center">
                                        <th>No</th>
                                        <th>Kode Unit Kompetensi </th>
                                        <th>Unit Kompetensi</th>
                                        
                                    </tr>
                                </thead>
                                <tbody class="table-striped">
                                    @foreach($data['program']->program->module as $item)
                                    <tr class="text-center">
                                        <th>{{ $loop->iteration }}</th>
                                        <th>{{ $item->kode_modul }}</th>
                                        <th>{{ $item->judul }}</th>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>       
                    </div>

                </div>
                <br><br>
                <div class="row">
                    <div class="col-md-2">

                    </div>
                    <div class="col-md-6">

                    </div>
                    <div class="col-md-4">
                        Kota Tasikmalaya,19 Mei 2020 <br>
                        Kepala BLK Komunitas <br>
                        Ponpes Nurul Hidayah Bojongnangka <br><br><br><br>

                        <p>KH.Entang Bunyamin</p> 
                    </div>
                </div>

            </div>
        </div>
    </div> <!-- end col -->
</div>

@endif

<!-- end row -->
</div>
@stop

@section('footer')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/pages/datatables.init.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}" type="text/javascript"></script>

<script>
    $().DataTable();
</script>
@stop
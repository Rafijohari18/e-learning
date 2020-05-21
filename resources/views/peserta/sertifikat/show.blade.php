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
<?php setlocale(LC_ALL, 'id-ID', 'id_ID'); ?>
<div class="container-fluid">

        <div class="row">
            <div class="col-12">
                <div class="card m-b-30">
                    <div class="card-body">
                        <h4 class="mt-0 header-title">Sertifikat - {{ Auth::user()->nama_lengkap }}</h4>
                        <br>

                        <div class="row">
                            <div class="col-lg-2" style="border: 0px solid black;">
                               <img src="{{asset('assets/images/KEMNAKER.png')}}" class="img-thumbnail" style="width: 100px;height: 100px;"> 
                           </div> <!-- end col -->

                           <div class="col-lg-8"  style="border: 0px solid black;">
                                Judul
                                <h2>Sertifikat Pelatihan Kerja</h2>
                                <h4>No :</h4>
                                         
                            </div> <!-- end col -->

                            <div class="col-lg-2"  style="border: 0px solid black;">
                                        <img src="{{asset('assets/images/blk.png')}}" class="img-thumbnail float-right" style="width: 100px;height: 100px;"> 
                            </div> 
                                </div> <!-- end row -->
                            </div>
                        </div>
                    </div> <!-- end col -->
                </div>
      
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

        <!-- Destroy -->

        @stop
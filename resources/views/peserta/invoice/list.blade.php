@extends('layouts.master')

@section('title','Data Pengguna')

@section('css')
<!-- DataTables -->
<link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="float-right">
                
                </div>
                <h4 class="mt-0 header-title">Data Invoice {{ Auth::user()->nama_lengkap }}</h4>
                <br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Program</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody class="table-striped">
                        @forelse($data['program'] as $jquin)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $jquin->program->nama_program }}</td>
                            <td>
                                <a href="{{ route('peserta.detail',['id'=> $jquin->id ])}}" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Lihat Invoice"><i class="fa fa-eye"></i></a>
                              
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5"><b><i>Tidak Ada Data</i></b></td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<!-- Modal -->
<x-pengguna></x-pengguna>
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
@extends('layouts.master')

@section('title','Program')

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
                    <a href="" class="btn btn-sm btn-primary">Tambah Data</a>
                </div>
                <h4 class="mt-0 header-title">Program</h4>
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
                        <tr>
                            <td>1</td>
                            <td>Teknik Informatika</td>
                            <td>
                                <!-- Bisi rek pake ikon <i class="ti-pencil">jang edit</i> -->
                                <a href="" class="btn btn-sm btn-primary">Tambah Modul</a>
                                <a href="" class="btn btn-sm btn-warning">Edit</a>
                                <a href="#" onclick="destroy(1,'Teknik Informatika')" class="btn btn-sm btn-danger">Hapus</a>
                            </td>
                        </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->


@stop

@section('footer')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/pages/datatables.init.js')}}"></script>

<script>
$().DataTable();
</script>

<!-- Destroy -->
<script>
    function destroy(id,nama) {
        alertify.confirm("Hapus Program "+nama+"?", function (ev) {
            ev.preventDefault();
            window.location = "program/"+ id +"/destroy";

        }, function(ev) {
            ev.preventDefault();
            alertify.error("Batal!");
        });
    }
</script>
@stop
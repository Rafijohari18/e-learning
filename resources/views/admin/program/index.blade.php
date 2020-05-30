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
                    <a href="{{ route('program.create') }}" class="btn btn-sm btn-primary waves-effect waves-light add" >Tambah Data</a>
                </div>
                <h4 class="mt-0 header-title">
                  Program
                </h4>
                <br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Program</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Diskon</th>
                                <th>Kupon</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-striped">
                         @forelse($data as $jquin)
                         <tr>
                             <td>{{ $loop->iteration }}</td>
                             <td>{{ $jquin->nama_program }}</td>
                             <td>{{ $jquin->kategori->nama_kategori }}</td>
                             <td>Rp. {{ number_format($jquin->harga, 0, ',', '.') }}</td>
                             <td>@if(empty($jquin->diskon)) 0% @else {{ $jquin->diskon }}% @endif</td>
                             <td>{{ $jquin->kupon }}</td>
                             <td>
                                 <a href="{{ route('program.edit', $jquin->id) }}" class="btn btn-sm btn-warning"><i class="ti-pencil"></i></a>
                                 <a href="#" onclick="destroy({{ $jquin->id }}, '{{ $jquin->nama_program }}');" class="btn btn-sm btn-danger"><i class="ti-trash"></i></a>
                             </td>
                         </tr>
                         @empty
                         <tr>
                             <td colspan="7"><b><i>Tidak Ada Program Untuk Ditampilkan</i></b></td>
                         </tr>
                         @endforelse   
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
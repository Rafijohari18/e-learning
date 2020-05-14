@extends('layouts.master')

@section('title','Modul')

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
                    <a href="{{ route('module.create') }}" class="btn btn-sm btn-primary waves-effect waves-light add" >Tambah Data</a>
                </div>
                <h4 class="mt-0 header-title">
                  Modul
                </h4>
                <br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Modul</th>
                                <th>Program</th>
                                <th>Kategori</th>
                                <th>Harga</th>
                                <th>Diskon</th>
                                <th>Created By</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-striped">
                           @foreach ($neko as $item)
                           <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_modul }}</td>
                            <td>{{ $item->program->nama_program }}</td>
                            <td>{{ $item->kategori->nama_kategori }}</td>
                            <td>Rp{{ number_format(($item->harga), 0, ',', '.')  }}</td>
                            <td>@if(empty($item->diskon)) 0% @else {{$item->diskon}}% @endif</td>
                            <td>{{ $item->user->nama_lengkap }}</td>
                            <td>
                              <a href="{{ route('materi.index',['id'=>$item->id]) }}"  data-toggle="tooltip" data-placement="top" title="Tambah Materi" class="btn btn-sm btn-primary"><i class="ti-plus"></i></a>
                              <a href="{{ route('module.edit', $item->id) }}" class="btn btn-warning btn-sm"><i class="ti-pencil"></i></a>
                              <a href="#" onclick="destroy({{$item->id}},'{{ $item->nama_modul }}')" class="btn btn-danger btn-sm"><i class="ti-trash"></i></a>
                          </td>
                      </tr>
                      @endforeach
                  </tbody>
              </table>
          </div>
      </div>
  </div>
</div> <!-- end col -->
</div> <!-- end row -->
</div><!-- /.modal -->
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
        alertify.confirm("Hapus Module "+nama+"?", function (ev) {
            ev.preventDefault();
            window.location = "module/"+ id +"/destroy";

        }, function(ev) {
            ev.preventDefault();
            alertify.error("Batal!");
        });
    }
</script>
@stop
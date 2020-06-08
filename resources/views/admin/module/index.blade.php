@extends('layouts.master')

@section('title','Materi')

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
                    <a class="btn btn-sm btn-primary waves-effect waves-light add" href="{{ route('module.create') }}">Tambah Data</a>
                </div>
                <h4 class="mt-0 header-title">Materi</h4>
                <br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Judul</th>
                                <th>Program</th>
                                <th>Created By</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-striped">
                            @forelse($neko as $jquin)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $jquin->judul }}</td>
                              <td>{{ $jquin->program->nama_program }}</td>
                              <td>{{ $jquin->user->nama_lengkap }}</td>
                              <td>
                                <a href="{{ route('module.show', $jquin->id) }}" data-toggle="tooltip" data-placement="top" title="Detail Modul" class="btn btn-sm btn-info"><i class="ti-eye"></i></a>
                                <a href="{{ route('module.edit', $jquin->id) }}" class="btn btn-sm btn-warning"><i class="ti-pencil"></i></a>
                                <a href="#" onclick="destroy({{ $jquin->id }},'{{ $jquin->judul }}','{{ $jquin->program->nama_program }}');" class="btn btn-sm btn-danger"><i class="ti-trash"></i></a>
                              </td>
                            </tr>
                            @empty
                            <tr>
                              <td colspan="5"><b><i>Tidak Ada Modul Untuk Ditampilkan</i></b></td>
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
    function destroy(id,judul,program) {
        alertify.confirm("Hapus Materi "+judul+" Dengan Program "+program+"?", function (ev) {
            ev.preventDefault();
            window.location = "module/"+ id +"/destroy";

        }, function(ev) {
            ev.preventDefault();
            alertify.error("Batal!");
        });
    }

</script>
@stop
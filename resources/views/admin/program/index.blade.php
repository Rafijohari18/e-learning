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
                    <button type="button" class="btn btn-sm btn-primary waves-effect waves-light add" data-toggle="modal" data-target="#myModal">Tambah Data</button>
                </div>
                <h4 class="mt-0 header-title">Program</h4>
                <br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Program</th>
                                <th>Created At</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-striped">
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $item->nama_program }}</td>
                                <td>{{ date('d F Y', strtotime($item->created_at)) }}</td>
                                <td>
                                    <a href="{{ route('module.index',['id'=>$item->id]) }}" class="btn btn-sm btn-primary" data-toggle="tooltip" data-placement="top" title="Tambah Modul"><i class="ti-plus"></i></a>
                                    <a href="javascript:;" data-toggle="modal" data-target="#modaledit" 
                                    onclick="editdata({{ $item->id }})" data-nama_program="{{ $item->nama_program }}" class="btn btn-sm btn-warning editbtn"><i class="ti-pencil"></i></a>
                                    <a href="#" onclick="destroy({{ $item->id }},'{{ $item->nama_program }}')" class="btn btn-danger btn-sm"><i class="ti-trash"></i></a>
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

<!-- modal -->
<!-- sample modal content -->
<div id="myModal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Program Tambah</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="{{ Route('program.store') }}" method="POST">
              {{ csrf_field() }}
              <div class="modal-body">
                  <div class="container-fluid">
                      <div class="form-group">
                        <label for="name">Name</label>
                        <input type="text" name="nama_program" id="nama_program" class="form-control" required>

                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
            </div>
        </form>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<div id="modaledit" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Program Edit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="" method="POST" id="editform">
                @csrf
                @method('POST')
                <div class="modal-body">
                  <div class="container-fluid">
                      <div class="form-group">
                        <label for="name">Nama program</label>
                        <input type="text" name="nama_program" id="nama_program" class="form-control" required>

                    </div>

                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-secondary waves-effect" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary waves-effect waves-light">Simpan</button>
            </div>
        </form>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
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
        alertify.confirm("Hapus Program "+nama+"?", function (ev) {
            ev.preventDefault();
            window.location = "program/"+ id +"/destroy";

        }, function(ev) {
            ev.preventDefault();
            alertify.error("Batal!");
        });
    }


    function editdata(id)
    {
        var id = id;
        var url = '{{ route("program.update", ":id") }}';
        url = url.replace(':id', id);
        $("#editform").attr('action', url);
    }

    function editSubmit()
    {
        $("#editform").submit();
    }


    $('.editbtn').click(function(){
        var nama_program = $(this).data('nama_program');


        $('.modal-body #nama_program').val(nama_program);


    });

    $('.add').click(function(){

        $('.modal-body #nama_program').val('');


    });

</script>
@stop
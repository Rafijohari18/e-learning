@extends('layouts.master')

@section('title','Hasil')

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
                <h4 class="mt-0 header-title">
                  Hasil Quiz - {{ $nmProgram }}
                </h4>
                <br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Peserta</th>
                                <th>Nilai</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-striped">
                           @foreach ($data['hasil'] as $item)
                           <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->user->nama_lengkap }}</td>
                            <td>{{ $item->hasil }}</td>
                            <td>
                             
                              <a href="#" onclick="destroy({{ $item->id }}, '{{ $item->user->nama_lengkap }}');"  data-toggle="tooltip" data-placement="top" title="Hapus Nilai" class="btn btn-sm btn-danger"><i class="ti-trash"></i></a>
                             
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
        alertify.confirm("Hapus Nilai "+nama+"?", function (ev) {
            ev.preventDefault();
            window.location = "hasil/"+ id +"/destroy";

        }, function(ev) {
            ev.preventDefault();
            alertify.error("Batal!");
        });
    }
</script>
@stop
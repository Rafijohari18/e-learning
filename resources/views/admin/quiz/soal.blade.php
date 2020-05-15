@extends('layouts.master')

@section('title','Module')

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
                      <a href="{{ route('quiz.create',['id' => Request::segment(4)  ]) }}" class="btn btn-sm btn-primary waves-effect waves-light add" >Tambah Data</a>
                </div>
                <h4 class="mt-0 header-title">
                  Soal - {{ $nmProgram }}
                </h4>
                <br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Soal</th>
                                <th>Jawaban</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-striped">
                           @foreach ($data as $item)
                           <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{!! $item->soal !!}</td>
                            <td>{{ $item->jawaban }}</td>
                          
                            <td>
                               <a href="{{ route('quiz.edit',['id'=>$item->id,'modul'=>Request::segment(4)]) }}"  data-toggle="tooltip" data-placement="top" title="Edit Soal" class="btn btn-sm btn-warning"><i class="ti-pencil"></i></a>
                                <a href="{{ route('quiz.destroy',['id'=>$item->id]) }}"  data-toggle="tooltip" data-placement="top" title="Hapus Soal" class="btn btn-sm btn-danger"><i class="ti-trash"></i></a>
                               <a href="{{ route('materi.index',['id'=>$item->id]) }}"  data-toggle="tooltip" data-placement="top" title="Rekap Nilai" class="btn btn-sm btn-success"><i class="ti-pin-alt"></i></a>
                             
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
        alertify.confirm("Hapus Quiz "+nama+"?", function (ev) {
            ev.preventDefault();
            window.location = "module/"+ id +"/destroy";

        }, function(ev) {
            ev.preventDefault();
            alertify.error("Batal!");
        });
    }
</script>
@stop
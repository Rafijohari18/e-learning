@extends('layouts.master')

@section('title','Kupon')

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
                    <a class="btn btn-sm btn-primary waves-effect waves-light add" href="{{ route('kupon.create') }}">Tambah Data</a>
                </div>
                <h4 class="mt-0 header-title">Kupon</h4>
                <br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Nama Kupon</th>
                                <th>Kode Kupon</th>
                                <th>Nama Program</th>
                                <th>Kuota Pengguna</th>
                                <th>Besar Potongan</th>
                                <th>Tanggal Expired</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody class="table-striped">
                            @forelse($neko as $jquin)
                            <tr>
                              <td>{{ $loop->iteration }}</td>
                              <td>{{ $jquin->name }}</td>
                              <td>{{ $jquin->kode }}</td>
                              <td>
                                <ul>
                                  @foreach($jquin->KategoriKupon as $row)
                                  <li>{{ $row->program->nama_program }}</li>
                                  @endforeach
                                </ul>
                              </td>
                              <td>{{ $jquin->kuota }}</td>
                              <td>{{ $jquin->potongan }}</td>
                              <td>{{ date('d-m-Y', strtotime($jquin->tanggal_expired)) }}</td>
                              <td>
                                <a href="{{ route('kupon.edit', $jquin->id) }}" class="btn btn-sm btn-warning"><i class="ti-pencil"></i></a>
                                <a href="{{ route('kupon.destroy', $jquin->id) }}" onclick="return confirm('Hapus Data ?')" class="btn btn-sm btn-danger"><i class="ti-trash"></i></a>
                              </td>
                            </tr>
                            @empty
                            <tr>
                              <td colspan="8"><b><i>Tidak Ada Kupon Untuk Ditampilkan</i></b></td>
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
    function destroy(id,kupon) {
        alertify.confirm("Hapus Kupon "+kupon+"?", function (ev) {
            ev.preventDefault();
            window.location = "kupon/"+ id +"/destroy";

        }, function(ev) {
            ev.preventDefault();
            alertify.error("Batal!");
        });
    }

</script>
@stop
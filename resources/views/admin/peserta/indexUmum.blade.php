@extends('layouts.master')

@section('title','Data Peserta Umum')

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
                <h4 class="mt-0 header-title">Data Peserta Umum</h4>
                <br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Gender</th>
                            <th>WhatsApp</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody class="table-striped">
                        @forelse($neko as $jquin)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $jquin->nik }}</td>
                            <td>{{ $jquin->nama_lengkap }}</td>
                            <td>
                            	@if($jquin->gender == 'L')
                            		Laki-Laki
                            	@else
                            		Perempuan
                            	@endif
                            </td>
                            <td>{{ $jquin->whatsapp }}</td>
                            <td>
                            	<a href="{{ route('peserta.showUmum', $jquin->id) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placement="top" title="Detail Peserta"><i class="ti-eye"></i></a>
                                <a href="{{ route('peserta.showSertifikat', $jquin->user->id) }}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Sertifikat Peserta"><i class="ti-medall"></i></a>
                            	<a href="#" onclick="destroy({{ $jquin->user->id }},'{{ $jquin->nama_lengkap }}');" class="btn btn-danger btn-sm"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6"><b><i>Tidak Ada Data</i></b></td>
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
        alertify.confirm("Hapus Peserta "+nama+"?", function (ev) {
            ev.preventDefault();
            window.location = "peserta/"+ id +"/destroy";

        }, function(ev) {
            ev.preventDefault();
            alertify.error("Batal!");
        });
    }
</script>
@stop
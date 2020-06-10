@extends('layouts.master')

@section('title','Data Transaksi')

@section('css')
<!-- DataTables -->
<link href="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/plugins/datatables/buttons.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
<!-- Responsive datatable examples -->
<link href="{{asset('assets/plugins/datatables/responsive.bootstrap4.min.css')}}" rel="stylesheet" type="text/css" />
@stop

@section('content')
<!-- Convert Waktu -->
<?php setlocale(LC_ALL, 'id-ID', 'id_ID'); ?>
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="float-right">
                    <a href="{{ route('transaksi.export') }}" class="btn btn-sm btn-success">Export Excel</a>
                </div>
                <h4 class="mt-0 header-title">Data Transaksi</h4>
                <br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped">
                        <thead>
                        <tr>
                            <th width="10">No</th>
                            <th>#Invoice</th>
                            <th>Nama Peserta</th>
                            <th>Pembayaran</th>
                            <th>Program</th>
                            <th>Status</th>
                            <th>Tanggal Transaksi</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody class="table-striped">
                        @forelse($neko as $jquin)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $jquin->kode_invoice }}</td>
                            <td>{{ $jquin->user->nama_lengkap }}</td>
                            <td>
                                @if($jquin->user->peserta->prakerja == 'Ya')
                                Prakerja
                                @else
                                Umum
                                @endif
                            </td>
                            <td>{{ $jquin->program->nama_program }}</td>
                            <td>
                                @if($jquin->status == 'Diverifikasi')
                                <span class="badge badge-success">{{ $jquin->status }}</span>
                                @else
                                <span class="badge badge-info">{{ $jquin->status }}</span>
                                @endif
                            </td>
                            <td>
                                <?php echo strftime("%A, %d %B %Y", strtotime($jquin->created_at)) . "\n"; ?>
                            </td>
                            <td>
                                <a href="{{ route('transaksi.show', $jquin->id) }}" class="btn btn-sm btn-info" data-toggle="tooltip" data-placmenent="top" title="Detail Pembayaran"><i class="ti-email"></i></a>
                                <a href="#" onclick="destroy({{ $jquin->id }}, '{{ $jquin->user->nama_lengkap }}')" class="btn btn-sm btn-danger"><i class="ti-trash"></i></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8"><b><i>Tidak Ada Transaksi Untuk Ditampilkan</i></b></td>
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
<script src="{{asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}" type="text/javascript"></script>

<script>
    $().DataTable();
</script>


<script>
    function destroy(id,nama) {
        alertify.confirm("Hapus Transaksi "+nama+"?", function (ev) {
            ev.preventDefault();
            window.location = "transaksi/"+ id +"/destroy";

        }, function(ev) {
            ev.preventDefault();
            alertify.error("Batal!");
        });
    }
</script>
@stop
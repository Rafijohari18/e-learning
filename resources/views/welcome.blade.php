<div class="row mb-3">
    <div class="col-12">
        <div class="alert alert-info">Anda belum memiliki modul satupun untuk dipelajari.</div>
        <h4 class="m-t-20 m-b-30">Modul Terbaru</h4>
        <div class="card-columns">
            @forelse($neko as $jquin)
            <div class="card m-b-30">
                <img class="card-img-top img-fluid" src="{{ asset('storage/'.$jquin->path) }}" alt="Card image cap">
                <div class="card-body">
                    <h4 class="card-title font-20 mt-0"><a href="{{ route('module.detail', $jquin->id) }}" style="color: black;">{{ $jquin->nama_program }}</a></h4>
                    <span class="badge badge-info">{{ $jquin->kategori->nama_kategori }}</span>
                   
                    <p class="card-text">{!!  Str::limit($jquin->deskripsi, 100, '. <a href="detail/'.$jquin->id.'/modul"> Selengkapnya...</a>') !!}</p>
                </div>
                <div class="card-footer bg-white">
                     <p class="card-text">
                        <i class="mdi mdi-clock"></i> <span> {{ $jquin->durasi_program }} </span>
                        <span class="float-right">Rp{{ number_format($jquin->harga, 0, ',', '.') }}</span>
                    </p>
                </div>
            </div>
            @empty
            <div class="alert alert-info">Tidak ada modul untuk di tampilkan.</div>
            @endforelse
        </div>
    </div>
</div>
<!-- end row -->

<div class="row">
    <div class="col-lg-12">
        <div class="card m-b-30">
            <img class="card-img-top img-fluid" src="{{ asset('storage/'.$module->path) }}" alt="Card image cap">
            <div class="card-body">
                <div class="float-right"><i class="mdi mdi-clock"></i> <span>{{ $module->durasi_program }} </span> <span >Rp{{ number_format($module->harga, 0, ',', '.') }}</span></div>
                <h4 class="card-title font-20 mt-0">{{ $module->nama_modul }}</h4>
                <span class="badge badge-info">{{ $module->kategori->nama_kategori }}</span>
                <br><br>
                <input type="hidden" class="rating" data-filled="mdi mdi-star font-20 text-primary" data-empty="mdi mdi-star-outline font-20 text-muted" data-readonly value="3"/>
                <p class="card-text">
                    {!! $module->deskripsi !!}
                </p>
            </div>
            <div class="card-footer bg-white">
                 <p class="card-text">
                    <a href="#" data-toggle="modal" data-target="#ikuti" class="btn btn-sm btn-primary">Ikuti Pelatihan</a>
                </p>
            </div>
        </div>
    </div>
</div> <!-- end row -->

<!-- modal -->
<!-- sample modal content -->
<div id="ikuti" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Ikuti Pelatihan</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="" method="POST">
                @csrf
              <div class="modal-body">
                  <div class="container-fluid">
                      <div class="form-group">
                        <label for="name">Nama Program</label>
                        <input type="text" placeholder="Masukkan Nama Program" name="nama_program" id="nama_program" class="form-control" required>
                    </div>
                </div>
            </div>

            <div class="modal-footer">
                <button type="button" class="btn btn-sm btn-secondary waves-effect" data-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-sm btn-primary waves-effect waves-light">Simpan</button>
            </div>
        </form>
    </div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

@extends('layouts.master')

@section('title','Data Pengguna')

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
                <h4 class="mt-0 header-title">Data Invoice - {{ Auth::user()->nama_lengkap }}</h4>
                <br>
                <div class="table-responsive">
                    <table id="datatable" class="table table-striped">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Program</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody class="table-striped">
                        @forelse($data['program'] as $jquin)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $jquin->program->nama_program }}</td>
                            <td>
                                <a href="{{ route('peserta.detail',['id'=> $jquin->id ])}}" class="btn btn-success btn-sm" data-toggle="tooltip" data-placement="top" title="Lihat Invoice"><i class="fa fa-eye"></i></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="4"><b><i>Tidak Ada Data</i></b></td>
                        </tr>
                        @endforelse
                        </tbody>
                    </table>
                </div>

            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->

<!-- Modal -->
<x-pengguna></x-pengguna>
@stop

@section('footer')
<script src="{{asset('assets/plugins/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('assets/plugins/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('assets/pages/datatables.init.js')}}"></script>
<script src="{{asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}" type="text/javascript"></script>

<script>
    $().DataTable();
</script>

<!-- Destroy -->

@stop
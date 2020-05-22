@extends('layouts.master')

@section('css')

@stop

@section('title', 'Pengguna Profil')

@section('content')
<div class="row justify-content-center">
	<div class="col-lg-5">
        <div class="card m-b-20">
            <div class="card-body">
            	<div class="float-right">
            		<a href="#" data-toggle="modal" data-target="#tampil" class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Edit Profil"><i class="ti-pencil"></i></a>
            	</div>
                <div class="media">
                    <img class="d-flex mr-3 rounded-circle thumb-lg" src="@if(auth()->user()->path != 'default.png') {{ asset('storage/'.auth()->user()->path) }} @else {{ asset('assets/images/users/'.auth()->user()->path) }} @endif" alt="Avatar">
                    <div class="media-body">
                        <h5 class="m-t-10 font-18 mb-1">{{ auth()->user()->nama_lengkap }}</h5>
                        <p class="text-muted m-b-5">{{ auth()->user()->username }}</p>
                        <p class="text-muted font-14 font-500 font-secondary"></p>
                    </div>
                </div>
                <dl class="row text-left m-t-20">
                    <dt class="col-sm-5">Nama Lengkap</dt>
                    <dd class="col-sm-7">{{ auth()->user()->nama_lengkap }}</dd>

                    <dt class="col-sm-5">Nama Pengguna</dt>
                    <dd class="col-sm-7">{{ auth()->user()->username }}</dd>

                    <dt class="col-sm-5">Kata Sandi</dt>
                    <dd class="col-sm-7">********</dd>
                </dl>
            </div>
        </div>
    </div>
</div>

<!-- Modal -->
<div id="tampil" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title mt-0" id="myModalLabel">Edit Profil</h5>
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            </div>
            <form action="{{ route('profil.profUpdate') }}" method="POST" enctype="multipart/form-data">
                @csrf
              <div class="modal-body">
                <div class="form-group">
                    <label for="nama_lengkap">Nama Lengkap</label>
                    <input type="text" placeholder="Masukkan Nama Lengkap" name="nama_lengkap" id="nama_lengkap" class="form-control" required value="{{ auth()->user()->nama_lengkap }}">
                </div>

                <div class="form-group">
                    <label for="nama_pengguna">Nama Pengguna</label>
                    <input type="text" placeholder="Masukkan Nama Pengguna" name="nama_pengguna" id="nama_pengguna" class="form-control" required value="{{ auth()->user()->username }}">
                </div>

                <div class="form-group">
                    <label for="path">Avatar</label>
                    <input type="file" class="filestyle" name="path" id="path" data-input="false" data-buttonname="btn-secondary btn-sm">
                    <input type="hidden" value="{{ auth()->user()->path }}" name="fileOri">
                    <code class="highlighter-rouge">*Boleh Kosong</code>
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
@stop

@section('footer')
<script src="{{asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}" type="text/javascript"></script>
<!-- Parsley js -->
<script type="text/javascript" src="{{asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>
@stop
@extends('layouts.master')

@section('title','Program Edit Data')

@section('css')
<link href="{{asset('assets/plugins/summernote/summernote.css')}}" rel="stylesheet" />
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h4 class="mt-0 header-title">Edit Data</h4>
                <hr>
                <form action="{{ route('program.update', $program->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="nama_program">Nama Program</label>
                        <input type="text" class="form-control" value="{{ $program->nama_program }}" name="nama_program" id="nama_program" required="" placeholder="Masukkan Nama Program" minlength="5" maxlength="191">
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi Program</label>
                        <textarea name="deskripsi" id="deskripsi" class="summernote form-control" required="">{{ $program->deskripsi }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="harga">Harga</label>
                        <input type="number" class="form-control" name="harga" id="harga" required="" placeholder="Masukkan Harga Program" maxlength="20" value="{{ $program->harga }}">
                    </div>

                    <div class="form-group">
                        <label for="diskon">Diskon</label>
                        <input type="number" class="form-control" name="diskon" id="diskon" placeholder="0%" maxlength="20" value="{{ $program->diskon }}">
                        <code class="highlighter-rouge">*Boleh Kosong</code>
                    </div>

                    <div class="form-group">
                        <label for="total_waktu">Total Waktu Pembelajaran</label>
                        <input type="text" class="form-control" name="total_waktu" id="total_waktu" placeholder="Masukkan Total Waktu Pembelajaran" maxlength="20" value="{{ $program->total_waktu }}">
                        <code class="highlighter-rouge">*Boleh Kosong</code>
                    </div>

                    <div class="form-group">
                        <label for="">Banner Sebelumnya</label>
                        <div>
                            <img src="{{ asset('storage/'.$program->path) }}" class="img-thumbnail" alt="banner" style="width: 30%;">
                            <input type="hidden" value="{{ $program->path }}" name="fileOri">
                        </div>
                    </div>

                    <div class="form-group">
                        <label for="path">Banner</label>
                        <input type="file" class="filestyle" name="path" id="path" data-input="false" data-buttonname="btn-secondary">
                        <code class="highlighter-rouge">*Boleh Kosong</code>
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@stop

@section('footer')
<script src="{{asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}" type="text/javascript"></script>
<!-- Parsley js -->
<script type="text/javascript" src="{{asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!--Summernote js-->
<script src="{{asset('assets/plugins/summernote/summernote.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>

<script>
    jQuery(document).ready(function(){
        $('.summernote').summernote({
            height: 300,                 // Tinggi Editor
            minHeight: null,             // Mai tinggi editor
            maxHeight: null,             // Max tinggi editor
            focus: true                 // set focus edittable
        });
    });
</script>
@stop
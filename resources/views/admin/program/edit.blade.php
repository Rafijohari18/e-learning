@extends('layouts.master')

@section('title','Program Edit')

@section('css')
<link href="{{asset('assets/plugins/summernote/summernote.css')}}" rel="stylesheet" />
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h4 class="mt-0 header-title">Edit Program</h4>
                <hr>
                <form action="{{ route('program.update', $program->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Nama Program</label>
                        <input type="text" name="nama_program" class="form-control" id="judul" placeholder="Masukkan Nama Program" value="{{ $program->nama_program }}">
                    </div>

                    <div class="form-group">
                        <label for="judul">Kategori</label>
                        <select name="kategori_id" class="form-control">
                           @foreach($kategori as $value)
                           <option value="{{ $value->id }}" @if($program->kategori_id == $value->id) selected @endif>{{ $value->nama_kategori }}</option>
                           @endforeach
                       </select>
                   </div>

                <div class="form-group">
                    <label for="judul">Harga</label>
                    <input type="number" class="form-control" name="harga" id="harga" required="" placeholder="Masukkan Harga"  maxlength="191" value="{{ $program->harga }}">
                </div>

                <div class="form-group">
                    <label for="judul">Diskon</label>
                    <input type="number" class="form-control" name="diskon" id="diskon" placeholder="Masukkan Diskon" value="{{ $program->diskon }}">
                     <code class="highlighter-rouge">*Cukup masukan angka</code>
                </div>

                <div class="form-group">
                    <label for="judul">Durasi</label>
                    <input type="text" class="form-control" name="durasi_program" id="durasi" placeholder="Masukkan Durasi" value="{{ $program->durasi_program }}">
                </div>

                <div class="form-group">
                    <label for="artikel">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="summernote form-control" required="">{!! $program->deskripsi !!}</textarea>
                </div>

                <div class="form-group">
                    <label for="">Banner Sebelumnya</label>
                    <br>
                    <img src="{{ asset('storage/'.$program->path) }}" alt="banner" class="img-thumbnail" style="width: 20%; height: 20%;">

                    <input type="hidden" name="fileOri" value="{{ $program->path }}">
                </div>

                <div class="form-group">
                    <label for="path">Banner</label>
                    <input type="file" class="filestyle" name="path" id="path" data-input="false" data-buttonname="btn-secondary"> 
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
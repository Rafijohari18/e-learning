@extends('layouts.master')

@section('title','Modul Edit Data')

@section('css')
<link href="{{asset('assets/plugins/summernote/summernote.css')}}" rel="stylesheet" />
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h4 class="mt-0 header-title">{{ $title }}</h4>
                <hr>
                <form action="{{ route('module.update', $data['module']->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Nama Program</label>
                        <select name="program" class="form-control">
                            @foreach($data['program'] as $value)
                            <option value="{{ $value->id }}" @if($data['module']->program_id == $value->id) selected @endif>{{ $value->nama_program }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="kategori">Kategori</label>
                        <select name="kategori" class="form-control">
                           @foreach($data['kategori'] as $value)
                           <option value="{{ $value->id }}" @if($data['module']->kategori_id == $value->id) selected @endif>{{ $value->nama_kategori }}</option>
                           @endforeach
                       </select>
                       
                   </div>

                <div class="form-group">
                    <label for="judul">Nama Modul</label>
                    <input type="text" class="form-control" name="modul" id="modul" required="" placeholder="Masukkan Nama Modul" minlength="5" maxlength="191" value="{{ $data['module']->nama_modul }}">
                </div>

                <div class="form-group">
                    <label for="judul">Harga</label>
                    <input type="number" class="form-control" name="harga" id="harga" required="" placeholder="Masukkan Harga" maxlength="191" value="{{ $data['module']->harga }}">
                </div>

                <div class="form-group">
                    <label for="judul">Diskon</label>
                    <input type="number" class="form-control" name="diskon" id="diskon" placeholder="Masukkan Diskon" value="{{ $data['module']->diskon }}">
                     <code class="highlighter-rouge">*Cukup masukan angka</code>
                </div>

                  <div class="form-group">
                    <label for="judul">Durasi</label>
                    <input type="text" class="form-control" name="durasi" id="durasi" placeholder="Masukkan Durasi" value="{{ $data['module']->durasi_program }}">
                </div>

                <div class="form-group">
                    <label for="artikel">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="summernote form-control" required="">{{ $data['module']->deskripsi }}</textarea>
                </div>

                 @if($data['module']->path != NULL)
                    <div class="form-group">
                        <label for="">Banner Sebelumnya</label>
                        <br>
                        <img src="{{ asset('storage/'.$data['module']->path) }}" alt="banner" class="img-thumbnail" style="width: 20%; height: 20%;">

                        <input type="hidden" name="fileOri" value="{{ $data['module']->path }}">
                    </div>
                    @else
                        <input type="hidden" name="fileOri" value="{{ $data['module']->path }}">
                    @endif

                <div class="form-group">
                    <label for="path">Banner</label>
                    <input type="file" class="filestyle" name="path" id="path" data-input="false" data-buttonname="btn-secondary">   
                     <code class="highlighter-rouge">*Boleh kosong</code>
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
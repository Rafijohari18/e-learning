@extends('layouts.master')

@section('title','Modul Edit Data')

@section('css')
<link href="{{asset('assets/plugins/summernote/summernote.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/select2/css/select2.min.css')}}" rel="stylesheet" type="text/css" />
<link href="{{asset('assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h4 class="mt-0 header-title">Edit Modul</h4>
                <hr>
                <form action="{{ route('module.update', $module->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                <input type="hidden" name="module_id" value="">
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" name="judul" id="judul" required="" placeholder="Masukkan Judul"  maxlength="191" value="{{ $module->judul }}">
                </div>

                 <div class="form-group">
                    <label for="judul">Kode Materi</label>
                    <input type="text" class="form-control" name="kode_modul" id="kode_modul" required="" placeholder="Masukkan Kode"  maxlength="191" value="{{ $module->kode_modul }}">
                </div>

                <div class="form-group">
                    <label for="program_id">Nama Program</label>
                    <select class="form-control select2" name="program_id">
                        <option>Pilih Program</option>
                        <optgroup label="Nama Program">
                            @foreach($data['program'] as $jquin)
                            <option value="{{ $jquin->id }}" @if($module->program_id == $jquin->id) selected @endif>{{ $jquin->nama_program }}</option>
                            @endforeach
                        </optgroup>
                    </select>
                </div>

                 <div class="form-group">
                    <label for="durasi">Durasi</label>
                    <input type="text" class="form-control" name="durasi" id="durasi" required=""  value="{{ $module->durasi }}" placeholder="Masukkan Durasi"  maxlength="191">
                </div>

                <div class="form-group">
                    <label for="artikel">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="summernote form-control" required="">{!! $module->deskripsi !!}</textarea>
                </div>

                <div class="form-group">
                    <label for="link">URL</label>
                    <input type="text" class="form-control" name="link" id="link" required="" placeholder="Masukkan URL"  maxlength="191" value="{{ $module->link }}">
                    <code class="highlighter-rouge">*Embed Id Video (YouTube)</code>
                </div>

                  <div class="form-group">
                    <label for="path">File</label>
                     <input type="hidden" name="fileOri" value="{{ $module->file }}">
                    <input type="file" class="filestyle" name="path" id="path" data-input="false" data-buttonname="btn-secondary btn-sm"> 
                    <code class="highlighter-rouge">*Abaikan Jika tidak akan di edit</code>
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
<script src="{{asset('assets/plugins/select2/js/select2.min.js')}}" type="text/javascript"></script>
<script src="{{asset('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js')}}" type="text/javascript"></script>
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
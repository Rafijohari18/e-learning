@extends('layouts.master')

@section('title','Konten Edit Data')

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
                <form action="{{ route('materi.update', $data['materi']->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                 <input type="hidden" name="module_id" value="{{ $data['materi']->modul_id }}">
                <div class="form-group">
                    <label for="judul">Judul</label>
                    <input type="text" class="form-control" name="judul" id="judul" required="" placeholder="Masukkan Judul"  maxlength="191" value="{{ $data['materi']->judul }}">

                </div>


                <div class="form-group">
                    <label for="artikel">Content</label>
                    <textarea name="deskripsi" id="deskripsi" class="summernote form-control" required="">{{  $data['materi']->judul }}</textarea>
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
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
                <h4 class="mt-0 header-title">Edit Data</h4>
                <form action="{{ route('konten.update', $konten->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" maxlength="191" class="form-control" value="{{ $konten->judul }}" name="judul" id="judul" required="" placeholder="Masukkan Judul">
                    </div>

                    <div class="form-group">
                        <label for="artikel">Artikel</label>
                        <textarea name="artikel" id="artikel" class="summernote form-control" required="">{{ $konten->artikel }}</textarea>
                    </div>

                    @if($konten->path != NULL)
                    <div class="form-group">
                        <label for="">Thumbnail Sebelumnya</label>
                        <br>
                        <img src="{{ asset('storage/'.$konten->path) }}" alt="banner" class="img-thumbnail" style="width: 20%; height: 20%;">

                        <input type="hidden" name="fileOri" value="{{ $konten->path }}">
                    </div>
                    @else
                        <input type="hidden" name="fileOri" value="{{ $konten->path }}">
                    @endif

                    <div class="form-group">
                        <label for="path">Thumbnail</label>
                        <input type="file" class="filestyle" name="path" id="path" data-input="false" data-buttonname="btn-secondary btn-sm">
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
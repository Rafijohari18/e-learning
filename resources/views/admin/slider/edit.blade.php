@extends('layouts.master')

@section('title','Slider Edit Data')

@section('css')

@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h4 class="mt-0 header-title">Edit Data</h4>
                <hr>
                <form action="{{ route('slider.update', $slider->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="judul">Judul</label>
                        <input type="text" class="form-control" name="judul" id="judul" required="" placeholder="Masukkan Judul" minlength="5" maxlength="50" value="{{ $slider->judul }}">
                    </div>

                    <div class="form-group">
                        <label for="deskripsi">Deskripsi</label>
                        <textarea name="deskripsi" id="deskripsi" class="form-control" maxlength="191" required="" rows="4">{{ $slider->deskripsi }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="">Foto Slider Sebelumnya</label>
                        <br>
                        <img src="{{ asset('storage/'.$slider->path) }}" alt="banner" class="img-thumbnail" style="width: 20%; height: 20%;">

                        <input type="hidden" name="fileOri" value="{{ $slider->path }}">
                    </div>
                    
                    <div class="form-group">
                        <label for="path">Foto Slider</label>
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

<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();
    });
</script>
@stop
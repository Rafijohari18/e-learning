@extends('layouts.master')

@section('title','Soal Edit Data')

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
                <form action="{{ route('quiz.update',['id'=>$data['soal']->id] ) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="modul_id" value="{{ Request::segment('5') }}">
                    <div class="form-group">
                        <label for="artikel">Pertanyaan</label>
                        <textarea name="soal" id="soal" class="summernote form-control" required="">{{   $data['soal']->soal }}</textarea>
                    </div>

                    @foreach($data['pilihan'] as $item)
                        <div class="form-group">
                            <label for="judul">Pilihan {{ $loop->iteration }}</label>
                            <input type="text" class="form-control" name="pilihan[]" id="pilihan[]" value="{{ $item->pilihan }}" required="" placeholder="Masukkan Pilihan {{ $loop->iteration }}" >
                        </div>
                    @endforeach

                    <div class="form-group">
                        <label for="judul">Jawaban</label>
                        <input type="text" class="form-control" value="{{ $data['soal']->jawaban }}" name="jawaban" id="jawaban" required="" placeholder="Masukkan Jawaban" >
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
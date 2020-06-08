@extends('layouts.master')

@section('title','Program Tambah Data')

@section('css')
<link href="{{asset('assets/plugins/summernote/summernote.css')}}" rel="stylesheet" />
@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h4 class="mt-0 header-title">Tambah Program</h4>
                <hr>
                <form action="{{ route('program.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label for="judul">Nama Program</label>
                    <input type="text" name="nama_program" class="form-control" id="judul" placeholder="Masukkan Nama Program">
                </div>

                <div class="row">
                   <div class="col-md-6">
                     <div class="form-group">
                          <label for="judul">Kategori Program</label>
                          <select name="kategori_id" class="form-control">
                             @foreach($kategori as $value)
                             <option value="{{ $value->id }}">{{ $value->nama_kategori }}</option>
                             @endforeach
                         </select>
                     </div>
                   </div>
                   
                   <div class="col-md-6">
                        <div class="form-group">
                            <label for="judul">Durasi Program</label>
                            <input type="text" class="form-control" name="durasi_program" id="durasi" placeholder="Masukkan Durasi">
                        </div>
                   </div>
               </div>

               <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="judul">Harga</label>
                            <input type="number" class="form-control" name="harga" id="harga" required="" placeholder="Masukkan Harga"  maxlength="191">
                        </div>
                   </div>

                   <div class="col-md-6">
                       <div class="form-group">
                            <label for="judul">Diskon</label>
                            <input type="number" class="form-control" name="diskon" id="diskon" placeholder="Masukkan Diskon">
                             <code class="highlighter-rouge">*Cukup masukan angka</code>
                        </div>
                   </div>
               </div>

                <div class="form-group">
                    <label for="artikel">Deskripsi</label>
                    <textarea name="deskripsi" id="deskripsi" class="summernote form-control" required=""></textarea>
                </div>

                <div class="form-group">
                    <label for="path">Banner</label>
                    <input type="file" class="filestyle" name="path" id="path" data-input="false" data-buttonname="btn-secondary btn-sm" required="">   

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
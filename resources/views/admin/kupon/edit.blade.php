@extends('layouts.master')

@section('title','Kupon Edit Data')

@section('css')
<link href="{{asset('assets/plugins/summernote/summernote.css')}}" rel="stylesheet" />
<link href="{{asset('assets/plugins/bootstrap-touchspin/css/jquery.bootstrap-touchspin.min.css')}}" rel="stylesheet" />
<link href="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/css/select2.min.css" rel="stylesheet" />

@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h4 class="mt-0 header-title">Tambah Kupon</h4>
                <hr>
                <form action="{{ route('kupon.update',$data['kupon']->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf

                      <div class="form-group">
                        <label for="judul">Nama Kupon</label>
                        <input type="text" class="form-control" name="name" id="name" required="" placeholder="Masukkan Kode"  maxlength="191" value="{{ $data['kupon']->name   }}">
                    </div>

                    <div class="form-group">
                        <label for="judul">Kode Kupon</label>
                        <input type="text" class="form-control" name="kode" id="kode" required="" placeholder="Masukkan Kode"  maxlength="191" value="{{ $data['kupon']->kode   }}">
                    </div>


                    <div class="form-group">
                        <label class="control-label">Nama Program</label>
                         <select id="kategori" name="kategori[]" class="form-control" multiple="multiple">
                              
                                <optgroup label="Nama Program">
		                              @foreach($data['program'] as $value)
		                                <option value="{{ $value->id }}" {{ in_array($value['id'],$data['program_id'])  ? 'selected' : ''}}>{{ $value->nama_program }}</option>
		                            @endforeach
                                </optgroup>

                          </select>


                    </div>

                    <div class="form-group">
                        <label for="judul">Kuota</label>
                        <input type="number" class="form-control" name="kuota" id="kuota" required="" placeholder="Masukkan Kuota"  maxlength="11" value="{{ $data['kupon']->kuota   }}">
                    </div>

                    <div class="form-group">
                        <label for="judul">Besar Potongan</label>
                        <input type="number" class="form-control" name="potongan" id="potongan" required="" placeholder="Masukkan Besar Potongan"  maxlength="11" value="{{ $data['kupon']->potongan }}">
                    </div>

                    <div class="form-group">
                        <label for="judul">Tanggal Expired</label>
                        <input type="date" class="form-control" name="tanggal" id="tanggal" required="" placeholder="Masukkan Tanggal Expired"  maxlength="191" value="{{ $data['kupon']->tanggal_expired }}">
                    </div>

                    <button type="submit" class="btn btn-sm btn-primary">Simpan</button>
                </form>
            </div>
        </div>
    </div> <!-- end col -->
</div> <!-- end row -->
@stop

@section('footer')
<script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.0.13/dist/js/select2.min.js"></script>

<script src="{{asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}" type="text/javascript"></script>

<script src="{{asset('assets/plugins/bootstrap-touchspin/js/jquery.bootstrap-touchspin.min.js')}}" type="text/javascript"></script>


<!-- Parsley js -->
<script type="text/javascript" src="{{asset('assets/plugins/parsleyjs/parsley.min.js')}}"></script>
<!--Summernote js-->
<script src="{{asset('assets/plugins/summernote/summernote.min.js')}}"></script>

<script type="text/javascript">
    $(document).ready(function() {
        $('form').parsley();

        $("#kategori").select2({
        placeholder: "Pilih Program"
        });
    });
</script>

@stop
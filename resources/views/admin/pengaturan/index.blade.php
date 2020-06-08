@extends('layouts.master')

@section('title','Pengaturan Aplikasi')

@section('css')

@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-30">
            <div class="card-body">
                <div class="float-right">
                    <a href="#" id="edit" class="btn btn-sm btn-warning"><i class="ti-pencil"></i></a>
                </div>
                <h4 class="mt-0 header-title">Pengaturan</h4>
                <hr>
                {{-- <form action="{{ route('pengaturan.store') }}" method="POST" enctype="multipart/form-data"> --}}
                <form action="{{ route('pengaturan.update', $jquin->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                    <div class="form-group">
                        <label for="no_tlp">No Telpon</label>
                        <input type="number" class="form-control dsb" id="no_tlp" name="no_tlp" required="" placeholder="Masukkan No Telpon" value="{{ $jquin->no_tlp }}">
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control dsb" id="email" name="email" required="" placeholder="Masukkan Email" value="{{ $jquin->email }}">
                    </div>

                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea name="alamat" id="alamat" cols="30" rows="4" class="form-control dsb" placeholder="Masukkan Alamat" required>{{ $jquin->alamat }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="footer">Footer</label>
                        <input type="text" class="form-control dsb" id="footer" name="footer" required="" placeholder="Masukkan Footer" value="{{ $jquin->footer }}">
                    </div>

                    <div class="form-group">
                        <label for="no_rek">No Rekening</label>
                        <textarea name="no_rek" id="no_rek" class="form-control dsb" cols="30" rows="3" required="" placeholder="Masukkan No Rekening" maxlength="225">{{ $jquin->no_rek }}</textarea>
                    </div>

                    <div class="form-group">
                        <label for="quis">Waktu Pelaksanaan Quis</label>
                        <input type="number" maxlength="3" class="form-control dsb" id="quis" name="waktu" required="" placeholder="Masukkan Waktu Quis" value="{{ $time->waktu }}">
                        <small class="text-muted">Waktu ditulis dalam menit</small>
                    </div>

                    <div class="form-group">
                        <label for="password_default">Kata Sandi Default</label>
                        <input type="text" maxlength="50" class="form-control dsb" id="password_default" name="password_default" required="" placeholder="Masukkan Kata Sandi Default" value="{{ $jquin->password_default }}">
                        <small class="text-muted">Kata sandi default digunakan pada fitur reset kata sandi</small>
                    </div>

                    <hr>

                    <small class="text-info">*Background</small>

                    <div class="form-group">
                        <label for="">Background Informasi</label>
                        <br>
                        <img src="{{ asset('storage/'.$jquin->informasi) }}" alt="thumbnail" class="img-thumbnail" style="width: 20%; height: 20%;">

                        <input type="hidden" name="informasiOri" value="{{ $jquin->informasi }}">
                    </div>

                    <div class="form-group hide">
                        <label for="informasi">Informasi</label>
                        <input type="file" class="filestyle" id="informasi" name="informasi" required="" data-input="false" data-buttonname="btn-secondary btn-sm">
                    </div>

                    <div class="form-group">
                        <label for="">Background Program</label>
                        <br>
                        <img src="{{ asset('storage/'.$jquin->program) }}" alt="thumbnail" class="img-thumbnail" style="width: 20%; height: 20%;">

                        <input type="hidden" name="programOri" value="{{ $jquin->program }}">
                    </div>

                    <div class="form-group hide">
                        <label for="program">Program</label>
                        <input type="file" class="filestyle" id="program" name="program" required="" data-input="false" data-buttonname="btn-secondary btn-sm">
                    </div>

                    <div class="form-group">
                        <label for="">Background Login</label>
                        <br>
                        <img src="{{ asset('storage/'.$jquin->login) }}" alt="thumbnail" class="img-thumbnail" style="width: 20%; height: 20%;">

                        <input type="hidden" name="loginOri" value="{{ $jquin->login }}">
                    </div>


                    <div class="form-group hide">
                        <label for="login">Login</label>
                        <input type="file" class="filestyle" id="login" name="login" required="" data-input="false" data-buttonname="btn-secondary btn-sm">
                    </div>

                    <div class="form-group">
                        <label for="">Background Transaksi</label>
                        <br>
                        <img src="{{ asset('storage/'.$jquin->checkout) }}" alt="thumbnail" class="img-thumbnail" style="width: 20%; height: 20%;">

                        <input type="hidden" name="transaksiOri" value="{{ $jquin->checkout }}">
                    </div>


                    <div class="form-group hide">
                        <label for="checkout">Transaksi</label>
                        <input type="file" class="filestyle" id="checkout" name="checkout" required="" data-input="false" data-buttonname="btn-secondary btn-sm">
                    </div>

                    <div class="form-group">
                        <label for="">Logo</label>
                        <br>
                        <img src="{{ asset('storage/'.$jquin->logo) }}" alt="thumbnail" class="img-thumbnail" style="width: 20%; height: 20%;">

                        <input type="hidden" name="logoOri" value="{{ $jquin->logo }}">
                    </div>

                    <div class="form-group hide">
                        <label for="logo">Logo (Navbar)</label>
                        <input type="file" class="filestyle" id="logo" name="logo" required="" data-input="false" data-buttonname="btn-secondary btn-sm">
                    </div>

                    <button class="btn btn-sm btn-primary hide" type="submit">Simpan</button>
                </form>
          </div>
      </div>
  </div> <!-- end col -->
</div> <!-- end row -->
@stop

@section('footer')
<script src="{{asset('assets/plugins/bootstrap-filestyle/js/bootstrap-filestyle.min.js')}}" type="text/javascript"></script>

<script>
    $(document).ready(function () {
        $('.dsb').attr('disabled','disabled');
        $('.hide').hide();
        $('.filestyle').removeAttr('required','required');
    
    // Enable
    $('#edit').click(function() {
        $('.dsb').removeAttr('disabled','disabled');
        $('.hide').show();
        $('.filestyle').removeAttr('required','required');
        $('#edit').hide();
    })

    });

</script>
@stop
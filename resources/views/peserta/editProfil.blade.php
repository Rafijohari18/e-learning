@extends('layouts.master')

@section('title','Edit Profil')

@section('css')

@stop

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card m-b-20">
            <div class="card-body">
                <h4 class="mt-0 header-title">Edit Profil</h4>
                <hr>
                <form action="{{ route('update.profil') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nik">NIK</label>
                                <input type="number" maxlength="191" class="form-control" value="{{ $peserta->nik }}" name="nik" id="nik" required="" placeholder="Masukkan Nik">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nama_lengkap">Nama Lengkap</label>
                                <input type="text" maxlength="60" class="form-control" value="{{ $peserta->nama_lengkap }}" name="nama_lengkap" id="nama_lengkap" required="" placeholder="Masukkan Nama Lengkap">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="tgl_lahir">Tanggal Lahir</label>
                                <input type="date" class="form-control" value="{{ $peserta->tgl_lahir }}" name="tgl_lahir" id="tgl_lahir" required="" placeholder="Masukkan Nik">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="umur">Umur</label>
                                <input type="number" maxlength="3" class="form-control" value="{{ $peserta->umur }}" name="umur" id="umur" required="" placeholder="Masukkan Umur">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="jk">Jenis Kelamin</label>
                                <select name="gender" id="jk" class="form-control">
                                    <option value="L" @if($peserta->gender == 'L') selected @endif>Laki-Laki</option>
                                    <option value="P" @if($peserta->gender == 'P') selected @endif>Perempuan</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="profesi">Profesi</label>
                                <input type="text" maxlength="191" class="form-control" value="{{ $peserta->profesi }}" name="profesi" id="profesi" required="" placeholder="Masukkan Profesi">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="whatsapp">No. WhatsApp</label>
                                <input type="number" class="form-control" value="{{ $peserta->whatsapp }}" name="whatsapp" id="whatsapp" required="" maxlength="20" placeholder="Masukkan No WhatsApp">
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" maxlength="191" class="form-control" value="{{ $peserta->email }}" name="email" id="email" required="" placeholder="Masukkan Email">
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="motivasi">Motivasi Mengikuti Pelatihan</label>
                                <textarea name="motivasi" id="motivasi" cols="30" rows="4" class="form-control">{{ $peserta->motivasi }}</textarea>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="alamat">Alamat</label>
                                <textarea name="alamat" id="alamat" cols="30" rows="4" class="form-control">{{ $peserta->alamat }}</textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <label for="nama_pengguna">Nama Pengguna</label>
                            <input type="text" maxlength="191" value="{{ auth()->user()->username }}" class="form-control" name="nama_pengguna" id="nama_pengguna">
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="path">Avatar</label>
                                <input type="file" class="filestyle" name="path" id="path" data-input="false" data-buttonname="btn-secondary btn-sm">
                                <code class="highlighter-rouge">*Boleh Kosong</code>
                                <input type="hidden" name="fileOri" value="{{ auth()->user()->path }}">
                            </div>
                        </div>
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